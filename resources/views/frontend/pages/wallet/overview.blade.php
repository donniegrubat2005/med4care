@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Overview') @push('after-styles')
<style>
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

    img {
        min-height: 40px;
        max-height: 40px;
    }

    .row-overview {
        height: 720px;
        margin-left: 22px;
        float: left;
        overflow-y: scroll;
    }

    #row-overview::-webkit-scrollbar {
        width: 10px;
        background-color: #F5F5F5;
    }

    #row-overview::-webkit-scrollbar-track {
        border-radius: 3px;
        background: rgba(0, 0, 0, 0.0);
        border: 1px solid #ccc;
    }

    #row-overview::-webkit-scrollbar-thumb {
        border-radius: 3px;
        background: linear-gradient(left, #fff, #e4e4e4);
        border: 1px solid #aaa;
    }

    #row-overview::-webkit-scrollbar-thumb:hover {
        background: #fff;
    }

    #row-overview::-webkit-scrollbar-thumb:active {
        background: linear-gradient(left, #22ADD4, #1E98BA);
    }
</style>


@endpush 
@section('content')

<div class="row">
    @include('frontend.pages.wallet.wallet-include.navbalance', [ $nvActive, $walletTypes, $myAccounts] )
    <div class="col-md-9">
    @include('includes.partials.messages')
        <div class="card card-header-border">
            <div class="card-header">
                <strong>OVERVIEW</strong>
            </div>
            <div class="card-body row-overview" id="row-overview">
                <div class="row p-4">
                    <div class="col-md-12">
                        <div class="qa-message-list" id="wallmessages">
                            @if ($transactions) @foreach ($transactions as $transaction) @foreach ($transaction['transactions'] as $transac)
                            <div class="message-item" id="m1">
                                <div class="message-inner">
                                    <div class="message-head clearfix">
                                        <div class="user-detail">
                                            <h4 class="handle">{{ucwords($transac->type)}}</h4>
                                            <div class="post-meta ">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        {{$transac->type === 'deposit' ? 'To' : 'From ' }} :
                                                        <strong>
                                                            {{ ucwords($transaction['wallet']->name) }}
                                                        </strong>
                                                    </li>
                                                    <li>Amount : <strong> {{number_format($transac->amount, 2)}}</strong></li>
                                                    <li>Date : {{ \Carbon\Carbon::parse($transac->created_at)->format('M. d,
                                                        Y H:i:s A') }} </li>
                                                    <li>By : <strong>{{ ucwords(auth()->user()->first_name ) }}</strong> </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="qa-message-content" >
                                        @if ($transac->remarks) 
                                            {{ ucfirst($transac->remarks) }} 
                                        @else
                                            <i>No remarks available.</i> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach @endforeach @else
                            <div class="message-item">
                                <div class="message-inner">
                                    <div class="user-detail" style="padding:10px;">
                                        <h5 class="handle"><i>No Transaction Available</i></h5>
                                    </div>
                                </div>
                            </div>
                            @endif
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