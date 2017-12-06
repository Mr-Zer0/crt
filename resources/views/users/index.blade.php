@extends('users.layout')

@section('module')

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->getRoleNames() as $role)
                    {{ $role . ' ' }}
                    @endforeach
                </td>
                <td>
                    <div class="btn-group">
                        <a href="{{ route('users.edit', $user->id) }}" 
                            class="btn-flat tooltipped" 
                            data-position="top" 
                            data-tooltip="Edit">
                            <i class="material-icons">mode_edit</i>
                        </a>

                        <a href="{{ route('users.destroy', $user->id) }}" 
                            class="btn-flat tooltipped" 
                            data-position="top" 
                            data-tooltip="Delete">
                            <i class="material-icons">delete</i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{ $users->links('partials.pagination') }}
@endsection