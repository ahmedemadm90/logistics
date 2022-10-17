@extends('layouts.forms')
@section('title')
    {{__('Login')}}
@endsection
@section('content')
@include('layouts.errors')
    <div class="container">
        <div class="container">
            <main class="form-signin">
                <form class="w-50 m-auto text-center needs-validation" action="{{route('login')}}" method="POST">
                    @csrf
                    <img class="mb-4" src="{{asset('media/logo.png')}}" alt="" width="150" height="150">
                    <h1 class="h3 mb-3 fw-bold">برجاء تسجيل الدخول</h1>
                    <div class="form-floating m-2">
                        <input type="email" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="email">
                        <label for="floatingInput">البريد الالكتروني</label>
                    </div>
                    <div class="form-floating m-2">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">كلمة المرور</label>
                    </div>
                    <br>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">تسجيل الدخول</button>
                </form>
            </main>
        </div>
        {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    لوحة التحكم
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('البريد الالكتروني') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    </div>
@endsection
