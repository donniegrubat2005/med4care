@extends('frontend.layouts.app') 
@section('title', app_name() . ' | My Wallet | Deposit') 
@section('content')
<div class="row">
    @include('frontend.pages.wallet.wallet-include.navbalance' , [$nvActive, $balance]) {{--
    <div class="col-md-9">
        <div class="card" id="card-content">
            <div class="card-body">
                <h5 class="card-title">Deposit Form</h5>
                <div class="card p-4">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  active" href="#profile" role="tab" data-toggle="tab" aria-selected="true">Form:</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="profile">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Account No <span class="text-danger">*</span></label>
                                            <input class="form-control" id="name" type="text" placeholder="Required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Savings Type</label>
                                            <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Date Of Birth</label>
                                            <input class="form-control" id="name" type="date" placeholder="Required">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="ccnumber">Phone</label>
                                                    <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="ccnumber">&nbsp;</label>
                                                    <input class="form-control" id="ccnumber" type="text" placeholder="Required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                <textarea class="form-control" name="" id="" cols="30" rows="4" placeholder=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-md-3 col-form-label" for="amount">
                                <strong>Amount To Deposit </strong><span class="text-danger">*</span>
                            </label>
                            <div class="col-md-9">

                                <input class="form-control form-control-lg" id="amount" type="number" placeholder="0.00">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-footer">

                <button class="btn btn-primary float-right">Save</button>

            </div>
        </div>




    </div> --}}

    <div class="col-md-9">
        @include('includes.partials.messages')
        <div class="card card-header-border">
            <div class="card-header">
                Deposit Content
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-controls="home">Deposit Form:</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                {{ html()->form('POST', route('frontend.user.wallet.deposit.post'))->open() }}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="depositName">Deposit Name <span class="text-danger">*</span></label>
                                            <input class="form-control" id="depositName" type="text" name="depositName">
                                            <input id="walletId" type="hidden" name="walletId">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Deposit Type <span class="text-danger">*</span></label>
                                            <select name="depositType" id="" class="form-control">  
                                                <option value="">Choose Type</option>
                                                <option value="current">Current</option>                                                
                                                <option value="savings">Savings</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="amount">Amount <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input class="form-control" id="amount" type="number" name="amount" placeholder="0" autocomplete="off">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="ccnumber">Remarks </label>
                                            <textarea name="description" id="description" cols="30" rows="4" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" style="width: 70px;">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>
@endsection

@push('after-scripts')
  

@endpush