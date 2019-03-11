@extends('backend.layouts.app') 
@section('title', app_name() . ' | ' . __('labels.backend.access.users.management')) 

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection

@push('after-styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> --}}
@endpush
 
@section('content')

 

    
@include('includes.partials.messages') 

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-6" style="margin-top:5px;">
                <strong>User Management <small>Active Users</small></strong>
            </div>
            <div class="col-md-6">
                <a class="btn btn-primary  btn-sm float-right" href="{{route('admin.auth.user.create')}}" role="button">
                New User
            </a>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr class="table-active">
                        <th><span style="margin-left:20px;">@lang('labels.backend.access.users.table.last_name')</span></th>
                        <th>@lang('labels.backend.access.users.table.first_name')</th>
                        <th>@lang('labels.backend.access.users.table.email')</th>
                        <th>@lang('labels.backend.access.users.table.roles')</th>
                        <th class="text-center">@lang('labels.backend.access.users.table.confirmed')</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">@lang('labels.backend.access.users.table.other_permissions')</th>
                        <th class="text-center">@lang('labels.backend.access.users.table.social')</th>
                        <th class="text-center">@lang('labels.backend.access.users.table.last_updated')</th>
                        <th class="text-center">@lang('labels.general.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><span style="margin-left:20px;">{{ ucwords($user->last_name) }}</span></td>
                        <td>{{ ucwords($user->first_name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{!! $user->roles_label !!}</td>
                        <td class="text-center">{!! $user->confirmed_label !!}</td>
                        <td class="text-center">
                            @if ($user->active)
                                <label class="badge badge-success">Active</label>
                            @else
                                <label class="badge badge-danger">Inactive</label>
                            @endif
                        </td>
                        <td class="text-center">{!! $user->permissions_label !!}</td>
                        <td class="text-center">{!! $user->social_buttons !!}</td>
                        <td class="text-center">{{ $user->updated_at->diffForHumans() }}</td>
                        <td class="text-center">{!! $user->action_buttons !!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $users->total() !!} {{ trans_choice('labels.backend.access.users.table.total', $users->total()) }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-right">
                    {!! $users->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@push('after-scripts')

    {{-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function(){
            $(document).ready( function () {
                $('#myTable').DataTable();
            });
        })
    </script> --}}


@endpush