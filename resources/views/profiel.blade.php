@extends('layouts.layout')

@section('content')
    <hr>
    <div class="container-fluid maincont">
        <div class="container-fluid col-menu">
            <div class="row upperside" id="UserInfo">
                <div class="col order-first">
                    <ul class="nav-fill">
                        <li class="nav-item text-center li-pad">
                            Gebruikers ID:<br />
                            {{ Auth::user()->email }}
                        </li>
                        <li class="nav-item text-center li-pad">
                            Gebruikersnaam:<br />
                            {{ Auth::user()->name }}
                        </li>
                    </ul>
                </div>
                <div class="col order-last">
                    <ul class="nav-fill">
                        <li class="nav-item text-center li-pad">
                            Functie:<br />
                            {{ Auth::user()->Rechten }}
                        </li>
                        <li class="nav-item text-center li-pad">
                            Vestiging:<br />
                            {{ Auth::user()->Vestiging }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <img class="profile-img mx-auto d-block" src="https://www.w3schools.com/howto/img_avatar.png">
        <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <h4>Het in en uitgaan van uw producten</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                            <canvas id="bar-chart"  class="bar-chart" width="700" height="500"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="doughnut-chart"  class="doughnut-chart" width="700" height="500"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
@endsection