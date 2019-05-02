<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;

class OrderController extends BaseController
{

    public function index(Request $req, Order $order) {
        $data  = [];
        $data['order'] = $order;
        return view('order.review', ['order' => $data]);
    }

    public function create(Request $req) {
        
    }

    public function transaction(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $data['transaction'] = 'transaction-done';
        // Verificar que el Order ID que te envía Paypal sea válido.
        // Ver la documentación de Paypal
        // Modificar tu orden a un estatus de pagada.
        return response()->json($data);
    }


}