<?php

namespace App\Http\Controllers;

use DB;
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

    public function productdetail()
    {   
        $pID = 3581637;
        
        $productimagetests = DB::select(DB::raw("SELECT * FROM productimages WHERE (imagelink LIKE '%png' OR imagelink LIKE '%jpg') AND Productcode = 3581637;"));

        $product = DB::select(DB::raw("SELECT * FROM products WHERE `Productcode fabrikant` = $pID"));

        return view('Products.productdetail', compact( 'productimagetests'));

    }




}
