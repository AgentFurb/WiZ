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
    @if ($productdetail > '')
        <div class="container">
            <br>
            <div class="row">
                <div class="col-10">
                    <h2 class="Producttitle">{{ $productdetail[0]->productomschrijving }}</h2>
                </div>
                <div class="col prodedit">
                    <a href="/overzicht"><i class="fas fa-arrow-circle-left editdeleteicons "></i></a>
                    <a href="/overzicht/{{ $productdetail[0]->productcodefabrikant }}/edit"><i class="fas fa-wrench editdeleteicons "></i></a>
                    <i class="tablinks far fa-trash-alt editdeleteicons proddel" onclick="openCity(event, 'proddel')"></i>
                    <i class="tablinks fas fa-info editdeleteicons" onclick="openCity(event, 'prodinfo')" id="defaultOpen" style="display: none;"></i>
                </div>
            </div>
            <hr id="userdetailline">
            <div class="usrinfo tabcontent" id="prodinfo">
                <div class="row">
                    <div class="col-6 detailimg">
                        <a href="#" id="pop" data-toggle='modal' data-target='#exampleModal'>
                            <img src="{{ $productdetail[0]->imagelink }}" data-target='#exampleModal' id="imageresource" class="productImg img-fluid myImg" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                        </a>                    
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{ $productdetail[0]->productomschrijving }} specificaties</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body modalimagedetail">
                                        <img src="{{ $productdetail[0]->imagelink }}"  class="productImg img-fluid myImg" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="430px" height="350px"/>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
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
                            <b>Aantal:</b><br><br>
                            {!! (empty($productdetail[0]->specs)) ? '' : "<i data-toggle='modal' data-target='#exampleModal' class='fas fa-info-circle productspecs'></i>" !!} <br><br>
                        </div>
                        <div class="col prodinformatie">
                            <br>
                            {{ $productdetail[0]->productcodefabrikant}} <br><br>
                            {{ (empty($productdetail[0]->ingangsdatum)) ? $productdetail[0]->createdas : $productdetail[0]->ingangsdatum }} <br><br>
                            {{ (empty($productdetail[0]->GTIN)) ? 'Geen scancode' : $productdetail[0]->GTIN }}  <br><br>
                            {{ $productdetail[0]->fabrikaat }} <br><br>
                            {{ $productdetail[0]->productserie }} <br><br>
                            {{ $productdetail[0]->locatie }} <br><br>
                            {{ $productdetail[0]->gewicht }} <b>KG</b><br><br>
                            {{ $productdetail[0]->aantal }} <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $productdetail[0]->productomschrijving }} specificaties</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ $productdetail[0]->specs }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                            <a href="/overzicht/productdetail/{{$productdetail[0]->productcodefabrikant}}"><button type="submit" class="btn btn-danger">Annuleer</button></a>
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
                        <a href="/overzicht/{{ $productdetail->productcodefabrikant }}/edit"><i class="fas fa-wrench editdeleteicons "></i></a>
                        <i class="tablinks far fa-trash-alt editdeleteicons proddel" onclick="openCity(event, 'proddel')"></i>
                        <i class="tablinks fas fa-info editdeleteicons" onclick="openCity(event, 'prodinfo')" id="defaultOpen" style="display: none;"></i>
                    </div>
            </div>
            <hr id="userdetailline">
            <div class="row">
                <div class="col-6">
                    <a href="#" id="pop">
                        <img src="{{ $productdetail->imagelink }}" id="imageresource" class="productImg img-fluid myImg" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px"/>
                    </a>
                </div>
                        <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $productdetail[0]->productomschrijving }} specificaties</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{ $productdetail[0]->specs }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
                </div>
                <div id="userdetailverticalline"></div>
                <div class="col">
                    <br>
                    <b>Productcode:</b><br><br>
                    <b>Ingangsdatum:</b><br><br>
                    <b>GTIN product:</b><br><br>
                    <b>Fabikaat:</b><br><br>
                    <b>Productserie:</b><br><br>
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
                    <div class="row deleteconfirm">
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
@section('tabJS')
    <script src="{{ asset('js/tab.js') }}"></script> 
@endsection