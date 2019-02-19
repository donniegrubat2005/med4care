@extends('backend.layouts.app') 
@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title')) 
@section('content')

<div class="row">
    <div class="col-md-6">
        @include('includes.partials.messages') 
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <strong>Permissions Management</strong>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.auth.permission.create') }}" class="float-right btn btn-sm btn-primary">New</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 ">
                <table class="table">
                    <thead>
                        <tr class=" table-active">
                            <th ><span style="margin-left:10px;">Permissions</span></th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($permissions))
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td> <span style="margin-left:10px;"> {{ ucwords($permission['permission']) }}</span> </td>
                                    <td> {{ ucwords($permission['role']) }} </td>
                                    <td><a href="{{ route('admin.auth.permission.edit', $permission['id']) }}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a></td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection