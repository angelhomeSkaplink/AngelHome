@extends('layouts.app')

@section('htmlheader_title')
    ROOM DETAILS
@endsection

@section('contentheader_title')
    
	<p class="text-danger"><b>@lang("msg.ROOM DETAILS")</b>
	<a href="{{ url('new_room_add') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:130px !important; margin-top: -2px; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> add </i>@lang("msg.Add new room")</a>
		
	
	</p>
@endsection

@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				<div class="box-body border padding-top-0 padding-left-right-0">
				    <div class="table-responsive">
                        <table class="table">
                            <tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room No")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room Type")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Feature")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Price")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Edit")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Delete")</th>
    							</tr>
    							@foreach ($rooms as $room)
    							<tr>
    								<td>{{ $room->room_no }}</td>								
    								<td>{{ $room->room_type }}</td>
    								<td>{{ $room->special_feature }}</td>
    								<td>${{ $room->price }}</td>
    								<td><a href="room_edit/{{ $room->room_id }}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
    								<td style="padding-left:22px !important"><a href="room_delete/{{ $room->room_id }}">
    								<i class="material-icons material-icons gray md-22" onclick="return confirm('Are you sure you want Delete this record ??');"> delete </i> </a></td>
    							</tr>
    							@endforeach
                            </tbody>
                        </table>
                    </div>
					<div class="text-center">{{ $rooms->links() }}</div>					
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection