@extends('layouts.croton')

@section('page_title', config('tour.title'))

@section('content')

@include('tour::breadcrumb')

<div id="tours">

    @yield('module')

    <div class="fixed-action-btn">
        <a href="{{ route('tours.create') }}" class="waves-effect waves-ligh btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div> <!-- End of fixed-action-btn -->

</div> <!-- End of tours -->

@endsection