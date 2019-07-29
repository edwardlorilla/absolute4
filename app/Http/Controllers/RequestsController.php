<?php

namespace App\Http\Controllers;

use App\Request as Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Requests::with(['user', 'division', 'transactions' => function ($query) {
            $query->with(['product.medicine' => function ($q) {
                $q->get();
            }]);
        }])->searchPaginateAndOrder();
        $columns = [
            [
                'id' => 'user.name',
                'name' => 'Users'
            ],
            [
                'id' => 'request_date',
                'name' => 'Request Date'
            ], [
                'id' => 'division.name',
                'name' => 'Division Code'
            ],
            [
                'id' => 'request_year_code',
                'name' => 'Request Year Code'
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

        $input = $this->validate($request, [
            //'po_number' => 'required|unique:orders,po_number',
            "division" => 'required',
            "request_date" => 'required',
            "request_year_code" => 'required',
            "products" => 'required',
            //"supplier" => 'required',
        ]);
        $user = auth()->user();
        $user_id = auth()->id();
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
                    $transaction->user_id = $user_id;
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
                    $transaction->user_id = $user_id;
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
        $print_purchase_order->user_id = $user_id;
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


        return response()->json($requests, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Requests $request)
    {
        $requests = Requests::whereId($request->id)->with(['division', 'user', 'transactions' => function ($query) {
            $query->with(['product' => function ($q) {
                $q->with('category', 'package', 'medicine');
            }]);
        }])->first();
        return response()->json($requests, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Request $requests)
    {
        $this->validate($request, [
            "request_date" => 'required',
            "request_year_code" => 'required',
            "division_id" => 'required',
            "products" => 'required',
        ]);
        $user = auth()->user();
        $transactions = [];
        $products = $request->products;
        for ($i = 0; $i < count($products); ++$i) {
            $transaction = \App\Transaction::whereId($products[$i]['transaction_id'])->first();
            $transaction->out_quantity = $products[$i]['out_quantity'];
            $transaction->type = 0;
            $transaction->user_id = $user->id;
            $transaction->product_id = $products[$i]['id'];;
            $transaction->product()->where('id', $products[$i]['id'])->update(['disabled' => false, 'quantity' => $products[$i]['quantity']]);
            $transaction->save();

            $transactions[] = $transaction->id;
        }
        $req = Requests::findOrFail($request->id);
        $req->division_id = $request->patient;
        $req->remark = $request->remark;
        $req->request_date = $request->request_date;
        $req->request_year_code = $request->request_year_code;
        $req->save();
        $req->transactions()->sync($transactions);
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests $request)
    {
        $request->delete();
    }
}
