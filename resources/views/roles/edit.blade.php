@extends('layouts.app')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('title')
    {{ __('تعديل صلاحية مستخدم') }}
@endsection

@section('content')
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="card ">
        <div class="card-body">
            <h2>{{ __('تعديل صلاحية مستخدم') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('roles.index') }}">{{ trans('الرجوع') }}</a>
        </div>
    </div>
    <div class="card m-auto mt-1">
        <div class="card-body">
            {!! Form::model($role, ['method' => 'POST', 'route' => ['roles.update', $role->id]]) !!}
            <div class="row text-capitalize">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="name" value="{{ $role->name }}">
                                <label for="floatingInput">الأسم</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mt-3">
                        <h3 class="text-center mb-2 text-capitalize">{{ __('Permissions') }}</h3>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group row">
                                <br>
                                @foreach ($permission as $value)
                                    <div class="custom-control custom-checkbox col-md-3 m-auto">
                                        <input type="checkbox" class="custom-control-input" id="{{ $value->name }}"
                                            name="permission[]" value="{{ $value->name }}"
                                            @if (in_array($value->id, $rolePermissions)) checked @endif>
                                        <label class="custom-control-label"
                                            for="{{ $value->name }}">{{ $value->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
