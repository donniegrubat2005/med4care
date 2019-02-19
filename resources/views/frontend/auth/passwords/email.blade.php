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

    <div class="row justify-content-center" >
        <div class="col-md-6">
           <div class="mx-4">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
           </div>
            <div class="card mx-4" id="card-form">
                <div class="card-body p-4">
                    <h4>Reset Password</h4>
                    <hr>
                    {{-- <p class="text-muted">Create your account</p> --}}
                    {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                            </span>
                        </div>
                        {{ html()->email('email')->class('form-control')->placeholder(__('validation.attributes.frontend.email'))->attribute('maxlength', 191)->required()->autofocus() }}
                    </div>
                    <hr> 
                    <button type="submit" class="btn btn-block btn-primary">
                        {{__('labels.frontend.passwords.send_password_reset_link_button')}} 
                    </button>
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

    <div style="height: 200px;"></div>
    
@endsection
