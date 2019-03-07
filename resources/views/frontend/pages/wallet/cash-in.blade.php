@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Cash in') 

@section('content')
    <div class="row">
        @include('frontend.pages.wallet.wallet-include.navbalance', [ $nvActive, $walletTypes, $myAccounts] )  
        <div class="col-md-9">
            @include('includes.partials.messages')
            <div class="card card-header-border">
                <div class="card-header">
                    <strong>CASH IN CONTENT</strong>
                </div>
                <div class="card-body row-overview" id="row-overview">
                    <div class="row p-4">
                        <div class="col-md-12">
                            <div class="qa-message-list" id="wallmessages">
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
    
                </div>
            </div>
        </div>

    </div>
     
@endsection