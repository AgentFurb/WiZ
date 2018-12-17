<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cat;

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
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();



        // $productsOTs = DB::table('products AS p')
        // ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        // ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink', 'pi.Afkorting as afkorting')
        // ->whereraw('Ingangsdatum = (SELECT MAX(Ingangsdatum) FROM productimages) AND imagelink IS NOT NULL')
        // ->limit(3)
        // ->get();

        //$productsOTs = DB::select(DB::raw("SELECT p.ID, p.`Productcode fabrikant`, p.`GTIN product`, p.Ingangsdatum, p.Productomschrijving, p.Fabrikaat, p.Productserie, p.Producttype, pi.imagelink, pi.Afkorting FROM products p LEFT JOIN productimages pi ON p.`Productcode fabrikant` = pi.Productcode WHERE Ingangsdatum = (SELECT MAX(Ingangsdatum) FROM productimages) AND imagelink IS NOT NULL AND Afkorting = 'PPI'limit 3"));
        
        //dd($productsOTs);

        return view('shop', compact('combocats', 'productsOTs'));
    }

    public function productdetail(String $product)
    {   
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();

        //dd($product);

        $productdetail = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('Productcode fabrikant', '=', $product)
        ->where('Afkorting', 'PPI')
        ->limit(1)
        ->get();

        //dd($productdetail);

        return view('Products.productdetail', compact('combocats', 'productdetail'));
    }

    public function shopCat(String $cat)
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();

         // p.Productcode fabrikant as productcodefabrikant, p.GTIN product as GTIN,
        // Products from category
        $prodscats = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        ->where('productserie', '=', $cat)
        ->simplePaginate(15);

        // id
        // productcodefabrikant
        // GTIN
        // ingangsdatum
        // productomschrijving
        // fabrikaat
        // productserie
        // producttype
        // imagelink
        // afkorting


        //dd($prodscats);
        return view('Products.allproducts', compact('combocats', 'prodscats'));
    }
}
