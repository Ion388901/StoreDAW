<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    public $table = 'cart';

    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsToMany('App\Models\User');
    }
}