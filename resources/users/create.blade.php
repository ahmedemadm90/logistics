@extends('layouts.app')
@section('title')
    {{ trans('New VP') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('custome')
    @include('layouts.custome')
@endsection
@section('content')

    <div class="m-2">
        <h3>{{ trans('Create New Area') }}</h3>
    </div>
    <div class="m-2">
        <a class="btn btn-success" href="{{ route('areas.index') }}">{{ trans('Areas Management') }}</a>
    </div>
    <hr>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-6 m-auto">
        <div class="card shadow">
            <div class="card-header card-header-rose card-header-icon">
                <h4 class="card-title">{{ trans('Create New Area') }}</h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('areas.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="area_name" class="bmd-label-floating">{{ trans('Area Name') }}</label>
                        <input type="area_name" name="area_name" class="form-control" id="area_name" value="{{old('area_name')}}">
                    </div>
                    <div class="form-group">
                        <select class="js-example-basic-single w-100" data-style="select-with-transition" title="Choose VP" name="vp_id">
                            @foreach (App\Models\Vp::get() as $vp)
                            <option value="{{$vp->id}}">{{$vp->vp_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose">{{ trans('Submit') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@endsection
