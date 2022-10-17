@extends('layouts.app')
@section('title')
    {{ __('Trips Managment') }} || {{ __('Gate 4') }}
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
            <h2>{{ __('Trip Checkout') }} || {{ __('Gate 4') }}</h2>
        </div>
    </div>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="card shadow m-2 p-2">
        <div class="">
            <table id="datatable" class="table table-striped table-no-bordered table-hove">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('Truck No') }}</th>
                        <th class="text-center">{{ __('Truck Letter') }}</th>
                        <th class="text-center">{{ __('Trail No') }}</th>
                        <th class="text-center">{{ __('Trail Letter') }}</th>
                        <th class="text-center">{{ __('Checkout') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trips as $trip)
                        <tr>
                            <td class="text-center">{{ $trip->truck_no }}</td>
                            <td class="text-center">{{ $trip->truck_letter }}</td>
                            <td class="text-center">{{ $trip->trail_no }}</td>
                            <td class="text-center">{{ $trip->trail_letter }}</td>
                            <td class="text-center">
                                <form action="{{ route('gate4.store') }}" method="POST">
                                    @csrf
                                    <input type="text" name="trip_id" hidden value="{{$trip->id}}">
                                    <button class="btn btn-info">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                </form>

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
