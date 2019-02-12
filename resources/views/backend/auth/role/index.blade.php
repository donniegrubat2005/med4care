@extends('backend.layouts.app')

@section('title', app_name() . ' | '. __('labels.backend.access.roles.management'))

@section('content')


<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{-- <strong>Role Management</strong> --}}
                <div class="row">
                    <div class="col-sm-6">
                        <strong class="card-title ">
                            @lang('labels.backend.access.roles.management')
                        </strong>
                    </div><!--col-->
        
                    <div class="col-sm-6 ">
                        <a href="{{ route('admin.auth.role.create') }}" class="btn btn-primary btn-sm float-right"> New Role</a>
                        {{-- @include('backend.auth.role.includes.header-buttons') --}}
                    </div><!--col-->
                </div><!--row-->
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="table-active">
                                <th ><span style="margin-left:20px;">@lang('labels.backend.access.roles.table.role')</span></th>
                                <th>@lang('labels.backend.access.roles.table.permissions')</th>
                                <th class="text-center">@lang('labels.backend.access.roles.table.number_of_users')</th>
                                <th class="text-center">@lang('labels.general.actions')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td><span style="margin-left:20px;"> {{ ucwords($role->name) }} <span></span></td>
                                    <td>
                                        @if($role->id == 1)
                                            @lang('labels.general.all')
                                        @else
                                            @if($role->permissions->count())
                                                @foreach($role->permissions as $permission)
                                                    {{ ucwords($permission->name) }}
                                                @endforeach
                                            @else
                                                @lang('labels.general.none')
                                            @endif
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $role->users->count() }}</td>
                                    <td class="text-center">{!! $role->action_buttons !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-6">
                    <div class="float-left">
                        {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}
                    </div>
                </div><!--col-->
    
                <div class="col-md-6">
                    <div class="float-right">
                        {!! $roles->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
            </div>
        </div>
    </div>
</div>
    

@if (false)
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        @lang('labels.backend.access.roles.management')
                    </h4>
                </div><!--col-->

                <div class="col-sm-7 pull-right">
                    @include('backend.auth.role.includes.header-buttons')
                </div><!--col-->
            </div><!--row-->

            <div class="row mt-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>@lang('labels.backend.access.roles.table.role')</th>
                                <th>@lang('labels.backend.access.roles.table.permissions')</th>
                                <th>@lang('labels.backend.access.roles.table.number_of_users')</th>
                                <th>@lang('labels.general.actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ ucwords($role->name) }}</td>
                                    <td>
                                        @if($role->id == 1)
                                            @lang('labels.general.all')
                                        @else
                                            @if($role->permissions->count())
                                                @foreach($role->permissions as $permission)
                                                    {{ ucwords($permission->name) }}
                                                @endforeach
                                            @else
                                                @lang('labels.general.none')
                                            @endif
                                        @endif
                                    </td>
                                    <td>{{ $role->users->count() }}</td>
                                    <td>{!! $role->action_buttons !!}</td>
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
                        {!! $roles->total() !!} {{ trans_choice('labels.backend.access.roles.table.total', $roles->total()) }}
                    </div>
                </div><!--col-->

                <div class="col-5">
                    <div class="float-right">
                        {!! $roles->render() !!}
                    </div>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
    </div><!--card-->
@endif

@endsection
