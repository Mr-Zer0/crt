@extends('layouts.croton')

@section('page_title', 'System Settings')

@section('content')

@include('users.breadcrumb')

<div id="users" class="module-main">

    @yield('module')

</div> <!-- End of users -->

@endsection