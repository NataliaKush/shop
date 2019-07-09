<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class BasketController extends Controller
{
    public function index(Request $requst) {
        $result = Basket::getBasket();

        return view('basket', $result);
    }

    public function addToBasket(Request $request) {
        $basket = $request->session()->get('basket');
        $id     = $request->input('product_id');
        $qt     = (int) $request->input('quantity');

        if (isset($basket[$id]) === true) {
            $basket[$id] += $qt;
        } else {
            $basket[$id] = $qt;
        }

        $request->session()->put('basket', $basket);

        return Basket::getBasketCount();
    }

    public function checkout() {
        if (Auth::guest() === true) {
            echo 'Please login'; exit;
        }

        $basket = Basket::getBasket();

        $order = new Order();

        $order->users_id = Auth::user()->id;
        $order->total = $basket['total'];

        //$productIds = array_keys($basket['products']);

        $productIds = [];

        foreach ($basket['products'] as $id => $product) {
            $productIds[$id]['quantity'] = $product['qt'];
        }

        $order->save();

        $order->products()->attach($productIds);
    }

    public function deleteProduct(Request $request) {
        $id = $request->input('id');

        $basket = $request->session()->get('basket');

        unset($basket[$id]);

        $request->session()->put('basket', $basket);

        return redirect('basket');
    }
}
