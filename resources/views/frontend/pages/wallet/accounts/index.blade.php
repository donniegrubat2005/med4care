@extends('frontend.layouts.app') 
@section('title', app_name() . ' ~ Accounts') 

@section('content')
    @include('includes.partials.messages')
    <div class="card card-header-border">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <span>Accounts</span>
                </div>
                <div class="col-md-6">
                    <a class="btn btn-primary btn-sm float-right" href="{{ route('frontend.user.wallet.account.create') }}">
                        Add Account
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-light table-hover" id="accounts">
                <thead class="thead-light">
                    <tr>
                        <th>Account No.</th>
                        <th>Account Name</th>
                        <th>Account Type</th>
                        <th>Account Status</th>
                        <th>Date Created</th>
                        <th class="text-center text-muted">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($userAccounts as $uA)
                    <tr>
                        <td>
                            <a href="{{ route('frontend.user.wallet.show', $uA->id) }}" class="text-info h6">
                            {{ $uA->account_no }}
                        </a>
                        </td>
                        <td>{{ ucwords( $uA->name ) }}</td>
                        <td>{{ ucwords( $uA->account_type ) }}</td>
                        <td>
                            @if ( $uA->status )
                                <span class="badge badge-success">Active</span> 
                            @else
                                <span class="badge badge-danger">Inactive</span> 
                            @endif
                        </td>
                        <td>{{ $uA->created_at }}</td>
                        <td class="text-center">
                            <div class="btn-group" >
                                <a href="{{ route('frontend.user.wallet.show', $uA->id) }}" class="btn btn-success  btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <button class="btn btn-info  btn-sm" title="Edit" >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button id="my-dropdown " class="btn btn-secondary btn-sm  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    More
                                </button>
                                <div class="dropdown-menu" aria-labelledby="my-dropdown">
                                    <a class="dropdown-item" href="#">Deactivate</a>
                                    <a class="dropdown-item" href="{{ route('frontend.user.wallet.list', $uA->account_no) }}">View Wallets</a>
                                    <a class="dropdown-item" href="#">View Cards</a>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        $(function(){
            $("#accounts").DataTable();
        });
    </script>
@endpush 