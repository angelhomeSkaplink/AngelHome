@extends('layouts.app')
@section('htmlheader_title')
    @lang("Document Add")
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
        <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Document")</strong></h3>
    </div>
</div>
@endsection
@section('main-content')
<div class="box box-primary">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-6">
            <form action="{{ url('save_document') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="POST">
                {{ csrf_field() }}
                <div class="box box-body">
                    <h4 class="text-center text-aqua">@lang("msg.Add New Document Name")</h4>
                    <div class="form-group has-feedback">
                        <label for="">@lang("msg.Document Type")</label>
                        <select class="form-control" name="doc_type" id="">
                            <option value="legal_doc">@lang("msg.Legal Document")</option>
                            <option value="lease_signing">@lang("msg.Lease Signing")</option>
                            <option value="policy_doc">@lang("msg.Policy Document")</option>
                        </select>
                        <label for="">@lang("msg.Document Title")</label>
                        <input class="form-control" type="text" name="doc_name">
                        <div class="form-group has-feedback padding-bottom-15">  
                            <div class="form-group has-feedback">
                                <button type="submit" class="pull-right btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Submit")</button>
                            </div>                      
                            <div class="form-group has-feedback">
                                <a href="{{  url('') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>
            <div class="col-md-6">
                <div class="box box-body">
                    <h4 class="text-center text-aqua">@lang("msg.Current Documents")</h4>
                    @foreach ($all_docs as $item)
                    <li>{{$item->doc_name}} ({{ $item->doc_type}})</li>
                    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection