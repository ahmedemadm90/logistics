@extends('layouts.app')
@section('title')
    {{ __('Drivers Management') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="card m-2">
        <div class="card-body">
            <h2>{{ __('Drivers Management') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('drivers.create') }}">{{ __('New Driver') }}</a>
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
                        <th class="text-center">{{ __('Licence Grade') }}</th>
                        <th class="text-center">{{ __('Driver State') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Driver::get() as $driver)
                        <tr>
                            <td class="text-center">{{ $driver->driver_name }}</td>
                            <td class="text-center">{{ $driver->licence_no }}</td>
                            <td class="text-center">
                                @if ($driver->licence_grade == 1)
                                    <span class="badge bg-success p-2">{{__('One')}}</span>
                                @elseif($driver->licence_grade == 2)
                                <span class="badge bg-success p-2">{{__('Two')}}</span>
                                @else
                                <span class="badge bg-success p-2">{{__('Three')}}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ($driver->active == 1)
                                    <span class="badge bg-success p-2">{{__('Active')}}</span>
                                @else
                                <span class="badge bg-danger p-2">{{__('Disabled')}}</span>
                                @endif
                                </td>
                            <td class="text-center">
                                <a href="{{route('drivers.destroy',$driver->id)}}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('drivers.edit',$driver->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
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
