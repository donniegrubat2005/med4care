@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Transfer') 
@section('content')
<div class="row">
    @include('frontend.pages.wallet.wallet-include.navbalance', [ $nvActive, $walletTypes, $myAccounts] )
    <div class="col-md-9">
        <div class="card card-header-border">
            <div class="card-header">
                <strong>TRANSFER FORM</strong>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="text-input">Transfer Type</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="select1" name="select1">
                                            <option value="0">Please Type</option>
                                            <option value="paid">Paid</option>
                                            <option value="refund">Refund</option>
                                            <option value="3">Gift</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="email-input">Email Input</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="password-input">Password</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="password-input" type="password" name="password-input" placeholder="Password" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="date-input">Date Input</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="date-input" type="date" name="date-input" placeholder="date">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="disabled-input">Disabled Input</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="disabled-input" type="text" name="disabled-input" placeholder="Disabled" disabled="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="textarea-input">Textarea</label>
                                    <div class="col-md-9">
                                        <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select1">Select</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="select1" name="select1">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select2">Select Large</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-control-lg" id="select2" name="select2">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="select3">Select Small</label>
                                    <div class="col-md-9">
                                        <select class="form-control form-control-sm" id="select3" name="select3">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="disabledSelect">Disabled Select</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="disabledSelect" disabled="">
                                        <option value="0">Please select</option>
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="multiple-select">Multiple select</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="multiple-select" name="multiple-select" size="5" multiple="">
                                        <option value="1">Option #1</option>
                                        <option value="2">Option #2</option>
                                        <option value="3">Option #3</option>
                                        <option value="4">Option #4</option>
                                        <option value="5">Option #5</option>
                                        <option value="6">Option #6</option>
                                        <option value="7">Option #7</option>
                                        <option value="8">Option #8</option>
                                        <option value="9">Option #9</option>
                                        <option value="10">Option #10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Radios</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio1" type="radio" value="radio1" name="radios">
                                            <label class="form-check-label" for="radio1">Option 1</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio2" type="radio" value="radio2" name="radios">
                                            <label class="form-check-label" for="radio2">Option 2</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="radio3" type="radio" value="radio2" name="radios">
                                            <label class="form-check-label" for="radio3">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Inline Radios</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio1" type="radio" value="option1" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio1">One</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio2" type="radio" value="option2" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio2">Two</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-radio3" type="radio" value="option3" name="inline-radios">
                                            <label class="form-check-label" for="inline-radio3">Three</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Checkboxes</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" id="check1" type="checkbox" value="">
                                            <label class="form-check-label" for="check1">Option 1</label>
                                        </div>
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" id="check2" type="checkbox" value="">
                                            <label class="form-check-label" for="check2">Option 2</label>
                                        </div>
                                        <div class="form-check checkbox">
                                            <input class="form-check-input" id="check3" type="checkbox" value="">
                                            <label class="form-check-label" for="check3">Option 3</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Inline Checkboxes</label>
                                    <div class="col-md-9 col-form-label">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox1" type="checkbox" value="check1">
                                            <label class="form-check-label" for="inline-checkbox1">One</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox2" type="checkbox" value="check2">
                                            <label class="form-check-label" for="inline-checkbox2">Two</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-checkbox3" type="checkbox" value="check3">
                                            <label class="form-check-label" for="inline-checkbox3">Three</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="file-input">File input</label>
                                    <div class="col-md-9">
                                        <input id="file-input" type="file" name="file-input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label" for="file-multiple-input">Multiple File input</label>
                                    <div class="col-md-9">
                                        <input id="file-multiple-input" type="file" name="file-multiple-input" multiple="">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-md-10">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="tr-active">
                                        <th>Account No</th>
                                        <th>Wallet Name</th>
                                        <th>Amount To Transfer</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td>
                                            <textarea rows="2" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td><input type="text" class="form-control"></td>
                                        <td>
                                            <textarea rows="2" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <ul class="list-unstyled">
                                <li>+ Add another Line</li>
                            </ul>
                        </div>
                    </div>

                    {{--
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control" id="name" type="text" placeholder="Enter your name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="ccnumber">Credit Card Number</label>
                                <input class="form-control" id="ccnumber" type="text" placeholder="0000 0000 0000 0000">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="ccmonth">Month</label>
                            <select class="form-control" id="ccmonth">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ccyear">Year</label>
                            <select class="form-control" id="ccyear">
                                <option>2014</option>
                                <option>2015</option>
                                <option>2016</option>
                                <option>2017</option>
                                <option>2018</option>
                                <option>2019</option>
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                                </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="cvv">CVV/CVC</label>
                                <input class="form-control" id="cvv" type="text" placeholder="123">
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection