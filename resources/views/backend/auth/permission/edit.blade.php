@extends('backend.layouts.app') 
@section('title', __('labels.backend.access.roles.management') . ' | ' . __('labels.backend.access.roles.edit'))

@section('content')

@if (true)
    
<div class="row">
    <div class="col-md-6">
        {{ html()->modelForm($permissions, 'PATCH', route('admin.auth.permission.update', $permissions))->class('form-horizontal')->open()
        }}
        <div class="card">
            <div class="card-header">
                <strong>Permission Management</strong>
                <small class="text-muted">Edit Permission</small>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label('Name') ->class('col-md-2 form-control-label') ->for('name')
                            }}

                            <div class="col-md-10">
                                {{ html()->text('name') 
                                ->class('form-control') 
                                ->placeholder('Required') 
                                ->attribute('maxlength',191)
                                ->required() 
                                }}
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
                        {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                    </div>
                    <!--col-->

                    <div class="col text-right">
                        {{ form_submit(__('buttons.general.crud.update')) }}
                    </div>
                    <!--col-->
                </div>
                <!--row-->
            </div>
            <!--card-footer-->
        </div>
        {{ html()->closeModelForm() }}
    </div>
</div>
@endif

@endsection