@extends('frontend.layouts.app') 
@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title')) 



 
@section('content')

@if (true)
<div class="row justify-content-center align-items-center">
    <div class="col col-sm-8 align-self-center">
        <div class="card">
            <div class="card-header">
                <strong>
                    @lang('labels.frontend.auth.register_box_title')
                </strong>
            </div>
            <!--card-header-->

            <div class="card-body">
                {{ html()->form('POST', route('frontend.auth.register.post'))->attribute('enctype', 'multipart/form-data')->open() }}
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.code'))->for('code') }}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-light input-group-text" id="basic-addon1">{{$code}}</button>
                                </div>
                                {{ html()->text('code')->class('form-control')->placeholder(__('validation.attributes.frontend.code'))->attribute('maxlength',191) }}  
                            </div>
                        </div>
                        <!--col-->
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }} <span class="text-danger">*</span>
                            {{ html()->text('first_name')->class('form-control')->placeholder(__('validation.attributes.frontend.first_name'))->attribute('maxlength',191) }}
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }} <span class="text-danger">*</span>
                            {{ html()->text('last_name')->class('form-control')->placeholder(__('validation.attributes.frontend.last_name'))->attribute('maxlength', 191) }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->

                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}  <span class="text-danger">*</span>
                            {{ html()->email('email') ->class('form-control')->placeholder(__('validation.attributes.frontend.email'))->attribute('maxlength', 191)->required() }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>

                
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}   <span class="text-danger">*</span>
                            {{ html()->password('password') ->class('form-control') ->placeholder(__('validation.attributes.frontend.password')) ->required() }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                    <!--row-->
    
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}   <span class="text-danger">*</span>
                            {{ html()->password('password_confirmation') ->class('form-control') ->placeholder(__('validation.attributes.frontend.password_confirmation'))->required() }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->
                <hr>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            {{ html()->label(__('validation.attributes.frontend.user_type.name'))->for('user_type.name') }}  <span class="text-danger">*</span>
                            <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input sel-uType" type="radio" checked name="userType" id="teamOwner" value="{{__('validation.attributes.frontend.user_type.value.1')}}">
                                <label class="form-check-label" for="teamOwner">
                                    {{  __('validation.attributes.frontend.user_type.value.1') }}
                                </label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input sel-uType" type="radio" name="userType" id="user" value="{{__('validation.attributes.frontend.user_type.value.0')}}">
                                <label class="form-check-label" for="user">
                                    {{  __('validation.attributes.frontend.user_type.value.0') }}
                                </label>
                            </div>
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                
                <div class="row " style="margin-top:10px;" id="row-document">
                    <div class="col">
                        <div class="form-group">
                           
                            <div class="label-doc">
                                {{ html()->label(__('validation.attributes.frontend.document.name')) }}  <span class="text-danger">*</span>
                                <button class="btn btn-secondary  btn-sm" type="button" id="btn-add-dile">
                                    {{__('validation.attributes.frontend.document.btn_name')}}
                                </button>
                            </div>

                            <div class="input-group file-group d-none" id="file-clone">
                                <input type="file" class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary rmvFile" type="button" title="Delete file?">
                                        <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="file-content">
                                <div class="input-group file-group">
                                    <input type="file" class="form-control" name="file[]">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary rmvFile"  type="button" title="Delete file?">
                                            <i class="fa fa-times-circle text-danger" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr>


                @if(config('access.captcha.registration'))
                <div class="row">
                    <div class="col">
                        {!! Captcha::display() !!} {{ html()->hidden('captcha_status', 'true') }}
                    </div>
                    <!--col-->
                </div>
                <!--row-->
                @endif

                <div class="row">
                    <div class="col">
                        <div class="form-group mb-0 clearfix">
                            {{ form_submit(__('labels.frontend.auth.register_button')) }}
                        </div>
                        <!--form-group-->
                    </div>
                    <!--col-->
                </div>
                <!--row-->
                {{ html()->form()->close() }}

                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            {!! $socialiteLinks !!}
                        </div>
                    </div>
                    <!--/ .col -->
                </div>
                <!-- / .row -->

            </div>



            <!-- card-body -->
        </div>
        <!-- card -->
    </div>
    <!-- col-md-8 -->
</div>
<!-- row -->
@endif

<div class="row">
    <div class="col-md-4">

    </div>
</div>


 
@endsection
 @push('after-scripts') 

    @if(config('access.captcha.registration')) 
        {!! Captcha::script() !!} 
    @endif 
    
    <script>
        $(function(){
           var doc = $(document);
           doc.on('click', '.sel-uType', function(){
               var userType = $(this).attr('id');
               if(userType === 'teamOwner'){
                $('#row-document').removeClass('d-none');

                var cloneContent = $('#file-clone').clone();
                cloneContent.find('input[type=file]').attr('name', 'file[]');
                cloneContent.removeClass('d-none');
                $('.file-content').append(cloneContent.removeAttr('id'));
               
               }
               else{
                 $('#row-document').addClass('d-none');
                 $('.file-content').html(null)
               }
           })
           doc.on('click', '#btn-add-dile', function(){
               var cloneContent = $('#file-clone').clone();
               cloneContent.find('input[type=file]').attr('name', 'file[]');
               cloneContent.removeClass('d-none');
               $('.file-content').append(cloneContent.removeAttr('id'));
           })
           doc.on('click', '.rmvFile', function(){
                if(confirm('Cancel File ?')){
                    $(this).parent().parent().remove();
                }
           })
        })

    </script>

 {{-- @push('') --}}
@endpush