<?php

namespace App\Http\Controllers;

use App\PrintPurchaseOrder;
use Illuminate\Http\Request;

class RisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = PrintPurchaseOrder::with('user', 'division')->searchPaginateAndOrder();
        $columns = [

            [
                'id' => 'user.name',
                'name' => 'Users'
            ],[
                'id' => 'data.request_date',
                'name' => 'Request Date'
            ], [
                'id' => 'data.division.station',
                'name' => 'Division Code'
            ],
            [
                'id' => 'data.request_year_code',
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrintPurchaseOrder  $printPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        return response()->json(PrintPurchaseOrder::whereId($id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrintPurchaseOrder  $printPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PrintPurchaseOrder $printPurchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrintPurchaseOrder  $printPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrintPurchaseOrder $printPurchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrintPurchaseOrder  $printPurchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrintPurchaseOrder $printPurchaseOrder)
    {
        //
    }
}
