<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartController extends BaseController
{

public function checkout(Request $req, $order = null){
        $products = [];
        $data = [];
        $data['products'] = $products;
        return view('cart.checkout', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function review($id){
        $cart=Cart::findOrFail($id);
        return view('order.review', compact('product'));
    }
}