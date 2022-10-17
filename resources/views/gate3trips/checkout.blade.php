@extends('layouts.app')
@section('title')
    {{ __('Trip Checkout') }} || {{ __('Gate 3') }}
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
            <h2>{{ __('Trip Checkout') }} || {{ __('Gate 3') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('gate3.indexout') }}">{{ __('الرجوع') }}</a>
        </div>
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-12 m-auto">
        <div class="card mt-2">
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('gate3.storeout') }}">
                    @csrf
                    <input class="hidden" hidden value="{{ $id }}" name="trip_id">
                    <div class="row m-2">
                        <div class="col-md p-3">
                            <label class="mb-1">{{ __('Driver Name') }}</label>
                            <select class="form-control select2" style="width: 100%;" name="driver_id" required>
                                <option selected disabled hidden>{{ __('Select Driver') }}</option>
                                @foreach (App\Models\Driver::get() as $driver)
                                    <option value="{{ $driver->id }}">{{ $driver->driver_name }} ||
                                        {{ $driver->licence_no }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="text-center">
                        <button class="btn btn-success m-auto">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
        });
    </script>
@endsection
