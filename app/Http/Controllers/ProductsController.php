<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*return Product::with(['expires' => function($q){
            $q->whereDate('expiry_date', '>', Carbon::parse()->format('Y-m-d '));
        }])->get();*/
        $model = new Product;
        $query = [
            'category_id'
        ];
        foreach ($query as $column) {
            if (request()->has($column)) {
                $model = $model->whereIn($column, explode(',', request($column)));
            }
        }
        $model = $model->with(['category', 'medicine', 'unit'])->searchPaginateAndOrder();
        $columns = [
            [
                'id' => 'id',
                'name' => 'MedID'
            ], [
                'id' => 'medicine.name',
                'name' => 'Generic'
            ], [
                'id' => 'quantity',
                'name' => 'Quantity'
            ], [
                'id' => 'category.name',
                'name' => 'Category'
            ], [
                'id' => 'unit.name',
                'name' => 'Unit'
            ]
        ];
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns
            ], 200);
    }

    public function show_request($id)
    {
        return \App\Product::whereId($id)->first();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'unique:table_name,column1,null,null,column2,'.$request->column2.',column3,check3'
        //'unique:table_name,column1,except,null,column2,'.$request->column2.',column3,check3'
        $input = $request->validate([
//            'medication' => 'required|unique:products,medication,null,null,dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'] . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
//            'dosage' => 'required|unique:products,dosage,null,null,medication,' . $request->medication . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'] . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
  'medicine_id' => 'required|unique:products,medicine_id',
//            'medicine_id' => 'required|unique:products,medicine_id,null,null,medication,' . $request->medication . ',dosage,' . $request->dosage . ',unit_id,' . $request->unit_id['id'] . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
//            'unit_id.id' => 'required|unique:products,unit_id,null,null,medication,' . $request->medication . ',dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
//            'dispensing_unit_id.id' => 'required|unique:products,dispensing_unit_id,null,null,medication,' . $request->medication . ',dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'],

            /*'product_id' => 'required',
            'pr_number' => 'required',
            'po_number' => 'required',
            'name' => 'required',*/
            /*'quantity' => 'required | integer',
            'vat' => 'required',*/
//            'reorder_point' => 'required',
            /*'purchase_rate' => 'required',
            'mrp_rate' => 'required',
            'sale_rate' => 'required',
            'manufacture_date' => 'required',
            'expiry_date' => 'required',*/
            'category_id' => 'required',
            'reorder_point' => 'required',
            'unit_cost' => 'required',
//            'package_id' => 'required',
            /* 'rack.weight' => 'required',
             'rack.rack_id' => 'required',*/
            //'discount' => 'required',
            /* 'packs.item_pack' => 'required',
             'packs.item_type' => 'required',
             'packs.sub_item' => 'required',
             'packs.sub_item_type' => 'required',*/
        ]);
//        $input['unit_id'] = $input['unit_id']['id'];
//        $input['dispensing_unit_id'] = $input['dispensing_unit_id']['id'];
        $model = Product::updateOrCreate(
            ['id' => $request->id],
            $input
//            [
//
//                /*'product_id' => $input['product_id'],
//                'pr_number' => $input['pr_number'],
//                'po_number' => $input['po_number'],
//                'name' => $input['name'],*/
//
//                //'vat' => $input['vat'],
//                /*'reorder_point' => $input['reorder_point'],
//
//                'quantity' => $input['quantity'],
//                'purchase_rate' => $input['purchase_rate'],
//                'mrp_rate' => $input['mrp_rate'],
//                'sale_rate' => $input['sale_rate'],
//                'manufacture_date' => $input['manufacture_date'],
//                'expiry_date' => $input['expiry_date'],*/
//                'category_id' => $input['category_id'],
//                'package_id' => $input['package_id'],
//                //'discount' => $input['discount']
//            ]


        );
        /* $model->rack()->updateOrCreate(
             ['id' => array_key_exists('id', $request->rack) ? $input['rack']['id'] : null],
             [
                 'weight' => $input['rack']['weight'],
                 'rack_id' => $input['rack']['rack_id']
             ]);
         $model->packs()->updateOrCreate(
             ['id' => array_key_exists('id', $request->packs) ? $input['packs']['id'] : null],
             [
                 "item_pack" => $input['packs']['item_pack'],
                 "item_type" => $input['packs']['item_type'],
                 "sub_item" => $input['packs']['sub_item'],
                 "sub_item_type" => $input['packs']['sub_item_type'],
             ]
         );*/
        return response()->json($model, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $query = [
            'user_id',
            'type'
        ];
        $transaction = $product->transactions();
        foreach ($query as $column) {
            if (request()->has($column)) {
                $transaction = $transaction->whereIn($column, explode(',', request($column)));
            }
        }
        $model = $transaction->with('user', 'product', 'order')->searchPaginateAndOrder();
        $columns = [
            [
                'id' => 'id',
                'name' => 'ID'
            ], [
                'id' => 'po_number',
                'name' => 'PO #'
            ],
            [
                'id' => 'type',
                'name' => 'Type'
            ],
            [
                'id' => 'user.name',
                'name' => 'Users'
            ],
            [
                'id' => 'out_quantity',
                'name' => 'Quantity'
            ],
            [
                'id' => 'expiry_date',
                'name' => 'Expiry Date'
            ]
        ];
        return response()
            ->json([
                'model' => $model,
                'columns' => $columns,
                'product' => Product::whereId($product->id)->with('package', 'category', 'medicine', 'unit', 'dispensing_unit')->first()
            ]);

    }

    public function edit(Product $product)
    {
        $id = $product->id;
        return response()->json(Product::whereId($id)->with('package', 'category', 'unit', 'dispensing_unit')->first(), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $input = $request->validate([
//            'medication' => 'required|unique:products,medication,' . $request->medication . ',medication,dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'] . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
//            'dosage' => 'required|unique:products,dosage,' . $request->dosage . ',dosage,medication,' . $request->medication . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'] . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
            'medicine_id' => 'required|unique:products,medicine_id,' . $request->medicine_id . ',medicine_id',
//            'unit_id.id' => 'required|unique:products,unit_id,' . $request->unit_id['id'] . ',unit_id,medication,' . $request->medication . ',dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',dispensing_unit_id,' . $request->dispensing_unit_id['id'],
//            'dispensing_unit_id.id' => 'required|unique:products,dispensing_unit_id,' . $request->dispensing_unit_id['id'] . ',dispensing_unit_id,medication,' . $request->medication . ',dosage,' . $request->dosage . ',medicine_id,' . $request->medicine_id . ',unit_id,' . $request->unit_id['id'],

            /*'product_id' => 'required',
            'pr_number' => 'required',
            'po_number' => 'required',
            'name' => 'required',*/
            /*'quantity' => 'required | integer',
            'vat' => 'required',*/
//            'reorder_point' => 'required',
            /*'purchase_rate' => 'required',
            'mrp_rate' => 'required',
            'sale_rate' => 'required',
            'manufacture_date' => 'required',
            'expiry_date' => 'required',*/
            'category_id' => 'required',
            'reorder_point' => 'required',
            'unit_cost' => 'required',
//            'package_id' => 'required',
            /* 'rack.weight' => 'required',
             'rack.rack_id' => 'required',*/
            //'discount' => 'required',
            /* 'packs.item_pack' => 'required',
             'packs.item_type' => 'required',
             'packs.sub_item' => 'required',
             'packs.sub_item_type' => 'required',*/
        ]);
//        $input['unit_id'] = $input['unit_id']['id'];
//        $input['dispensing_unit_id'] = $input['dispensing_unit_id']['id'];
        $model = Product::updateOrCreate(
            ['id' => $request->id],
            $input
//            [
//
//                /*'product_id' => $input['product_id'],
//                'pr_number' => $input['pr_number'],
//                'po_number' => $input['po_number'],
//                'name' => $input['name'],*/
//
//                //'vat' => $input['vat'],
//                /*'reorder_point' => $input['reorder_point'],
//
//                'quantity' => $input['quantity'],
//                'purchase_rate' => $input['purchase_rate'],
//                'mrp_rate' => $input['mrp_rate'],
//                'sale_rate' => $input['sale_rate'],
//                'manufacture_date' => $input['manufacture_date'],
//                'expiry_date' => $input['expiry_date'],*/
//                'category_id' => $input['category_id'],
//                'package_id' => $input['package_id'],
//                //'discount' => $input['discount']
//            ]


        );
        /* $model->rack()->updateOrCreate(
             ['id' => array_key_exists('id', $request->rack) ? $input['rack']['id'] : null],
             [
                 'weight' => $input['rack']['weight'],
                 'rack_id' => $input['rack']['rack_id']
             ]);
         $model->packs()->updateOrCreate(
             ['id' => array_key_exists('id', $request->packs) ? $input['packs']['id'] : null],
             [
                 "item_pack" => $input['packs']['item_pack'],
                 "item_type" => $input['packs']['item_type'],
                 "sub_item" => $input['packs']['sub_item'],
                 "sub_item_type" => $input['packs']['sub_item_type'],
             ]
         );*/
        return response()->json($model, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        return response()->json($product->delete(), 201);
    }

    public function recent_expired_medicine()
    {
        $transaction = new \App\Transaction;
        $currentDate = date('Y-m-d');
        $expired = $transaction->whereNotNull('expiry_date')->whereIsExpired(false)->whereDate('expiry_date', '<=', $currentDate);
        $products = [];
        if ($expired->exists()) {
            foreach ($expired->get() as $expire) {
                $products[] = $product = \App\Product::whereId($expire->product_id)->first();
                $product->notify(new \App\Notifications\Expiry(auth()->user(), $product, $product->medicine->name, $product->expiry_date));
            }
            $expired->update(['is_expired' => true]);
        }
        return response()->json($products);
    }
}
