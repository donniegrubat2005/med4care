@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Transfer') @push('after-scripts')
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
<div class="card card-header-border">
    <div class="card-body p-0">
        <div class="row">
            <div class="col-md-3 p-5">
                <button class="btn btn-ghost-primary btn-lg disabled  text-info" type="button" style="margin-top:-20px;">
                        <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                        <span >Transfer Money</span>
                    </button>
            </div>
            <div class="col-md-6">
                <div id="smartwizard">
                    <ul class="ul-nav-wizard">
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-1">
                                <span class="ul-label">Amount</span> 
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-2">
                                <span class="ul-label">To</span> 
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-3">
                                <span class="ul-label">Recepient</span> 
                            </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-4"> 
                                <span class="ul-label">Pay</span> 
                            </a>
                        </li>
                    </ul>
                    <hr class="mt-5">

                    <div class="mt-2" style="border:none;">
                        <div id="step-1">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header ">
                                            <span class="font-weight-normal" style="font-size:16px;"> Amount To Transfer</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="nf-email">You Send</label>
                                                        <div class="input-group">
                                                            <input class="form-control form-control-lg" id="input3-group1" type="text" name="input3-group1" placeholder="0">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
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
                                            <span class="font-weight-normal" style="font-size:16px;"> Recipient Details</span>
                                            <button class="btn btn-primary btn-sm float-right" id="btnAddRecipient">
                                                <i class="fas fa-plus"></i>    
                                            </button>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link  active" href="#profile" role="tab" data-toggle="tab" aria-selected="true">Form:</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div role="tabpanel" class="tab-pane active" id="profile">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Account No <span class="text-danger">*</span></label>
                                                                    <input class="form-control" id="name" type="text" placeholder="Required">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="ccnumber">Savings Type</label>
                                                                    <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="name">Date Of Birth</label>
                                                                    <input class="form-control" id="name" type="date" placeholder="Required">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ccnumber">Phone</label>
                                                                            <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <div class="form-group">
                                                                            <label for="ccnumber">&nbsp;</label>
                                                                            <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="step-3" class="">
                            Step Content
                        </div>
                        <div id="step-4" class="">
                            Step Content
                        </div>
                    </div>
                </div>
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
                toolbarExtraButtons: [
                    $('<button></button>').text('Finish').addClass('btn btn-info').on('click', function(){ 
                        alert('Finsih button click');                           
                    }),
                    $('<button></button>').text('Cancel').addClass('btn btn-danger').on('click', function(){ 
                        alert('Cancel button click');                            
                    })
                ]
            }, 

        });
        doc.on('click', '#btnAddRecipient', function(){
            alert()
        });
    });
    

</script>





















@endpush