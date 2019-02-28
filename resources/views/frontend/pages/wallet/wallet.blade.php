@extends('frontend.layouts.app') 
@section('title', app_name() . ' | My Wallet') @push('after-styles')
    <style>
        .card-content .card-body {
            padding: 40px;
        }

        .card-content {
            border-radius: 8px;
        }

        .card-content .card-footer {
            border-bottom-right-radius: 8px;
            border-bottom-left-radius: 8px;
        }

        .card-hover:hover {
            background-color: #f5f5f5;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
@endpush 
@section('content')
    <div class="row" style="margin-top:50px;">
        <div class="col-md-3 col-sm-12">
            <div class="card card-content  bg-white">
                <a href="{{route('frontend.user.wallet.deposit.index')}}" class="card-hover">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fa fa-database" aria-hidden="true"></i> Deposit
                        </h5>
                        <p class="card-text text-muted small">Deposit your money here.</p>
                    </div>
                </a>
                <div class="card-footer px-3 py-2">
                    <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('frontend.user.wallet.deposit.index')}}">
                        <span class="small font-weight-bold">View </span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card card-content bg-white">        
                <a href="{{route('frontend.user.wallet.withdraw.index')}}" class="card-hover">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="cui-account-logout"></i> Withdraw
                        </h5>
                        <p class="card-text text-muted small">Withdraw your money here.</p>
                    </div>
                </a>
                <div class="card-footer px-3 py-2">
                    <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('frontend.user.wallet.withdraw.index')}}">
                        <span class="small font-weight-bold">View </span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-12">
            <div class="card card-content bg-white">       
                {{-- {{route('frontend.user.wallet.transfer.index')}}  --}}
                <a href="javascript:;" class="card-hover">
                    <div class="card-body">
                        <h5 class="card-title">
                            <i class="fas fa-exchange-alt" aria-hidden="true"></i> Transfer
                        </h5>
                        <p class="card-text text-muted small">Transfer your account here.</p>
                    </div>
                </a>
                <div class="card-footer px-3 py-2">
                    <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('frontend.user.wallet.transfer.index')}}">
                        <span class="small font-weight-bold">View </span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection