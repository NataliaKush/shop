<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'quantity', 'price'
    ];

    public function orders() {
        return $this->belongsToMany('\App\Order', '\App\OrdersProducts')->withPivot(['quantity']);
    }

}
