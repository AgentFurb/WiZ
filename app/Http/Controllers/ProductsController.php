<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function index()
    // {
    //     //$this->authorize('update', $Product);
    //     $products = Product::paginate(5);
    //     return view('Products.productdetail', compact('products'));

    // }

    public function productdetail(Product $product)
    {
        //$this->authorize('update', $Product);
        $product = Product::first();
        return view('Products.productdetail', compact('product'));

    }




}
