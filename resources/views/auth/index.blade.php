@extends('layouts.app')

@section('content')
    <div class="bg">
        <div class="layer">
            <div class="modal-dialog Box">
                <div class="modal-content">
                    <div class="modal-heading">
                        <h2 class="text-center">WiZ Kuijpers</h2>
                    </div>
                    <hr class="hr-login" />
                    <div class="modal-body">
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">                                 
                                    <input id="password" type="password" placeholder="Wachtwoord" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-lg">
                                {{ __('Inloggen') }}
                            </button>
                            <br>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            <div class="foot">
                <div class="foot">© 2018 Copyright</div>
            </div>
        </div>
    </div>
@endsection
