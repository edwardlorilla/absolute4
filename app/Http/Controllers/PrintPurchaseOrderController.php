<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrintPurchaseOrder;
class PrintPurchaseOrderController extends Controller
{
    public function show(PrintPurchaseOrder $printPurchaseOrder)
    {
        return response()->json($printPurchaseOrder);
    }
}
