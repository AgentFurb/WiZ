@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/controlpanel.css') }}" />
@endsection

@section('content')
<div class="tab">
    @if ('{{ Auth::user()->rechten }}' !== 'Admin')
        <button class="tablinks" onclick="openCity(event, 'Accountbeheer')" id="defaultOpen">Accountbeheer</button>
        <button class="tablinks" onclick="openCity(event, 'Productbeheer')">Productbeheer</button>
    @else
        <button class="tablinks" onclick="openCity(event, 'Productbeheer')" id="defaultOpen">Productbeheer</button>      
    @endif
</div>
    <div class="tabcontent" id="Accountbeheer">
        <div class="container users-main " >
            <div class="row users-top">
                <div class="col">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <form action="Search.php" mathod="post">
                                <input type="search" class="form-control" placeholder="Gebruikersnaam" aria-label="Search">
                            </form>
                            <a href="/register">
                                <button>New User</button>      
                            </a>                  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row users" id="infobar">
                <div class="col"></div>
                <div class="col"><p class="nummer"> User ID: </p></div>
                <div class="col"><p class="naam"> Username: </p></div>
                <div class="col last-col">Rechten</div>
                <div class="col last-col">Vestiging</div>
                <div class="col last-col"><img src="img/setting2.png" height="30" width="30"></div>
            </div>
            @foreach ($users as $user)
                <div class="row users">
                    <div class="col img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                    <div class="col">{{ $user->id }}</div>
                    <div class="col">{{ $user->voornaam }}</div>
                    <div class="col">{{ $user->rechten }}</div>
                    <div class="col">{{ $user->vestiging }}</div>
                    <div class="col">{{ $user->email }}</div>
                </div>
            @endforeach
            
        </div>
    </div>
    <div class="tabcontent" id="Productbeheer">
        <div class="container-fluid users-main">
            <div class="row info" id="infobarproductbeheer">
                <div class="img-col colpadding"><img src="img/aanvraagicon.png" class="profile-img-small imginfobar"></div>
                <div class="col colpadding"><p class="nummer"> Aanvraag ID: </p></div>
                <div class="col colpadding"><p class="naam"> Gebruikers: </p></div>
                <div class="col colpadding">Product:</div>
                <div class="col colpadding">Product aantal:</div>
                <div class="col colpadding">Product locatie:</div>
                <div class="col colpadding"><img src="img/setting2.png" height="30" width="30"></div>
            </div>
        </div>
    </div>
@endsection