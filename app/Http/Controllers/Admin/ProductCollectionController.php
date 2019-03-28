<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Collection;

class ProductCollectionController extends BaseController
{
    public function create(Request $req, Collection $collection) {
        $data = [];
        $data['collection'] = $collection;
        $data['products'] = Product::all();
        return view('admin.collections.product.create', ['data' => $data]);
    }
    
    public function store(Request $req, Collection $collection) {
        $product = Product::find($req->input('product_collection.product_id'));
        $collection->products()->attach($product->id);
        return redirect()->route('admin.collections.show', ['collection' => $collection]);
    }
}