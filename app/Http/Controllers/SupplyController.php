<?php

namespace App\Http\Controllers;

use App\Supply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Supply::whereType(request('type'))->searchPaginateAndOrder();
        $columns = [

            [
                'id' => 'id',
                'name' => 'ID'
            ],
            [
                'id' => 'name',
                'name' => 'Name'
            ],
            [
                'id' => 'quantity',
                'name' => 'Quantity'
            ],
            [
                'id' => 'purchase_order',
                'name' => 'Purchase Order'
            ]
        ];
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'id' => '',
            'name' => 'required|unique:supplies,name,null,null,dispensing_unit_id,'.$request->dispensing_unit_id['id'] . ',unit_id,'.$request->unit_id['id'],
            'description' => '',
            'reorder_point' => '',
            'unit_cost' => 'required',
//            'unit_id.id' => 'required|unique:products,unit_id,null,null,dispensing_unit_id,'.$request->dispensing_unit_id['id']. ',unit_id,'.$request->unit_id['id'],
//            'dispensing_unit_id.id' => 'required|unique:products,dispensing_unit_id,null,null,unit_id,'.$request->unit_id['id']. ',dispensing_unit_id,'.$request->dispensing_unit_id['id'],
        ]);

        $input['unit_id'] = $request['unit_id']['id'];
        $input['dispensing_unit_id'] = $request['dispensing_unit_id']['id'];

        $input['type'] = request()->type;
        $supply = Supply::updateOrCreate(
            ['id' => $request->id],
            $input
        );
        return response()->json($supply, 201);
    }

    public function receive_items(Request $request)
    {
        $request['user_id'] = auth()->id();
        $input = $request->validate([
            'user_id' => 'required',
            'division' => 'required',
            'request_date' => '',
            'request_year_code' => 'required',
            'year' => 'required',
            'supplies' => 'required|array|min:1',
        ]);

        $users = \App\User::whereHas('roles', function ($q) {
            $q->where('name', 'superadministrator');
        })->get();
        $supplies = [];
        foreach ($input['supplies'] as $item) {
            $supply = \App\Supply::whereId($item['id'])->with('unit')->first();
            $lastTransactions = [];
            $tracks = [];
            $requested = (int)$item['out_quantity'];
            while($requested){
                $lastTransaction = \App\Track::whereSupplyId($item['id'])->where('quantity', '>', 0)->where('completed', 1)->where('type', 1)->with('order', 'orders')->first();
                $lastTransactions[] =  $lastTransaction->id;
                $lastTransaction->completed = 0;
                $quantities = $lastTransaction->quantity;
                if ($quantities >= $requested) {
                    $track = new \App\Track;
                    $track->data = [
                        'ref_quantity' =>  $lastTransaction ?$lastTransaction->check: ''
                    ];
                    $track->check = $requested;
                    $track->quantity = $requested;
                    $supply['amount'] = $requested;
                    $supply['po_number'] =  $lastTransaction ? $lastTransaction->po_number : '';
                    $supply['ref_quantity'] = $lastTransaction ?$lastTransaction->out_quantity: '';
                    $track->type = 0;
                    $track->user_id = $input['user_id'];
                    $track->supply_id = $supply['id'];
                    $track->po_number =  $lastTransaction ? $lastTransaction->po_number : '';
                    $track->save();
                    $track->orders()->create([
                        'user_id' => $input['user_id'],
                        'type' => 'created_requested_supply',
                        'po_number' => $lastTransaction ? $lastTransaction->po_number : '',
                        'date_delivered' => $input['request_date'],
                        'quantity' => $requested
                    ]);
                    $lastTransaction->update(['quantity' =>  $quantities - $requested]);
                    $requested = 0;
                    $tracks[] = $track->id;

                    $supplies[] = $supply;
                }
                else if ($requested >= $quantities) {
                    $track = new \App\Track;
                    $track->check = $quantities;
                    $track->data = [
                        'ref_quantity' =>  $lastTransaction ?$lastTransaction->check: ''
                    ];
                    $track->quantity = $quantities;
                    $supply['amount'] = $quantities;
                    $supply['po_number'] =  $lastTransaction ? $lastTransaction->po_number : '';
                    $supply['ref_quantity'] = $lastTransaction ?$lastTransaction->out_quantity: '';
                    $track->type = 0;
                    $track->user_id = $input['user_id'];
                    $track->supply_id = $supply['id'];
                    $track->po_number =  $lastTransaction ? $lastTransaction->po_number : '';
                    $track->save();
                    $track->orders()->create([
                        'user_id' =>  $input['user_id'],
                        'type' => 'created_requested_product',
                        'po_number' => $lastTransaction ? $lastTransaction->po_number : '',
                        'date_delivered' =>$input['request_date'],
                        'quantity' => $quantities
                    ]);
                    $requested = $requested - $quantities;
                    $lastTransaction->update(['quantity' => 0]);
                    $tracks[] = $track->id;
                    $supplies[] = $supply;
                }

            }
            \App\Track::whereIn('id', $lastTransactions)->whereCompleted(0)->update(['completed' => 1]);
            if ($supply->quantity <= $supply->reorder_point) {
                if (\App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->exists()) {
                    \App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->delete();
                }
                foreach ($users as $user) {
                    $user->notify(new \App\Notifications\Reorder('The supply "' . $supply->name . '" quantity has reached the reorder level.', $supply->reorder_point, $supply->quantity, $supply->id, $supply->type));
                }
            } else if (\App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->exists()) {
                \App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->delete();
            }
        }
        $print_purchase_order = new \App\PrintPurchaseOrder;
        $print_purchase_order->user_id = $input['user_id'];
        $print_purchase_order->data = [
            'division' => \App\Division::whereId($input['division'])->first(),
            'request_date' => $request->request_date,
            'request_year_code' => $request->request_year_code,
            'date_release' => $request->request_date,
            'date_print' => $request->request_date,
            'supplier' => '', //\App\Supplier::whereId($input['supplier'])->first(),
            'supplies' => $supplies
        ];
        $print_purchase_order->save();
        $print_purchase_order->orders()->create([
            'user_id' => auth()->id(),
            'type' => 'created_purchase_order_supply',
            'po_number' => '',
            'date_delivered' => $input['request_date'],
            'quantity' => 0,
            'division_id' => $input['division']
        ]);
        return response()->json($supplies);
    }

    public function store_purchase_order(Request $request)
    {
        $input = $request->validate([
            'po_number' => 'required|unique:orders,po_number',
            'pr_number' => '',
            'date_delivered' => 'required',
            'source_id' => 'required',
            'data' => 'required|array|min:1',
        ]);
        $supplies = '';
        $users = \App\User::whereHas('roles', function ($q) {
            $q->where('name', 'superadministrator');
        })->get();
        $track = '';
        foreach ($input['data'] as $item) {
            $supply = Supply::whereId(request()->supply_id ? request()->supply_id : $item['supply_id']['id'])->with('unit')->first();
            $supply['amount'] = (int)$item['quantity'];
            $track = $supply->tracks()->save(new \App\Track(['data' => [
                'division' => [
                    'name' => '',
                    'id' => ''
                ],
                'supplier' =>[
                    'name' => '',
                    'id' => ''
                ],
                'quantity' => $item['quantity'],
                'po_number' => $input['po_number'],
                'supplies' => [$supply]
            ],'po_number' => $input['po_number'], 'quantity' =>   $item['quantity'] , 'check' => $item['quantity'], 'type' => 1]));

            $track->orders()->create([
                'user_id' => auth()->id(),
                'type' => 'created_supply_purchase_order',
                'source_id' => $input['source_id'],
                'po_number' => $input['po_number'],
                'pr_number' => $input['pr_number'],
                'date_delivered' => $input['date_delivered'],
                'quantity' => $item['quantity']
            ]);
            if ($supply->quantity <= $supply->reorder_point) {
                if (\App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->exists()) {
                    \App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->delete();
                }
                foreach ($users as $user) {
                    $user->notify(new \App\Notifications\Reorder('The supply "' . $supply->name . '" quantity has reached the reorder level.', $supply->reorder_point, $supply->quantity, $supply->id, $supply->type));
                }
            } else if (\App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->exists()) {
                \App\Notification::where('data', 'like', '%"supply_id":' . $supply->id . '%')->delete();
            }
        }
        //
        return response()->json( $track, 200);
    }

    public function create_supply_ledger($request)
    {
        $input = $this->validate($request, [
            'supply_id' => 'required',
            'supplier_id' => 'required',
            'name' => 'required',
            'disabled' => '',
            'purchase_order' => 'required',
            'description' => '',
            'locations' => 'required|array|min:1',
            'code' => 'required',
            'unit_cost' => 'required',
            'unit_id' => 'required',
            /*'vat' => 'required',
            'purchase_rate' => 'required',
            'discount' => 'required',
            'mrp_rate' => 'required',
            'sale_rate' => 'required',*/
            'reorder_point' => 'required'
        ]);
        $input->except('purchase_order');
        $input['quantity'] = (int)$request->quantity;
        $input['supplier_id'] = (int)$request->supplier_id;
        $locations = $request->locations;

        $supply = Supply::updateOrCreate(
            ['id' => $request->id],
            $input
        );
        if (!$request->id) { //if not found id
            $supply->orders()->create([
                'user_id' => auth()->id(),
                'type' => 'created_purchase_order',
//            'source_id' => $orders['source_id'], //type= medicine = 0 'supply 1
                'po_number' => $request->purchase_order,
                'pr_number' => '',
                'date_delivered' => $request->date_delivered,
                'quantity' => $input['quantity']
            ]);
        }


        $supply->tracks()->save(new \App\Track(['supplier_id' => $request->supplier_id, 'check' => $input['quantity'], 'type' => 1]));

        foreach ($locations as $q) {
            $location = \App\Location::whereId($q['id'])->first();
            $receive = $location->receives()->save(new \App\Receive(['quantity' => $q['quantity']]));
            $supply->tracks()->save(new \App\Track(['supplier_id' => $request->supplier_id, 'receive_id' => $receive->id, 'check' => $q['quantity'], 'type' => 0]));
            $supply->decrement('quantity', $q['quantity']);
            $location->update(['disabled' => 0]);
        }


        return response()->json($supply, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supply $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        $query = [
            'user_id',
            'type'
        ];
       // $model = \App\Order::whereType('created_supply_purchase_order')->whereSubjectType('App\Track')->whereSubjectId($supply->id)->with(['subject'])->searchPaginateAndOrder();
        $model = \App\Track::whereSupplyId($supply->id)->searchPaginateAndOrder();
        $columns = [
            [
                'id' => 'id',
                'name' => 'ID'
            ],
            [
                'id' => 'po_number',
                'name' => 'PO #'
            ],
            [
                'id' => 'type',
                'name' => 'Type'
            ],
            [
                'id' => 'check',
                'name' => 'Quantity'
            ],
        ];

        return response()
            ->json([
                'model' => $model,
                'columns' => $columns,
                'supply' => $supply
            ]);

    }

    public function edit(Supply $supply)
    {
        return response()->json($supply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Supply $supply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supply $supply)
    {
        $supplier = \App\Supplier::whereId($supply->supplier_id)->first();
        $receives = [];

        if ((int)$request->type === 1) {
            $receive = $supplier->tracks()->save(new \App\Track(['check' => $request->quantity, 'type' => (int)$request->type, 'supply_id' => $supply->id]));
            $receive['supplier'] = $supplier;
            $receives[] = $receive;
            $supply->increment('quantity', $request->quantity);
        } else {
            foreach ($request->locations as $q) {
                $location = \App\Location::whereId($q['id'])->first();
                $receive = $location->receives()->save(new \App\Receive(['quantity' => $q['quantity']]));
                $track = $supply->tracks()->save(new \App\Track(['supplier_id' => $supply->supplier_id, 'receive_id' => $receive->id, 'check' => $q['quantity'], 'type' => 0]));
                $receives[] = \App\Track::where('id', $track->id)->with('supplier', 'receive.location')->first();
                $supply->decrement('quantity', $q['quantity']);
                $location->update(['disabled' => 0]);
            }
        }
        return response()->json($receives, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supply $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        return response()->json($supply->delete());
    }
}
