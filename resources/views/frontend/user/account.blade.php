@extends('frontend.layouts.app') 
@section('content')

<style>
    .img-holder {
        border: 1px solid lightblue;
        border-radius: 50%;
    }

    .profile-img {
        width: 120px;
        border-radius: 50%;
        padding: 5px;
    }

    .ul-profile-info {
        margin-left: -30px;
        margin-top: -60px;
        position: absolute;
    }

    .ul-profile-info li {
        list-style-type: none;
    }

    .ul-profile-info li label {
        font-size: 25px;
    }
    .nav-content .nav-item a{
        color: #3a4248 !important;
    }

    .nav-content .nav-item{

    }

    .nav-content .nav-active  {
        border-bottom: 1.5px solid #219ec9;
    }
    .nav-content .nav-active a {
        color: #219ec9 !important;
    }
    .nav-content .nav-item:hover{
        border-bottom: 1.5px solid #219ec9;
    }
    .nav-content .nav-item a:hover{
        border-bottom: 1.5px solid #219ec9;
        color: #219ec9 !important;
    }
</style>
<div class="row ">
    <div class="col ">
        <div class="card">
            <div class="card-header">
                <strong>
                    @lang('navs.frontend.user.account')
                </strong>
            </div>

            <div class="card-body">

                <div class="row-fluid">
                    <div class="col-md-12">
                        <ul class="list-inline">
                            <li class="list-inline-item active">
                                <div class="img-holder">
                                    <img src="{{ $logged_in_user->picture }}" class="user-profile-image profile-img" />
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <ul class="ul-profile-info">
                                    <li>
                                        <label>{{ $logged_in_user->name }} </label>
                                    </li>
                                    <li>
                                        <i class="fa fa-barcode" aria-hidden="true"></i> {{ $logged_in_user->id_code }}
                                    </li>
                                    <li>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <a href="javascript:;">{{ $logged_in_user->email }}</a>
                                    </li>
                                    <li>
                                        <span class="badge badge-success">
                                                Active
                                            </span>
                                    </li>
                                    <li>
                                        <br>
                                        <div class="cmd-func">
                                            <a href="javascript:;"> 
                                                   <i class="fa fa-edit" aria-hidden="true"></i>Edit
                                                </a> |
                                            <a href="javascript:;" class="text-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>Delete
                                                </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <br>
                </div>
                <hr>
                <div class="row-fluid">
                    <div class="col-md-12">
                        <div class="nav-content">
                            <ul class="nav">
                                <li class="nav-item  {{ Request::segment(2) === null ? 'nav-active' : '' }}">
                                    <a class="nav-link " href="{{ url('account') }}">PROFILE</a>
                                </li>
                                <li class="nav-item {{  Request::segment(2) === 'documents' ? 'nav-active' : ''  }}">
                                    <a class="nav-link"  href="{{ url('account/documents') }}">DOCUMENTS</a>
                                </li> 
                                <li class="nav-item  {{ Request::segment(2) === 'records' ? 'nav-active' : '' }}">
                                    <a class="nav-link"  href="{{ url('account/records') }}">RECORDS</a>
                                </li>
                                <li class="nav-item  {{ Request::segment(2) === 'summary' ? 'nav-active' : '' }}">
                                    <a class="nav-link"  href="{{ url('account/summary') }}">SUMMARY</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                
                @switch(Request::segment(2))
                    @case('documents')
                        @include('frontend.user.account.tabs.documents')
                        @break
                    @case('records')
                        @include('frontend.user.account.tabs.records')
                        @break
                    @case('summary')
                        @include('frontend.user.account.tabs.summary')
                        @break
                    @default
                        @include('frontend.user.account.tabs.profile')
                    @break
                        
                @endswitch

                {{-- <div role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab">@lang('navs.frontend.user.profile')</a>
                        </li>

                        <li class="nav-item">
                            <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab">@lang('labels.frontend.user.profile.update_information')</a>
                        </li>

                        @if($logged_in_user->canChangePassword())
                        <li class="nav-item">
                            <a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab">@lang('navs.frontend.user.change_password')</a>
                        </li>
                        @endif
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade show active pt-3" id="profile" aria-labelledby="profile-tab">
                            @include('frontend.user.account.tabs.profile')
                        </div>
                        <div role="tabpanel" class="tab-pane fade show pt-3" id="edit" aria-labelledby="edit-tab">
                            @include('frontend.user.account.tabs.edit')
                        </div>
                        @if($logged_in_user->canChangePassword())
                        <div role="tabpanel" class="tab-pane fade show pt-3" id="password" aria-labelledby="password-tab">
                            @include('frontend.user.account.tabs.change-password')
                        </div>
                        @endif
                    </div>
                </div> --}}


            </div>
        </div>
    </div>
</div>
<!-- row -->
@endsection