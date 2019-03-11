@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Withdraw') 
@section('content')
<div class="row">
    @include('frontend.pages.wallet.wallet-include.navbalance', [ $nvActive, $walletTypes, $myAccounts] )
    <div class="col-md-6">
        @include('includes.partials.messages')
        <div class="card card-header-border">
            <div class="card-header">
                <strong>WITHDRAW FORM</strong>
            </div>
            {{ html()->form('POST', route('frontend.user.wallet.withdraw.post'))->attribute('data-toggle', 'validator')->attribute('accept-charset','utf-8')->open() }}

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            <label for="wallet">Withdraw from? <span class="text-danger">*</span></label>
                            <select class="form-control opt-wallet" id="wallet" name="walletId" required>
                                <option value="" >Choose Wallet</option>
                                @foreach ($wallets as $wallet)
                                    <option value="{{$wallet->id}}">{{ucwords($wallet->name)}}</option>
                                @endforeach
                                <option value="all">All</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3" >
                        <div class="callout callout-info text-center bg-light" style="padding:20px; margin-top:-1px;" >
                            <strong class="h4" id="balance">0.00</strong>
                            <div class="chart-wrapper">
                                <canvas id="sparkline-chart-1" width="100" height="30"></canvas>
                            </div>
                            <br>
                            <small class="text-muted">Wallet Balance</small>
                            <input type="hidden"  id="walletBalance">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="amount">Amount to Withdraw <span class="text-danger">*</span> </label>
                            <div class="input-group">
                                <input class="form-control" id="wrAmount" type="number" name="amount" placeholder="0" autocomplete="off" required>
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





            <div class="card-footer">

            </div>
        </div>
    </div>
</div>
@endsection
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
        $(".opt-wallet").select2(); 
      
        doc.on('change','#wallet', function(){
            var walletId = $(this).val();
           
            if(walletId !==''){
                $.get(mainUrl + '/wallet/walletBalance/'+ walletId,
                    function (data, textStatus, jqXHR) {
                        $('#balance').show().html(data.toDisplay);
                        $('#walletBalance').val(data.balance);
                    },"json"
                );
            }
            else{
                $('#balance').show().html('0.00');
                $('#walletBalance').val(0);
            }

        });

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



    });
   
</script>

@endpush