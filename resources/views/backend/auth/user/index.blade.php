@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.backend.access.users.management'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@section('content')

<div class="card">
    <div class="card-header">
       <div class="row">
           <div class="col-md-6" style="margin-top:5px;">
                <strong>User Management <small>Active Users</small></strong>
           </div>
           <div class="col-md-6">
           <a class="btn btn-primary  btn-sm float-right" href="{{route('admin.auth.user.create')}}" role="button">
                  New User
               </a>
           </div>
       </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive ">
            <table class="table table-hover">
                <thead>
                <tr class="table-active">
                    <th><span style="margin-left:20px;">@lang('labels.backend.access.users.table.last_name')</span></th>
                    <th>@lang('labels.backend.access.users.table.first_name')</th>
                    <th>@lang('labels.backend.access.users.table.email')</th>
                    <th >@lang('labels.backend.access.users.table.roles')</th>
                    <th class="text-center">@lang('labels.backend.access.users.table.confirmed')</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">@lang('labels.backend.access.users.table.other_permissions')</th>
                    <th class="text-center">@lang('labels.backend.access.users.table.social')</th>
                    <th class="text-center">@lang('labels.backend.access.users.table.last_updated')</th>
                    <th class="text-center">@lang('labels.general.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><span style="margin-left:20px;">{{ $user->last_name }}</span></td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td >{!! $user->roles_label !!}</td>
                        <td class="text-center">{!! $user->confirmed_label !!}</td>
                        <td class="text-center">
                            @if ($user->active)
                                <label class="badge badge-success">Active</label>
                            @else
                                <label class="badge badge-danger">Inactive</label>
                            @endif
                        </td>
                        <td class="text-center">{!! $user->permissions_label !!}</td>
                        <td class="text-center">{!! $user->social_buttons !!}</td>
                        <td class="text-center">{{ $user->updated_at->diffForHumans() }}</td>
                        <td class="text-center">{!! $user->action_buttons !!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div>
</div>

@if (false)

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __('labels.backend.access.users.management') }} <small class="text-muted">{{ __('labels.backend.access.users.active') }}</small>
                </h4>
            </div><!--col-->

            <div class="col-sm-7">
                @include('backend.auth.user.includes.header-buttons')
            </div><!--col-->
        </div><!--row-->

        <div class="row mt-4">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>@lang('labels.backend.access.users.table.last_name')</th>
                            <th>@lang('labels.backend.access.users.table.first_name')</th>
                            <th>@lang('labels.backend.access.users.table.email')</th>
                            <th>@lang('labels.backend.access.users.table.confirmed')</th>
                            <th>@lang('labels.backend.access.users.table.roles')</th>
                            <th>@lang('labels.backend.access.users.table.other_permissions')</th>
                            <th>@lang('labels.backend.access.users.table.social')</th>
                            <th>@lang('labels.backend.access.users.table.last_updated')</th>
                            <th>@lang('labels.general.actions')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{!! $user->confirmed_label !!}</td>
                                <td>{!! $user->roles_label !!}</td>
                                <td>{!! $user->permissions_label !!}</td>
                                <td>{!! $user->social_buttons !!}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>{!! $user->action_buttons !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--col-->
        </div><!--row-->
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div><!--col-->

            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div><!--col-->
        </div><!--row-->
    </div><!--card-body-->
</div><!--card-->

@endif


@endsection

 