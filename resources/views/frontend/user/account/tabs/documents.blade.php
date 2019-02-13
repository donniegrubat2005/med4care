<br>

<style>
    .img-doc {
        width: 100%;
        height: 260px;
    }
</style>
<div class="row" style="margin-left:10px;">
    <div class="col-md-10">
        <h5>
            List of Documents :
            <button class="btn btn-ghost-primary btn-sm collapsed " type="button" style="margin-top:-5px;" data-toggle="collapse" data-target="#addDocuments"
                aria-expanded="false" aria-controls="collapseExample"> 
                <i class="fa plus-circle"data-toggle="collapse" ></i> Add 
            </button>

        </h5>
        <div class="collapse" id="addDocuments" style="margin-top:10px;">
            <div class="row">
                <div class="col-md-4">
                    {{ html()->form('POST', url('account/add_documents'))->attribute('enctype', 'multipart/form-data')->open() }}
                    <div class="form-group">
                        {{ html()->file('file')->class('form-control')->required() }}
                    </div>
                    <div class="form-group">
                        {{ form_submit('Save')->class('btn btn-primary') }}
                    </div>
                    {{ html()->form()->close() }}
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="col-md-10">
            @empty(!$files)
            <div class="row">
                @foreach($files as $iKey => $file)
                    <div class="col-sm-2">
                        <div class="card">
                            <div class="card-header">
                               Document <strong>{{ $iKey+=1 }}</strong>
                            </div>
                            <div class="card-body p-0">
                                <img src="{{ $file['fileUrl'] }}" alt="{{$file['fileName']}}" id="{{$file['dbFile']}}" class="img-thumbnail d-block img-doc">
                            </div>
                            <div class="card-footer">

                                @if ($file['key'])
                                    <button class="btn btn-sm btn-outline-primary" type="submit" data-toggle="modal" data-target="#imgModel-{{$iKey}}">
                                        <i class="fa fa-eye"></i> View
                                    </button> 
                                @endif
                                <button class="btn btn-sm btn-outline-danger accntDeleteFile" type="reset" id="{{$file['docId']}}">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
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
                                    <img src="{{ $file['fileUrl'] }}" alt="{{$file['fileName']}}" class="img-thumbnail" style="width:100%">
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
                        <span>Click Add Button to insert documents.</span>
                    </div>
                </div>
            </div>
        @endempty
    </div>
</div>