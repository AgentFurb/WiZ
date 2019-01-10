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
    @if ($productdetail > '')
        <div class="container">
            <br>
            <div class="row">
                <div class="col">
                    <h2 class="Producttitle">{{ $productdetail[0]->productomschrijving }}</h2>
                </div>
                <div class="col prodedit">
                    <a href="/overzicht"><i class="fas fa-arrow-circle-left editdeleteicons "></i></a>
                    <a href=""><i class="fas fa-wrench editdeleteicons "></i></a>
                    <i class="tablinks far fa-trash-alt editdeleteicons proddel" onclick="openCity(event, 'proddel')"></i>
                    <i class="tablinks fas fa-info editdeleteicons" onclick="openCity(event, 'prodinfo')" id="defaultOpen" style="display: none;"></i>
                </div>
            </div>
            <hr id="userdetailline">
            <div class="usrinfo tabcontent" id="prodinfo">
                <div class="row">
                    <div class="col-6 detailimg">
                        <img src="{{ $productdetail[0]->imagelink }}" id="myImg" class="productImg img-fluid" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                    </div>
                    <div class="userdetailverticalline"></div>
                    <div class="col prodinformatie">
                        <br>
                        <b>Productcode:</b><br><br>
                        <b>Ingangsdatum:</b><br><br>
                        <b>GTIN product:</b><br><br>
                        <b>Fabikaat:</b><br><br>
                        <b>Productserie:</b><br><br>
                        <b>Locatie:</b><br><br>
                        <b>Product gewicht:</b><br><br>
                        <br><br>
                    </div>
                    <div class="col prodinformatie">
                        <br>
                        {{ $productdetail[0]->productcodefabrikant}} <br><br>
                        {{ $productdetail[0]->ingangsdatum }} <br><br>
                        {{ $productdetail[0]->GTIN }}  <br><br>
                        {{ $productdetail[0]->fabrikaat }} <br><br>
                        {{ $productdetail[0]->productserie }} <br><br>
                        {{ $productdetail[0]->locatie }} <br><br>
                        {{ $productdetail[0]->gewicht }} <br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="usrinfo tabcontent" id="proddel">
            <div class="container">
                <div class="row confirmdeleteuser">
                        <div class="col">
                            <div class="confirmdel">
                                <h3>Weet je zeker dat je dit product wilt verwijderen?</h3>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row ">
                        <div class="col"></div>
                        <div class="col" id="delaccept">
                            <form action="/overzicht/productdetail/destroy/{{ $productdetail[0]->productcodefabrikant}}" method="POST" class="delform" id="DelForm">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-success">Verwijder</button>
                            </form>
                        </div>
                        <div class="col" id="delannuleer">
                            <a href="/overzicht"><button type="submit" class="btn btn-danger">Annuleer</button></a>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
    @else 
        <div class="container">
            <br>
            <div class="row">
                <div class="col">
                    <h2 class="Producttitle">{{ $productdetail->productomschrijving }}</h2>
                </div>
                <div class="col prodedit">
                        <a href="/overzicht"><i class="fas fa-arrow-circle-left editdeleteicons "></i></a>
                        <a href=""><i class="fas fa-wrench editdeleteicons "></i></a>
                        <i class="tablinks far fa-trash-alt editdeleteicons proddel" onclick="openCity(event, 'proddel')"></i>
                        <i class="tablinks fas fa-info editdeleteicons" onclick="openCity(event, 'prodinfo')" id="defaultOpen" style="display: none;"></i>
                    </div>
            </div>
            <hr id="userdetailline">
            <div class="row">
                <div class="col-6">
                    <img src="{{ $productdetail->imagelink }}" id="myImg" class="productImg img-fluid" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                </div>
                <div id="userdetailverticalline"></div>
                <div class="col">
                    <br>
                    <b>Productcode:</b><br><br>
                    <b>Ingangsdatum:</b><br><br>
                    <b>GTIN product:</b><br><br>
                    <b>Fabikaat:</b><br><br>
                    <b>Productserie:</b><br><br>
                    <br><br>
                </div>
                <div class="col">
                    <br>
                    {{ $productdetail->productcodefabrikant}} <br><br>
                    {{ $productdetail->ingangsdatum }} <br><br>
                    {{ $productdetail->GTIN }}  <br><br>
                    {{ $productdetail->fabrikaat }} <br><br>
                    {{ $productdetail->productserie }} <br><br>
                </div>
            </div>
        </div>
        <div class="usrinfo tabcontent" id="proddel">
            <div class="container">
                <div class="row confirmdeleteuser">
                        <div class="col">
                            <div class="confirmdel">
                                <h3>Weet je zeker dat je dit product wilt verwijderen?</h3>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row ">
                        <div class="col"></div>
                        <div class="col" id="delaccept">
                            <form action="/overzicht/productdetail/destroy/{{ $productdetail[0]->productcodefabrikant}}" method="POST" class="delform" id="DelForm">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-success">Verwijder</button>
                            </form>
                        </div>
                        <div class="col" id="delannuleer">
                            <a href="/overzicht"><button type="submit" class="btn btn-danger">Annuleer</button></a>
                        </div>
                        <div class="col"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    


@endsection