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
    <meta name="description" content="@yield('meta_description', 'Med4Care')">
    <link rel="icon" type="image/x-icon" href="https://s3.eu-west-2.amazonaws.com/med4care-storage/images/logo/ico.png" />

    <meta name="author" content="@yield('meta_author', 'BayangYang')"> @yield('meta') @stack('before-styles')
    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }} @stack('after-styles')

   

</head>

<body class="{{ config('backend.body_classes') }}" id="mainUrl" uval="{{ url('/') }}">
  
    @include('backend.includes.header')

    <div class="app-body" id="app">
        @include('backend.includes.sidebar')
        <main class="main">
            @include('includes.partials.logged-in-as') 
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div>
                    <!--content-header-->
                    {{-- @include('includes.partials.messages')  --}}
                    @yield('content')
                </div>
                <!--animated-->
            </div>
            <!--container-fluid-->
        </main>
        <!--main-->
        @include('backend.includes.aside')
    </div>
    <!--app-body-->
    @include('backend.includes.footer')



    <!-- Scripts -->
    @stack('before-scripts') 
        {!! script(mix('js/manifest.js')) !!} 
        {!! script(mix('js/vendor.js')) !!} 
        {!! script(mix('js/backend.js')) !!} 
        {{-- {!! script(mix('js/frontend.js')) !!}  --}}
    @stack('after-scripts')


</body>

</html>