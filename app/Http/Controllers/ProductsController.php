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

        $products = Product::all();

        return $products;

        return view('projects.producten', compact('products'));
    }

    public function productdetail(Product $Product)
    {
        //$this->authorize('update', $Product);
        $product = Product::first();
        return $product;
        return view('Product.productdetail', compact('product'));

    }

    public function control()
    {

        $users = User::all();

        return $users;

        return view('User.control', compact('user'));
    }

}
