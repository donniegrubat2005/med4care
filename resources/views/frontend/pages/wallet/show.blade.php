@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Wallet List') 
@section('content')
<div class="row">
    @include('frontend.pages.wallet.includes.wallet-nav')

    <div class="col-md-9">
        @include('includes.partials.messages')
        <div class="card card-header-border">
            <div class="card-header">
                <strong>Wallet Content</strong>
                <a href="{{ route('frontend.user.wallet.accounts') }}" class="float-right">
                    < Back 
                </a>
            </div>
            <div class="card-body">
                @if (!$key)
                    <div class="alert alert-primary" role="alert">
                        <strong class="alert-heading">Info.</strong>
                        <br> Please select wallet from left side.
                    </div>
                @else
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item ">
                            <a class="nav-link active show" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                                <i class="icon-grid"></i> Overview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">
                                <i class="icon-login"></i> Deposit / Cash In  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab" aria-controls="messages" aria-selected="false">
                                <i class="icon-logout"></i> Withdraw / Cash out  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#messages4" role="tab" aria-controls="messages" aria-selected="false">
                                <i class="fas fa-exchange-alt"></i> Transfer
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active show" id="home3" role="tabpanel" style="padding-top: 0px; padding-bottom: 0px; ">
                            <div class="row">
                                <div class="col-md-4 " style="background-color:#f9f9f9">
                                    <div class="wallet-content ml-4 mt-5">
                                        <div class="card-title">
                                            <h5>{{ ucwords($wallet->name) }}</h5>
                                        </div>
                                        <ul class="list-unstyled ">
                                            <li>
                                                <strong>Type</strong> : {{ ucwords($wallet->walletType->type) }}
                                            </li>
                                            <li>
                                                <strong>Date</strong> : {{ \Carbon\Carbon::parse($wallet->created_at)->format('M.d,
                                                Y H:i:s a.') }} </li>
                                            </li>
                                            <li class="mt-1">
                                                <strong>Description</strong> :
                                                <p> {{ ucwords($wallet->description) }}</p>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-8">
                                    <div class="row mt-4">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                            <table class="table table-condensed table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td class="txn-info-sections" rowspan="3">
                                                            <div class="bal-content text-center mt-4">
                                                                <span class="bal-label">
                                                                    <strong>Balance</strong>
                                                                </span>
                                                                <h5 class="text-info bal-amount">
                                                                    <strong>{{number_format($wallet->balance, 2)}}</strong>
                                                                </h5>
                                                            </div>
                                                        </td>
                                                        <td colspan="2">
                                                            <span class="pull-left ">
                                                                Total Deposit
                                                            </span>
                                                            <span class="pull-right ">
                                                                <strong>
                                                                    @if (isset($totalTransaction[0]))
                                                                        {{ number_format($totalTransaction[0]['amount'], 2) }}
                                                                    @else
                                                                        {{ number_format(0, 2) }}
                                                                    @endif
                                                                </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <span class="pull-left">
                                                                Total Transfer
                                                            </span>
                                                            <span class="pull-right ">
                                                            <strong>
                                                                    @if (isset($totalTransaction[1]))
                                                                        {{ number_format($totalTransaction[1]['amount'], 2) }}
                                                                    @else
                                                                        {{ number_format(0, 2) }}
                                                                    @endif
                                                            </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <span class="pull-left"> 
                                                                Total  Withdraw
                                                            </span>
                                                            <span class="pull-right"> 
                                                            <strong>
                                                                    @if (isset($totalTransaction[2]))
                                                                        {{ number_format($totalTransaction[2]['amount'], 2) }}
                                                                    @else
                                                                        {{ number_format(0, 2) }}
                                                                    @endif
                                                            </strong>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-10 mb-5">
                                            <div class="qa-message-list" id="wallmessages">
                                                @foreach ($wallet->transactions as $transac)
                                                <div class="message-item" id="m1">
                                                    <div class="message-inner">
                                                        <div class="message-head clearfix">
                                                            <div class="user-detail p-0">
                                                                <h5 class="handle">{{ ucwords($transac->type) }}</h5>
                                                                <div class="post-meta">
                                                                    <ul class="list-unstyled">
                                                                        <li>
                                                                            Amount : <u class="text-danger"> {{number_format($transac->amount, 2)}}</u>
                                                                        </li>
                                                                        <li>
                                                                            Date : {{ \Carbon\Carbon::parse($transac->created_at)->format('M.d, Y H:i:s a.') }}
                                                                        </li>
                                                                        <li>
                                                                            Transact By : {{ ucwords(auth()->user()->first_name ) }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="qa-message-content">
                                                            {{ ucfirst($transac->remarks) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach  
                                            </div>
                                        </div>
                                        <div class="col-md-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="profile3" role="tabpanel">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <br><br>
                                    <div class="card">
                                        <div class="card-header">
                                            Deposit Form
                                        </div>
                                        <div class="card-body">
                                            {{ html()->form('POST', route('frontend.user.wallet.cash-in.post'))->attribute('data-toggle', 'validator')->attribute('accept-charset','utf-8')->open()
                                            }}
                                            <div class="form-group">
                                                <label for="amount">Amount To Deposit <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="hidden" id="wallet" name="walletId" value="{{ $wallet->id }}">
                                                    <input class="form-control form-control-lg" id="amount" type="number" name="amount" placeholder="0" autocomplete="off" required>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="my-addon">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="street">Remarks</label>
                                                <textarea cols="30" name="remarks" rows="4" class="form-control" placeholder="Remarks here."></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>
                                            {{ html()->form()->close() }}
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <div class="tab-pane " id="messages3" role="tabpanel">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="card mt-5">
                                        <div class="card-header">
                                            Withdraw Form
                                        </div>
                                        <div class="card-body">
                                            {{ html()->form('POST', route('frontend.user.wallet.withdraw.post'))->attribute('data-toggle', 'validator')->attribute('accept-charset','utf-8')->open()
                                            }}

                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="callout callout-info text-center bg-light" style="padding:20px; margin-top:-1px;">
                                                            <strong class="h4" id="balance">0.00</strong>
                                                            <div class="chart-wrapper">
                                                                <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                                                            </div>
                                                            <br>
                                                            <small class="text-muted">Wallet Balance</small>
                                                            <input type="hidden" id="walletBalance">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <label for="amount">Amount to Withdraw <span class="text-danger">*</span> </label>
                                                            <div class="input-group">
                                                                <input type="hidden" id="wallet" name="walletId" value="{{$wallet->id}}">
                                                                <input class="form-control form-control-lg" id="wrAmount" type="number" name="amount" placeholder="0" autocomplete="off" required>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="my-addon">.00</span>
                                                                </div>
                                                            </div>
                                                            <code class="d-none" id="wrInputError"><strong>OPPS</strong>. Please input less than or equal <strong>Wallet Balance.</strong></code>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <label for="street">Reason / Remarks</label>
                                                        <textarea cols="30" name="remarks" rows="4" class="form-control" placeholder="Text here."></textarea>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        <button class="btn btn-secondary">WITHDRAW</button>
                                                    </div>
                                                </div>
                                            </div>

                                            {{ html()->form()->close() }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                        <div class="tab-pane " id="messages4" role="tabpanel">
                            {{ html()->form('POST', route('frontend.user.wallet.transfer.post'))->open() }}
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card mt-5">
                                                    <div class="card-header">
                                                        Transfer Form
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="transferCode">Transfer Code</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" id="transferCode" type="text" name="transferCode" placeholder="These field is auto generated" readonly>
                                                                <input type="hidden" name="from_wallet_id" value="{{$key}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-md-3 col-form-label" for="email-input">Reason / Remarks</label>
                                                            <div class="col-md-9">
                                                                <textarea name="reason" class="form-control" id="" rows="4"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label style="font-size:16px;">Account Form</label>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr class="tr-active">
                                                            <th class="w-25">Account No</th>
                                                            <th style="width: 30%;">Wallet Name</th>
                                                            <th style="width: 20%;">Amount</th>
                                                            <th>Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-transfer">
                                                        <tr class="d-none" id="tr-row">
                                                            <td class="p-0">
                                                                <input type="text" class="form-control account_no" name="account_no[]" placeholder="Tap to search account..." >
                                                            </td>
                                                            <td class="p-0">
                                                                <select name="walletId[]" class="form-control wallet-holder" readonly>
                                                                    <option value="">Choose Wallet</option>
                                                                </select>
                                                            </td>
                                                            <td class="p-0">
                                                                <input type="number" name="amount[]" class="form-control" placeholder="0.00">
                                                            </td>
                                                            <td class="p-0">
                                                                <input type="text" name="comment[]" class="form-control" placeholder="Text here">
                                                                <a href="javascript:;" class="text-danger cmdRmvRow" style="position: absolute; right:0; margin-right:-10px; margin-top:-30px;">
                                                                    <i class="fas fa-times"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <a href="javascript:;" id="add-transfer-line"> + Add Another line.</a>
                                            </div>
                                        </div>
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                                <div class="form-group ">
                                                    <button type="submit" class="btn btn-primary float-right">Transfer </button>
                                                </div>
                                        </div>
                                    </div>

                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    
</div>
@endsection
 @push('after-styles')
<style>
    #modal-wallet {
        border-radius: 10px;
        background-color: transparent
    }

    #modal-wallet .card {
        text-align: left !important;
    }

    #modal-wallet .remodal-close {
        margin-left: 666px;
    }

    .bal-content .bal-label {
        font-size: 18px;
    }

    .bal-content .bal-amount {
        font-size: 35px;
        font-weight: lighter
    }

    .message-item {
        margin-bottom: 25px;
        margin-left: 40px;
        position: relative;
    }

    .message-item .message-inner {
        background: #f5f5f5;
        border: 1px solid #f5f5f5;
        border-radius: 3px;
        padding: 10px;
        position: relative;
    }

    .message-item .message-inner:before {
        border-right: 10px solid #f5f5f5;
        border-style: solid;
        border-width: 10px;
        color: rgba(0, 0, 0, 0);
        content: "";
        display: block;
        height: 0;
        position: absolute;
        left: -20px;
        top: 6px;
        width: 0;
    }

    .message-item .message-inner:after {
        border-right: 10px solid #f5f5f5;
        border-style: solid;
        border-width: 10px;
        color: rgba(0, 0, 0, 0);
        content: "";
        display: block;
        height: 0;
        position: absolute;
        left: -18px;
        top: 6px;
        width: 0;
    }

    .message-item:before {
        background: #fff;
        border-radius: 2px;
        bottom: -30px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.2);
        content: "";
        height: 100%;
        left: -30px;
        position: absolute;
        width: 3px;
    }

    .message-item:after {
        background: #fff;
        border: 2px solid #63c2de;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        content: "";
        height: 15px;
        left: -36px;
        position: absolute;
        top: 10px;
        width: 15px;
    }

    .clearfix:before,
    .clearfix:after {
        content: " ";
        display: table;
    }

    .message-item .message-head {
        border-bottom: 1px solid #eee;
        margin-bottom: 8px;
        padding-bottom: 8px;
    }

    .message-item .message-head .avatar {
        margin-right: 20px;
    }

    .message-item .message-head .user-detail {
        overflow: hidden;
    }

    .message-item .message-head .user-detail h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0;
    }

    .message-item .message-head .post-meta {
        float: left;
        padding: 0 15px 0 0;
    }

    .message-item .message-head .post-meta>div {
        color: #333;
        font-weight: bold;
        text-align: right;
    }

    .post-meta>div {
        color: #777;
        font-size: 12px;
        line-height: 22px;
    }

    .message-item .message-head .post-meta>div {
        color: #333;
        font-weight: bold;
        text-align: right;
    }

    .post-meta>div {
        color: #777;
        font-size: 12px;
        line-height: 22px;
    }
</style>

@endpush 
@push('after-scripts')

<script>
    var doc = $(document);
    var mainUrl = $('#mainUrl').attr('uval');
    
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': decodeURIComponent(/XSRF-Token=([^;]*)/ig.exec(document.cookie)[1])
        }
    });

    doc.ready(function () {

        var loadBalances = function(url){
            $.get(url + '/wallet/walletBalance/'+ '{{isset($wallet->id) ? $wallet->id : null }}',
                function (data, textStatus, jqXHR) {
                    $('#balance').show().html(data.toDisplay);
                    $('#walletBalance').val(data.balance);
                },"json"
            );
            
        }
        loadBalances(mainUrl)
      
        doc.on('keyup', '#wrAmount', function(){
            var wBalance = parseFloat($('#walletBalance').val());
            var inputNum = parseFloat($(this).val());
            if(wBalance < inputNum){
                $('#wrInputError').removeClass('d-none')
            }
            else{
                $('#wrInputError').addClass('d-none')
            }
            
        });

        doc.on('focusout', '#wrAmount', function(){
            var wBalance = parseFloat($('#walletBalance').val());
            var inputNum = parseFloat($(this).val());
            if(inputNum > wBalance){
                $(this).val(null)
            }
        });

        doc.on('click', '#add-transfer-line', function(){
            loadTableTransfer(mainUrl)
        });

        doc.on('click', '.cmdRmvRow', function(){
            var tBody = $('#tbody-transfer');
            var trCount = tBody.find('.tr-row').length;
            if(trCount > 1){
                $(this).parent().parent().remove()
            }
        });

        var userAccounts = function(url, selector){
            $.get(url+'/wallet/loadAccounts',
                function (data, textStatus, jqXHR) {
                    $(selector).autocomplete({
                        source: data,
                        select: function(event, ui) {
                            var parent = $(this).parent();
                            $.get(url+"/wallet/getWallet/" + ui.item.value,
                                function (resp, textStatus, jqXHR) {
                                    var option = $(parent).siblings('td').find('.wallet-holder');
                                    option.removeAttr('readonly');
                                    option.show().html(resp);
                                },
                                "json"
                            );
                        }
                    });
                },"json"
            );
        }
        loadTableTransfer(mainUrl);


        function loadTableTransfer(url){
            var trClone = $('#tr-row').clone();
            var selector = trClone.find('td:first-child .account_no');
            userAccounts(url, selector);
            $('#tbody-transfer').append(trClone.removeClass('d-none').removeAttr('id').addClass('tr-row'));
        }
        


        $('#tblWallet').DataTable({
            "lengthChange": false,
            "ordering": false,
            "bInfo": false,
            "searching": false,
        });
       

    });

</script>



















@endpush