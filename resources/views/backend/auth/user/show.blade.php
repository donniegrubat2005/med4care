@extends('backend.layouts.app') 
@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
 
@section('content')

<style>
    .img-holder div {
        border-radius: 50%;
        border: 1px solid lightblue;
    }

    .profile-img {
        width: 100%;
        border-radius: 50%;
        padding: 5px;
        position: relative;
    }
</style>


@if (true)
    @include('includes.partials.messages')

<div class="card">

    <div class="card-header">
        <h4 class="card-title mb-0">
            @lang('labels.backend.access.users.management')
            <small class="text-muted">
                @lang('labels.backend.access.users.view')
            </small>
            <div class="btn-group float-right" role="group" aria-label="Basic example">
                {!! $user->action_buttons !!}
            </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            {{--
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6" style="margin-top:7px;">
                                <strong class="float-left">
                                    <i class="icon-user"></i> Users
                                </strong>
                            </div>
                            <div class="col-sm-6">
                                <div class="dropdown float-right">
                                    <button id="my-dropdown" class="btn  btn-ghost-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            More
                                        </button>
                                    <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                        <a class="dropdown-item" href="{{ route('admin.auth.user.create') }}">
                                            <i class="icon-user-follow text-primary"></i>@lang('menus.backend.access.users.create')
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.auth.user.deactivated') }}">
                                            <i class="icon-user-unfollow text-warning"></i>@lang('menus.backend.access.users.deactivated')
                                        </a>
                                        <a class="dropdown-item" href="{{ route('admin.auth.user.deleted') }}">
                                            <i class="icon-trash text-danger"></i>@lang('menus.backend.access.users.deleted')
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-responsive-sm table-hover">
                            @foreach($users as $userTbl)
                            <tr>
                                <td>
                                    <a href="{{route('admin.auth.user.show', $userTbl)}}">
                                        <strong>{{ucwords($userTbl->first_name) }} {{ ucwords($userTbl->last_name) }}</strong>
                                    </a>
                                </td>
                                <td class="text-right">
                                    {!! $userTbl->status_label !!}
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-7">
                                <div class="float-left">
                                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="float-right">
                                    {!! $users->render() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body" style="border-top:2px solid lightblue">
                        <br>
                        <div class="row" style="margin-left:5px;">
                            <div class="col-md-2 img-holder">
                                <div>
                                    <img src="{{ $user->picture }}" class="user-profile-image profile-img" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                @include('backend.auth.user.show.tabs.userInfo')
                            </div>
                            <div class="col-md-3">
                                <h5>Permissions</h5>
                                <ul class="list-unstyled">
                                    @if ($user->permissions->count() > 0) @foreach ($user->permissions as $permission)
                                    <li style="margin-bottom:3px;">
                                        <i class="fa fa-check-circle text-info" aria-hidden="true"></i>
                                        <span style="font-size:16px;">{{ ucwords($permission['name']) }}</span>
                                    </li>
                                    @endforeach @else
                                    <li>N/A</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body" id="progress-content">
                                        <h6 class="card-title">{{$percent}}% {{ $percent === 100 ? 'Done' : 'Completion' }} </h6>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:{{$percent}}%">{{$percent}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                                            <i class="fa fa-file-o"></i> Documents
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home3" role="tabpanel">
                                        <h5>Available Documents</h5>
                                        <hr> @empty(!$files)
                                        <div class="row">
                                            @foreach($files as $iKey => $file)
                                            <div class="col-sm-2">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Document <strong>{{ $iKey+=1 }}</strong>
                                                    </div>
                                                    <div class="card-body p-0">
                                                        {!! $file['files'] !!} {{-- <img src="{{ $file['fileUrl'] }}" alt="{{$file['fileName']}}"
                                                            id="{{$file['dbFile']}}" class="img-thumbnail d-block img-doc"> --}}
                                                    </div>
                                                    <div class="card-footer">

                                                        @if ($file['key'])
                                                        <button class="btn btn-sm btn-outline-success" type="submit" data-toggle="modal" data-target="#imgModel-{{$iKey}}">
                                                            <i class="fa fa-eye"></i> 
                                                        </button>                                                        @endif

                                                        <a href="{{route('admin.auth.user.download', $file['docId'] ) }}" class="btn btn-sm btn-outline-info">
                                                            <i class="fa fa-download"></i> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="imgModel-{{$iKey}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document" style="border-radius:0px; border:1px solid #20a8d8">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">{{$file['fileName']}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body p-0">
                                                            {!! $file['files'] !!} {{-- <img src="{{ $file['fileUrl'] }}"
                                                                alt="{{$file['fileName']}}" class="img-thumbnail" style="width:100%">                                                            --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="alert alert-danger" role="alert">
                                                    <strong><i>No documents available.</i></strong>
                                                </div>
                                            </div>
                                        </div>
                                        @endempty
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection