@extends('tour::layout')

@section('module')
<div class="container">
    
    @if (isset($tour))
        {{ Form::model($tour, ['route' => ['tours.update', $tour->id], 'class' => 'form-horizontal', 'method' => 'put']) }}
    @else
        {{ Form::open(['route' => 'tours.store', 'class' => 'form-horizontal']) }}
    @endif

        <div class="row">
            <div class="col s12 input-field">
                {{ Form::text('title', $value = '', ['class' => 'validate']) }}
                {{ Form::label('title', 'Tour Name') }}

                @if ($errors->has('title'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div> <!-- end of col s12 input-field -->
        </div> <!-- end of row -->

        <div class="row">
            <div class="col s12 input-field">
                {{ Form::text('client_name', $value = '', ['class' => 'validate']) }}
                {{ Form::label('client_name', 'Client Name') }}

                @if ($errors->has('client_name'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('client_name') }}</strong>
                    </span>
                @endif
            </div> <!-- end of col s12 input-field -->
        </div> <!-- end of row -->

        <div class="row">
            <div class="input-field col s12">
                {{ Form::text('inquiry_date', $value = '', ['class' => 'datepicker']) }}
                {{ Form::label('inquiry_date', 'Inquiry Date') }}

                @if ($errors->has('inquiry_date'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('inquiry_date') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s12 -->
        </div> <!-- end of row -->

        <div class="row">
            <div class="input-field col s6">
                {{ Form::text('date_from', $value = '', ['class' => 'datepicker']) }}
                {{ Form::label('date_from', 'Travel Date From') }}

                @if ($errors->has('date_from'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('date_from') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s12 -->

            <div class="input-field col s6">
                {{ Form::text('date_to', $value = '', ['class' => 'datepicker']) }}
                {{ Form::label('date_to', 'Travel Date To') }}

                @if ($errors->has('date_to'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('date_to') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s12 -->
        </div> <!-- end of row -->

        <div class="row">
            <div class="input-field col s4">
                {{ Form::number('adult', $value = 1, ['class' => 'validate']) }}
                {{ Form::label('adult', 'Adult') }}

                @if ($errors->has('adult'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('adult') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s4 -->

            <div class="input-field col s4">
                {{ Form::number('child', $value = 0) }}
                {{ Form::label('child', 'Child') }}

                @if ($errors->has('child'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('child') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s4 -->

            <div class="input-field col s4">
                {{ Form::number('infant', $value = 0) }}
                {{ Form::label('infant', 'Infant') }}

                @if ($errors->has('infant'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('infant') }}</strong>
                    </span>
                @endif
            </div> <!-- end of input-field col s4 -->
        </div> <!-- end of row -->

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {{ Form::label('status', 'Status', ['class' => 'col-md-4 control-label']) }}

            <div class="col-md-6">
                {{ Form::select('status', config('tour.status'), $value = null, ['class' => 'form-control', 'required']) }}
                
                
                @if ($errors->has('status'))
                    <span class="help-block">
                        <strong>{{ $errors->first('status') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col s12 input-field">
                {{ Form::text('destination', $value = '', ['class' => 'validate']) }}
                {{ Form::label('destination', 'Destinations') }}

                @if ($errors->has('destination'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('destination') }}</strong>
                    </span>
                @endif
            </div> <!-- end of col s12 input-field -->
        </div> <!-- end of row -->

        <div class="row">
            <div class="col s12 input-field">
                {{ Form::textarea('remark', $value = null, ['class' => 'materialize-textarea']) }}
                {{ Form::label('remark', 'Remark') }}

                @if ($errors->has('remark'))
                    <span class="form-error red-text text-darken-4">
                        <strong>{{ $errors->first('remark') }}</strong>
                    </span>
                @endif
            </div> <!-- end of col s12 input-field -->
        </div> <!-- end of row -->

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                @if (isset($tour))
                    {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                @else
                    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
                @endif
            </div>
        </div>
    {{ Form::close() }}
                
</div>
@endsection
