@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Cash in') 
@section('content')
<div class="row">
    @include('frontend.pages.wallet.wallet-include.navbalance', [ $nvActive, $walletTypes, $myAccounts] )
    <div class="col-md-6">
    @include('includes.partials.messages')
        <div class="card card-header-border">
            <div class="card-header">
                <strong>CASH IN FORM</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        {{ html()->form('POST', route('frontend.user.wallet.cash-in.post'))->attribute('data-toggle', 'validator')->attribute('accept-charset','utf-8')->open()
                        }}
                        <div class="form-group">
                            <label for="wallet">Wallet <span class="text-danger">*</span></label>
                            <select class="form-control js-example-disabled-results" id="wallet" name="walletId" required>
                                    <option value="" disabled>Choose Wallet</option>
                                    @foreach ($wallets as $wallet)
                                        <option value="{{$wallet->id}}">{{ucwords($wallet->name)}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input class="form-control" id="amount" type="number" name="amount" placeholder="0" autocomplete="off" required>
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

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>

</div>
@endsection
 @push('after-scripts')
<script>
    $(document).ready(function () {
     $(".js-example-disabled-results").select2(); 
   
    });
</script>







































@endpush