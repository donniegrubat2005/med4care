@extends('frontend.layouts.app') 
@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title')) 
@section('content')


<style>
    #card-form {
        border-top: 3px solid #20a8d8;
    }

    #commentForm {
        width: 500px;
    }

    #commentForm label {
        width: 250px;
    }

    #commentForm label.error,
    #commentForm input.submit {
        margin-left: 253px;
    }

    #signupForm {
        width: 670px;
    }

    #signupForm label.error {
        margin-left: 10px;
        width: auto;
        display: inline;
    }

    #newsletter_topics label.error {
        display: none;
        margin-left: 103px;
    }
</style>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mx-4" id="card-form">
            <div class="card-body p-4">
                <h2>Register</h2>
                <p class="text-muted">Create your account</p>
                {{ html()->form('POST', route('frontend.auth.register.post'))->attribute('enctype', 'multipart/form-data')->open() }}
                @include('includes.partials.messages')

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-code"></i>
                        </span>
                    </div>
                    {{ html()->text('id_code')->class('form-control')->placeholder('ID Code')->attribute('maxlength',191) }}
                </div>
                <hr>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    {{ html()->text('first_name')->class('form-control')->placeholder(__('validation.attributes.frontend.first_name'))->attribute('maxlength',191)
                    }}
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-user"></i>
                        </span>
                    </div>
                    {{ html()->text('last_name')->class('form-control')->placeholder(__('validation.attributes.frontend.last_name'))->attribute('maxlength',191) }}
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    {{ html()->email('email') ->class('form-control')->placeholder(__('validation.attributes.frontend.email'))->attribute('maxlength',191)->required() }}
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    {{ html()->password('password') ->class('form-control') ->placeholder(__('validation.attributes.frontend.password')) ->required() }}
                </div>

                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="icon-lock"></i>
                        </span>
                    </div>
                    {{ html()->password('password_confirmation') ->class('form-control') ->placeholder('Confirm Password')->required() }}
                </div>
                <hr>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-key"></i>
                        </span>
                    </div>
                    <select class="form-control" id="userRole" name="userRole">
                        <option value="">Select User Role</option>
                        <option value="team-owner">Team Owner</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="row d-none" id="doc-content">
                    <hr>
                    <div class="col-md-12">
                        <label style="font-size:16px"> Documents <span class="text-danger">*</span> </label>
                        <button class="btn btn-sm  btn-ghost-primary float-right" type="button" id="btnAddFile">Add File</button>
                        <div class="input-group mb-3 d-none" id="file-holder">
                            <input class="form-control" type="file">
                            <div class="input-group-prepend">
                                <button type="button" class="input-group-text btn btn-sm rmvFile">
                                    <i class="icon-close text-danger"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-top:10px;" id="file-content"></div>
                </div>
                <hr> 
                <button type="submit" class="btn btn-block btn-primary"> Register </button>
                {{-- {{ form_submit('Register')->class('btn-block btn-primary') }} --}}
            </div>
            {{ html()->form()->close() }}  

            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-6">
                        <h6><a href="{{ route('frontend.index') }}">Home</a></h6>
                    </div>
                    <div class="col-6">
                        <h6 class="float-right"><a href="{{ route('frontend.auth.login') }}">Login</a></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
 @push('after-scripts') @if(config('access.captcha.registration')) {!! Captcha::script() !!} @endif 
@endpush