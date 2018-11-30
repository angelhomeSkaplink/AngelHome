<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    List Of Patients
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Today's Task List For") {{ $task }}</b></p>
@endsection

@section('main-content')
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<div class="row margin-left-right-15" style="box-sizing: border-box !important;">
	<div class="col-md-6"></div>
	<form action="{{action('AttendeeController@assign_tasklist')}}" method="post">
		<input type="hidden" name="_method" style="width:20px;" value="PATCH">
		{{ csrf_field() }}
		<input type="hidden" name="task" value="{{ $task }}" style="width:20px;" value="PATCH">
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<select name="user_id[]" id="user_id" class="form-control" multiple required >
					@foreach ($assignees as $assignee)
					<option value="{{ $assignee->user_id}}">{{ $assignee->firstname }} {{ $assignee->middlename }} {{ $assignee->lastname }}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important;">
					SET
				</button>
			</div>			
		</div>
	</form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Resident")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Person Required") </th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Start Time")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.End Time")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Equipment")</th>
							</tr>
							@foreach ($tasks as $medicine)
							<tr>
								@if($medicine->frequency=='Daily')
									@if($medicine->service_image == NULL)
									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
									@else
									<td><img src="../hsfiles/public/img/{{ $medicine->service_image }}" class="img-circle" width="40" height="40"></td>
									@endif
									
									<td>{{ $medicine->pros_name }}</td>
									<td>{{ $medicine->person_required }}</td>	
									<td>{{ $medicine->s_time }}</td>	
									<td>{{ $medicine->e_time }}</td>	
									<td>{{ $medicine->special_equipment }}</td>									
								@endif
								@if($medicine->frequency=='Alt.Days')
									<?php 										
										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
										$result = fmod($diff,2);
									if($result==0){	
									?>
									@if($medicine->service_image == NULL)
									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
									@else
									<td><img src="../hsfiles/public/img/{{ $medicine->service_image }}" class="img-circle" width="40" height="40"></td>
									@endif
									
									<td>{{ $medicine->pros_name }}</td>
									<td>{{ $medicine->person_required }}</td>	
									<td>{{ $medicine->s_time }}</td>	
									<td>{{ $medicine->e_time }}</td>	
									<td>{{ $medicine->special_equipment }}</td>										
									<?php } ?>
								@endif
								@if($medicine->frequency=='Weekly')
									<?php 										
										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
										$result = fmod($diff,7);
									if($result==0){	
									?>
									@if($medicine->service_image == NULL)
									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
									@else
									<td><img src="../hsfiles/public/img/{{ $medicine->service_image }}" class="img-circle" width="40" height="40"></td>
									@endif
									
									<td>{{ $medicine->pros_name }}</td>
									<td>{{ $medicine->person_required }}</td>	
									<td>{{ $medicine->s_time }}</td>	
									<td>{{ $medicine->e_time }}</td>	
									<td>{{ $medicine->special_equipment }}</td>									
									<?php } ?>
								@endif	
								@if($medicine->frequency=='Monthly')
									<?php 										
										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
										$result = fmod($diff,7);
										if($result==0){	
									?>
									@if($medicine->service_image == NULL)
									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
									@else
									<td><img src="../hsfiles/public/img/{{ $medicine->service_image }}" class="img-circle" width="40" height="40"></td>
									@endif
									
									<td>{{ $medicine->pros_name }}</td>
									<td>{{ $medicine->person_required }}</td>	
									<td>{{ $medicine->s_time }}</td>	
									<td>{{ $medicine->e_time }}</td>	
									<td>{{ $medicine->special_equipment }}</td>									
									<?php } ?>
								@endif
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			<!--<div class="form-group has-feedback" style="float:right;margin-right:5px;">
				<input type='button' id='btn' value='Print' onclick='printDiv();'>-->
			</div>
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')
<script>
  $(document).ready(function(){
    $('#user_id').select2();
  });
</script>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('DivIdToPrint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		setTimeout(function() {
		newWin.close();
		}, 10);
	}
</script>
@endsection
