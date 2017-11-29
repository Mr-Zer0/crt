@extends('layouts.croton')

@section('page_title', 'User Management')

@section('content')

@include('users.breadcrumb')

<div id="users" class="module-main">

    @yield('module')

    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red">
            <i class="large material-icons">add</i>
        </a>

        <ul>
            <li>
                <a href="{{ route('users.create') }}" 
                    class="btn-floating blue tooltipped"
                    data-position="top"
                    data-tooltip="Create New User">
                    <i class="material-icons">person_add</i>
                </a>
            </li>
            <li>
                <a href="{{ route('roles.create') }}" 
                    class="btn-floating green tooltipped"
                    data-position="top"
                    data-tooltip="Create Row">
                    <i class="material-icons">vpn_key</i>
                </a>
            </li>
        </ul>
    </div> <!-- End of fixed-action-btn -->

</div> <!-- End of users -->

@endsection