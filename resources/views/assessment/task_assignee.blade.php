<!-- Nilutpal Boruah Jr. -->

@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.List of Patients")
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Today's TASK LIST FOR") {{ $task }}</b></p>
@endsection

@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
			<div class="box-body border padding-top-0 padding-left-right-0">
			    <div class="table-responsive">
    				<div id="DivIdToPrint">
    					<table class="table">
    						<tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Resident")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Person Required") </th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Start Time")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.End Time")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Special Equipment")</th>
    								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Status")</th>
    							</tr>
								@foreach ($tasks as $medicine)
								@php
									$n = explode(",",$medicine->pros_name);
								@endphp
    							<tr>
    								@if($medicine->frequency=='Daily')
    									<?php 
    										$user = DB::table('task_assingee')->where([['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
											// dd($user);
											if($user>0){
    									?>
    									@if($medicine->service_image == NULL)
    									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    									@else
    									<td><img src="../hsfiles/public/img/{{ $medicine->service_image }}" class="img-circle" width="40" height="40"></td>
    									@endif
    										
										<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    									<td>{{ $medicine->person_required }}</td>	
    									<td>{{ $medicine->s_time }}</td>	
    									<td>{{ $medicine->e_time }}</td>	
    									<td>{{ $medicine->special_equipment }}</td>	
    									<?php
    										$history = DB::table('task_history')->where([['task_id', $medicine->task_id], ['history_date', date("Y-m-d",time())]])->first();
    										if($history==NULL){
    									?>
    									<td class="padding-left-72">
    										<a href="../add_task_history/{{ $medicine->task_id }}/{{ $task }}" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> check_box_outline_blank</i>
    										</a>
    									</td>
    									<?php } else {?>
    									<td class="padding-left-72">
    										<a href="" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> beenhere</i>
    										</a>
    									</td>
    									<?php } ?>
    									
    									
    									<?php } ?>
    								@endif
    								@if($medicine->frequency=='Alt.Days')
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    									
										<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    									<td>{{ $medicine->person_required }}</td>	
    									<td>{{ $medicine->s_time }}</td>	
    									<td>{{ $medicine->e_time }}</td>	
    									<td>{{ $medicine->special_equipment }}</td>	
    									<?php
    										$history = DB::table('task_history')->where([['task_id', $medicine->task_id], ['history_date', date("Y-m-d",time())]])->first();
    										if($history==NULL){
    									?>
    									<td class="padding-left-72">
    										<a href="../add_task_history/{{ $medicine->task_id }}/{{ $task }}" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> check_box_outline_blank</i>
    										</a>
    									</td>
    									<?php } else {?>
    									<td class="padding-left-72">
    										<a href="" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> beenhere</i>
    										</a>
    									</td>
    									<?php } } ?>
    									<?php } ?>
    								@endif
    								@if($medicine->frequency=='Weekly')
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    									
										<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    									<td>{{ $medicine->person_required }}</td>	
    									<td>{{ $medicine->s_time }}</td>	
    									<td>{{ $medicine->e_time }}</td>	
    									<td>{{ $medicine->special_equipment }}</td>	
    									<td></td>
    									<?php } } ?>
    								@endif	
    								@if($medicine->frequency=='Monthly')
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    										
										<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
    									<td>{{ $medicine->person_required }}</td>	
    									<td>{{ $medicine->s_time }}</td>	
    									<td>{{ $medicine->e_time }}</td>	
    									<td>{{ $medicine->special_equipment }}</td>	
    									<td></td>
    									<?php } }?>
    								@endif
    							</tr>
    							@endforeach
    						</tbody>
    					</table>
					</div>
					<br/>
				</div>
				<!--<div class="col-md-10"></div>
				<div class="col-md-2">
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" id='btn' value='Print' onclick='printDiv();' style="width:90% !important;">
						PRINT
						</button>
					</div>
				</div>
				<br/><br/>-->
			</div>						
        </div>
    </div>
</div>

@endsection
@section('scripts-extra')
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
