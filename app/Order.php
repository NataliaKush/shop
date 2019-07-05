<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function products() {
        return $this->belongsToMany('\App\Product', '\App\OrdersProducts')->withPivot(['quantity']);
    }

    public function user() {
        return $this->hasOne('\App\Users', 'id', 'users_id');
    }
}
