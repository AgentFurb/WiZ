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
        //$whereprods = ['Afkorting' => 'PPI', 'Productcode' => '[0-9]+'];

        //Producten onlangs toegevoegd
        $productsOTs = DB::table('productimages')->where('Afkorting', 'PPI')->orWhere('Productcode', '[0-9]+')->limit(3)->offset(83)->get();
            //$productsOTs = DB::select(DB::raw("SELECT * FROM wiz.productimages WHERE Afkorting = 'PPI' LIMIT 83, 3"));

        //Producten categorieën combobox  
        $productcats = DB::table('products')->distinct()->select('Productserie')->get();
            //$productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));

        return view('shop', compact('productsOTs', 'productcats'));
    }

    public function productdetail(Product $product)
    {   
        dump($product);
        //return view('Products.productdetail', compact('productsOT'));
    }

    // public function shopCat(pCategorie $pCategorie)
    // {
    //     // Combobox items Cats
    //     //$productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));
    //     $productcats = DB::table('products')->distinct()->select('Productserie')->get();

    //     // Products from category
    //     //$categorieProds = DB::select(DB::raw("SELECT * FROM products WHERE Productserie = '$pCategorie'"));
    //     $categorieProds = DB::table('products')->where('Productserie', $pCategorie)->get();

    //     return view('Products.allproducts', compact('productcats', 'categorieProds'));
    // }

    public function shopAll()
    {
        $producten = DB::table('products')->where('Productserie', 'Ketel accessoires')->get();

        return view('Products.allproducts', compact('producten'));
    }


}
