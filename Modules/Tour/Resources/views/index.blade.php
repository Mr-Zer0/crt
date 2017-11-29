@extends('tour::layout')

@section('module')
    
        @if (isset($tours) && $tours->isNotEmpty())

        <table>
            <thead>
                <tr>
                    <th>Tour Code</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>No Of Pax</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tours as $tour)

                <tr>
                    <td>{{ $tour->code }}</td>
                    <td>{{ $tour->title }}</td>
                    <td>
                        {{ $tour->tour_duration }}
                    </td>
                    <td>{{ $tour->pax }} Pax</td>
                    <td>
                        <div class="btn-group">
                            <a href="#{{ $tour->code }}" 
                                class="btn-flat tooltipped modal-trigger" 
                                data-position="top" 
                                data-tooltip="View Detail">
                                <i class="material-icons">visibility</i>
                            </a>

                            <a href="{{ route('tours.edit', $tour->id) }}" 
                                class="btn-flat tooltipped" 
                                data-position="top" 
                                data-tooltip="Delete">
                                <i class="material-icons">delete</i>
                            </a>
                        </div>

                        <div class="modal modal-fixed-footer" id="{{ $tour->code }}">
                            <div class="modal-content">
                                <h4>{{ $tour->title }}</h4>
                                <p>
                                    There is nothing to do
                                </p>
                            </div> <!-- end of modal-content -->
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">
                                    Close
                                </a>
                            </div> <!-- end of modal-footer -->
                        </div> <!-- end of modal -->
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>

        @else

        <p>No tour has been created yet !</p>

        @endif

@endsection
