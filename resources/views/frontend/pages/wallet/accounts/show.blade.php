@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ View') 
@section('content')
<div class="card card-header-border">
    <div class="card-header">
        <span class="h6">Wallet Account Information</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <a href="{{ route('frontend.user.wallet.accounts') }}" class="btn btn-secondary btn-sm float-left">
                                   <i class="fa fa-angle-left" aria-hidden="true"></i> Back
                                </a href="">
                                <a  class="btn btn-info btn-sm float-right" id="btnEdit" data-remodal-target="editAccntModal">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Account No.</th>
                            <td><strong class="text-info">{{$uAccount->account_no}}</strong></td>
                        </tr>
                        <tr>
                            <th>Account Name</th>
                            <td>{{ ucwords($uAccount->name) }}</td>
                        </tr>
                        <tr>
                            <th>Account Type</th>
                            <td>{{$uAccount->AccountType->type}}</td>
                        </tr>
                        <tr>
                            <th>Account Status</th>
                            <td>
                                @if ($uAccount->account_status)
                                <span class="badge badge-success">Active </span> @else
                                <span class="badge badge-danger">InActive</span> @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Date Created</th>
                            <td> {{ $uAccount->created_at }} </td>
                        </tr>
                        <tr>
                            <th>Balance</th>
                            <td><strong class="text-info">{{ number_format($walletBalance, 2) }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active text-info" data-toggle="tab" href="#home3" role="tab" aria-controls="home">
                            <i class="icon-wallet"></i> Wallets
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="home3" role="tabpanel">
                        <table class="table table-condensed table-light">
                            <thead>
                                <tr class="tr-active">
                                    <th>Wallet Name</th>
                                    <th>Wallet Type</th>
                                    <th>Wallet Status</th>
                                    <th>Wallet Balance</th>
                                    <th>Date Created</th>
                                    <th class="text-muted text-center">actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $wallet) 
                                    <tr>
                                        <td>{{ ucwords($wallet->name) }}</td>
                                        <td>{{ ucwords($wallet->walletType->type) }}</td>
                                        <td>
                                            @if ($wallet->wallet_status)
                                                <span class="badge badge-success"> Active </span>
                                            @else
                                                <span class="badge badge-success"> Inactive </span>
                                            @endif
                                        </td>
                                        <td><strong>{{ number_format($wallet->balance, 2) }}</strong></td>
                                        <td>{{ \Carbon\Carbon::parse($wallet->created_at)->format('M. d, Y') }}</td>
                                        <td class="text-muted text-center">
                                            <a href="{{ route('frontend.user.wallet.list', $uAccount->account_no) }}?wallet={{$wallet->id}}" class="nounderline">
                                               <i class="fas fa-eye"></i> View 
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="tr-active">
                                    <th >TOTAL BALANCE</th>
                                    <th >{{ number_format($walletBalance, 2) }}</th>
                                    <th colspan="4">&nbsp;</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="remodal" id="modal-edit-account" data-remodal-id="editAccntModal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
            <div class="card card-header-border">
                <div class="card-header">
                    WALLET FORM :
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection