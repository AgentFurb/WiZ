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

    public function shopindex()
    {
        //$this->authorize('update', $Product);
        $productsOTs = DB::select(DB::raw("SELECT Productcode, Productomschrijving, imagelink FROM wiz.productimages WHERE Afkorting = 'PPI' LIMIT 3"));
        return view('shop', compact('productsOTs'));
       
    }

    public function productdetail(Product $Product)
    {   
        return view('Products.productdetail', compact('productsOT'));

    }




}
