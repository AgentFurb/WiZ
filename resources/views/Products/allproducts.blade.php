@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ asset('css/shop.css') }}" />
@endsection

{{-- @section('shopmenu')
    <div class="container-fluid">
        <div class="row " id="Searchnavbar"> 
            <div class="col-2 shop-bar">
                <select class="form-control category" aria-label="Select category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/overzicht/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="col-8 shop-bar">
                <form class="Sbar" action="/overzicht" method="POST" role="search">
                    {{ csrf_field() }}
                    <input type="text" placeholder="Search product" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="col-2 shop-bar addcol">
                <div class="addprod">
                    <a href="/overzicht/nieuw" aria-label="Nieuw product toevoegen">
                        <i class="far fa-plus-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@section('content')
    <div class="container-fluid Cprods">
        <div class="row">
            <h2 class="searchresults">Zoek resulaten:</h2>
        </div>
            @if (isset($prodscats))
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
                                            <li>Aantal</li>
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
            @if(isset($product))
                @foreach ($product as $searchprod)
                    <div class="col-6 PCcard">
                        <img class="card-img-left PCimg" src="{{$searchprod->imagelink}}" alt="Card image cap" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px">
                        <div class="">
                            <a href="/overzicht/productdetail/{{$searchprod->productcodefabrikant}}"><h5>{{$searchprod->productomschrijving}}</h5></a>
                            <div class="ulinfo"> 
                                <ul class="prodvraag">
                                    <b><li>Locatie:</li>
                                    <li>Product type:</li>
                                    <li>Fabrikaat:</li>
                                    <li>Product serie:</li>
                                    <li>Aantal:</li></b>
                                </ul>
                                <ul class="prodinfo">
                                    <li>Locatie</li>
                                    <li>{{$searchprod->Producttype}}</li>
                                    <li>{{$searchprod->Fabrikaat}}</li>
                                    <li>{{$searchprod->Productserie}}</li>
                                    <li>Aantal</li>
                                </ul>
                            </div>   
                        </div>
                    </div>
                @endforeach
                {{ $product->links() }}
            @else 
            @endif
        </div>
    </div>
@endsection