@extends('backend.layouts.app') 
@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title')) 
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>@lang('strings.backend.dashboard.welcome') <span class="badge badge-primary">{{ $logged_in_user->name }}</span>!</strong>
            </div>
            <!--card-header-->
            <div class="card-body">
                {!! __('strings.backend.welcome') !!}
            </div>
            <!--card-body-->
        </div>
        <!--card-->
    </div>
    <!--col-->
</div>
<!--row-->
@endsection