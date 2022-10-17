<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 h-100">
        <ul class="nav flex-column">
            @can('Management Section')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{__('Management')}}</span>
                <a class="link-secondary" href="#" aria-label="صالة الانتظار الخارجية">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>

            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('roles.index') }}">
                    <span data-feather="home"></span>
                    {{__('Roles Management')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('users.index') }}">
                    <span data-feather="home"></span>
                    {{__('Users Management')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('drivers.index') }}">
                    <span data-feather="home"></span>
                    {{__('Drivers Management')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('trips.index') }}">
                    <span data-feather="home"></span>
                    {{__('Trips Management')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('blacklist.index') }}">
                    <span data-feather="home"></span>
                    {{__('Blacklist Management')}}
                </a>
            </li>
            @endcan
            @can('Gate 1 Section')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{__('Gate 1')}}</span>
                <a class="link-secondary" href="#" aria-label="صالة الانتظار الخارجية">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('gate1.index') }}">
                    <span data-feather="home"></span>
                    {{__('Trips Management')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('trips.create') }}">
                    <span data-feather="home"></span>
                    {{__('New Trip')}}
                </a>
            </li>
            @endcan
            @can('Gate 2 Section')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{__('Gate 2')}}</span>
                <a class="link-secondary" href="#" aria-label="صالة الشحن الخارجي">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('gate2.indexin')}}">
                    <span data-feather="home"></span>
                    {{__('Trip Checkin')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('gate2.indexout')}}">
                    <span data-feather="home"></span>
                    {{__('Trip Checkout')}}
                </a>
            </li>
            @endcan
            @can('Gate 3 Section')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{__('Gate 3')}}</span>
                <a class="link-secondary" href="#" aria-label="إضافة تقرير جديد">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('gate3.indexin')}}">
                    <span data-feather="home"></span>
                    {{__('Trip Checkin')}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('gate3.indexout')}}">
                    <span data-feather="home"></span>
                    {{__('Trip Checkout')}}
                </a>
            </li>
            @endcan
            @can('Gate 4 Section')
            <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>{{__('Gate 4')}}</span>
                <a class="link-secondary" href="#" aria-label="صالة الانتظار الخارجية">
                    <span data-feather="plus-circle"></span>
                </a>
            </h6>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('gate4.indexout') }}">
                    <span data-feather="home"></span>
                    {{__('Trip Checkout')}}
                </a>
            </li>
            @endcan

        </ul>
    </div>
</nav>
