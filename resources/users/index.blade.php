@extends('layouts.app')
@section('title')
    {{ trans('Areas Management') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
@include('layouts.sessions')
    @include('layouts.errors')
    <div class="card shadow p-3">
        <h3>{{ trans('Areas Management') }}</h3>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('areas.create') }}">{{ trans('Create New Area') }}</a>
        </div>
        <hr>
        <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover text-center" cellspacing="0"
                width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('Area') }}</th>
                        <th>{{ __('VP') }}</th>
                        <th>{{ __('Country') }}</th>
                        <th>{{ __('Employees Incloded') }}</th>
                        <th>{{ __('Tools') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{ $area->id }}</td>
                            <td>{{ $area->area_name }}</td>
                            <td>{{ $area->vp->vp_name }}</td>
                            <td>{{ $area->vp->country->country_name }}</td>
                            <td>
                                @if ($area->workers)
                                    {{ $area->workers->count() }}
                                @else
                                    {{ trans('No Workers Inlisted') }}
                                @endif

                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('areas.show', $area->id) }}">Show</a>
                                        <a class="dropdown-item" href="{{ route('areas.edit', $area->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('areas.destroy', $area->id) }}">Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50,100,200,250 -1],
                    [10, 25, 50,100,200,250, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
            var table = $('#datatable').DataTable();
        });
    </script>
@endsection
