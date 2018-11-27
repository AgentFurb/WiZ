@extends('layouts.app')

@section('content')
<div class="bg">
    <div class="layer">
        <div class="modal-dialog Box">
            <div class="modal-content">
                <div class="modal-heading">
                    <h2 class="text-center">Registreren</h2>
                </div>
                <hr class="hr-login" />
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        {{-- Input Voornaam --}}
                        <div class="form-group{{ $errors->has('voornaam') ? ' has-error' : '' }}">
                            <input id="voornaam" type="text" class="form-control" placeholder="Voornaam" name="voornaam" value="{{ old('voornaam') }}" required autofocus>
                            @if ($errors->has('voornaam'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('voornaam') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Input Achternaam --}}
                        <div class="form-group{{ $errors->has('achternaam') ? ' has-error' : '' }}">
                            <input id="achternaam" type="text" class="form-control" placeholder="Achternaam" name="achternaam" value="{{ old('achternaam') }}" required>
                            @if ($errors->has('achternaam'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('achternaam') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Input Rechten --}}
                        <div class="form-group{{ $errors->has('rechten') ? ' has-error' : '' }}">
                            <input id="rechten" type="text" class="form-control" placeholder="Rechten" name="rechten" value="{{ old('rechten') }}" required>
                            @if ($errors->has('rechten'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('rechten') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Input Vestiging --}}
                        <div class="form-group{{ $errors->has('vestiging') ? ' has-error' : '' }}">
                            <input id="vestiging" type="text" class="form-control" placeholder="Vestiging" name="vestiging" value="{{ old('vestiging') }}" required>
                            @if ($errors->has('vestiging'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('vestiging') }}</strong>
                                </span>
                            @endif
                        </div>
                        

                        {{-- Input E-mail --}}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="E-Mail Adres" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Input Wachtwoord --}}
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input id="password" type="password" placeholder="Wachtwoord" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        {{-- Input Bevestig Wachtwoord --}}
                        <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="Bevestig wachtwoord" class="form-control" name="password_confirmation" required>
                        </div>

                        {{-- Registreer submit --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Registreer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="foot">© 2018 Copyright</div>
    </div>
</div>
@endsection