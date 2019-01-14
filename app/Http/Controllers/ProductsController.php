<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Product;
use App\Cat;
use App\Pimage;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
        
    }

    public function shopindex()
    {
        //Producten onlangs toegevoegd
        $productsOTs = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'pi.imagelink as imagelink')
        ->orderBy('ingangsdatum', 'desc')
        ->limit(3)
        ->get();

        //Producten categorieën combobox  
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();

        //Bekijk ook
        // $bekijkook = DB::table('products AS p')
        // ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        // ->select('p.ID as id', 'p.Eenheid gewicht as gewicht','p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink')
        // ->where('Afkorting', '=', 'PPI')
        // ->orderByRaw("RAND()")
        // ->limit(4)
        // ->get();

        //dump($bekijkook);

        return view('shop', compact('combocats', 'productsOTs', 'bekijkook'));
    }

    public function productdetail(String $product)
    {   
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();

        $productdetail = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Eenheid gewicht as gewicht','p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink', 'p.Aantal as aantal', 'p.Pspecificaties as specs')
        ->where('Productcode fabrikant', '=', $product)
        ->limit(1)
        ->get();

        return view('Products.productdetail', compact('combocats', 'productdetail'));
    }

    public function shopCat(String $cat)
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        // Products from category
        $prodscats = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Productcode fabrikant as productcodefabrikant', 'p.Locatie as locatie', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink', 'p.Aantal as aantal')
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
        return view('Products.allproducts', compact('combocats', 'prodscats'));
    }

    public function producttoevoegen()
    {
        // Combobox items Cats
        $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        return view('Products.newproduct', compact('combocats'));
    }

    public function destroy(String $product)
    {
        $deleteproduct = Product::where('Productcode fabrikant', '=', $product)->delete();
        $deleteproductimage = Pimage::where('Productcode', '=', $product)->delete();

        return redirect('/overzicht');
    }

    public function update(Request $request)
    {

       $product = null;
        $product = Product::where('ID', $request->ID);
        dd($product);
        

        return redirect('/overzicht');
    }


    public function editproduct(String $product)
    {
        $combocats = DB::table('products')->distinct()->select('Productserie', 'Productserie')->get();

        $productedit = DB::table('products AS p')
        ->leftJoin('productimages AS pi', 'p.Productcode fabrikant', '=', 'pi.Productcode')
        ->select('p.ID as id', 'p.Eenheid gewicht as gewicht','p.Productcode fabrikant as productcodefabrikant', 'p.GTIN product as GTIN', 'p.Locatie as locatie','p.Ingangsdatum as ingangsdatum', 'p.Productomschrijving as productomschrijving', 'p.Fabrikaat as fabrikaat', 'p.Productserie as productserie', 'p.Producttype as producttype', 'pi.imagelink as imagelink', 'p.Aantal as aantal', 'p.Pspecificaties as specs')
        ->where('Productcode fabrikant', '=', $product)
        ->limit(1)
        ->get();

        // dd($productedit);
        return view('Products.editproduct', compact('combocats', 'productedit'));
    }

    public function store(Request $request)
    {
        // $pimage = Pimage::create(request(['imagelink', 'Productomschrijving', 'Productcode fabrikant']));

        // dd($request);
        //dd($request->imagelink->getClientOriginalName());
        // $productcodes = DB::table('products')->select('Productcode fabrikant')->get();


        // if($productcodes == $request->input("Productcodefabrikant"))
        // {
            if(empty($request->imagelink))
            {
                //no image
                $pimage = new Pimage();
                $pimage->Locatie = $request->input("Locatie");
                $pimage->Productcode = $request->input("Productcodefabrikant");
                $pimage->Productomschrijving = $request->input("Productomschrijving");
                $pimage->save();
            }
            else
            {
                $pimage = new Pimage();
                $request->validate(['imagelink' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:6000',]);
                dd($request->imagelink); 

                $imagelinkName = '/storage/productimages/'.request()->imagelink->getClientOriginalName();
                $destinationPath = public_path('/storage/productimages');
                $request->imagelink->move($destinationPath, $imagelinkName);
                $pimage->imagelink = $imagelinkName;

                $pimage->Locatie = $request->input("Locatie");
                $pimage->Productcode = $request->input("Productcodefabrikant");
                $pimage->Productomschrijving = $request->input("Productomschrijving");
                $pimage->save();
            }

            if(empty($request->input("Specificaties")))
            {
                $product = new Product();
                $product["Productcode fabrikant"] = $request->input("Productcodefabrikant");
                $product["GTIN product"] = $request->input("GTIN");
                $product->Productomschrijving = $request->input("Productomschrijving");
                $product->Locatie = $request->input("Locatie");
                $product->Fabrikaat = $request->input("Fabrikaat");
                $product->Productserie = $request->input("Productserie");
                $product->Producttype = $request->input("Producttype");
                $product["Eenheid gewicht"] = $request->input("Eenheidgewicht");
                $product->Aantal = $request->input("Aantal");
                $product->Ingangsdatum = date('Y-m-d H:i:s');
                $product->save();
            }
            else
            {
                $product = new Product();
                $product["Productcode fabrikant"] = $request->input("Productcodefabrikant");
                $product["GTIN product"] = $request->input("GTIN");
                $product->Productomschrijving = $request->input("Productomschrijving");
                $product->Pspecificaties = $request->input("Specificaties");
                $product->Locatie = $request->input("Locatie");
                $product->Fabrikaat = $request->input("Fabrikaat");
                $product->Productserie = $request->input("Productserie");
                $product->Producttype = $request->input("Producttype");
                $product["Eenheid gewicht"] = $request->input("Eenheidgewicht");
                $product->Aantal = $request->input("Aantal");
                $product->Ingangsdatum = date('Y-m-d H:i:s');
                $product->save();
            }
           

            

            return redirect('/overzicht');
        // }
        // else
        // {
        //     $combocats = DB::table('products')->distinct()->select('Productserie')->get();
        //     $errormessage1 = 'Deze productcode wordt al gebruikt! Gebruik een nieuwe.';
        //     return view('Products.newproduct', compact('errormessage1', 'combocats'));
        // }
    }

}
