@extends('backend.layouts.app') 
@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title')) 
@section('content')

{{ html()->form('POST', route('admin.auth.permission.store'))->class('form-horizontal')->open() }}

<div class="row">
    <div class="col-md-6">
     
        @include('includes.partials.messages') 

        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Permissions Management</strong>
                    </div>
                    {{-- <div class="col-md-6">
                        <a href="{{ route('admin.auth.permission.create') }}" class="float-right btn btn-sm btn-primary">New</a>
                    </div> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group row">
                            {{ html()->label("Name")
                                ->class('col-md-2 form-control-label')
                                ->for('name') }}

                            <div class="col-md-10">
                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder("Required")
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->
                        </div><!--form-group-->
                    </div><!--col-->
                </div><!--row-->
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col">
                        {{ form_cancel(route('admin.auth.permission.index'), __('buttons.general.cancel')) }}
                    </div><!--col-->

                    <div class="col text-right">
                        {{ form_submit('Save') }}
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div>
</div>

{{ html()->form()->close() }}

@endsection