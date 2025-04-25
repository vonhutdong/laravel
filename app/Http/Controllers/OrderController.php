<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\Orders;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * CRUD User controller
 */
class OrderController extends Controller
{

    public function orderDetail(Request $request)
{
    $order_id = $request->input('order_id');
    $order_detail = OrderDetail::where('order_id', $order_id)->get();

    $products = [];
    foreach ($order_detail as $detail) {
        $product_id = $detail->product_id;
        $products[$detail->id] = Product::where('id', $product_id)->first();
    }

    return view('order_detail', [
        'order_detail' => $order_detail,
        'products' => $products
    ]);
}


}