@extends('frontend.layouts.app') 
@section('title', app_name() . ' | ' . __('navs.general.home')) 
@section('content')


<div class="row" style="margin-top:-400px;">
    <div class="col">
        <ul class="list-inline ">
            <li>
                <a href="{{ route('frontend.auth.login') }}">Login</a>
                <a href="{{ route('frontend.auth.register') }}">Register</a>
            </li>
        </ul>
        <div class="card">
            <div class="card-header">
                <i class="fas fa-home"></i> @lang('navs.general.home')
            </div>
            <div class="card-body">
                @lang('strings.frontend.welcome_to', ['place' => app_name()])
            </div>
        </div>
        <!--card-->
    </div>
    <!--col-->
</div>
<!--row-->


<!--row-->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" style="color:blue">
                <i class="fab fa-font-awesome-flag"></i> Font Awesome @lang('strings.frontend.test')
            </div>
            <div class="card-body">
                <i class="fas fa-home"></i>
                <i class="fab fa-facebook"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-pinterest"></i>
            </div>
            <!--card-body-->
        </div>
        <!--card-->
    </div>
    <!--col-->
</div>
<!--row-->
@endsection