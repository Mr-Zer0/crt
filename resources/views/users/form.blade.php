@extends('users.layout')

@section('module')

    <div class="container">


        @if (isset($user))
            {{ Form::model($user, ['route' => ['users.update', $user->id], 'class' => 'col s12', 'method' => 'put']) }}
        @else
            {{ Form::open(['route' => 'users.store', 'class' => 'col s12']) }}
        @endif

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::text('name', $value = null, ['class' => 'validate', 'required', 'autofocus']) }}
                    {{ Form::label('name', 'Name') }}
                    
                    @if ($errors->has('name'))
                        <span class="form-error red-text text-darken-4">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif

                </div> <!-- end of input-field col s6 -->
            </div> <!-- End of row -->

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::email('email', $value = null, ['class' => 'validate', 'required']) }}
                    {{ Form::label('email', 'Email') }}
                    
                    @if ($errors->has('email'))
                        <span class="form-error red-text text-darken-4">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

                </div> <!-- end of input-field col s6 -->
            </div> <!-- End of row -->

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::select('role', $roles, $value = null) }}
                    {{ Form::label('role', 'Role') }}
                    
                    @if ($errors->has('role'))
                        <span class="form-error red-text text-darken-4">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                    @endif

                </div> <!-- end of input-field col s6 -->
            </div> <!-- End of row -->

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::password('password', $value = null, ['class' => 'validate', 'required']) }}
                    {{ Form::label('password', 'Password') }}
                    
                    @if ($errors->has('password'))
                        <span class="form-error red-text text-darken-4">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div> <!-- end of input-field col s6 -->
            </div> <!-- End of row -->

            <div class="row">
                <div class="input-field col s12">
                    {{ Form::password('password_confirmation', $value = null, ['class' => 'validate', 'required']) }}
                    {{ Form::label('password_confirmation', 'Password') }}
                    
                    @if ($errors->has('password'))
                        <span class="form-error red-text text-darken-4">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                </div> <!-- end of input-field col s6 -->
            </div> <!-- End of row -->

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    @if (isset($user))
                        {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                    @else
                        {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                    @endif
                </div>
            </div>
        {{ Form::close() }}


    </div>

@endsection
