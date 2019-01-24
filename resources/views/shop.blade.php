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
<div class="container-fluid">
    <div class="row ">
        <div class="col-sm-8 mainshopprods">
            <h3>Onlangs toegevoegd:</h3>
            <div class="card-group">
                @if (isset($productsOTs))
                    @foreach ($productsOTs as $productsOT)
                        <div class="card OTcards">
                            <img class="card-img-top OTimg" src="{{$productsOT->imagelink}}" onerror=this.src="{{ url('/img/img-placeholder.png') }}" height="300px" width="300px">
                            <a href="/overzicht/productdetail/{{$productsOT->productcodefabrikant}}" class="card-link"><h5 class="card-title">{{$productsOT->productomschrijving}}</h5></a>
                            <div class="card-body ulinfo">
                                <ul class="prodvraag">
                                    <b><li>Locatie:</li>
                                    <li>Ingangsdatum:</li>
                                    <li>Fabrikaat:</li>
                                    <li>Serie:</li>
                                    <li>Aantal:</li></b>
                                </ul>
                                <ul class="prodinfo">
                                    <li>{{$productsOT->locatie}}</li>
                                    <li>{{$productsOT->ingangsdatum}}</li>
                                    <li>{{$productsOT->fabrikaat}}</li>
                                    <li>{{$productsOT->productserie}}</li>
                                    <li>{{$productsOT->aantal}}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else 
                <h1>not set</h1>
                @endif
            </div>
        </div>
        <div class="col sidecols"></div>
        <div class="eerderbekeken">
            @if(isset($producttypes))
                <div class="col eerderbekeken">
                    <h3>Verschillende laptops</h3>
                    @foreach ($producttypes as $producttype) 
                        <div class="main_EB">	
                            <div class="app_top">
                                    <img src="{{$producttype->imagelink}}" class="producttypeimg" width="150"/>
                                <span class="app_txt ">
                                    <a href="/overzicht/productdetail/{{$producttype->productcodefabrikant}}" class="card-link producttypenaam">{{$producttype->productomschrijving}}</a>
                                </span>
                                <span class="app_txt ulinfo">
                                    <ul class="prodvraag">
                                        <b><li>Locatie:</li>
                                        <li>Serie:</li>
                                        <li>Aantal:</li></b>
                                    </ul>
                                    <ul class="prodinfo">
                                        <li>{{$producttype->locatie}}</li>
                                        <li>{{$producttype->productserie}}</li>
                                        <li>{{$producttype->aantal}}</li>
                                    </ul>
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="sidecols col"></div>
    </div>
</div>

<div class="container-fluid ">
    <div class="row">
        <div class="col bekijkook">
            <h3>Bekijk ook deze producten:</h3>
            <div class="card-group">
                @if (isset($bekijkook))
                    @foreach ($bekijkook as $bekijk)
                        <div class="card bekijkookcards PCcard">
                            <img class="card-img-top bekijkookimg" src="{{$bekijk->imagelink}}" >
                            <a href="/overzicht/productdetail/{{$bekijk->productcodefabrikant}}" class="card-link"><h5 class="card-title">{{ $bekijk->productomschrijving}}</h5></a>

                            <div class="card-body ulinfo">
                                <ul class="prodvraag">
                                    <b><li>Locatie:</li>
                                    <li>Type:</li>
                                    <li>Fabrikaat:</li>
                                    <li>Serie:</li>
                                    <li>Aantal:</li></b>
                                </ul>
                                <ul class="prodinfo">
                                    <li>{{$bekijk->locatie}}</li>
                                    <li>{{$bekijk->producttype}}</li>
                                    <li>{{$bekijk->fabrikaat}}</li>
                                    <li>{{$bekijk->productserie}}</li>
                                    <li>{{$bekijk->aantal}}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                @else 
                    <h1>not set</h1>
                @endif 
            </div>
        </div>      
    </div>
</div>
{{-- <div class="container-fluid bekijkook">
    <h3>Bekijk ook deze producten:</h3>
    <div class="row">
        @if (isset($bekijkook))
            </div>
            @php $counttabID = 0 @endphp
            <div class="tab list-group">
                <button type="button" class="tablinks list-group-item list-group-item-action" onclick="openCity(event, 'menu1')" id="defaultOpen">menu1</button>
                <button type="button" class="tablinks list-group-item list-group-item-action" onclick="openCity(event, 'menu2')">menu2</button>
                <button type="button" class="tablinks list-group-item list-group-item-action" onclick="openCity(event, 'menu3')">menu3</button>
                <button type="button" class="tablinks list-group-item list-group-item-action" onclick="openCity(event, 'menu4')">menu4</button>
            </div>
                
            @foreach ($bekijkook as $bekijk)
                @php $counttabID++ @endphp
                <div id="menu{{$counttabID}}" class="tabcontent">
                    <h3>{{$bekijk->productomschrijving}}</h3>
                    <p>London is the capital city of England.</p>
                </div>
            @endforeach
        @else 
            <h1>not set</h1>
        @endif       
    </div>
</div> --}}
@endsection