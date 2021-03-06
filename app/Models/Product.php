<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    public $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'quantity',
        'collection_id'
    ];

    public function collection()
    {
        return $this->belongsToMany('App\Models\Collection');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

}