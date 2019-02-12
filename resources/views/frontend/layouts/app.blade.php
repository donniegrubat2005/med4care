<!DOCTYPE html> @langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')"> @yield('meta') {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}} @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/frontend.css')) }} {{ style(mix('css/backend.css')) }} @stack('after-styles')
</head>

<body class="{{ (Auth::check() ) ? config('backend.body_classes') : 'app flex-row align-items-center  pace-done'   }}">




    @auth
    @include('frontend.includes.nav')
    <div class="app-body">
    @include('frontend.includes.sidebar')
        <main class="main">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.breadcrumbs') {{-- {!! Breadcrumbs::render() !!} --}}


            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div>

                    @yield('content')

                </div>
            </div>
        </main>
    @include('backend.includes.aside')
    </div>
    @include('backend.includes.footer') @else

    <div class="container">
        @yield('content')
    </div>

    @endauth 
    @stack('before-scripts') 
        {!! script(mix('js/manifest.js')) !!} 
        {!! script(mix('js/vendor.js')) !!} 
        {!! script(mix('js/backend.js')) !!} 
    @stack('after-scripts')  
</body>

</html>