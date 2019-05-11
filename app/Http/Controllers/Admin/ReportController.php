<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Order;
use DB;

// Cuanto gano (done)
// Producto mas vendido
// Comprador MVP (el que más compro)

class ReportController extends BaseController
{

    public function index(Request $req) {
        $query = "SELECT SUM(total) as products_sold
        FROM orders
        WHERE 1";
        $raw = DB::select($query);
        //aqui puedo poner las otras queries
        $products_sold = $raw[0]->products_sold;
        $data = [];
        $data['products_sold'] = $products_sold;
        return view('admin.reports.index', ['data' => $data]);
    }
}