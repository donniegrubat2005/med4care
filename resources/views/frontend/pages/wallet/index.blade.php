@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Wallet Modules') 

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-12">
        <div class="card card-content bg-white">
            <a href="{{route('frontend.user.wallet.accounts')}}" class="card-hover">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="icon-people"></i> Wallet Accounts 
                    </h5>
                    <p class="card-text text-muted small">Create your wallet account here.</p>
                </div>
            </a>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('frontend.user.wallet.accounts')}}">
                    <span class="small font-weight-bold">View </span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-1 text-center">
        <i class="icons font-2xl d-block mt-5 cui-arrow-right text-muted" style="font-weight: bold"></i>
    </div> --}}
    {{-- <div class="col-md-3 col-sm-12">
        <div class="card card-content bg-white">
            <a href="{{route('frontend.user.wallet.overview')}}" class="card-hover">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="icon-wallet"></i>
                        Wallet
                    </h5>
                    <p class="card-text text-muted small">Manage your wallet here.</p>
                </div>
            </a>
            <div class="card-footer px-3 py-2">
                <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('frontend.user.wallet.overview')}}">
                    <span class="small font-weight-bold">View </span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-md-1 text-center">
        <i class="icons font-2xl d-block mt-5 cui-arrow-right"></i>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="card card-content  bg-white">
            <a href="{{route('frontend.user.wallet.deposit.index')}}" class="card-hover">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fa fa-database" aria-hidden="true"></i> Manage Cash
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
    </div> --}}
</div>
@endsection


@push('after-styles')
    <link rel="stylesheet" href="{{ asset('resources/frontend/sass/frontend/wallet/wallet-index.css') }}">
@endpush 
