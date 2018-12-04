@extends('layouts.layout')


@section('pageSpecificCSS')
<link rel="stylesheet" type="text/css" href="{{ url('../css/controlpanel.css') }}" />
@endsection

@section('content')
<div class="container userdetail">
        <div class="row">
            <div class="col"><a href="/controlpanel/users/{{ $user->id }}"><i class="fas fa-arrow-circle-left usericons "></i></a>
            </div>
            <div class="col"><img class="profile-img-users mx-auto d-block" src="https://www.w3schools.com/howto/img_avatar.png"></div>
            <div class="col"></div>
        </div>
        <hr id="userdetailline">
        <div class="usrinfo">
            <div class="row">
                <div class="col">
                    <div class="usrinfo-cols">
                        <form action="{{route('users.edit', $user)}}" method="POST">
                            @method('PATCH')
                            @csrf
                            <h5>Voornaam:</h5>
                            <input type="text" class="form-control" value="{{ $user->voornaam }}" name="voornaam">
                            <br>
                            <h5>Achternaam:</h5>
                            <input type="text" class="form-control" value="{{ $user->achternaam }}" name="achternaam">
                            <br>
                            <h5>E-Mail adres:</h5>
                            <input type="text" class="form-control" value="{{ $user->email }}" name="email">
                            <br>
                            <h5>Vestiging:</h5>
                            <input type="text" class="form-control" value="{{ $user->vestiging }}" name="vestiging">
                            <br>
                            <h5>Gebruikers functie:</h5>
                            <input type="text" class="form-control" value="{{ $user->rechten }}" name="rechten">
                            <br>
                            <button type="submit" class="btn btn-lg">Update gebruiker</button>
                        </form>
                    </div>
                </div>
                <div id="userdetailverticalline"></div>
                <div class="col">
                    <div class="usrinfo-cols">

                        <h5>Gebruiker aangemaakt op:</h5>
                        <h3>{{ $user->created_at }}</h3>
                        <br>
                        <h5>Gebruiker geüpdate op:</h5>
                        <h3>{{ $user->updated_at }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection