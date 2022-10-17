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
            <h2>{{ __('تعديل مستخدم') }}</h2>
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
                <form class="form" method="POST" action="{{ route('users.update',$user->id) }}">
                    @csrf
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="name" value="{{$user->name}}">
                                <label for="floatingInput">{{__('Name')}}</label>
                            </div>
                        </div>
                    </div>
                    <div class="row m-2">
                        <div class="col-md">
                            <div class="form-floating m-2">
                                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                    name="email" value="{{$user->email}}">
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
                                        <option value="{{ $role }}" @if (in_array($role, $userRole))
                                        selected
                                    @endif>{{ $role }}</option>
                                    @endforeach
                                </select>
                                <label for="floatingSelect">صلاحيات المستخدم</label>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row m-2">
                        <div class="col-md">
                            <label for="roles">{{ __('Roles') }}</label>
                            <select class="form-control form-select-lg w-100" id="roles" name="roles[]" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}" @if (in_array($role, $userRole))
                                        selected
                                    @endif>{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <hr>
                    <div class="row m-2">
                        <button type="submit" class="btn btn-primary m-auto">{{ __('تأكيد') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-select-roles').select2({
                placeholder: "Select a Roles"
            });
        });
    </script>
@endsection
