@extends('layouts.layout')

@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/controlpanel.css') }}" />
@endsection

@section('content')
<div class="container userdetail">
        <div class="row">            
            <div class="col"><a href="/controlpanel"><i class="fas fa-arrow-circle-left usericons "></i></a></div>
            <div class="col"><img class="profile-img-users mx-auto d-block" src="/storage/avatars/default.jpg"></div>
            <div class="col"></div>
        </div>
        <hr id="userdetailline">
        <div class="usrinfo">
            <div class="row">
                <div class="col"></div>
                <div class="col-7">
                    <div class="usrinfo-cols">
                    <form action="/controlpanel/newuser/store" method="POST">
                            @method('POST')
                            @csrf
                            <h5>Voornaam:</h5>
                            <input type="text" class="form-control" placeholder="Voornaam" name="voornaam">
                            <br>
                            <h5>Achternaam:</h5>
                            <input type="text" class="form-control" placeholder="Achternaam" name="achternaam">
                            <br>
                            <h5>E-Mail adres:</h5>
                            <input type="text" class="form-control" placeholder="E-Mail" name="email">
                            <br>
                            <h5>Vestiging:</h5>
                            <select class="form-control" name="vestiging" >
                                <option disabled selected hidden>Vestiging:</option>
                                <option>Amsterdam</option>
                                <option>Arnhem</option>
                                <option>Den Bosch</option>
                                <option>Den Haag</option>
                                <option>Echt</option>
                                <option>Groningen</option>
                                <option>Helmond</option>
                                <option>Katwijk</option>
                                <option>Makkum</option>
                                <option>Oosterhout</option>
                                <option>Roosendaal</option>
                                <option>Tilburg</option>
                                <option>Utrecht</option>
                                <option>Zelhem</option>
                                <option>Zwolle</option>
                            </select>
                            <br>
                            <h5>Gebruikers functie:</h5>
                            <select class="form-control" name="rechten" >
                                <option disabled selected hidden>Functie:</option>
                                <option>User</option>
                                <option>Manager</option>
                                <option>Admin</option>
                            </select>
                            <br>
                            <h5>Wachtwoord:</h5>
                            <input id="password" type="password" placeholder="Wachtwoord" class="form-control" name="password" required>
                            <br>
                            <h5>Bevestig wachtwoord:</h5>
                            <input id="password-confirm" type="password" placeholder="Bevestig wachtwoord" class="form-control" name="password_confirmation" required>
                            <br>
                            <p class="createUserbtn"><button type="submit" class="btn btn-lg ">Maak gebruiker aan</button></p>
                        </form>
                    </div>
                </div>
                <div class="col"></div>
                {{-- <div class="col">
                    <div class="usrinfo-cols">
                        {{-- <h5>Gebruiker aangemaakt op:</h5>
                        <h3>{{ $user->created_at }}</h3>
                        <br>
                        <h5>Gebruiker geüpdate op:</h5>
                        {{-- <h3>{{ $user->updated_at }}</h3> --}}
                    {{-- </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection