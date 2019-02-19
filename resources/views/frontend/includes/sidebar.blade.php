<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                <small>Navigations</small> {{-- Main Navigations --}} {{-- @lang('menus.backend.sidebar.general') --}}
            </li>
            <li class="nav-item">

                <a class="nav-link {{ active_class(Active::checkUriPattern('dashboard')) }} " href="{{ route('frontend.index') }}">
                    <i class="nav-icon icon-home"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Request::segment(2)) }} " href="{{ route('frontend.user.account') }}">
                    <i class="nav-icon icon-user"></i> 
                    @lang('menus.backend.sidebar.account')
                </a>
            </li>


            @foreach ($permissions_user as $permission)
                <li class="nav-item">
                    <a class="nav-link " href="{{ $permission['route'] }}">
                        <i class="fa fa-{{$permission['icon']}}"></i>
                        &nbsp;&nbsp;{{$permission['name']}}
                    </a>
                </li>
            @endforeach


            {{-- <li class="nav-item">
                <a class="nav-link {{ active_class(Request::segment(2)) }} " href="{{ route('frontend.user.patients.index') }}">
                    <i class="fa fa-users"></i> 
                    &nbsp; Manage Patients
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ active_class(Request::segment(2)) }} " href="{{ route('frontend.user.reports.index') }}">
                    <i class="fas fa-chart-bar"></i>
                    &nbsp; Reports
                </a>
            </li> --}}

            {{--
            <li class="nav-item">
                <a class="nav-link {{ active_class(Request::segment(2)) }} " href="{{ route('frontend.user.payments') }}">
                    <i class="fa fa-money"></i> 
                    Manage Payments
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ active_class(Request::segment(2)) }} " href="{{ route('frontend.user.reports') }}">
                    <i class="fa fa-signal"></i> 
                    Reports
                </a>
            </li> --}} {{--
            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('general')) }} " href="{{ route('frontend.user.account') }}">
                    <i class="nav-icon icon-speedometer"></i>
                    @lang('menus.backend.sidebar.general')
                </a>
            </li> --}} {{--
            <li class="nav-title">
                @lang('menus.backend.sidebar.system')
            </li>
            @if ($logged_in_user->isAdmin())
            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/auth*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/auth*')) }}" href="#">
                            <i class="nav-icon icon-user"></i> @lang('menus.backend.access.title')
    
                            @if ($pending_approval > 0)
                                <span class="badge badge-danger">{{ $pending_approval }}</span>
                            @endif
                        </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/user*')) }}" href="{{ route('admin.auth.user.index') }}">
                                    @lang('labels.backend.access.users.management')
    
                                    @if ($pending_approval > 0)
                                        <span class="badge badge-danger">{{ $pending_approval }}</span>
                                    @endif
                                </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/auth/role*')) }}" href="{{ route('admin.auth.role.index') }}">
                                    @lang('labels.backend.access.roles.management')
                                </a>
                    </li>
                </ul>
            </li>
            @endif

            <li class="divider"></li>

            <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern('admin/log-viewer*'), 'open') }}">
                <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/log-viewer*')) }}" href="#">
                        <i class="nav-icon icon-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer')) }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ active_class(Active::checkUriPattern('admin/log-viewer/logs*')) }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
<!--sidebar-->