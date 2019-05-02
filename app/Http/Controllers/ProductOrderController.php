<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductOrderController extends BaseController
{
    public function create(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $data['products'] = Product::all();
        return view('order.create', ['data' => $data]);
    }
    
    public function store(Request $req, Order $order) {
        $product = Product::find($req->input('product_order.product_id'));
        $order->products()->attach($cart = session()->get('cart'));
        return redirect()->route('order.review', ['order' => $order]);
    }
}