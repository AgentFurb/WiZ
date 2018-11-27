@extends('layouts.app')

@section('content')
    <div class="bg">
        <div class="layer">
            <div class="modal-dialog Boxlogin">
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
                                    <input id="email" type="email" placeholder="E-Mail" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>
                                    {{-- @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">                                 
                                    <input id="password" type="password" placeholder="Wachtwoord" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >
                                    {{-- @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                            <br>


                            @if ($errors->has('password'))
                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-lg" data-toggle="modal" data-target="#exampleModal">
                                    Launch demo modal
                                </button>
                            @else
                                <button type="submit" class="btn btn-lg">
                                    {{ __('Inloggen') }}
                                </button>
                            @endif


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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

@endsection
