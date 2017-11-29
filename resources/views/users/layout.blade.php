@extends('layouts.croton')

@section('page_title', 'User Management')

@section('content')

@include('users.breadcrumb')

<div id="users" class="module-main">

    @yield('module')

    <div class="fixed-action-btn">
        <a href="{{ route('users.create') }}" class="waves-effect waves-ligh btn-floating btn-large red tooltipped" data-position="left" data-tooltip="Create New User">
            <i class="large material-icons">add</i>
        </a>
    </div> <!-- End of fixed-action-btn -->

</div> <!-- End of users -->

@endsection