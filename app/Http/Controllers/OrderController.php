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

    public function index(Request $req, Order $order) {
        $data  = [];
        $data['order'] = $order;
        return view('order.review', ['order' => $data]);
    }

    public function create(Request $req) {
        // dd(session()->get('cart'));
        $order = new \App\Models\Order;
        $order->user_id = \Auth::user()->id;
        $order->total = 100;
        $order->status = FALSE;
        $order->save();
        $productsIds = [];
        $cart = session()->get('cart');
        foreach($cart as $id => $product) {
            
            $productsIds[] = $id;
            $order->products()->attach($id, ['product_quantity' => $product["quantity"] ]);

        }
        return view('order.review', ['order' => $order]);    
    }

    public function transaction(Request $req, Order $order) {
        $data = [];
        $data['order'] = $order;
        $data['transaction'] = 'transaction-done';
        // Verificar que el Order ID que te envía Paypal sea válido.
        // Ver la documentación de Paypal
        // Modificar tu orden a un estatus de pagada.
        // Preguntar por más referencias para la verificación del Order ID que envía paypal sea válido
        // $order->status = TRUE;
        return response()->json($data);
    }


}

// Ver si el metodo propuesto en Product Order Controller funciona mejor aquí
// Definir mejor que esta haciendo este controlador que no hace Product Order Controller