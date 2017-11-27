@extends('layouts.croton')

@section('content')

<div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th align="center">#</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
            <tr>
                <td align="center">{{ $key + 1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-secondary">Edit</a>
                        <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-secondary">Delete</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div> <!-- end of container -->

@endsection