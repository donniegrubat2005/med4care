@extends('backend.layouts.app') 
@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.edit'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
 @push('after-styles')
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
        width: 100% !important;
        margin-top: -8px;
        margin-top: 3px !important;
        font-size: 12px;
        /* border-radius: 0px; */
        height: 30px;
    }

    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: red;
        cursor: inherit;
        display: block;
    }

    .user-image {
        width: 100%;
    }

    .profile-image {
        border: 1px solid lightblue;
        padding: 3px;
        border-radius: 5px;

    }
</style>

@endpush 
@section('content')
@include('includes.partials.messages') 

<div class="card">
    <div class="card-header">
        <strong>User Management</strong> <small>Edit User</small>
        <a href="{{route('admin.auth.user.create')}}" class="btn btn-primary btn-sm float-right"> New User</a>
    </div>
    <div class="card-body">
        <h6 class="card-title">User Image:</h6>
        {{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}
        <div class="row">
            <div class="col-sm-2">
                <div class="profile-image">
                    <img class="img-thumbnail user-image" src="{{$user->picture}}">
                </div>
                <span class="btn btn-block btn-outline-primary btn-file disabled " style="">
                        <span style="">User Image</span>
                <input type="file" name="image-file" id="editImgInp" disabled>
                </span>
            </div>
            <div class="col-sm-10 col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"><strong>User Information </strong>:</div>
                            <div class="col-md-6">
                                <span class="float-right">
                                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                                    {{ form_submit(__('buttons.general.crud.update')) }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    {{ html()->label('ID Code')->class('col-md-3 form-control-label')->for('id_code') }}
                                    <div class="col-md-9">
                                        {{ html()->text('id_code') ->class('form-control') ->placeholder('ID Code, Tax Id, Etc.') ->attribute('maxlength', 191) ->required()
                                        }}
                                    </div>
                                    <!--col-->
                                </div>
                                <!--form-group-->
                                <div class="form-group row">
                                    {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-3 form-control-label')->for('first_name')
                                    }}
                                    <div class="col-md-9">
                                        {{ html()->text('first_name') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                        ->attribute('maxlength', 191) ->required() }}
                                    </div>
                                    <!--col-->
                                </div>
                                <!--form-group-->

                                <div class="form-group row">
                                    {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-3 form-control-label')->for('last_name')
                                    }}

                                    <div class="col-md-9">
                                        {{ html()->text('last_name') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                        ->attribute('maxlength', 191) ->required() }}
                                    </div>
                                    <!--col-->
                                </div>
                                <!--form-group-->

                                <div class="form-group row">
                                    {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-3 form-control-label')->for('email')
                                    }}
                                    <div class="col-md-9">
                                        {{ html()->email('email') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.email')) ->attribute('maxlength',
                                        191) ->required() }}
                                    </div>
                                    <!--col-->
                                </div>
                                <!--form-group-->
                                <hr>

                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <h5 class="card-title">Documents :</h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="button" class="btn btn-ghost-primary float-right" id="add-documents"> <i class="fa fa-plus-o" aria-hidden="true"></i> Document </button>
                                    </div>
                                </div>
                                
                                <div class="form-group row d-none" id="file-holder">
                                    <div class="input-group">
                                        <input class="form-control" type="file">
                                        <span class="input-group-append">
                                            <button class="btn btn-ghost-danger rmvDoc" type="button">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div class="files-content">
                                    <div class="form-group row">
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="files[]">
                                            <span class="input-group-append">
                                                <button class="btn btn-ghost-danger rmvDoc" type="button">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <h5 class="card-title">
                                        Abilities :
                                    </h5>
                                    <div class="table-responsive ">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>@lang('labels.backend.access.users.table.roles')</th>
                                                    <th>@lang('labels.backend.access.users.table.permissions')</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        @if($roles->count()) 
                                                            @foreach($roles as $role)
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <div class="checkbox d-flex align-items-center">
                                                                            {{ html()->label( html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                                ->class('switch-input') ->id('role-'.$role->id)
                                                                                . '<span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                                ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                                ->for('role-'.$role->id) 
                                                                            }} 
                                                                            {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        {{-- {{$role->id}} --}}
                                                                        @if($role->id != 1) 
                                                                            @if($role->permissions->count()) 
                                                                                @foreach($role->permissions as $permission)
                                                                                    <i class="fas fa-dot-circle"></i> 
                                                                                    {{ ucwords($permission->name) }} 
                                                                                @endforeach 
                                                                            @else 
                                                                                @lang('labels.general.none') 
                                                                            @endif
                                                                        @else 
                                                                            @lang('labels.backend.access.users.all_permissions')
                                                                        @endif
                                                                    </div>
                                                                 </div>
                                                            @endforeach 
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($permissions->count()) @foreach($permissions as $permission)
                                                        <div class="checkbox d-flex align-items-center">
                                                            {{ html()->label( html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name) ->class('switch-input')
                                                            ->id('permission-'.$permission->id) . '
                                                            <span
                                                                class="switch-slider" data-checked="on" data-unchecked="off"></span>') ->class('switch switch-label switch-pill switch-primary
                                                                mr-2') ->for('permission-'.$permission->id) }} {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id)
                                                                }}
                                                        </div>
                                                        @endforeach @endif
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        
                    </div>
                </div>
            </div>
        </div>
        {{ html()->closeModelForm() }}
    </div>
</div>
@if (false) {{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->open()
}}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    @lang('labels.backend.access.users.management')
                    <small class="text-muted">@lang('labels.backend.access.users.edit')</small>
                </h4>
            </div>
            <!--col-->
        </div>
        <!--row-->

        <hr>

        <div class="row mt-4 mb-4">
            <div class="col">
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name')
                    }}

                    <div class="col-md-10">
                        {{ html()->text('first_name') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                        ->attribute('maxlength', 191) ->required() }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name')
                    }}

                    <div class="col-md-10">
                        {{ html()->text('last_name') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                        ->attribute('maxlength', 191) ->required() }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email')
                    }}

                    <div class="col-md-10">
                        {{ html()->email('email') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.email')) ->attribute('maxlength',
                        191) ->required() }}
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->

                <div class="form-group row">
                    {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                    <div class="table-responsive col-md-10">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>@lang('labels.backend.access.users.table.roles')</th>
                                    <th>@lang('labels.backend.access.users.table.permissions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @if($roles->count()) @foreach($roles as $role)
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="checkbox d-flex align-items-center">
                                                    {{ html()->label( html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name) ->class('switch-input') ->id('role-'.$role->id)
                                                    . '<span class="switch-slider"
                                                        data-checked="on" data-unchecked="off"></span>') ->class('switch switch-label
                                                    switch-pill switch-primary mr-2') ->for('role-'.$role->id) }} {{ html()->label(ucwords($role->name))->for('role-'.$role->id)
                                                    }}
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @if($role->id != 1) @if($role->permissions->count()) @foreach($role->permissions as $permission)
                                                <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }} @endforeach
                                                @else @lang('labels.general.none') @endif @else @lang('labels.backend.access.users.all_permissions')
                                                @endif
                                            </div>
                                        </div>
                                        <!--card-->
                                        @endforeach @endif
                                    </td>
                                    <td>
                                        @if($permissions->count()) @foreach($permissions as $permission)
                                        <div class="checkbox d-flex align-items-center">
                                            {{ html()->label( html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name) ->class('switch-input')
                                            ->id('permission-'.$permission->id) . '
                                            <span
                                                class="switch-slider" data-checked="on" data-unchecked="off"></span>') ->class('switch switch-label switch-pill switch-primary mr-2') ->for('permission-'.$permission->id)
                                                }} {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id)
                                                }}
                                        </div>
                                        @endforeach @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--col-->
                </div>
                <!--form-group-->
            </div>
            <!--col-->
        </div>
        <!--row-->
    </div>
    <!--card-body-->

    <div class="card-footer">
        <div class="row">
            <div class="col">
                {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
            </div>
            <!--col-->

            <div class="col text-right">
                {{ form_submit(__('buttons.general.crud.update')) }}
            </div>
            <!--row-->
        </div>
        <!--row-->
    </div>
    <!--card-footer-->
</div>
<!--card-->
{{ html()->closeModelForm() }} @endif
@endsection
 