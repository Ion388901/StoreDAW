<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;

class ProductOrderController extends BaseController
{
    public function create(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $order = new \App\Order;
        $order->save();
        $data['products'] = Product::all();
        return view('order.create', ['data' => $data]);
    }
    
    public function store(Request $req, Order $order) {
        $productsIds = [];
        $cart = session()->get('cart');
        foreach($cart as $id => $product) {
            $productsIds = $id;
        }
        $order->products()->attach($productsIds);
        return redirect()->route('order.review', ['order' => $order]);
    }
}

// porque crear un new \App\Order cuando ya existe el modelo order?
// nada más verficar que el attach funciona
// actualmente este controlador aunque regresa vistas parece no estar conectado al programa
// porque al correrlo no parece que se acceda a este controlador