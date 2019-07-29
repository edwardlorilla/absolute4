<?php

namespace App\Http\Controllers;

use App\Pending;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PendingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Pending::with('subject', 'user')->searchPaginateAndOrder();
        $columns = Pending::$columns;
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['division'] = \App\User::whereId(auth()->id())->with('division')->first()['division']['id'];
        $input = $this->validate($request, [
            'division' => 'required',
            "request_date" => 'required',
            "request_year_code" => 'required',
            "products" => 'required',
        ]);


        $users = \App\User::whereHas('roles', function ($q) {
            $q->where('name', 'superadministrator');
        })->where('id', '!=', auth()->id())->get();
        auth()->user()->notify(new \App\Notifications\ApprovedRequest('Your medicine requests currently under review.', $input['products'], 'medicine-approved'));
        $id = auth()->user()->unreadNotifications[0]->id;
        foreach ($users as $user) {
            $user->notify(new \App\Notifications\Pending(auth()->user(), $input, $id));
        }

        \App\Product::where('disabled', true)
            ->update(['disabled' => false]);

        return response()->json([], 200);
    }

    public function supply(Request $request)
    {
        $request['division'] = \App\User::whereId(auth()->id())->with('division')->first()['division']['id'];
        $input = $request->validate([
            'division' => 'required',
            'request_date' => '',
            'request_year_code' => 'required',
            'year' => 'required',
            'supplies' => 'required|array|min:1',
        ]);

        $users = \App\User::whereHas('roles', function ($q) {
            $q->where('name', 'superadministrator');
        })->where('id', '!=', auth()->id())->get();
        auth()->user()->notify(new \App\Notifications\ApprovedRequest('Your supply request currently under review.', $input['supplies'], 'supply-approved'));
        $id = auth()->user()->unreadNotifications[0]->id;
        foreach ($users as $user) {
            $user->notify(new \App\Notifications\PendingSupply(auth()->user(), $input, request()->type == '0' ? 0 : 1, $id));
        }
        \App\Supply::where('disabled', true)
            ->update(['disabled' => false]);
        return response()->json([], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pending $pending
     * @return \Illuminate\Http\Response
     */
    public function show($pending)
    {
        return response()->json(auth()->user()->notifications()->whereId($pending)->first());
    }

    public function approved_supply_request($pending, Request $request)
    {

        $input = $request->validate([
            'division' => 'required',
            'request_date' => '',
            'request_year_code' => 'required',
            'year' => 'required',
            'user_id' => 'required',
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
        $userNotification = \App\Notification::whereId($pending)->first();
        $userId = $userNotification->data['notification_id'];
        \App\User::whereId($input['user_id'])->first()->notifications()->whereId($userId)->first()->update(['read_at' => now(), 'data->status' => 'approved', 'data->item' => json_encode([
            'division' => \App\Division::whereId($input['division'])->first(),
            'supplier' => '', //\App\Supplier::whereId($input['supplier'])->first(),
            'supplies' => $supplies
        ]), 'data->message' => 'Your supply requests been approved by ' . auth()->user()->name]);
        \App\Notification::whereData(json_encode($userNotification->data, false))->delete();
        //$user->notify(new \App\Notifications\ApprovedRequest('Your supply requests been approved by '. auth()->user()->name, $input['supplies'], request()->type == '0' ? 'office-supply-approved': 'supply-approved'));
        return response()->json();
    }

    public function rejected_supply_request($pending, Request $request)
    {
        $input = $request->validate([
            'division' => 'required',
            'request_date' => '',
            'request_year_code' => 'required',
            'year' => 'required',
            'user_id' => 'required',
            'supplies' => 'required|array|min:1',
        ]);
        $userNotification = \App\Notification::whereId($pending)->first();
        $userId = $userNotification->data['notification_id'];
        \App\User::whereId($input['user_id'])->first()->notifications()->whereId($userId)->first()->update(['read_at' => now(), 'data->status' => 'rejected', 'data->message' => 'Your supply requests been rejected by ' . auth()->user()->name]);
        auth()->user()->notifications()->whereData(json_encode($userNotification->data, false))->delete();
        //$user->notify(new \App\Notifications\ApprovedRequest('Your supply requests been approved by '. auth()->user()->name, $input['supplies'], request()->type == '0' ? 'office-supply-approved': 'supply-approved'));
        return response()->json();
    }
    public function approved_medicine_request($pending, Request $request)
    {

        $input = $this->validate($request, [
            //'po_number' => 'required|unique:orders,po_number',
            "division" => 'required',
            "request_date" => 'required',
            "request_year_code" => 'required',
            "user_id" => 'required',
            "products" => 'required',
            //"supplier" => 'required',
        ]);
        $user = \App\User::whereId($input['user_id'])->first();
        $productId = [];
        $users = \App\User::whereHas('roles', function ($q) {
            $q->where('name', 'superadministrator');
        })->get();
        $products = [];
        foreach ($input['products'] as $product) {
            $requested = $product['out_quantity'];
            $lastTransactions = [];
            while($requested) {
                $ref_product = \App\Product::whereId($product['id'])->with('medicine', 'unit', 'category', 'package')->first();
                $lastTransaction = \App\Transaction::whereProductId($product['id'])->whereDate('expiry_date', '>', Carbon::parse()->format('Y-m-d'))->where('quantity', '>', 0)->where('completed', 1)->where('type', 1)->with('order', 'orders')->first();
                $lastTransaction->completed = 0;
                $quantities = $lastTransaction->quantity;
                $lastTransactions[] =  $lastTransaction->id;
                if ($quantities >= $requested) {
                    $transaction = new \App\Transaction;
                    $transaction->out_quantity = $requested;
                    $transaction->quantity = $requested;
                    $transaction->data = [
                        'ref_quantity' =>  $lastTransaction ?$lastTransaction->out_quantity: ''
                    ];
                    $ref_product['amount'] = $requested;
                    $ref_product['po_number'] = $lastTransaction ? $lastTransaction->po_number : '';
                    $ref_product['ref_quantity'] = $lastTransaction ? $lastTransaction->out_quantity: '';
                    $products[] = $ref_product;
                    $transaction->type = 0;
                    $transaction->expiry_date = $lastTransaction->expiry_date;
                    $transaction->user_id = $input['user_id'];
                    $transaction->product_id = $product['id'];
                    $transaction->po_number =  $lastTransaction ? $lastTransaction->po_number : '';
                    $transaction->save();
                    $transaction->orders()->create([
                        'user_id' => $user->id,
                        'type' => 'created_requested_product',
                        'po_number' => $lastTransaction ? $lastTransaction->po_number : '',
                        'date_delivered' => $request->request_date,
                        'quantity' => $requested
                    ]);
                    $lastTransaction->update(['quantity' => $quantities - $requested]);
                    $requested = 0;
                    $transactions[] = $transaction->id;
                }
                else if ($requested >= $quantities) {
                    $transaction = new \App\Transaction;
                    $transaction->out_quantity = $quantities;
                    $transaction->quantity = $quantities;
                    $transaction->data = [
                        'ref_quantity' =>  $lastTransaction ?$lastTransaction->out_quantity: ''
                    ];
                    $ref_product['amount'] = $quantities;
                    $ref_product['po_number'] = $lastTransaction ? $lastTransaction->po_number : '';
                    $ref_product['ref_quantity'] = $lastTransaction ?$lastTransaction->out_quantity: '';
                    $products[] = $ref_product;
                    $transaction->type = 0;
                    $transaction->expiry_date = $lastTransaction->expiry_date;
                    $transaction->user_id = $input['user_id'];
                    $transaction->product_id = $product['id'];
                    $transaction->po_number =  $lastTransaction ? $lastTransaction->po_number : '';
                    $transaction->save();
                    $transaction->orders()->create([
                        'user_id' => $user->id,
                        'type' => 'created_requested_product',
                        'po_number' => $lastTransaction ? $lastTransaction->po_number : '',
                        'date_delivered' => $request->request_date,
                        'quantity' => $quantities
                    ]);
                    $requested = $requested - $quantities;
                    $lastTransaction->update(['quantity' =>  0]);
                    $transactions[] = $transaction->id;


                }




                if ($ref_product->quantity <= $ref_product->reorder_point) {
                    if (\App\Notification::where('data', 'like', '%"product_id":' . $ref_product->id . '%')->exists()) {
                        \App\Notification::where('data', 'like', '%"product_id":' . $ref_product->id . '%')->delete();
                    }
                    foreach ($users as $user) {
                        $user->notify(new \App\Notifications\ReorderMedicine('The product "' . $ref_product->medicine->name . '" quantity has reached the reorder level.', $ref_product->reorder_point, $ref_product->quantity, $ref_product->id));
                    }
                } else if (\App\Notification::where('data', 'like', '%"product_id":' . $ref_product->id . '%')->exists()) {
                    \App\Notification::where('data', 'like', '%"product_id":' . $ref_product->id . '%')->delete();
                }


            }
            \App\Transaction::whereIn('id', $lastTransactions)->whereCompleted(0)->update(['completed' => 1]);

            $recipient = \App\Transaction::whereProductId($product['id'])
                ->whereDate('expiry_date', '>', \Carbon\Carbon::parse()->format('Y-m-d'))
                ->orderBy('expiry_date', 'asc')
                ->with(['orders' => function ($query) {
                    $query->first();
                }])->first();
            $receiptment = new \App\Receiptment;
            $receiptment->product_id = $product['id'];
            $receiptment->division_id = $request->division;
            $receiptment->po_number = $recipient['orders'][0]['po_number'];
            //$receiptment->ris_number = $recipient['orders'][0]['pr_number'];
            $receiptment->date_release = $request->request_date;
            $receiptment->date_print = $request->request_date;
            $receiptment->save();
            $productId[] = $product['id'];


        }

        $requests = $user->requests()->save(new \App\Request([
            'division_id' => $request->division,
            'request_date' => $request->request_date,
            'request_year_code' => $request->request_year_code
        ]));


        $print_purchase_order = new \App\PrintPurchaseOrder;
        $print_purchase_order->user_id = $input['user_id'];
        $print_purchase_order->data = [
            'division' => \App\Division::whereId($input['division'])->first(),
            'date_release' => $request->request_date,
            'request_date' => $request->request_date,
            'date_print' => $request->request_date,
            'request_year_code' => $request->request_year_code,
            'supplier' => '',//\App\Supplier::whereId($input['supplier'])->first(),
            'supplies' => $products
        ];
        $print_purchase_order->save();
        $print_purchase_order->orders()->create([
            'user_id' => auth()->id(),
            'type' => 'created_request_product',
            'po_number' => '',
            'date_delivered' => $input['request_date'],
            'quantity' => 0,
            'division_id' => $input['division']
        ]);


        $requests->transactions()->attach($transactions);
        $userNotification = \App\Notification::whereId($pending)->first();
        $userId = $userNotification->data['notification_id'];
        $markAsRead = \App\User::whereId($input['user_id'])->first()->notifications()->whereId($userId)->first()->update(['read_at' => now(), 'data->item' => json_encode([
            'division' => \App\Division::whereId($input['division'])->first(),
            'supplier' => '', //\App\Supplier::whereId($input['supplier'])->first(),
            'supplies' => $products
        ]), 'data->status' => 'approved', 'data->message' => 'Your medicine requests been approved by ' . auth()->user()->name]);
        \App\Notification::whereData(json_encode($userNotification->data, false))->delete();
//        $user->notify(new \App\Notifications\ApprovedRequest('Your medicine requests been approved by '. auth()->user()->name, $input['products'], 'medicine-approved'));
        return response()->json($markAsRead, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pending $pending
     * @return \Illuminate\Http\Response
     */
    public function edit(Pending $pending)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Pending $pending
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pending $pending)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pending $pending
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pending $pending)
    {
        return response()->json($pending->delete());
    }
}
