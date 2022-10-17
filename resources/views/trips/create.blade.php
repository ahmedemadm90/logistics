@extends('layouts.app')
@section('title')
    {{ trans('New Trip') }}
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
            <h2>{{ __('تسجيل رحلة جديدة') }}</h2>
        </div>
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-12 m-auto">
        <div class="card mt-2">
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('trips.store') }}">
                    @csrf
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="number" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="truck_no">
                                <label for="floatingInput">أرقام الشاحنة</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="truck_letter">
                                <label for="floatingInput">حروف الشاحنة</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="number" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="trail_no">
                                <label for="floatingInput">أرقام المقطورة</label>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="placeholder"
                                    name="trail_letter">
                                <label for="floatingInput">حروف المقطورة</label>
                            </div>
                        </div>
                        <span class="text-danger m">*في حالة الشاحنات الفرداني يترك هذا الجزء فارغا</span>
                    </div>
                    <div class="row m-2">
                        <div class="col-md p-3">
                            <label class="mb-1">{{ __('Driver Name') }}</label>
                            <select class="form-control select2" style="width: 100%;" name="driver_id">
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
