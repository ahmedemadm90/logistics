@extends('layouts.app')
@section('title')
    {{ __('أدارة الصلاحيات') }}
@endsection
@section('content')
    <div class="card mt-1">
        <div class="card-body">
            <h2>{{ __('أدارة الصلاحيات') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('roles.create') }}">{{ __('أضافة صلاحية جديدة') }}</a>
        </div>
    </div>
    <div class="card mt-1">
        <div class="card-body">
            <div class="table-responsive">
                <table id="datatable" class="display table table-hover table-hover text-center p-2">
                    <thead>
                        <tr>
                            <th class="text-center">{{__('Name')}}</th>
                            <th class="text-center">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="text-capitalize text-center">{{ $role->name }}</td>
                                <td class="text-center">
                                <a href="{{route('roles.destroy',$role->id)}}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('roles.edit',$role->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('navbar')
    @include('layouts.navbar')
@endsection
