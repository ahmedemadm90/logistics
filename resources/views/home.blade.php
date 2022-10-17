@extends('layouts.app')

@section('title')
    لوحة التحكم
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('content')
    <div class="card m-2">
        <div class="card-body">
            <h2>{{ __('Blacklisted Drivers') }}</h2>
        </div>
    </div>
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
                        @can('Driver Unblock')
                            <th class="text-center">{{ __('تفعيل') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\BlackList::where('active', '1')->get() as $driver)
                        <tr>
                            <td class="text-center">{{ $driver->driver->driver_name }}</td>
                            <td class="text-center">{{ $driver->driver->licence_no }}</td>
                            <td class="text-center">{{ $driver->company }}</td>
                            <td class="text-center">{{ $driver->duration }}</td>
                            <td class="text-center">{{ $driver->block_date }}</td>
                            <td class="text-center">{{ $driver->to_date }}</td>
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
