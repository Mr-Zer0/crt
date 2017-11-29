@extends('roles.layout')

@section('module')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    @if (isset($role))
                        {{ Form::model($role, ['route' => ['roles.update', $role->id], 'class' => 'form-horizontal', 'method' => 'put']) }}
                    @else
                        {{ Form::open(['route' => 'roles.store', 'class' => 'form-horizontal']) }}
                    @endif

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) }}
                            <div class="col-md-6">
                                {{ Form::text('name', $value = null, ['class' => 'form-control', 'required', 'autofocus']) }}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                @if (isset($role))
                                    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                                @else
                                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                                @endif
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
