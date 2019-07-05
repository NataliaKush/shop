<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrdersProducts extends Pivot
{
    protected $table = 'orders_products';
}
