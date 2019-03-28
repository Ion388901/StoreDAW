<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model {
    
    public $table = 'collections';
    
    protected $fillable = [
        'name',
        'description',
        'product_id'
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}