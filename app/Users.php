<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends \Illuminate\Foundation\Auth\User
{
    const ROLE_USER = 0;

    const ROLE_ADMIN = 5;

    protected $table = 'users';

    public function orders() {
        return $this->hasMany('\App\Order', 'users_id');
    }
}
