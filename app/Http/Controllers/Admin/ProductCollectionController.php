<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Collection;

class ProductCollectionController extends BaseController
{
    /**
     * 
     * Crea un nuevo collection_product en esa tabla, recibe valores del modelo de collection y product. 
     * Estos son usados para asignar un producto a una colección
     * 
     */
    public function create(Request $req, Collection $collection) {
        $data = [];
        $data['collection'] = $collection;
        $data['products'] = Product::all();
        return view('admin.collections.product.create', ['data' => $data]);
    }
    
    /**
     * 
     * Guarda el nuevo collection_product en esa tabla, guarda valores del modelo de collection y product. 
     * Estos son usados para asignar un producto a una colección
     * 
     */
    public function store(Request $req, Collection $collection) {
        $product = Product::find($req->input('product_collection.product_id'));
        $collection->products()->attach($product->id);
        return redirect()->route('admin.collections.show', ['collection' => $collection]);
    }
}