@extends('frontend.layouts.app') 
@section('title', app_name() . ' | My Wallet | Deposit') 
@section('content')
<div class="row">
    {{--
    @include('pages.wallet.wallet-include.navbalance'); --}}


    <div class="col-md-9">
        <div class="card" id="card-content">
            <div class="card-body">
                <h5 class="card-title">Deposit Form</h5>
                <div class="card p-4">
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"><strong>Depositor</strong> <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control " id="text-input" type="text" name="text-input" placeholder="Requried">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="text-input"><strong>Deposit Type</strong></label>
                            <div class="col-md-9">
                                <input class="form-control " id="text-input" type="text" name="text-input" placeholder="Requried">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="email-input"><strong>Remarks</strong></label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="" id="" cols="30" rows="4" placeholder="text-here"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="password-input"><strong>Amount To Deposit </strong><span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input class="form-control form-control-lg" id="password-input" type="number" placeholder="0.00">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary float-right">Save</button>
            </div>
        </div>



        <div class="ui-widget">
            <label for="tags">Tags: </label>
            <input id="tags">
        </div>

    </div>


</div>
@endsection
 @push('after-scripts')

@endpush
@push('after-styles')
<style>
    #card-content {
        border-top: 3px solid #20a8d8;
    }

    #card-balance {
        border-top: 3px solid #20a8d8;
    }

    #card-balance .card-body {
        padding: 35px;
    }
</style>

@endpush