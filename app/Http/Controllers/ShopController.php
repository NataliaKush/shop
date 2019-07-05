<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index() {
        echo 'index';
    }

    public function category($categoryId) {
        $products = Product::where('category_id', $categoryId)->get();

        return view('category', ['products' => $products]);
    }

    public  function product($categoryId, $productId) {
        $product = Product::find($productId);

        return view('product', ['product' => $product]);
    }
}
