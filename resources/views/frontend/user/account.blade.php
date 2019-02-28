@extends('frontend.layouts.app') 


@section('title', app_name() . ' | My Account'  )






@push('after-styles')
    <style>
        .nav-content .nav-item a {
            color: #3a4248 !important;
        }
    
        .nav-content .nav-item {}
    
        .nav-content .nav-active {
            border-bottom: 1.5px solid #219ec9;
        }
    
        .nav-content .nav-active a {
            color: #219ec9 !important;
        }
    
        .nav-content .nav-item:hover {
            border-bottom: 1.5px solid #219ec9;
        }
    
        .nav-content .nav-item a:hover {
            border-bottom: 1.5px solid #219ec9;
            color: #219ec9 !important;
        }
        .img-doc {
            width: 100%;
            height: 260px;
        }
    </style>
@endpush

@section('content')
    <div class="row ">
        <div class="col ">
            @include('includes.partials.messages')
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-user-alt "></i>
                    Account Content
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="text-center">
                                <img class="img-thumbnail rounded " src="{{ $logged_in_user->picture }}" alt="">
                            </div>
                            <br>
                        </div>
                        <div class="col-md-5" >
                            <div class="row">
                                <div class="col-sm-12" >
                                    <h4>{{ ucwords($logged_in_user->name) }}</h4>
                                </div>
                                <div class="col-sm-12" >
                                    <ul class="list-unstyled">
                                        <li>    
                                            <i class="fa fa-barcode" aria-hidden="true"></i> {{ $logged_in_user->id_code }}
                                        </li>
                                        <li>
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <a href="javascript:;">{{ $logged_in_user->email }}</a>
                                        </li>
                                        <li>
                                            <span class="badge badge-success" style="font-size:12px; margin-top:5px;">
                                                {{ $logged_in_user->active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-8" >
                                    <br>
                                    <label >{{$percent}}% {{ $percent === 100 ? 'Done' : 'Completion' }}</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width:{{$percent}}%" role="progressbar" aria-valuenow="{{$percent}}%" aria-valuemin="0" aria-valuemax="100">{{$percent}}%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5" >
                            
                        </div>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="col-md-10">
                            <div class="nav-content" style="border-bottom:1px solid #f0f3f5">
                                <ul class="nav">
                                    <li class="nav-item {{  Request::segment(2) === null ? 'nav-active' : ''   }}">
                                        <a class="nav-link" href="{{ url('account') }}">DOCUMENTS</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @include('frontend.user.account.tabs.documents') 

                    
                    {{-- @switch(Request::segment(2)) 
                        @case('records')
                            @include('frontend.user.account.tabs.records') 
                        @break 
                        @case('summary')
                            @include('frontend.user.account.tabs.summary')
                        @break 
                        @default 
                            @include('frontend.user.account.tabs.documents') 
                        @break  
                    @endswitch  --}}
                </div>
            </div>
        </div>
    </div>
@endsection