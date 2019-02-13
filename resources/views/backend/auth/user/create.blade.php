@extends('backend.layouts.app') 
@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.create'))

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

    {{ html()->form('POST', route('admin.auth.user.store'))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open()}}
        <div class="card">
            <div class="card-header">
                <strong>User Management</strong>
                <small class="text-muted">User Create</small>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 col-sm-2">
                        <div class="profile-image">
                            <img class="img-thumbnail user-image" src="{{gravatar()->get($logged_in_user->email, ['size' => 50]) }}">
                        </div>
                        <span class="btn btn-block btn-outline-primary btn-file  " style="">
                                <span style="">Select User Image</span>
                        <input type="file" name="image-file" id="createImg">
                        </span>
                    </div>
                    <div class="col-md-10 col-sm-10">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-6" style="margin-top:5px;">
                                        <strong>User Account Content :</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="float-right">
                                                {{ form_submit('Create User')->class('btn-primary') }}
                                                {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                                            </span>
                                    </div>
                                </div>
                                <!--row-->
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            {{ html()->label('User Code')->class('col-md-3 form-control-label')->for('code') }}

                                            <div class="col-md-9">
                                                {{ html()->text('code') ->class('form-control') ->placeholder('User ID Code, Tax ID, Etc.') ->attribute('maxlength', 191)
                                                ->autofocus() }}
                                            </div>
                                            <!--col-->
                                        </div>
                                        <!--form-group-->
                                        <div class="form-group row">
                                            {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-3 form-control-label')->for('first_name')
                                            }}

                                            <div class="col-md-9">
                                                {{ html()->text('first_name') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                                ->attribute('maxlength', 191) ->required() ->autofocus() }}
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

                                        <div class="form-group row">
                                            {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-3 form-control-label')->for('password')
                                            }}

                                            <div class="col-md-9">
                                                {{ html()->password('password') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.password'))
                                                ->required() }}
                                            </div>
                                            <!--col-->
                                        </div>
                                        <!--form-group-->

                                        <div class="form-group row">
                                            {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-3 form-control-label')->for('password_confirmation')
                                            }}

                                            <div class="col-md-9">
                                                {{ html()->password('password_confirmation') ->class('form-control') ->placeholder(__('validation.attributes.backend.access.users.password_confirmation'))
                                                ->required() }}
                                            </div>
                                            <!--col-->
                                        </div>
                                        <!--form-group-->

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    {{ html()->label(__('validation.attributes.backend.access.users.active'))->class('col-md-6 form-control-label')->for('active')
                                                    }}
                                                    <div class="col-md-6">
                                                        <label class="switch switch-label switch-pill switch-primary">
                                                                {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                                            </label>
                                                    </div>
                                                    <!--col-->
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                @if(! config('access.users.requires_approval'))
                                                <div class="form-group row">
                                                    {{ html()->label(__('validation.attributes.backend.access.users.send_confirmation_email') . '<br/>'
                                                    . '<small>' .  __('strings.backend.access.users.if_confirmed_off') . '</small>')->class('col-md-8
                                                    form-control-label')->for('confirmation_email') }}
                                                    <div class="col-md-2">
                                                        <label class="switch switch-label switch-pill switch-primary">
                                                                    {{ html()->checkbox('confirmation_email', true, '1')->class('switch-input') }}
                                                                    <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                                                </label>
                                                    </div>
                                                    <!--col-->
                                                </div>
                                                <!--form-group-->
                                                @endif
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    {{ html()->label(__('validation.attributes.backend.access.users.confirmed'))->class('col-md-6 form-control-label')->for('confirmed')
                                                    }}
                                                    <div class="col-md-6">
                                                        <label class="switch switch-label switch-pill switch-primary">
                                                                {{ html()->checkbox('confirmed', true, '1')->class('switch-input') }}
                                                                <span class="switch-slider" data-checked="yes" data-unchecked="no"></span>
                                                            </label>
                                                    </div>
                                                    <!--col-->
                                                </div>
                                                <!--col-->
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <h5 class="card-title">Documents :</h5>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-ghost-primary float-right" id="btnCDocument"> <i class="fa fa-plus-o" aria-hidden="true"></i> Document </button>
                                            </div>
                                        </div>

                                        <div class="form-group  d-none" id="file-holder">
                                            <div class="input-group">
                                                <input class="form-control" type="file">
                                                <span class="input-group-append">
                                                        <button class="btn btn-ghost-danger btnCRmvDoc" type="button">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </span>
                                            </div>
                                        </div>

                                        <div class="row-fluid files-content">
                                            <div class="form-group ">
                                                <div class="input-group">
                                                    <input class="form-control" type="file" name="files[]">
                                                    <span class="input-group-append">
                                                            <button class="btn btn-ghost-danger btnCRmvDoc" type="button">
                                                                <i class="fa fa-times"></i>
                                                            </button>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            {{-- {{ html()->label(__('labels.backend.access.users.table.abilities'))->class('col-md-2 form-control-label') }} --}}
                                            <div class="col-md-12">
                                                <h5 class="card-title">Abilities <span>:</span></h5>
                                                <div class="table-responsive">
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
                                                                                {{ html()->label( html()->checkbox('roles[]', old('roles') && in_array($role->name, old('roles')) ? true : false, $role->name)
                                                                                ->class('switch-input') ->id('role-'.$role->id) .
                                                                                '
                                                                                <span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                                ->class('switch switch-label switch-pill switch-primary
                                                                                mr-2') ->for('role-'.$role->id) }} {{ html()->label(ucwords($role->name))->for('role-'.$role->id)
                                                                                }}
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            @if($role->id != 1) @if($role->permissions->count()) @foreach($role->permissions as $permission)
                                                                            <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name)
                                                                            }} @endforeach @else @lang('labels.general.none') @endif
                                                                            @else @lang('labels.backend.access.users.all_permissions')
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                    <!--card-->
                                                                    @endforeach @endif
                                                                </td>
                                                                <td>
                                                                    @if($permissions->count()) @foreach($permissions as $permission)
                                                                    <div class="checkbox d-flex align-items-center">
                                                                        {{ html()->label( html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions'))
                                                                        ? true : false, $permission->name) ->class('switch-input')
                                                                        ->id('permission-'.$permission->id) . '
                                                                        <span class="switch-slider" data-checked="on" data-unchecked="off"></span>')
                                                                        ->class('switch switch-label switch-pill switch-primary mr-2')
                                                                        ->for('permission-'.$permission->id) }} {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id)
                                                                        }}
                                                                    </div>
                                                                    @endforeach @endif
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!--col-->
                                        </div>
                                        <!--form-group-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{ html()->form()->close() }}

@endsection

