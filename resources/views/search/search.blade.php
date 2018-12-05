@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/controlpanel.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="tab">
    @if ('{{ Auth::user()->rechten }}' !== 'Admin')
        <button class="tablinks" onclick="openCity(event, 'Accountbeheer')" id="defaultOpen">Accountbeheer</button>
        <button class="tablinks" onclick="openCity(event, 'Productbeheer')">Productbeheer</button>
    @else
        <button class="tablinks" onclick="openCity(event, 'Productbeheer')" id="defaultOpen">Productbeheer</button>      
    @endif

        <input type="search" id="search" name="search" class="searchuser form-control" placeholder="Gebruikersnaam" aria-label="Search">

</div>
    <div class="tabcontent" id="Accountbeheer">
        <div class="container users-main">
            <br>
            <div class="row users" id="infobar">
                <div class="img-col colpadding"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small" style="display: none;"></div>
                <div class="col-4 colpadding">E-Mail:</div>
                <div class="col colpadding"><p class="naam"> Rechten: </p></div>
                <div class="col colpadding">Vestiging:</div>
                <div class="col colpadding">Id:</div>
            </div>
            {{-- @foreach ($users as $user)
                <a href="/controlpanel/users/{{ $user->id }}"> --}}
                    <div id="searchUsers">
                        <div class="row users usersdata">
                            <div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                             <div class="col-4">$user->email</div>
                            <div class="col">$user->rechten</div>
                            <div class="col">$user->vestiging</div>
                            <div class="col">$user->id</div>
                        </div>
                        <div class="row users usersdata">
                            <div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                            <div class="col-4">$user->email</div>
                            <div class="col">$user->rechten</div>
                            <div class="col">$user->vestiging</div>
                            <div class="col">$user->id</div>
                        </div>
                        <div class="row users usersdata">
                            <div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                            <div class="col-4">$user->email</div>
                            <div class="col">$user->rechten</div>
                            <div class="col">$user->vestiging</div>
                            <div class="col">$user->id</div>
                        </div>
                        <div class="row users usersdata">
                            <div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                            <div class="col-4">$user->email</div>
                            <div class="col">$user->rechten</div>
                            <div class="col">$user->vestiging</div>
                            <div class="col">$user->id</div>
                        </div>
                        <div class="row users usersdata">
                            <div class="img-col"><img src="https://www.w3schools.com/howto/img_avatar.png" class="profile-img-small"></div>
                            <div class="col-4">$user->email</div>
                            <div class="col">$user->rechten</div>
                            <div class="col">$user->vestiging</div>
                            <div class="col">$user->id</div>
                        </div>
                    </div>
                {{-- </a>
            @endforeach --}}
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


<script type="text/javascript">

$('#search').on('keyup',function(){

$value=$(this).val();

$.ajax({

type : 'get',

url : '{{URL::to('search')}}',

data:{'search':$value},

success:function(data){

$('#searchUsers').html(data);

}

});



})

</script>

<script type="text/javascript">

$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

</script>

@endsection