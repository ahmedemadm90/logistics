@extends('layouts.app')
@section('title')
    {{ __('Edit Driver') }}
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
            <h2>{{ __('Edit Driver') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('drivers.index') }}">{{ __('الرجوع') }}</a>
        </div>
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-12 m-auto">
        <div class="card mt-2">
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('drivers.update',$driver->id) }}">
                    @csrf
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="driver_name" value="{{$driver->driver_name}}">
                                <label for="floatingInput">{{ __('Driver Name') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="licence_no" value="{{$driver->licence_no}}">
                                <label for="floatingInput">{{ __('Licence Number') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="licence_no" value="{{$driver->licence_grade}}">
                                <label for="floatingInput">{{ __('Licence Grade') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md-6 m-auto">
                            <div class="form-floating m-2">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                    name="active">
                                    <option selected disabled hidden>{{ __('Driver State') }}</option>
                                    <option value="1" @if ($driver->active == 1)
                                        selected
                                    @endif>{{ __('Active') }}</option>
                                    <option value="0" @if ($driver->active == 0)
                                        selected
                                    @endif>{{ __('Disabled') }}</option>
                                </select>
                                <label for="floatingSelect">{{ __('Driver State') }}</label>
                            </div>
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
