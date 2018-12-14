@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/shop.css') }}" />
@endsection

@section('shopmenu')
    <div class="container-fluid">
        <div class="row justify-content-end" id="Searchnavbar"> 
            <div class="col-5 shop-bar">
                <select class="form-control category" onchange="window.location=this.options[this.selectedIndex].value">
                    <option value="" disabled selected hidden>Categorieën</option>
                    @foreach ($combocats as $combocat)
                        <option value="/shop/products/{{ $combocat->Productserie }}">{{ $combocat->Productserie }}</option>
                    @endforeach
                </select> 
            </div>
            <div class="row justify-content-end" id="Searchnavbar"> 
                <div class="col-5 shop-bar">
                    <input type="search" class="form-control search" placeholder="Search" aria-label="Search" size="60" >
                </div>
            </div>
            <div class="col-2 shop-bar">
                @if ('{{ Auth::user()->Rechten }}' == 'User')      
                    <div class="dropdown">
                        <img  class="dropbtn" src="{{ asset('img/setting2.png') }}"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                        </div>
                    </div>
                @else   
                    <div class="dropdown">
                        <img  class="dropbtn" src="{{ asset('img/setting2.png') }}"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                            <a href="#"><i class="fas fa-wrench"></i>Aanpassen</a>
                            <a href="producten.php"><i class="fas fa-trash-alt"></i>Verwijderen</a>
                        </div>
                    </div>
                @endif
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
                <div class="row PCall">
                    @foreach ($prodscats as $prodscat)
                            <div class="col-6 PCcard">
                                <img class="card-img-left PCimg" src="{{$prodscat->imagelink}}" alt="Card image cap" onerror=this.src="{{ url('/img/img-placeholder.png') }}" width="330px" height="250px">
                                <div class="">
                                    <a href="/shop/productdetail/{{$prodscat->productcodefabrikant}}"><h5>{{$prodscat->productomschrijving}}</h5></a>
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
                                            <li>{{$prodscat->producttype}}</li>
                                            <li>{{$prodscat->fabrikaat}}</li>
                                            <li>{{$prodscat->productserie}}</li>
                                            <li>Aantal</li>
                                        </ul>
                                    </div>   
                                </div>
                            </div>
                    @endforeach
                    {{ $prodscats->links() }}
                </div>
            @else
            @endif
        </div>
    </div>
@endsection