<div class="col-md-3">
    <div class="card card-header-border" id="card-balance">
        <div class="card-header">
            Navigation
        </div>
        <div class="card-body ">
            <h3 class="card-title text-center" > 
                <i class="fas fa-dollar-sign text-muted"></i> <span style="font-size:40px;" class="text-info ">
                    {{ isset($balance) ? number_format($balance, 2) : '0.00'}}
                </span>
                <p class="card-text text-muted small" style="font-size:14px; margin-top:5px;">Total Balance</p>
            </h3>
        </div>
        <div class="list-group" id="nav-wallet">
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'overview' ? ' nw-active' : ''}}"  href="{{route('frontend.user.wallet.deposit.index')}}">
                Overview
                <i class="fa fa-angle-right float-right mt-1"  aria-hidden="true"></i>
            </a>
            <a class="list-group-item list-group-item-action flex-column align-items-start text-default {{ $nvActive === 'create' ? ' nw-active' : ''}}" href="{{route('frontend.user.wallet.deposit.create')}}">
                New Deposit
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a>
            {{-- <a class="list-group-item list-group-item-action flex-column align-items-start text-default" id="dptype" href="javascript:;"
            data-toggle="modal" data-target="#newDepType"> 
                New Deposit Type
                <i class="fa fa-angle-right float-right mt-1" aria-hidden="true"></i>
            </a> --}}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newDepType" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-info" style="margin-top:100px;" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title">Deposit Type Form</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Type Name <span class="text-danger">*</span></label>
                            <input class="form-control" id="name" type="text" placeholder="Reuired">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ccnumber">Description</label>
                            <textarea name="" id="" class="form-control" rows="4" placeholder="Text here..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <p class="float-right">
                                <button class="btn btn-secondary btn-sm" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                                <button class="btn btn-primary btn-sm" style="width: 70px;">Save</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>