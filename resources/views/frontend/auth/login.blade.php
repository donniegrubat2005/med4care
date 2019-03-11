@extends('frontend.layouts.app') 
@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title')) 
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        @include('includes.partials.messages')
        <div class="card-group">
            <div class="card p-4">
                <div class="card-body">
                    {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}

                    <h4 class="text-info">Med4Care</h4>
                    <p class="text-muted">Sign In to your account</p>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icon-user"></i>
                            </span>
                        </div>
                        {{ html()->email('email') ->class('form-control')->placeholder('Email Address') ->attribute('maxlength',
                        191) ->required()}}
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                        <i class="icon-lock"></i>
                                    </span>
                        </div>
                        {{ html()->password('password') ->class('form-control')->placeholder(__('validation.attributes.frontend.password')) ->required()
                        }}
                    </div>

                    <div class="input-group mb-2">
                        <div class="checkbox">
                            {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-primary px-4" type="submit">{{__('labels.frontend.auth.login_button')}}</button>
                        </div>
                        <div class="col-6 text-right">
                            <a class="btn btn-link px-0" href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                        </div>
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                <div class="card-body text-center">
                    <div>
                        <h2>About Us</h2>
                        <p>
                           Med4Care is an innovative health promotion and health care project consisting of a group of health professionals who want to take care of people's health, in the round. The association is structured as a consortium
                        </p>
                        <a href="{{ route('frontend.auth.register') }}" class="btn btn-primary active mt-3">Register Now!</a>
                        <a href="{{ route('frontend.contact') }}" class="btn btn-primary active mt-3">Contact Us!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 200px;"></div>
@endsection