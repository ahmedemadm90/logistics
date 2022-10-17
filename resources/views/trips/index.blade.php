@extends('layouts.app')
@section('title')
    {{ __('أدارة الرحلات') }}
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
            <h2>{{ __('أدارة الرحلات') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('trips.create') }}">{{ __('تسجيل رحلة جديدة') }}</a>
        </div>
    </div>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="card shadow m-2 p-2">
        <div class="">
            <table id="datatable" class="table table-striped table-no-bordered table-hove" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('رقم الشاحنة') }}</th>
                        <th class="text-center">{{ __('حروف الشاحنة') }}</th>
                        <th class="text-center">{{ __('رقم المقطورة') }}</th>
                        <th class="text-center">{{ __('حروف المقطورة') }}</th>
                        <th class="text-center">{{ __('البوابة التالية') }}</th>
                        <th class="text-center">{{ __('حالة الرحلة') }}</th>
                        <th class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\Trip::get() as $trip)
                        <tr>
                            <td class="text-center">{{ $trip->truck_no }}</td>
                            <td class="text-center">{{ $trip->truck_letter }}</td>
                            <td class="text-center">{{ $trip->trail_no }}</td>
                            <td class="text-center">{{ $trip->trail_letter }}</td>
                            <td class="text-center">{{ $trip->next_gate }}</td>
                            <td class="text-center">{{ $trip->state }}</td>
                            <td class="text-center">
                                <a href="{{ route('trips.destroy', $trip->id) }}" class="btn btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('trips.edit', $trip->id) }}" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('trips.destroy', $trip->id) }}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
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
