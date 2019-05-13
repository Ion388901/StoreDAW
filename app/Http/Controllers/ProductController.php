<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Product;
use App\Models\Collection;

class ProductController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req, $order = null){
        $products = [];
        if($order){
            $products = Product::orderBy('price', $order)->get();
        }
        else {
            $products = Product::all();
        }

        $data = [];
        $data['products'] = $products;
        return view('products.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $product=Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Función que muestra el carrito
    public function cart(){
        return view('cart.cart');
    }

    /**
     * Función que añade un producto al carrito
     * 
     * @param int $id
     */ 

    public function addToCart($id){
        
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        // Si el carrito esta vacio, este es el primer producto
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "discount" => $product->discount
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // Si el carrito no esta vacio, cehca si este producto existe e incrementa la cantidad
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // Si el producto no existe en el carrito, lo añade con quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "discount" => $product->discount
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * 
     * Actualiza el carro cuando se modifica la cantidad de productos en el mismo
     * 
     */
    public function update(Request $request){
        
        if($request->id and $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * 
     * Quita un producto del carrito en su totalidad
     * 
     */
    public function remove(Request $request){
        
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    /**
     * 
     * Se aplica el descuento a un producto individual del carrito, modificando el valor del price en un 20% de descuento
     * 
     */
    public function applyDiscount(Request $request){

        $cart = session()->get('cart');
        $product = Product::find($request->id);
        $id = $request->id;

        if($cart[$request->id]["discount"] == $product->discount){
            $cart[$id]['price'] -= ($cart[$id]['price']*0.20);
            session()->put('cart', $cart);
            session()->flash('success', 'Discount applied successfully');
        }
        else{
            session()->flash('error', 'Invalid discount');
        }
    }
}