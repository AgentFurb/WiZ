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

    public function index()
    {

        return view('projects.producten');
    }

    public function productdetail(product $product)
    {
        //$this->authorize('update', $Product);
        $product = Product::first();
        return $product;
        return view('Product.productdetail', compact('$product'));

    }


}
