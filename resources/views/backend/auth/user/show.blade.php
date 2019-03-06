@extends('backend.layouts.app') 
@section('title', __('labels.backend.access.users.management') . ' | ' . __('labels.backend.access.users.view'))

@section('breadcrumb-links')
    @include('backend.auth.user.includes.breadcrumb-links')
@endsection
 
@section('content')

<style>
    .img-holder div {
        border-radius: 50%;
        border: 1px solid lightblue;
    }

    .profile-img {
        width: 100%;
        border-radius: 50%;
        padding: 5px;
        position: relative;
    }
   
</style>


@if (true)
    @include('includes.partials.messages')

<div class="card">

    <div class="card-header">
        <h4 class="card-title mb-0">
            @lang('labels.backend.access.users.management')
            <small class="text-muted">
                @lang('labels.backend.access.users.view')
            </small>
            <div class="btn-group float-right" role="group" aria-label="Basic example">
                {!! $user->action_buttons !!}
            </div>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border:none">
                    <div class="card-body" >
                        <br>
                        <div class="row" style="margin-left:5px;">
                            <div class="col-md-2 img-holder">
                                <div>
                                    <img src="{{ $user->picture }}" class="user-profile-image profile-img" />
                                </div>
                            </div>
                            <div class="col-md-4">
                            @include('backend.auth.user.show.tabs.userInfo')
                            </div>
                            <div class="col-md-3">
                                <h5>Permissions</h5>
                                <ul class="list-unstyled">
                                    @if ($user->permissions->count() > 0) @foreach ($user->permissions as $permission)
                                    <li style="margin-bottom:3px;">
                                        <i class="fa fa-check-circle text-info" aria-hidden="true"></i>
                                        <span style="font-size:16px;">{{ ucwords($permission['name']) }}</span>
                                    </li>
                                    @endforeach @else
                                    <li>N/A</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body" id="progress-content">
                                        <h6 class="card-title">{{$percent}}% {{ $percent === 100 ? 'Done' : 'Completion' }} </h6>
                                        <div class="progress">
                                            <div class="progress-bar" style="width:{{$percent}}%">{{$percent}}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show tr-active" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">
                                           <i class="cui-file"></i> Documents
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="home3" role="tabpanel">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <p class="badge badge-primary" id="delContent" style="position:absolute; font-size: 14px;">
                                                    Available Documents
                                                    {{-- <button class="btn btn-danger btn-sm" type="button"> 
                                                        <i class="fas fa-trash"></i> 
                                                        Delete
                                                    </button> --}}
                                                </p>
                                                <table class="table table-responsive-sm table-bordered" id="tblUserFile">
                                                    <thead>
                                                        <tr class="tr-active">
                                                            <th>
                                                                <div class="custom-control custom-checkbox" id="cmdSelectAll">
                                                                    <input type="checkbox" class="custom-control-input" id="selectAll">
                                                                    <label class="custom-control-label" for="selectAll">File Name</label>
                                                                </div>
                                                            </th>
                                                            <th>File Size</th>
                                                            <th >Date Upload</th>
                                                            <th class="text-muted small text-center">action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-docs">
                                                        @foreach ($files as $ik => $item)
                                                        <tr>
                                                            <td class="label-checkbox">
                                                                <div class="custom-control custom-checkbox cmdCheckbox">
                                                                    <input type="checkbox" class="custom-control-input" id="{{ $ik }}-file">
                                                                    <label class="custom-control-label" for="{{ $ik }}-file">
                                                                        <a href="{{$item->filePath}}" target="_blank" class="text-info fileName">{{$item->fileName}}</a>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                            <td>{{$item->fileSize}}</td>
                                                            <td>{{$item->dateCreated}}</td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    {{-- <button class="btn btn-danger btn-sm accntDeleteFile" type="button" id="{{$item->docId}}">
                                                                        <i class="icon-trash"></i>
                                                                    </button> --}}
                                                                    <a href="{{ route('frontend.user.download', $item->docId ) }}" class="btn btn-primary btn-sm" title="Download">
                                                                        <i class=" cui-cloud-download"></i>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>    
                                            </div>
                                        </div>
                                        
                                      

                                        @if (false)
                                            @empty(!$files)
                                            <div class="row">
                                                @foreach($files as $iKey => $file)
                                                <div class="col-sm-2">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            {{ $file['dbFile'] }}
                                                        </div>
                                                        <div class="card-body p-0">
                                                            {!! $file['files'] !!} {{-- <img src="{{ $file['fileUrl'] }}" alt="{{$file['fileName']}}"
                                                                id="{{$file['dbFile']}}" class="img-thumbnail d-block img-doc"> --}}
                                                        </div>
                                                        <div class="card-footer">

                                                            @if ($file['key'])
                                                            <button class="btn btn-sm btn-outline-success" type="submit" data-toggle="modal" data-target="#imgModel-{{$iKey}}">
                                                                    <i class="fa fa-eye"></i> 
                                                                </button>                                                        @endif

                                                            <a href="{{ route('admin.auth.user.download', $file['docId'] ) }}" class="btn btn-sm btn-outline-info">
                                                                    <i class="fa fa-download"></i> 
                                                                </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="imgModel-{{$iKey}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="border-radius:0px; border:1px solid #20a8d8">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">{{$file['fileName']}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                            </div>
                                                            <div class="modal-body p-0">
                                                                {!! $file['files'] !!} {{-- <img src="{{ $file['fileUrl'] }}"
                                                                    alt="{{$file['fileName']}}" class="img-thumbnail" style="width:100%">                                                            --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="alert alert-danger" role="alert">
                                                        <strong><i>No documents available.</i></strong>
                                                    </div>
                                                </div>
                                            </div>
                                            @endempty
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif
@endsection



@push('after-scripts')
    <script>
    $(function(){
        $('#tblUserFile').DataTable({
            searching: true, paging: true, info: true,
            "lengthChange": false
        });

        $(document).on('click', '#selectAll', function(){
          
            var tbody = $('#tbody-docs').find("input[type=checkbox]");
            
            if ($(this).is(':checked')) {
               tbody.attr('checked', true);

               $('#delContent').removeClass('d-none');
            }
            else{
               tbody.removeAttr('checked');
             
               $('#delContent').addClass('d-none');

            }
        });



        $(document).on('click', '.cmdCheckbox', function(){
            // alert()
        });
    });
    </script>
@endpush