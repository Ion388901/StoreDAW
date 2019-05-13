<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use App\Models\Order;
use DB;

class ReportController extends BaseController
{

    public function index(Request $req) {
        
        // Cuanto gano
        $query = "SELECT SUM(total) as products_sold
        FROM orders
        WHERE 1";
        $raw = DB::select($query);

        // Producto más vendido
        $nquery = "SELECT p.name, q.total_quantity
        FROM(
            SELECT
                product_id,
                SUM(product_quantity) as total_quantity
            FROM
                order_product t JOIN orders o ON t.order_id = o.id
            WHERE
                o.status = 1
            GROUP BY
                t.product_id
            ORDER BY
                total_quantity DESC
        ) as q,
        products as p
        WHERE
            q.product_id = p.id
        LIMIT 1";
        $nraw = DB::select($nquery);

        // Comprador más valioso
        $pquery = "SELECT u.name, t.order_total
        FROM(
            SELECT
                user_id,
                SUM(total) as order_total
            FROM
                order_product p JOIN orders o ON p.order_id = o.id
            WHERE
                o.status = 1
            GROUP BY
                user_id
            ORDER BY
                order_total DESC
        ) as t,
        users as u
        WHERE
            u.id = t.user_id
        LIMIT 1";
        $praw = DB::select($pquery);
        // Asignación de los resultados de las queries
        $products_sold = $raw[0]->products_sold;
        $name_sold = $nraw[0]->name;
        $quantity_selled = $nraw[0]->total_quantity;
        $best_costumer = $praw[0]->name;
        $quantity_bought = $praw[0]->order_total;
        // Guardado de las queries en el arreglo data, que sera imprimido en el admin.reports.index.blade 
        $data = [];
        $data['products_sold'] = $products_sold;
        $data['name_sold'] = $name_sold;
        $data['quantity_selled'] = $quantity_selled;
        $data['best_costumer'] = $best_costumer;
        $data['quantity_bought'] = $quantity_bought;
        return view('admin.reports.index', ['data' => $data]);
    }
}