@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Add Wallets Accounts') 

@push('after-scripts')
    <style>
        .ul-nav-wizard .ul-label {
            font-size: 16px;
            font-weight: lighter;
            margin-left: -5px;
            z-index: 9999;
        }

        .ul-nav-wizard li a {
            margin-top: 24px;
        }
    </style>
@endpush 

@section('content')
    @include('includes.partials.messages')
    <div class="card card-header-border">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-md-3 p-5">
                    <button class="btn btn-ghost-primary btn-lg disabled  text-info" type="button" style="margin-top:-20px;">
                        <i class="icon-people"></i>
                        <span >Wallet Account</span>
                    </button>
                </div>
                <div class="col-md-6">
                    {{ html()->form('POST', route('frontend.user.wallet.account.post')) ->attribute('data-toggle', 'validator') ->attribute('accept-charset',
                    'utf-8') ->attribute('id', 'myForm') ->open() }}
                    <div id="smartwizard">
                        <ul class="ul-nav-wizard">
                            <li class="col-md-4 col-sm-3 col-xs-12">
                                <a href="#step-1">
                                    <span class="ul-label">Accounts</span> 
                                </a>
                            </li>
                            <li class="col-md-4 col-sm-3 col-xs-12">
                                <a href="#step-2">
                                    <span class="ul-label">Remarks</span> 
                                </a>
                            </li>
                            <li class="col-md-4 col-sm-3 col-xs-12">
                                <a href="#step-3"> 
                                    <span class="ul-label">Done</span> 
                                </a>
                            </li>
                        </ul>
                        <hr class="mt-5">

                        <div class="mt-2" style="border:none;">
                            <div id="step-1">
                                <div class="row" id="form-step-0" role="form" data-toggle="validator">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header ">
                                                <span class="font-weight-normal" style="font-size:16px;"> Account Details</span>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="accountNo">Account No.</label>
                                                            <div class="input-group">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="my-addon">
                                                                        <i class="icon-key"></i>
                                                                    </span>
                                                                </div>
                                                                <input class="form-control" type="text" id="accountNo" name="accountNo" placeholder="These field is auto generated" readonly>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Name <span class="text-danger">*</span></label>
                                                            <input class="form-control" id="name" type="text" name="name" autocomplete="off" required>
                                                            <div class="help-block with-errors text-danger"></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="nf-email">Account Type <span class="text-danger">*</span></label>
                                                            <select name="accountType" class="form-control" required>
                                                                <option value="" >Choose Type</option>
                                                                @foreach ($acctTypes as $type)
                                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="help-block with-errors text-danger"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-2" class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Remarks Content
                                            </div>
                                            <div class="card-body" style="padding: 30px 50px 50px 50px;">
                                                <label for="remarks">Your Remarks here.</label>
                                                <textarea name="remarks" id="remarks" cols="5" rows="4" class="form-control" placeholder=". . . . . ."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="step-3" class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <i class="fas fa-check  text-success"></i> Done
                                            </div>
                                            <div class="card-body text-center">
                                                <p>
                                                    Thank your for using our application.
                                                </p>
                                                <button type="submit" class="btn btn-primary" style="width: 200px;">Save Account</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{ html()->form()->close() }}
                </div>
                <div class="col-md-3 ">
                    <a href="{{route('frontend.user.wallet.index')}}" class="float-right" style="margin-right:15px; margin-top:10px;">
                        <i class="fa fa-angle-left" aria-hidden="true"></i>  Back
                    </a>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
@endsection

@push('after-scripts')
    <script type="text/javascript">
        $(function(){
            var doc = $(document);
            $('#smartwizard').smartWizard({
                theme: 'dots',
                toolbarSettings: {
                    toolbarPosition: 'bottom', // none, top, bottom, both
                    toolbarButtonPosition: 'center', // left, right
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    // toolbarExtraButtons: [
                    //     $('<button></button>').text('Finish').addClass('btn btn-info').on('click', function(){ 
                    //         alert('Finsih button click');                           
                    //     }),
                    //     $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function(){ 
                    //         alert('Cancel button click');                            
                    //     })
                    // ]
                }, 

            });
            
            $("#smartwizard").on("leaveStep", function (e, anchorObject, stepNumber, stepDirection) {
                var elmForm = $("#form-step-" + stepNumber);
                // stepDirection === 'forward' :- this condition allows to do the form validation
                // only on forward navigation, that makes easy navigation on backwards still do the validation when going next

                if (stepDirection === 'forward' && elmForm) {
                    
                    elmForm.validator('validate');

                    var elmErr = $(elmForm).find('.has-error');

                    if (elmErr && elmErr.length > 0) {
                        return false;
                    }
                }
                return true;

            });

            $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection) {
                // Enable finish button only on last step
                if (stepNumber == 3) {
                    $('.btn-finish').removeClass('disabled');
                } else {
                    $('.btn-finish').addClass('disabled');
                }
            });

            doc.on('click', '#btnAddRecipient', function(){
                alert()
            });
        });

    </script>
@endpush