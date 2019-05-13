<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;


class OrderController extends BaseController
{

    // Función de indice de la orden
    public function index(Request $req, Order $order) {
        $data  = [];
        $data['order'] = $order;
        return view('order.review', ['order' => $data]);
    }

    // Función de creación de la orden
    public function create(Request $req) {
        $order = new \App\Models\Order;
        $order->user_id = \Auth::user()->id;
        $order->total = 100;
        $order->status = FALSE;
        $order->save();
        $productsIds = [];
        $cart = session()->get('cart');
        $total = 0;
        foreach($cart as $id => $product) {
            $productsIds[] = $id;
            $order->products()->attach($id, ['product_quantity' => $product["quantity"] ]);
            $total += $product['price'] * $product['quantity'];
        }
        $order->total = $total;
        $order->save();
        return view('order.review', ['order' => $order]);    
    }

    // Función de la transacción y validación de una compra
    public function transaction(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $data['transaction'] = 'transaction-done';
        $order = Order::find($order->id);
        \Log::debug($order);
        foreach($order->products as $op) {
            $product = Product::find($op->id);
            \Log::debug($op->pivot->product_quantity);
            $product->quantity -= $op->pivot->product_quantity;
            $product->save();
        }    
        $order->status = TRUE;
        $order->save();
        return response()->json($data);
    }
}