@extends('layouts.app')
@section('title')
    {{ __('Add to Blacklist') }}
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
            <h2>{{ __('Add to Blacklist') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('blacklist.index') }}">{{ __('الرجوع') }}</a>
        </div>
    </div>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="col-md-12 m-auto">
        <div class="card mt-2">
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('blacklist.store') }}">
                    @csrf
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="duration">
                                <label for="floatingInput">{{ __('Duration') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="company">
                                <label for="floatingInput">{{ __('Company') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="date" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="block_date">
                                <label for="floatingInput">{{ __('Block Date') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="date" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="to_date">
                                <label for="floatingInput">{{ __('Un-Block Date') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto p-3">
                            {{-- <label class="mb-1">{{ __('Driver Name') }}</label> --}}
                            <select class="form-control js-single" style="width: 100%;" name="driver_id">
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
            $('.js-single').select2();
        });
    </script>
@endsection
