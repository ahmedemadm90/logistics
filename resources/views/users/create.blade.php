@extends('layouts.app')
@section('title')
    {{ trans('New User') }}
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h2>{{ __('أضافة مستخدم جديد') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('users.index') }}">{{ __('الرجوع') }}</a>
        </div>
    </div>
    @include('layouts.sessions')
    @include('layouts.errors')
    <div class="col-md-12 mt-1 m-auto">
        <div class="card ">
            <div class="card-body ">
                <form class="form" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name"
                                    name="name">
                                <label for="floatingInput">{{(__('Name'))}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="email">
                                <label for="floatingInput">البريد الالكتروني</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="password">
                                <label for="floatingInput">كلمة المرور</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="confirm-password">
                                <label for="floatingInput">تأكيد كلمة المرور</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating">
                                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="roles[]">
                                    <option selected hidden disabled>أختار صلاحيات المستخدم</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">صلاحيات المستخدم</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row m-2">
                        <button type="submit" class="btn btn-primary m-auto">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
