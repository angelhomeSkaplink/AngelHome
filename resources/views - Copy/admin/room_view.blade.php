@extends('layouts.app')

@section('htmlheader_title')
    ROOM DETAILS
@endsection

@section('contentheader_title')
    ROOM DETAILS
@endsection

@section('main-content')

<br/>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				<div class="box-header with-border col-sm-2 pull-right">
					<a href="{{ url('new_room_add') }}"><span class="label label-primary font-size-85pc padding-7 custom-lebel"> <i class="material-icons md-15" style="vertical-align:sub !important"> add </i> Add New Record</a>					
                </div>
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Room No</th>
								<th class="th-position text-uppercase font-500 font-12">Room Type</th>
								<th class="th-position text-uppercase font-500 font-12">Special Feature</th>
								<th class="th-position text-uppercase font-500 font-12">Price</th>
								<th class="th-position text-uppercase font-500 font-12">Edit</th>
								<th class="th-position text-uppercase font-500 font-12">Delete</th>
							</tr>
							@foreach ($rooms as $room)
							<tr>
								<td>{{ $room->room_no }}</td>								
								<td>{{ $room->room_type }}</td>
								<td>{{ $room->special_feature }}</td>
								<td>{{ $room->price }}</td>
								<td><a href="room_edit/{{ $room->room_id }}"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
								<td style="padding-left:22px !important"><a href="room_delete/{{ $room->room_id }}">
								<i class="material-icons material-icons gray md-22" onclick="return confirm('Are you sure you want Delete this record ??');"> delete </i> </a></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>					
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection