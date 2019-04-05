<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

class CartProductController extends BaseController
{

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->route('cart.index', ['cart' => $cart]);
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->route('cart.index', ['cart' => $cart]);

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index', ['cart' => $cart]);
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            return redirect()->route('cart.index', ['cart' => $cart]);
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            return redirect()->route('cart.index', ['cart' => $cart]);
        }
    }
}