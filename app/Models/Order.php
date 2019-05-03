<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public $table = 'orders';

    protected $fillable = [
        'user_id',
        'total',
        'status'
    ];

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
    
}

// Revisar nuevamente si el modelo esta bien