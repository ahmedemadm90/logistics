@extends('layouts.app')
@section('title')
    {{ __('Blacklist Management') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="card mt-2">
        <div class="card-body">
            <h2>{{ __('Blacklist Management') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('blacklist.create') }}">{{ __('Add to Blacklist') }}</a>
        </div>
    </div>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="card shadow m-2 p-2">
        <div class="">
            <table id="datatable" class="table table-striped table-no-bordered table-hove">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Driver Name') }}</th>
                        <th class="text-center">{{ __('Licence Number') }}</th>
                        <th class="text-center">{{ __('Company') }}</th>
                        <th class="text-center">{{ __('Duration') }}</th>
                        <th class="text-center">{{ __('Block Date') }}</th>
                        <th class="text-center">{{ __('Un-Block Date') }}</th>
                        <th class="text-center">{{ __('State') }}</th>
                        <th class="text-center">{{ __('تفعيل') }}</th>
                        @can('Driver Unblock')
                            <th class="text-center">{{ __('Actions') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($drivers as $driver)
                        <tr>
                            <td class="text-center">{{ $driver->driver->driver_name }}</td>
                            <td class="text-center">{{ $driver->driver->licence_no }}</td>
                            <td class="text-center">{{ $driver->company }}</td>
                            <td class="text-center">{{ $driver->duration }}</td>
                            <td class="text-center">{{ $driver->block_date }}</td>
                            <td class="text-center">{{ $driver->to_date }}</td>
                            <td class="text-center">
                                @if ($driver->active == 1)
                                    <span class="badge bg-danger">{{ __('Still') }}</span>
                                @else
                                    <span class="badge bg-success">{{ __('Ended') }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                    <form action="{{ route('blacklist.unblock',$driver->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-info">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            @can('Driver Unblock')
                                <td class="text-center">
                                    <form action="{{ route('blacklist.unblock') }}" method="POST">
                                        @csrf
                                        <input type="text" name="trip_id" hidden value="{{ $trip->id }}">
                                        <button class="btn btn-info">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                </td>
                            @endcan
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
                    [10, 25, 50, 100, 200, 250 - 1],
                    [10, 25, 50, 100, 200, 250, "All"]
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
