<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function getOrders () {
        $user = Auth::user();

        return view('orders', ['orders' => $user->orders]);
    }

}
