@extends('layouts.app')

@section('htmlheader_title')
    Vital Statistics
@endsection
@section('contentheader_title')
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Vital Statistics</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="../all_res_checkup" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection
@section('main-content')
@if(count($errors))
<div class="form-group">
    <div class="alert alert-danger">
      <ul>
          <li><b>At least one field is required</b></li>
      </ul>
    </div>
</div>
@endif
@php
$person = DB::table('sales_pipeline')->where('id',$name->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$name->id],['resident_room.status',1]])->first();
if($room){
	$room_no = $room->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$name->id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
@endphp
<div class="row" >
	<div class="col-lg-12 table-responsive">
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
						<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: {{ $room_no }} </strong></span></h4>
				</td>
				<td>
						<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: {{ $age }} </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="card">
    <div class="card-body px-lg-5 pt-0">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="height:500px; padding-top:0">
                    <form action="{{action('DoctorController@storeCheckup')}}" method="post">
                        <input name="_method" type="hidden" value="POST">
                        {!! csrf_field() !!}
                        <div class="form-group has-feedback">
                            <input type="hidden" class="form-control" value="{{ $id }}" name="res_id" required readonly />
                        </div>					
                        <div class="form-group has-feedback">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Sugar</label>
                            <input type="text" class="form-control" name="sugar"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Pressure</label>
                            <input type="text" class="form-control" name="pressure"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Temperature</label>
                            <input type="text" class="form-control" name="temperature"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>O2 Stats</label>
                            <input type="text" class="form-control" name="o2_stat"/>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Save</button>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="{{  url('all_res_checkup') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="overflow-y: scroll; height:500px; padding-top:0">
                    <h4><strong>Previous Records</strong></h4>
                    @php
                        if($checkups->isEmpty()){
                            echo "No previous Record!";
                        }
                    @endphp
                    @foreach ($checkups as $check)
                    @php
                        $user_name = DB::table('users')->where('user_id',$check->recorder)->select('users.firstname','users.lastname')->first();
                        $array = [];
                        if (!$check->weight=="") {
                            array_push($array,"wt");
                        }
                        if (!$check->sugar=="") {
                            array_push($array,"bs");
                        }
                        if (!$check->pressure=="") {
                            array_push($array,"bp");
                        }
                        if (!$check->temperature=="") {
                            array_push($array,"tp");
                        }
                        if (!$check->o2_stat=="") {
                            array_push($array,"o2");
                        }
                        $array = implode(", ",$array);
                    @endphp
                    <div class="panel-heading">
                    <li><a href="#modal" data-toggle="modal" data-target="#modalRegister{{$check->id}}"> {{$check->date}} </a>  {{$check->time}} <br/><strong>By:</strong> {{$user_name->firstname}} {{$user_name->lastname}} <br/><strong>Paramemter: </strong>{{ $array }}</li>
                    </div>
                    <div id="modalRegister{{$check->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align-last: center"><strong>Date: </strong>{{$check->date}}</h4>
                                        <h6 class="modal-title" style="text-align-last: center"><strong>Record Collected By:</strong> {{$user_name->firstname}} {{$user_name->lastname}}</h6>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel-body">
                                            <div class="row">
                                                  <p> <strong> Weight:</strong> {{ $check->weight }} </p>
                                                  <p> <strong> Blood Sugar:</strong> {{ $check->sugar }} </p>
                                                  <p> <strong> Blood Pressure:</strong> {{ $check->pressure }} </p>
                                                  <p> <strong> Temperature:</strong> {{ $check->temperature }} </p>
                                                  <p> <strong> O2 Stats:</strong> {{ $check->o2_stat }} </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div id="modal{{}}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="text-align-last: center">{{$check->date}}</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    
                    <div class="row">
                          <p> <strong> Weight:</strong> {{ $query->weight }} </p>
                          <p> <strong> Blood Sugar:</strong> {{ $query->sugar }} </p>
                          <p> <strong> Blood Pressure:</strong> {{ $query->pressure }} </p>
                          <p> <strong> Temperature:</strong> {{ $query->temperature }} </p>
                          <p> <strong> O2 Stats:</strong> {{ $query->o2_stat }} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection