@extends('layouts.app')
@section('title')
    {{ __('Users Management') }}
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
            <h2>{{ __('أدارة المستخدمين') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('users.create') }}">{{ __('أضافة مستخدم جديد') }}</a>
        </div>
    </div>
    @include('layouts.errors')
    @include('layouts.sessions')
    <div class="card shadow m-2 p-1">
        <table id="datatable" class="table table-striped table-bordered table-hover text-center" cellspacing="0"
                width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('أسم البوابة') }}</th>
                        <th class="text-center">{{ __('أسم المستخدم') }}</th>
                        <th class="text-center">{{ __('ادوات') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (App\Models\User::get() as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <a href="{{route('users.destroy',$user->id)}}" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, 100, 200, 250 - 1],
                    [10, 25, 50, 100, 200, 250, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search records",
                }
            });
            var table = $('#datatable').DataTable();
        });
    </script>
@endsection
