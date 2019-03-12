@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Accounts') 
@section('content')
@include('includes.partials.messages')

<div class="card card-header-border">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6">
                <span>Accounts</span>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary btn-sm float-right" href="{{ route('frontend.user.wallet.account.create') }}">
                    Add Account
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-light" id="accounts">
            <thead class="thead-light">
                <tr>
                    <th>Account No.</th>
                    <th>Account Name</th>
                    <th>Account Type</th>
                    <th>Date Created</th>
                    <th class="text-center">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userAccounts as $uA)
                <tr>
                    <td>
                       <a href="{{ route('frontend.user.wallet.show', $uA->id) }}" class="text-info h6">
                        {{ $uA->account_no }}
                       </a>
                    </td>
                    <td>{{ ucwords( $uA->name ) }}</td>
                    <td>{{ ucwords( $uA->account_type ) }}</td>
                    <td>{{ $uA->created_at }}</td>
                    <td class="text-center">
                        <div class="dropdown ">
                            <button id="my-dropdown" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                More
                            </button>
                            <div class="dropdown-menu " aria-labelledby="my-dropdown">
                                <a class="dropdown-item " href="{{ route('frontend.user.wallet.show', $uA->id) }}">View Details</a>
                                <a class="dropdown-item " href="{{ route('frontend.user.wallet.list', $uA->account_no) }}">View Wallet</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
 @push('after-scripts')
<script>
    $(function(){
            // alert()
            $("#accounts").DataTable()
        })
</script>

@endpush 
@if (false) 
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
                {{ html()->form('POST', route('frontend.user.wallet.withdraw.post')) ->attribute('data-toggle', 'validator') ->attribute('accept-charset',
                'utf-8') ->attribute('id', 'myForm') ->open() }}
                <div id="smartwizard">
                    <ul class="ul-nav-wizard">
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-1">
                                    <span class="ul-label">Amount</span> 
                                </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-2">
                                    <span class="ul-label">Withraw </span> 
                                </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-3">
                                    <span class="ul-label">Remarks</span> 
                                </a>
                        </li>
                        <li class="col-md-3 col-sm-3 col-xs-12">
                            <a href="#step-4"> 
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
                                            <span class="font-weight-normal" style="font-size:16px;"> Amount To Withdraw</span>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="nf-email">Total Amount</label>
                                                        <div class="input-group">
                                                            <input class="form-control form-control-lg" id="amount" type="number" name="amount" placeholder="0" autocomplete="off" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">.00</span>
                                                            </div>
                                                        </div>
                                                        <div class="help-block with-errors text-danger"></div>
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
                            <div class="row" id="form-step-1" role="form" data-toggle="validator">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <span class="font-weight-normal" style="font-size:16px;"> Withraw Form:</span>
                                        </div>
                                        <div class="card-body">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link  active" href="#profile" role="tab" data-toggle="tab" aria-selected="true">Details:</a>
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
                                                                    <input class="form-control" name="accnt_no" id="name" value="{{auth()->user()->id_code}}" type="text" placeholder="Required"
                                                                        required>
                                                                    <div class="help-block with-errors text-danger"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label for="ccnumber">Withdraw From?</label>
                                                                    <input type="text" class="form-control" name="wallet_name" id="wallet_name">
                                                                    <input type="hidden" name="wallet_id" id="wallet_id">                                                                    {{-- <select name="withdraw_from" id="" class="form-control"
                                                                        required>  
                                                                                <option value="saving">Savings</option>
                                                                                <option value="saving">Current</option>
                                                                            </select> --}}
                                                                </div>
                                                                <div class="help-block with-errors text-danger"></div>
                                                            </div>
                                                        </div>
                                                        {{--
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
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
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
                        <div id="step-4" class="">
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
                                            <button type="submit" class="btn btn-primary" style="width: 100px;">Withdraw</button>
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
 @endif