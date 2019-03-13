@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ View') 
@section('content')
<div class="card card-header-border">
    <div class="card-header">
        <span class="h6">Wallet Account Information</span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-light" id="table-info">
                    <tbody>
                        <tr>
                            <th>Account No.</th>
                            <td><strong clas="text-info">123532</strong></td>
                        </tr>
                        <tr>
                            <th>Account Name</th>
                            <td>Bryan Bahala</td>
                        </tr>
                        <tr>
                            <th>Account Type</th>
                            <td><a href="javascript:;">bryan.bahala@med4care.online </a></td>
                        </tr>
                        <tr>
                            <th>Account Status</th>
                            <td> <span class="badge badge-success">Active</span> </td>
                        </tr>
                        <tr>
                            <th>Date Created</th>
                            <td><a href="http://127.0.0.1:8000/admin/auth/user/6/unconfirm" data-toggle="tooltip" data-placement="top"
                                    title="Un-confirm" name="confirm_item"><span class="badge badge-success" style="cursor:pointer">Yes</span></a></td>
                        </tr>
                        <tr>
                            <td>TOTAL BALANCE</td>
                            <td>100</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div id="accordion" role="tablist">
                    <div class="card mb-0">
                        <div class="card-header" id="headingOne" role="tab">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">Collapsible Group Item #1</a>
                            </h5>
                        </div>
                        <div class="collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion" style="">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                                anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                heard of them accusamus labore sustainable VHS.</div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="headingTwo" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Collapsible Group Item #2</a>
                            </h5>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                                anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                heard of them accusamus labore sustainable VHS.</div>
                        </div>
                    </div>
                    <div class="card mb-0">
                        <div class="card-header" id="headingThree" role="tab">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Collapsible Group Item #3</a>
                            </h5>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.
                                3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt
                                laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin
                                coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes
                                anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                                occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't
                                heard of them accusamus labore sustainable VHS.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection