@extends('layouts.croton')

@section('content')

@include('users.breadcrumb')

<div id="users">

    @yield('module')

    <div class="fixed-action-btn">
        <a href="{{ route('users.create') }}" class="waves-effect waves-ligh btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>
    </div> <!-- End of fixed-action-btn -->

</div> <!-- End of users -->

@endsection