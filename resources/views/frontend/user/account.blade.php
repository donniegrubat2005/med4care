@extends('frontend.layouts.app') 
@section('title', app_name() . ' | My Account' ) @push('after-styles')
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
                <i class="fas fa-user-alt "></i> Account Content
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="text-center">
                            <img class="img-thumbnail rounded " src="{{ $logged_in_user->picture }}" alt="">
                        </div>
                        <br>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>{{ ucwords($logged_in_user->name) }}</h4>
                            </div>
                            <div class="col-sm-12">
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
                            <div class="col-sm-8">
                                <br>
                                <label>{{$percent}}% {{ $percent === 100 ? 'Done' : 'Completion' }}</label>
                                <div class="progress">
                                    <div class="progress-bar bg-primary" style="width:{{$percent}}%" role="progressbar" aria-valuenow="{{$percent}}%" aria-valuemin="0"
                                        aria-valuemax="100">{{$percent}}%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">

                    </div>
                </div>

                <hr>

                <div class="row-fluid">
                    <div class="col-md-12 mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Documents</a>
                            </li>
                            {{--
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages" role="tab" aria-controls="messages">Messages</a>
                            </li> --}}
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel" style="padding:20px;">

                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="button" data-remodal-target="addImg-modal">
                                            {{-- <i class="fa fa-upload" aria-hidden="true"></i> --}}
                                            Add File
                                        </button>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-responsive-sm table-hover table-bordered" id="table-docs">
                                            <thead>
                                                <tr class="tr-active">
                                                    {{-- <th>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="selectAll">
                                                            <label class="custom-control-label" for="selectAll">File Name</label>
                                                        </div>
                                                    </th> --}}
                                                    <th>File Name</th>
                                                    <th>File Size</th>
                                                    <th>Date Upload</th>
                                                    <th class="text-center text-muted">action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $ik => $item)
                                                <tr>
                                                    {{-- <td class="label-checkbox">
                                                        <div class="custom-control custom-checkbox cmdCheckbox">
                                                            <input type="checkbox" class="custom-control-input" id="{{ $ik }}-file">
                                                            <label class="custom-control-label" for="{{ $ik }}-file">
                                                                <a href="{{$item->filePath}}" target="_blank" class="text-info fileName">{{$item->fileName}}</a>
                                                            </label>
                                                        </div>
                                                    </td> --}}
                                                    <td><a href="{{$item->filePath}}" target="_blank" class="text-info fileName">{{$item->fileName}}</a></td>
                                                    <td>{{$item->fileSize}}</td>
                                                    <td>{{$item->dateCreated}}</td>
                                                    <td class="text-center">
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <button class="btn btn-danger btn-sm accntDeleteFile" type="button" id="{{$item->docId}}">
                                                                <i class="icon-trash"></i>
                                                            </button>
                                                            <a href="{{ route('frontend.user.download', $item->docId ) }}" class="btn btn-primary btn-sm">
                                                                <i class=" cui-cloud-download"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="remodal text-left" data-remodal-id="addImg-modal" style="background-color: transparent" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
                                    {{-- <button data-remodal-action="close" class="remodal-close"></button> --}}

                                    <div class="card ">
                                        <div class="card-header">
                                            <i class="fas fa-file-alt"></i> New File
                                            <button class="float-right btn btn-secondary btn-pill btn-sm" data-remodal-action="close" title="Close">X</button>
                                        </div>
                                        <div class="card-body">
                                            {{ html()->form('POST', url('account/add_documents'))->attribute('enctype', 'multipart/form-data')->open() }}
                                            <div class="form-group">
                                                {{ html()->file('file')->class('form-control')->required() }}
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-upload"></i> Upload
                                                </button>
                                            </div>
                                            {{ html()->form()->close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--
                            <div class="tab-pane" id="profile" role="tabpanel">2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                            <div class="tab-pane" id="messages" role="tabpanel">3. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div> --}}
                        </div>
                    </div>
                </div>







                {{--
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
                </div> --}} {{--
    @include('frontend.user.account.tabs.documents') --}} {{-- @switch(Request::segment(2)) @case('records')
    @include('frontend.user.account.tabs.records') @break @case('summary')
    @include('frontend.user.account.tabs.summary')
                @break @default
    @include('frontend.user.account.tabs.documents') @break @endswitch --}}
            </div>
        </div>
    </div>
</div>
@endsection
 @push('after-styles')
<style>
 
    .cmdCheckbox span {
        cursor: pointer;
    }

    .cmdCheckbox span:hover {
        text-decoration: underline;
    }
</style>












@endpush @push('after-scripts')
<script>
    $(function(){
        $('#table-docs').DataTable({
            searching: false, paging: false, info: true
        });
    });

</script>













@endpush