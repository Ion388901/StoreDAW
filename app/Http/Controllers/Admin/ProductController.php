<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.products.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req){
        $data = [];
        $data['collections'] = Collection::all();
        return view('admin.products.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req){
        $productInput = $req->input('product');
        $product = Product::create($productInput);
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $product=Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $req, $id){
        $req->validate([
            'product.name'=>'required',
            'product.description'=>'required',
            'product.price'=>'required|integer',
            'product.discount'=>'required|integer'
        ]);

        Product::findOrFail($id)->update($req->input('product'));
        return redirect()->route('admin.products.index')->with('Función realizada', 'Se actualizo la información');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $producto
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('Función realizada', 'Se elimino la información');
    }

}