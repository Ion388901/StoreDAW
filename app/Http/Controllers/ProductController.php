<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

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

}