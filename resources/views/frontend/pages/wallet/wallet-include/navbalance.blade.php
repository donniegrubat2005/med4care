<div class="col-md-3">
    <div class="card card-header-border" id="card-balance">
        <div class="card-header">
            <button class="btn btn-sm btn-primary float-left" title="Add Wallet" id="btnAddWallet" data-remodal-target="modal">
                <i class="icon-plus"></i>
            </button>
        </div>
        <div class="card-body ">
            <h1 class="card-title text-center text-info">
                {{ isset($balance) ? number_format($balance, 2) : '0.00'}}
                <p class="card-text text-muted small" style="font-size:14px; ">Total Balance</p>
            </h1>

        </div>
        <div class="list-group" id="nav-wallet">
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'overview' ? ' nw-active' : ''}}"
                href="{{route('frontend.user.wallet.overview')}}">
                <i class="icon-grid"></i> &nbsp;
                Overview
                <i class="fa fa-angle-right float-right mt-1"  aria-hidden="true"></i>
            </a>
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'create' ? ' nw-active' : ''}}"
                href="{{route('frontend.user.wallet.deposit.create')}}">
               <i class="icon-login"></i> &nbsp;
                Cash In
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'create' ? ' nw-active' : ''}}"
                href="{{route('frontend.user.wallet.deposit.create')}}">
               <i class="icon-logout"></i> &nbsp;
                Withdraw
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'create' ? ' nw-active' : ''}}"
                href="{{route('frontend.user.wallet.deposit.create')}}">
                <i class="fas fa-exchange-alt "></i> &nbsp;
                Transfer
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'create' ? ' nw-active' : ''}}"
                href="{{route('frontend.user.wallet.deposit.create')}}">
                <i class="icon-wallet"></i> &nbsp;
                Wallets
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<div class="remodal" id="modal-wallet" data-remodal-id="modal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
    {{-- <button data-remodal-action="close" class="remodal-close"></button> --}}
    <div class="card card-header-border">
        <div class="card-header">
            WALLET FORM :
        </div>
        <div class="card-body">
            {{ html()->form('POST', route('frontend.user.wallet.create'))->open() }}
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="account">Accounts <span class="text-danger">*</span></label>
                        <select name="account" id="account" class="form-control">
                                @foreach ($myAccounts as $myAccount)
                                    <option value="{{ $myAccount->id}}">{{ ucwords($myAccount->name) }}</option>
                                @endforeach
                            </select>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Required" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="walletType">Wallet Type <span class="text-danger">*</span></label>
                        <select name="walletType" id="walletType" class="form-control">
                                @foreach ($walletTypes as $walletType)
                                    <option value="{{$walletType->id}}">{{ ucwords($walletType->type) }}</option>
                                @endforeach
                            </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="amount">Deposit Amount <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input class="form-control" type="number" name="amount" placeholder="0" aria-label="0 " aria-describedby="my-addon" required>
                            <div class="input-group-append">
                                <span class="input-group-text" id="my-addon">.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="description">Description </label>
                        <textarea name="description" id="description" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="form-group col-sm-12">
                    <button type="button" data-remodal-action="cancel" class="btn btn-secondary float-left">Cancel</button>
                    <button type="submit" class="btn btn-primary float-right">Save Wallet</button>
                </div>
            </div>
            {{ html()->form()->close() }}


        </div>
    </div>
</div>
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
</style>

@endpush