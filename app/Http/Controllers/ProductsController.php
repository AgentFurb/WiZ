<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cat;
use App\Pimage;

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

    public function producttoevoegen()
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();

        return view('Products.newproduct', compact('combocats'));
    }

    public function store(Request $request)
    {
        // $this->validate(request(), [
        //     'Productcode fabrikant' => ['required', 'string', 'max:20'],
        //     'GTIN product' => ['required', 'string', 'max:14'],
        //     'Productomschrijving' => ['required', 'string', 'max:255'],
        //     'Locatie' => ['required', 'string', 'max:255'],
        //     'Fabrikaat' => ['required', 'string', 'max:35'],
        //     'Productserie' => ['required', 'string', 'max:255'],
        //     'Producttype' => ['required', 'string', 'max:255'],
        //     'Eenheid gewicht' => ['string', 'max:255'],
        //     'Owner' => ['required','string', 'max:255', 'email', 'unique:products'],
        //     'imagelink' => ['required'],
        // ]);
        
        // $product = Product::create(request(['Productcode fabrikant', 'GTIN product', 'Productomschrijving', 'Locatie', 'Fabrikaat', 'Productserie', 'Producttype', 'Eenheid gewicht', 'Owner']));

        // $pimage = Pimage::create(request(['imagelink', 'Productomschrijving', 'Productcode fabrikant']));


        $pimage = new Pimage();
        $pimage->imagelink = $request->input("imagelink");
        $pimage->Productcode = $request->input("Productcode fabrikant");
        $pimage->Productomschrijving = $request->input("Productomschrijving");
        $pimage->save();

        $product = new Product();
        $product["Productcode fabrikant"] = $request->input("Productcode fabrikant");
        $product["GTIN product"] = $request->input("GTIN product");
        $product->Productomschrijving = $request->input("Productomschrijving");
        $product->Locatie = $request->input("Locatie");
        $product->Fabrikaat = $request->input("Fabrikaat");
        $product->Productserie = $request->input("Productserie");
        $product->Producttype = $request->input("Producttype");
        $product["Eenheid gewicht"]= $request->input("Eenheid gewicht");
        $product->Owner = $request->input("Owner");
        $product->save();

        return redirect('/overzicht');

    }

}
