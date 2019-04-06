<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartController extends BaseController
{

public function checkout(Request $req, $order = null) {
        $cart = [];
        $data = [];
        $data['cart'] = $cart;
        return view('cart.checkout', ['data' => $data]);
    }
}