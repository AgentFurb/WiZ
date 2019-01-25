@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection
@section('titlePage')
    <title>WiZ Kuijpers - Overzicht</title>
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
    <div class="container-fluid Cprods">
        <div class="row">
            <h2 class="searchresults">Zoek resulaten:</h2>
        </div>
            @if (isset($prodscats))
                {{-- Producten van een geselecteerde categorie --}}
                @foreach($prodscats->chunk(3) as $chunk)
                    <div class="row PCall">
                        @foreach ($chunk as $prodscat)
                            <div class="col colcat">
                                <div class="card PCcard">
                                    <img class="card-img-left PCimg img-fluid" src="{{$prodscat->imagelink}}" alt="Card image cap" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px">
                                    <a href="/overzicht/productdetail/{{$prodscat->productcodefabrikant}}"><h5 class="card-title">{{$prodscat->productomschrijving}}</h5></a>
                                    <div class="card-body ulinfo"> 
                                        <ul class="prodvraag">
                                            <b><li>Locatie:</li>
                                            <li>Type:</li>
                                            <li>Fabrikaat:</li>
                                            <li>Serie:</li>
                                            <li>Aantal:</li></b>
                                        </ul>
                                        <ul class="prodinfo">
                                            <li>{{$prodscat->locatie}}</li>
                                            <li>{{$prodscat->producttype}}</li>
                                            <li>{{$prodscat->fabrikaat}}</li>
                                            <li>{{$prodscat->productserie}}</li>
                                            <li>{{$prodscat->aantal}}</li>
                                        </ul>
                                    </div>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2 pagelink">
                        {{ $prodscats->links() }}
                    </div>
                    <div class="col-5"></div>
                </div>
            @else
            @endif
            @if(isset($searchproducts))
                {{-- Zoek resultaten --}}
                @foreach ($searchproducts->chunk(3) as $chunk)
                    <div class="row PCcard">
                        @foreach ($chunk as $searchprod)
                        
                            <div class="col colcat">
                                <div class="card PCcard ">
                                    <img class="card-img-left PCimg img-fluid" src="{{$searchprod->imagelink}}" alt="Card image cap" width="330px" height="250px">
                                    <a href="/overzicht/productdetail/{{$searchprod->productcodefabrikant}}"><h5 class="card-title">{{$searchprod->productomschrijving}}</h5></a>
                                    <div class="card-body ulinfo"> 
                                        <ul class="prodvraag">
                                            <b><li>Locatie:</li>
                                            <li>Type:</li>
                                            <li>Fabrikaat:</li>
                                            <li>Serie:</li>
                                            <li>Aantal:</li></b>
                                        </ul>
                                        <ul class="prodinfo">
                                            <li>{{$searchprod->locatie}}</li>
                                            <li>{{$searchprod->producttype}}</li>
                                            <li>{{$searchprod->fabrikaat}}</li>
                                            <li>{{$searchprod->productserie}}</li>
                                            <li>{{$searchprod->aantal}}</li>
                                        </ul>
                                    </div>   
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                {{ $searchproducts->links() }}
            @else 
            @endif
            @if(isset($searcherror))
                {{-- Geen zoek resultaten --}}
                <div class="row prodnotfoundicon">
                    <div class="col"></div>
                    <div class="col-6"><i class="fas fa-times"></i></div>
                    <div class="col"></div>
                </div>
                <div class="row prodnotfound">
                    <div class="col"></div>
                    <div class="col-6"> <h3>Product niet gevonden</h3></div>
                    <div class="col"></div>
                </div>
                <h3></h3>
            @endif
        </div>
    </div>
@endsection