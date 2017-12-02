@extends('permissions.layout')

@section('module')

    @if (isset($permissions) && ! is_null($permissions))

    <ul class="collection with-header">
        
        <li class="collection-header"><h4>{{ $role->name }}</h4></li>

        <li class="collection-item">

            {{ Form::open(['route' => ['roles.makepermission', $role->id]]) }}

            @foreach ($permissions as $rows)

            <div class="row">

                @foreach ($rows as $permit)

                <div class="col s12 m2">

                    {{ Form::checkbox("permissions[]", 
                               $permit->name, 
                               $role->hasPermissionTo($permit->name), 
                               ['id' => 'permit' . $permit->id, 'class' => 'filled-in']) }}

                    {{ Form::label('permit' . $permit->id, $permit->name) }}

                </div> <!-- end of col s12 m1 -->

                @endforeach

            </div> <!-- end of row -->

            @endforeach

        </li> <!-- end of collection-item -->

        <li class="collection-item">
            <button class="btn waves-effect waves-light" type="submit" name="action">Save
                <i class="material-icons right">send</i>
            </button>
        </li> <!-- end of collection-item -->

        {{ Form::close() }}
    </ul> <!-- end of collection with-header -->

    @endif 

    @foreach ($permissions as $per)

        

    @endforeach
@endsection
