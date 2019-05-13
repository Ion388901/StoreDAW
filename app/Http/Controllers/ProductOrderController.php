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
    /**
     * 
     * Crea un nuevo order_product en esa tabla, recibe valores del modelo de order y product. 
     * Estos son usados en las queries del reporte del admin
     * 
     * */ 
    public function create(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $order = new \App\Order;
        $order->save();
        $data['products'] = Product::all();
        return view('order.create', ['data' => $data]);
    }
    
    /**
     * 
     * Guarda el nuevo order_product en esa tabla, guarda valores del modelo de ordeer y product.
     * Estos son usados en las queries del reporte del admin
     * 
     */
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