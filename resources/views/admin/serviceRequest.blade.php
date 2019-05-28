
@extends('layouts.app')

@section('htmlheader_title')
    Service Request 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Service Request</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style type="text/css">
    /*Rules for sizing the icon*/
    .material-icons.md-18 { font-size: 18px; }
    .material-icons.md-24 { font-size: 24px; }
    .material-icons.md-36 { font-size: 36px; }
    .material-icons.md-48 { font-size: 48px; }
</style>
<script>
	$(document).ready(function(){
        $("#detailsModal").on("show.bs.modal", function(e) {
            
            var id = $(e.relatedTarget).data('target-id');
            
            $.get( 'service_request_details/' + id, function( data ) {

                console.log(data);
                var newData = JSON.parse(data);
                
                console.log(newData[0]);
                
                var $template = ''; 
				$template += `
                    <div class="user_info">
                        <div class="row">
                            <div class="col-md-3">Title</div>
                            <div class="col-md-9"><p>${newData[0].title}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Description</div>
                            <div class="col-md-9">${newData[0].description}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">Notes</div>
                            <div class="col-md-9">${newData[0].comment}</div>
                        </div>
					</div>
				`;	
				$(".modal-body").html($template);
            });

        });
    });
</script>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<div class="row">
    <a href="resolve_request" class="btn btn-primary">Resolved</a>
    <div class="col-md-12">
    <div class="col-md-6">
        <div class="box box-body border padding-bottom-15" style="height:430px;">
            <form action="{{ url('store_service_request') }}" method="post">
                <input name="_method" type="hidden" value="POST">
                {{ csrf_field() }}
                <div class="autocomplete padding-7">
                    <label>Resident</label>
                    <input id="myInput" type="text" placeHolder="&#61442; John Doe" class="form-control" required>
                </div>
                    <input type="hidden" name="res_id" id="res_id" class="form-control" required>
                <div class="padding-7">
                    <label for="">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="padding-7">
                    <label for="">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                </div>
                <div class="padding-7">
                    <label for="">Notes</label>
                    <textarea name="notes" id="notes" rows="2" class="form-control" required></textarea>
                </div>
                    <br>
                <div class="row pull-right" style="padding-right:14px;">
                    <a href="" class="btn btn-danger">Cancel</a>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-body border" style="height:430px;">
            <div class="text-center"><h6><strong>Service Request List</strong></h6></div>
            <div class="table-responsive">
                <table class="table table-striped">
                <tbody>
                    <tr>
                        <th class="text-center th-position text-uppercase font-500 font-12">Resident</th>
                        <th class="text-center th-position text-uppercase font-500 font-12">Title</th>
                        <th class="text-center th-position text-uppercase font-500 font-12">Request Date</th>
                        <th class="text-center th-position text-uppercase font-500 font-12">Status</th>
                        <th class="text-center th-position text-uppercase font-500 font-12">Details</th>
                    </tr>
                    @foreach ($requestData as $item)
                    @php
                        $n = explode(",",$item->pros_name);
                        if ($item->status == 0) {
                            $status = "Pending";
                        }
                        else {
                            $status = "Fulfilled";
                        }
                    @endphp
                    <tr>
                        <td class="text-center">{{$n[0]}} {{$n[1]}} {{$n[2]}}</td>
                        <td class="text-center">{{$item->title}}</td>
                        <td class="text-center">{{$item->req_date}}</td>
                        <td class="text-center">{{$status}}</td>
                        <td class="text-center"><button type="button" class="btn btn-link" id="{{ $item->req_id }}" data-toggle="modal" data-target-id="{{ $item->req_id }}"  data-target="#detailsModal"><i class="material-icons md-18">visibility</i></button></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            
        </div>
        <div class="text-center">{{ $requestData->links() }}</div>
    </div>
    </div>
</div>
<div class="modal fade" id="detailsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				
				<h4 class="modal-title text-center" id="myModalLabel"><b>Request Details</b></h4>				
			</div>
			
			<div class="modal-body">
			</div>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang("msg.Close")</span></button><br/>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/residentSearch.js') }}"></script>
@endsection