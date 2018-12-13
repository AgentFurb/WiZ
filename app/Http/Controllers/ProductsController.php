<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\cat;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    public function shopindex()
    {
        //Producten onlangs toegevoegd
        $productsOTs = DB::table('productimages')->where('Afkorting', 'PPI')->orWhere('Productcode', '[0-9]+')->limit(3)->offset(83)->get();
            //$productsOTs = DB::select(DB::raw("SELECT * FROM wiz.productimages WHERE Afkorting = 'PPI' LIMIT 83, 3"));

        //Producten categorieën combobox  
        $productcats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();
            //$productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));

        return view('shop', compact('productsOTs', 'productcats'));
    }

    public function productdetail(Product $product)
    {   
        dd($product);
        //return view('Products.productdetail', compact('productsOT'));
    }

    public function shopCat(Cat $cat)
    {
        // Combobox items Cats
        $productcats = DB::table('products')->distinct()->select('Productserie')->get();


        // Products from category
        $categorieProds = DB::table('products')->where(function ($query) use ($cat) {
                            $query->where('Productserie', '=', $cat);
                            })->get();

        dd($cat);
        
        //return view('Products.allproducts', compact('productcats', 'categorieProds'));
    }
}

        
        //$productcats = DB::select(DB::raw("SELECT DISTINCT Productserie FROM wiz.products"));


                
        //$categorieProds = DB::select(DB::raw("SELECT * FROM products WHERE Productserie = '$pCategorie'"));
        //$categorieProds = pCategorie::where('Productserie', $pCategorie)->get();
        //$categorieProds = DB::table('products')->where('Productserie', '=' $pCategorie)->get();