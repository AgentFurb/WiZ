@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col order1 shop-bar">
                <form class="Sbar" action="/overzicht/products/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
                
                <select class="form-control category" aria-label="Select category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col order-12 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw" aria-label="Nieuw product toevoegen">
                        <i class="far fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col pagetitle"> <h2>Product toevoegen</h2></div>
            <div class="col"></div>
        </div>
        <div class="row">
        <div class="col"></div>
        <div class="col justify-content-center">
        </div>
        <div class="col"></div>
    </div>
        {{-- END TEST  --}}
        <form action="/overzicht/{{$productedit[0]->productcodefabrikant}}/update" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="row from-group">
                <div class="col-xl  form-group">
                    <h5>Product foto:</h5>
                    <div class="productphoto">
                        <img id="imgShop" src="{{$productedit[0]->imagelink}}" class="img-fluid" name="imagelink">
                        <br>
                        <input type="file" name="imagelink" onchange="previewFileShop()">
                    </div>

                    <h5>Product extra informatie:</h5>
                    <textarea class="form-control" rows="7" cols="50"  name="Specificaties">
                        @if(isset($productedit[0]->specs)){{$productedit[0]->specs}}@endif
                    </textarea>
                </div>
                <div class="col-xl  form-group">
                    <h5>Product naam:</h5>
                    <input class="form-control" type="text" name="Productomschrijving"  value="{{$productedit[0]->productomschrijving}}" required/>
                    <h5>Productcode:</h5>
                    <input class="form-control" type="text" name="Productcodefabrikant" value="{{$productedit[0]->productcodefabrikant}}" required/>
                    <h5>GTIN product:</h5>
                    <input class="form-control" type="text" name="GTIN" value="@if(isset($productedit[0]->GTIN)){{$productedit[0]->GTIN}}@endif"/>
                    <h5>Fabrikaat:</h5>
                    <input class="form-control" type="text" name="Fabrikaat" value="{{$productedit[0]->fabrikaat}}" required/>
                    <h5>Productserie:</h5>
                    <input class="form-control" type="text" name="Productserie" value="{{$productedit[0]->productserie}}" required/>
                    <h5>Producttype:</h5>
                    <input class="form-control" type="text" name="Producttype" value="{{$productedit[0]->producttype}}" required/>
                    <h5>Locatie:</h5>
                    <input class="form-control" type="text" name="Locatie" value="{{$productedit[0]->locatie}}" required/>
                    <h5>Eenheid gewicht:</h5>
                    <input class="form-control" type="text" name="Eenheidgewicht" value="{{$productedit[0]->gewicht}}" />
                    <h5>Aantal:</h5>
                    <input class="form-control" type="text" name="Aantal" value="{{$productedit[0]->aantal}}" />
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col-6 prodcreate">
                    <input class="btn btn-lg" type="submit" value="Updaten"/>
                </div>
                <div class="col"></div>
            </div>
        </form>
    </div>
@endsection