@if (false)
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <a href="{{ route('frontend.index') }}" class="navbar-brand">{{ app_name() }}</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">

            {{config('locale.status')}} @if(config('locale.status') && count(config('locale.languages')) > 1)
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">@lang('menus.language-picker.language') ({{ strtoupper(app()->getLocale()) }})
                    </a>
    @include('includes.partials.lang')
            </li>
            @endif @auth
            <li class="nav-item">
                <a href="{{route('frontend.user.dashboard')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.user.dashboard')) }}">
                        @lang('navs.frontend.dashboard')
                    </a>
            </li>
            @endauth @guest
            <li class="nav-item"><a href="{{route('frontend.auth.login')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.login')) }}">@lang('navs.frontend.login')</a></li>

            @if(config('access.registration'))
            <li class="nav-item"><a href="{{route('frontend.auth.register')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.auth.register')) }}">@lang('navs.frontend.register')</a></li>
            @endif @else
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $logged_in_user->name }}</a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                    @can('view backend')
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-item">@lang('navs.frontend.user.administration')</a>                    @endcan

                    <a href="{{ route('frontend.user.account') }}" class="dropdown-item {{ active_class(Active::checkRoute('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                    <a href="{{ route('frontend.auth.logout') }}" class="dropdown-item">@lang('navs.general.logout')</a>
                </div>
            </li>
            @endguest

            <li class="nav-item"><a href="{{route('frontend.contact')}}" class="nav-link {{ active_class(Active::checkRoute('frontend.contact')) }}">@lang('navs.frontend.contact')</a></li>
        </ul>
    </div>
</nav>
@endif


<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="{{ url('/') }}">
        &nbsp; <img class="navbar-brand-full" src="https://www.med4.care/wp-content/uploads/2018/05/logo.png" width="50" height="20" alt="Med4Care Logo">
        &nbsp; <strong class="navbar-brand-full">Med4Care</strong>
       <img class="navbar-brand-minimized" src="https://www.med4.care/wp-content/uploads/2018/05/logo.png" width="30" height="20" alt="Med4Care Logo">
    </a>
    <ul class="nav navbar-nav ml-auto" style="margin-right:15px;">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->picture }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
                {{-- <span class="d-md-down-none">{{ ucwords($logged_in_user->full_name) }}</span> --}}
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <div class="divider"></div>
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">
                    <i class="fas fa-lock"></i> @lang('navs.general.logout')
                </a>
            </div>
        </li>
    </ul>

</header>