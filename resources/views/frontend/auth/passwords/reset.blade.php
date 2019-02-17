@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))



@push('after-styles')
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
@endpush

@section('content')


 
    <div class="row justify-content-center" style="margin-top:-100px;">
        <div class="col-md-7">
            <div class="mx-4">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card mx-4" id="card-form">
                <div class="card-body p-4">
                    <h4>New Password</h4>
                    <hr>
                    {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                    {{ html()->hidden('token', $token) }}

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{ html()->email('email')->class('form-control')->placeholder(__('validation.attributes.frontend.email'))->attribute('maxlength', 191)->required() }}
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        {{ html()->password('password')->class('form-control')->placeholder('New Password')->required() }}
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-lock"></i>
                            </span>
                        </div>
                        {{ html()->password('password_confirmation')->class('form-control')->placeholder('New Password Confirm')->required() }}
                    </div>
                    <hr> 
                    <button type="submit" class="btn btn-block btn-primary"> Reset Password </button>
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

    @if (false)
        
    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>
                        @lang('labels.frontend.passwords.reset_password_box_title')
                    </strong>
                </div><!--card-header-->

                <div class="card-body">

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                        {{ html()->hidden('token', $token) }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                    {{ html()->form()->close() }}
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
    @endif


@endsection
