<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class OrderController extends BaseController
{

    public function review($id){
        $cart=Cart::findOrFail($id);
        return view('order.review');
    }
}