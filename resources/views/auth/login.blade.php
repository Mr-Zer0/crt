@extends('layouts.plain')

@section('content')

<div id="login" class="row">
    <div class="col s12 m4 offset-m4" style="margin-top: 5em;">
        <div class="card">
            <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="card-content">

                    <div class="row">

                        <div class="col s12 center card-header">
                            <img src="{{ asset('images/logo.png') }}">
                            <!-- <p class="center">Welcome to Croton Internal System</p> -->
                        </div>
                    
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" type="email" class="validate" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="icon_prefix">Email</label>

                            @if ($errors->has('email'))
                                <span class="form-error red-text text-darken-4">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div> <!-- end of input-field -->
                    
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" class="validate" name="password" required>
                            <label for="icon_prefix">Password</label>

                            @if ($errors->has('password'))
                                <span class="form-error red-text text-darken-4">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div> <!-- end of input-field -->
  
                        <div class="col s12 remember">
                            <input type="checkbox" id="remember"  name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                    
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light col s12" type="submit" name="action">
                                Login
                            </button>
                        </div> <!-- end of input-field -->

                    </div> <!-- end of row -->

                </div> <!-- end of card-content -->

            {{ Form::close() }}
        </div> <!-- end of card -->
    </div> <!-- end of col s12 m6 -->
</div> <!-- end of row -->

@endsection
