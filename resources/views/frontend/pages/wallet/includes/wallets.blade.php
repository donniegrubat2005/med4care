<div class="col-md-3" style="margin-top:-5px;">
    <table class="table table-hover table-condensed table-bordered card-header-border" id="tblWallet">
        <thead class="">
            <tr class="tr-active ">
                <th>
                    All Wallet
                    <button class="btn btn-primary btn-sm float-right" id="btnAddWallet" data-remodal-target="modal">
                        <i class="icon-plus"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($wallets as $wallet)
            <tr>
                <td>
                    <a href="{{ route('frontend.user.wallet.list', $wallet->account_no) }}?wallet={{$wallet->wallet_id}}" class="nounderline">
                        <div class="row">
                            <div class="col-sm-12">
                                <strong class="text-info">{{ ucwords($wallet->wallet_name) }}</strong>
                            </div>
                            <div class="col-md-6">
                                <span class="text-muted"> {{ ucwords($wallet->wallet_type) }}</span>
                            </div>
                            <div class="col-md-6">
                                <h6 class="float-right text-muted">
                                    {{ number_format($wallet->wallet_balance, 2) }}
                                </h6>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="remodal" id="modal-wallet" data-remodal-id="modal" data-remodal-options="hashTracking: false, closeOnOutsideClick: false">
        <div class="card card-header-border">
            <div class="card-header">
                WALLET FORM :
            </div>
            <div class="card-body">
                {{ html()->form('POST', route('frontend.user.wallet.create'))->open() }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="hidden" name="account" value="{{$userAcctId}}">
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

</div>