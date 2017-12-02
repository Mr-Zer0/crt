@extends('roles.layout')

@section('module')

<ul class="collapsible">
    @foreach($roles as $role)

    <li>
        <div class="collapsible-header">
            {{ $role->name }}
        </div>
        <div class="collapsible-body">
            {{ Form::open(['route' => ['roles.makepermission', $role->id]]) }}

            @foreach ($permissions as $rows)

            <div class="row">

                @foreach ($rows as $permit)

                <div class="col s12 m2">

                    {{ Form::checkbox("permissions[]", 
                               $permit->name, 
                               $role->hasPermissionTo($permit->name), 
                               ['id' => $role->id . 'permit' . $permit->id, 'class' => 'filled-in']) }}

                    {{ Form::label($role->id . 'permit' . $permit->id, $permit->name) }}

                </div> <!-- end of col s12 m1 -->

                @endforeach

            </div> <!-- end of row -->

            @endforeach

            <button class="btn waves-effect waves-light" type="submit" name="action">Save
                <i class="material-icons right">send</i>
            </button>

            {{ Form::close() }}
        </div>
    </li>

    @endforeach
</ul> <!-- end of collapsible -->

@endsection