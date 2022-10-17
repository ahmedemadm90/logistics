@extends('layouts.app')
@section('title')
{{ trans('Edit VP') }}
@endsection
@section('navbar')
@include('layouts.navbar')
@endsection
@section('sidebar')
@include('layouts.sidebar')
@endsection
@section('content')
    <div class="m-2">
        <a class="btn btn-success" href="{{ route('areas.index') }}">{{ trans('Areas Management') }}</a>
    </div>
    <hr>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-6 m-auto">
        <div class="card shadow">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">public</i>
                </div>
                <h4 class="card-title">{{ trans('Edit Area') }} || {{$area->area_name}}</h4>
            </div>
            <div class="card-body ">
                <form method="POST" action="{{ route('areas.update',$area->id) }}">
                    @csrf
                    <div class="form-group">
                        <label for="area_name" class="bmd-label-floating">{{ trans('Area Name') }}</label>
                        <input type="area_name" name="area_name" class="form-control" id="area_name" value="{{$area->area_name}}">
                    </div>
                    <div class="form-group">
                        <select class="selectpicker w-100" data-style="select-with-transition" title="Choose VP" name="vp_id">
                            @foreach (App\Models\Vp::get() as $vp)
                            <option value="{{$vp->id}}" @if ($area->vp_id == $vp->id)
                                selected
                            @endif>{{$vp->vp_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="card-footer ">
                        <button type="submit" class="btn btn-fill btn-rose">{{ trans('Update') }}</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
