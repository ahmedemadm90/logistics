<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{__('Trips Archive')}}</title>
    <script type="text/javascript" charset="utf8" src="{{ asset('jquery-3.6.1.min.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/responsive-font.css">
    <style>
        body {
            background-color: #fbfbfb;
        }

        @media (min-width: 991.98px) {
            main {
                padding-left: 240px;
            }
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            padding: 58px 0 0;
            /* Height of navbar */
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
            width: 240px;
            z-index: 600;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                width: 100%;
            }
        }

        /* .sidebar .active {
            border-radius: 5px;
            box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        } */

        .sidebar-sticky {
            position: relative;
            top: 0;
            height: calc(100vh - 48px);
            padding-top: 0.5rem;
            overflow-x: hidden;
            overflow-y: auto;
            /* Scrollable contents if viewport is shorter than content. */
        }
    </style>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
</head>

<body>
    <div class="mt-1">
        <div class="card-body">
            <h2>{{ __('Trips Archive') }}</h2>
        </div>
        <div class="m-2">
            <a class="btn btn-success" href="{{ route('home') }}">{{ __('Back') }}</a>
        </div>
    </div>
    <hr>
    <div class="mt-2">
        <table id="myTable" class="table table-striped table-no-bordered table-hove">
            <thead>
                <tr>
                    <th class="text-center">{{ __('Truck No') }}</th>
                    <th class="text-center">{{ __('Truck Letter') }}</th>
                    <th class="text-center">{{ __('Trail No') }}</th>
                    <th class="text-center">{{ __('Trail Letter') }}</th>
                    <th class="text-center">{{ __('Gate 1 in time') }}</th>
                    <th class="text-center">{{ __('Gate 1 in Driver Name') }}</th>
                    <th class="text-center">{{ __('Gate 1 in Licence No') }}</th>
                    <th class="text-center">{{ __('Gate 2 in time') }}</th>
                    <th class="text-center">{{ __('Gate 2 in Driver Name') }}</th>
                    <th class="text-center">{{ __('Gate 2 in Licence No') }}</th>
                    <th class="text-center">{{ __('Gate 2 out time') }}</th>
                    <th class="text-center">{{ __('Gate 2 out Driver Name') }}</th>
                    <th class="text-center">{{ __('Gate 2 out Licence No') }}</th>
                    <th class="text-center">{{ __('Gate 3 in time') }}</th>
                    <th class="text-center">{{ __('Gate 3 in Driver Name') }}</th>
                    <th class="text-center">{{ __('Gate 3 in Licence No') }}</th>
                    <th class="text-center">{{ __('Gate 3 out time') }}</th>
                    <th class="text-center">{{ __('Gate 3 out Driver Name') }}</th>
                    <th class="text-center">{{ __('Gate 3 out Licence No') }}</th>
                    <th class="text-center">{{ __('Gate 4 out time') }}</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td class="text-center">{{ $log->trip->truck_no }}</td>
                        <td class="text-center">{{ $log->trip->truck_letter }}</td>
                        <td class="text-center">{{ $log->trip->trail_no }}</td>
                        <td class="text-center">{{ $log->trip->trail_letter }}</td>
                        <td class="text-center">{{ $log->gate1in }}</td>
                        <td class="text-center">{{ $log->gate1in_driver_name }}</td>
                        <td class="text-center">{{ $log->gate1in_licence_no }}</td>
                        <td class="text-center">{{ $log->gate2in }}</td>
                        <td class="text-center">{{ $log->gate2in_driver_name }}</td>
                        <td class="text-center">{{ $log->gate2in_licence_no }}</td>
                        <td class="text-center">{{ $log->gate2out }}</td>
                        <td class="text-center">{{ $log->gate2out_driver_name }}</td>
                        <td class="text-center">{{ $log->gate2out_licence_no }}</td>
                        <td class="text-center">{{ $log->gate3in }}</td>
                        <td class="text-center">{{ $log->gate3in_driver_name }}</td>
                        <td class="text-center">{{ $log->gate3in_licence_no }}</td>
                        <td class="text-center">{{ $log->gate3out }}</td>
                        <td class="text-center">{{ $log->gate3out_driver_name }}</td>
                        <td class="text-center">{{ $log->gate3out_licence_no }}</td>
                        <td class="text-center">{{ $log->gate4out }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>
    $('#myTable').DataTable( {
    buttons: [
        'copy', 'excel', 'pdf'
    ]
} );
</script>
@yield('scripts')

</html>
