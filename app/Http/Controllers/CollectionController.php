<?php

namespace App\Http\Controllers;

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
        $data['collections'] = $collections;
        return view('collections.index', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id){
        $collection=Collection::findOrFail($id);
        return view('collections.show', compact('collection'));
    }
}