<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index() {
        return view('admin.index');
    }

    public function createProduct() {
        return view('admin.product.create');
    }

    public function  saveProduct (Request $request) {
        $product = new Product();

        $product->fill($request->post());

        if ($request->hasFile('image') === true) {
            $file = $request->file('image');

            Storage::disk('public')->put('product/' . $file->getClientOriginalName(), $file->getRealPath());

            $product->image = $file->getClientOriginalName();
        }

        $product->category_id = 1;

        $product->save();

        return view('admin.product.create');
    }

    public function orders() {

        $ordres = Order::all();

        return view('admin.orders', ['orders' => $ordres]);
    }
}
