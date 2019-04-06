<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class OrdersController extends BaseController
{

    public function index($id){
        $cart=Cart::findOrFail($id);
        return view('orders.index');
    }

    public function report($id){
        $cart=Cart::findOrFail($id);
        return view('orders.report');
    }
}