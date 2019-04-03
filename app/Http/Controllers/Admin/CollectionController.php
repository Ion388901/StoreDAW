<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Collection;
use App\Models\Product;

class CollectionController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $req, $order = null){
        $collections = Collection::all();
        $data = [];
        $data['collections'] = $collections;
        return view('admin.collections.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $req){
        $data = [];
        $data['products'] = Product::all();
        return view('admin.collections.create', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $req){
        $collectionInput = $req->input('collection');
        $collection = Collection::create($collectionInput);
        return redirect()->route('admin.collections.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $collection=Collection::findOrFail($id);
        $data = [];
        $data['collection'] = $collection;
        return view('admin.collections.show', ['data' => $data]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $collection = Collection::findOrFail($id);
        $data = [];
        $data['collection'] = $collection;
        $data['products'] = Product::all();
        return view('admin.collections.edit', ['data' => $data]);
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
            'collection.name'=>'required',
            'collection.description'=>'required',
        ]);
        $collection = Collection::findOrFail($id);
        $collection->update($req->input('collection'));
        $product = Product::find($req->input('product.product_id'));
        $collection->products()->attach($product->id);
        return redirect()->route('admin.collections.index')->with('Función realizada', 'Se actualizo la información');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection $collection
     * @return \Illuminate\Http\Response
     */

    public function destroy($id){
        Collection::findOrFail($id)->delete();
        return redirect()->route('admin.collections.index')->with('Función realizada', 'Se elimino la información');
    }
}