@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Room Details")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3><strong>Change Room</strong></h3>
	</div>
	<div class="col-lg-4 pull-right">
    <div class="col-md-6">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
    @if($flag == "MoveIn")
        <option value="{{url('screening_view/'.$id)}}">Resident Details</option>
        <option value="{{url('assessment_period/resident/'.$id)}}">Assessment History</option>
        <option value="{{url('select_period/resident/'.$id)}}">Assessment</option> 
        <option value="{{url('service_plan_period/'.$id)}}">Service Plan</option>
        <option value="{{url('all_tsp/'.$id)}}">Temporary Service Plan</option>
        <!--<option value="{{url('change_own_room/'.$id)}}">Room Book</option>-->
        <option value="{{url('injury_history/'.$id)}}">Incident</option>
        <option value="{{url('medication_incident_resident_report/'.$id)}}">Medication Incident</option>
        <option value="{{url('checkup/'.$id)}}">Vital Statistics</option>take_note
        <option value="{{url('take_note/'.$id)}}">Notes</option>
        <option value="{{url('set_task/'.$id)}}">Set Tasksheet</option>
    @else
        <option value="{{url('change_records/'.$id)}}">Inquiry</option>
        <option value="{{url('change_pro_records/'.$id)}}">Sales Pipeline</option>
        <option value="{{url('reschedule/'.$id)}}">Appointment Schedule</option>
        <option value="{{url('screening/'.$id)}}">Screening</option>
        <option value="{{url('select_assessments/Initial/'.$id)}}">Assessment</option>
    @endif
      </select>
    </div>
    <div class="col-md-6">
		<a href="../booking" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
  </div>
</div>
@endsection

@section('main-content')
@php
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
    ->where([['pros_id', $id],['release_date',null]])
    ->first();
    if($room == null){
      $room = DB::table('resident_room')
    ->where([['pros_id', $id],['release_date','>',date('Y-m-d')]])
    ->orderby('release_date','dsc')
    ->first();
        }
if($room){
  $room_no = DB::table('facility_room')->where('room_id',$room->room_id)->first();
	$room_no = $room_no->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name); 
@endphp
<div class="row" style="margin-bottom:0px;" >
	<div class="col-lg-12 " >
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
					<h4>@if($person->service_image == null)
							<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
						@else
							<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
						@endif
						<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
					</h4>
				</td>				
				<td>
					<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>@lang("msg.Room No"): {{ $room_no }} </strong></span></h4>
				</td>
				<td>
					<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>@lang("msg.Age"): {{ $age }} </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
					@if($rooms != NULL)
                    <table class="table">
                        <tbody>
              				<tr>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room No")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room Type")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Feature")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Market Rate")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Actual Rate")</th>
              					<th class="th-position text-uppercase font-500 font-12">@lang("msg.Book")</th>
              				</tr>
              				@foreach ($rooms as $room)
								<tr>
									<form action="{{action('RoomController@room_change')}}" method="post">
										<input type="hidden" name="_method" value="PATCH">
										{{ csrf_field() }}
										<input type="hidden" class="form-control" name="pros_id" value="{{ $id }}"/>
										<input type="hidden" class="form-control" name="room_id" value="{{ $room->room_id}}"/>
										<td style="vertical-align:middle">{{ $room->room_no }}</td>
										<td style="vertical-align:middle">{{ $room->room_type }}</td>
										<td style="vertical-align:middle">{{ $room->special_feature }}</td>
										<td style="vertical-align:middle">{{ $room->price }}</td>
										<td ><input style="width:110px" type="number" class="form-control" placeholder="PRICE" name="price" value="{{ $room->price }}" required pattern="[0-9]"/></td>
										<input style="width:110px" type="hidden" class="form-control" name="orgnl_price" value="{{ $room->price }}"/>
										<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i></button></td>
									</form>
								</tr>	
							@endforeach
						</tbody>
                    </table>
					@else
						@lang("msg.No Rooms Available")
					@endif
                        
                </div>
				<div class="text-center">{{ $rooms->links() }}</div>
            </div>
        </div>
    </div>
</div>
@include('quick_link.quicklink')
@endsection
@section('scripts-extra')

@endsection
