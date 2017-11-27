@extends('tour::layout')

@section('module')
    
    <div class="container">
        @if (isset($tours) && $tours->isNotEmpty())

        

        @else

        <p>No tour has been created yet !</p>

        @endif
    </div> <!-- end of container -->

@endsection
