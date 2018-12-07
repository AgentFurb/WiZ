@extends('layouts.layout')
@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/shop.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-end" id="Searchnavbar"> 
        <div class="col-5 shop-bar">
            <select class="form-control category">
                <option value="" disabled selected hidden>Categorieën</option>
                <option>Verwarmingen</option>
                <option>Waterleidingen</option>
                <option>Zonnepanelen</option>
                <option>CV-Ketel's</option>
                <option>Airconditioner's</option>
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
                        <img  class="dropbtn" src="img/setting2.png"/>
                        <div class="dropdown-content">
                            <a href="producttoevoegen.php"><i class="fas fa-plus"></i>Toevoegen</a>
                        </div>
                    </div>

                @else   

                    <div class="dropdown">
                        <img  class="dropbtn" src="img/setting2.png"/>
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
<br>
<div id="myModal1" class="modal">
    <span class="close kruis1">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption1">CV-Ketel</div>
</div>
<div id="myModal2" class="modal">
    <span class="close kruis2">&times;</span>
    <img class="modal-content" id="img02">
    <div id="caption2">Airconditioner</div>
</div>
<div id="myModal3" class="modal">
    <span class="close kruis3">&times;</span>
    <img class="modal-content" id="img03">
    <div id="caption3">Zonnepaneel</div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
            <h3>Onlangs toegevoegd:</h3>
            <div class="card-group">
                <div class="card ot-product" id="heightwidthfix">
                    <img class="card-img-top cardstop" src="img/shop_item1.jpg" alt="Card image cap" id="myshopmodal1">
                    <div class="card-body">
                        <h5 class="card-title">CV-Ketel</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                    <div class="card-body">
                        <a href="/productdetail/products" class="card-link">Bekijk hier het product</a>
                    </div>
                </div>
                <div class="card ot-product" id="heightwidthfix">
                    <img class="card-img-top cardstop" src="img/shop_item2.jpg" alt="Card image cap" id="myshopmodal2">
                    <div class="card-body">
                        <h5 class="card-title">Airconditioner</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                    <div class="card-body">
                    <a href="/productdetail/products" class="card-link">Bekijk hier het product</a>
                    </div>
                </div>
                <div class="card ot-product" id="heightwidthfix">
                    <img class="card-img-top cardstop" src="img/shop_item3.jpg"  alt="Card image cap" id="myshopmodal3">
                    <div class="card-body">
                        <h5 class="card-title">Wilo pomp</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                    <div class="card-body">
                        <a href="/productdetail/products" class="card-link">Bekijk hier het product</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <ul class="list-unstyled">
                <li class="media">
                    <h3 class="mt-0 mb-1">Eerder bekeken:</h3>
                </li>
                <li class="media">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="/productdetail/products" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
                <li class="media my-4">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="/productdetail/products" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
                <li class="media">
                    <img class="mr-3 eb-product" src="img/img-placeholder.png" alt="Generic placeholder image">
                    <div class="media-body">
                        <a href="/productdetail/products" class="card-link"><h5>Bekijk hier het product</h5></a>
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid bekijkook">
    <h3>Bekijk ook deze producten:</h3>
    <div class="row">
    <div class="col">
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">If your canoe is stuck in a tree with the headlights on, how many pancakes does it take to get to the moon?</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">On a scale from one to ten what is your favourite colour of the alphabet.</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">I stepped on a Corn Flake, now I'm a Cereal Killer</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">I stepped on a Corn Flake, now I'm a Cereal Killer</p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="img/img-placeholder.png" alt="Card image cap"/>
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">I stepped on a Corn Flake, now I'm a Cereal Killer</p>
                </div>
            </div>
            </div>
        </div>          
    </div>
</div>
@endsection