<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Order::whereType('created_purchase_order_product')->with('subject', 'source',  'user')->searchPaginateAndOrder();
        $columns = Order::$columns;
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ]);
    }

    public function validateCheckin(Request $request)
    {
        $input = $request->validate([
            'po_number' => 'required|unique:orders,po_number',
            'quantity_per' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            "expiry_date" => "required|after:date_delivered",
        ]);

        return response()->json(200);
    }
    public function validateSupplyCheckin(Request $request)
    {
        $input = $request->validate([
            'po_number' => 'required|unique:orders,po_number',
            'quantity_per' => 'required',
            'quantity' => 'required',
        ]);

        return response()->json(200);
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
        $orders = $request->validate([
            'source_id' => 'required',
            'date_delivered' => 'required',
            "expiry_date" => "required|after:date_delivered",
            'data' => 'required|array|min:1',
            'data.*.po_number' => 'distinct',
        ]);
        $user = auth()->user();
        foreach ($orders['data'] as $medicine) {

            $transaction = new \App\Transaction;
            $transaction->out_quantity = $medicine['quantity'];
            $transaction->quantity = $medicine['quantity'];
            $transaction->type = 1;
            $transaction->date_delivered = $medicine['date_delivered'];
            $transaction->expiry_date = $medicine['expiry_date'];
            $transaction->user_id = $user->id;
            $transaction->product_id = $medicine['product_id']['id'];
            $transaction->save();
            $transaction->orders()->create([
                'user_id' => auth()->id(),
                'type' => 'created_purchase_order_product',
                'source_id' => $orders['source_id'],
                'po_number' => $medicine['po_number'],
                'date_delivered' => $orders['date_delivered'],
                'quantity' =>  $medicine['quantity'],
            ]);
            $product = \App\Product::whereId($medicine['product_id']['id'])->with('medicine')->first();
            if ($product->quantity <= $product->reorder_point) {
                $users = \App\User::whereHas('roles', function ($q) {
                    $q->where('name', 'superadministrator');
                })->get();
                if (\App\Notification::where('data', 'like', '%"product_id":' . $product->id . '%')->exists()) {
                    \App\Notification::where('data', 'like', '%"product_id":' . $product->id . '%')->delete();
                }
                foreach ($users as $user) {
                    $user->notify(new \App\Notifications\ReorderMedicine('The product "' . $product->medicine->name. '" quantity has reached the reorder level.', $product->reorder_point, $product->quantity, $product->id));
                }
            } else if (\App\Notification::where('data', 'like', '%"product_id":' . $product->id . '%')->exists()) {
                \App\Notification::where('data', 'like', '%"product_id":' . $product->id . '%')->delete();
            }
        }

        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return response()->json(Order::whereId($order->id)->with('subject')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
