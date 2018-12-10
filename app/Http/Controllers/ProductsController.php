<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\pCategorie;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function shopindex()
    {

        $productsOTs = DB::select(DB::raw("SELECT * FROM wiz.productimages WHERE Afkorting = 'PPI' LIMIT 83, 3"));
        $productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));

        return view('shop', compact('productsOTs', 'productcats'));
    }

    public function productdetail(Product $Product)
    {   
        return view('Products.productdetail', compact('productsOT'));

    }

    public function shopCat(pCategorie $pCategorie)
    {
        $productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));

        return view('Products.allproducts', compact('productcats'));
    }

}
