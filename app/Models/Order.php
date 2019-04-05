<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    public $table = 'products';

    protected $fillable = [
        'cart_id',
        'total',
        'user_id',
    ];

    public function cart()
    {
        return $this->belongsToMany('App\Models\Cart');
    }

    public function user()
    {
        return $this->hasOne('App\Models\User');
    }
}