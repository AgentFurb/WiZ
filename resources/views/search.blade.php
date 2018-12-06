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
<form action="/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="searchContainer">
        <input type="text" class="searchBox" name="q" placeholder="Search users"> 
        <span class="input-group-btn">
            <button type="submit" class="searchButton">
                <i class="fas fa-search"></i>
            </button>
        </span>
    </div>
</form>
    <div class="tabcontent" id="Accountbeheer">
        @if(isset($details))
        <div class="container users-main">
            <br>
            <div class="row users" id="infobar">
                <div class="img-col colpadding"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small" style="display: none;"></div>
                <div class="col-4 colpadding">E-Mail:</div>
                <div class="col colpadding"><p class="naam"> Rechten: </p></div>
                <div class="col colpadding">Vestiging:</div>
                <div class="col colpadding">Id:</div>
            </div>
            @foreach ($details as $user)
                <a href="/controlpanel/users/{{ $user->id }}">
                    <div id="searchUsers">
                        <div class="row users usersdata" id="hide">
                            <div id="hide" class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                            <div id="hide" class="col-4">{{ $user->email }}</div>
                            <div id="hide" class="col">{{$user->rechten}}</div>
                            <div id="hide" class="col">{{$user->vestiging}}</div>
                            <div id="hide" class="col">{{$user->id}}</div>
                        </div>

                    </div>
                </a>
            @endforeach
            @endif
        </div>
        {{-- <div class="container">
                @if(isset($details))
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Sample User details</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $user)
                        <tr>
                            <td>{{$user->voornaam}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div> --}}
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