<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('products.index');
    }

    public function productView($id)
    {
        return view('products.product', ['product' => Product::findOrFail($id)]);
    }

    public function products()
    {
        $products = Product::all();
        return Product::all();
    }

    public function store(Request $request)
    {
        // Validate the request...

        $flight = new Flight;

        $flight->name = $request->name;

        $flight->save();
    }
}
