
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
     Info
@endsection

@section('main-content')
<style>	
	.content-header
	{
		display:none;
	}	
</style>
<link href="{{ asset('/css/type_ahead.css') }}" rel="stylesheet" type="text/css"/>
<script>
$(document).ready(function() {
		$('select[name="id"]').on('change', function() {
			var pros_id = $(this).val();
			console.log(pros_id);
			if(pros_id) {
				$.ajax({
					url: 'select_stage_pros/'+pros_id,
					type: "GET",
					success:function(data) {
						window.location.replace('select_stage_pros/'+pros_id);
					}
				});
			}					
		});
	});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-400 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" name="room_type" autocomplete="off" placeHolder="FUTURE RESIDENT">
    								</div>
    								<!--<select name="id" id="id" class="form-control" >
    									<option value=""> @lang("msg.FUTURE RESIDENT")</option>
    									@foreach ($prospectives as $prospective)
    										<option value="{{ $prospective->id }}"> {{ $prospective->pros_name }} </option>	
    									@endforeach
    								</select>-->
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="emailInput" type="text" name="room_type" autocomplete="off" placeHolder="EMAIL">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">View Record</th>
    							<th class="th-position text-uppercase font-500 font-12">Sales Stage</th>
    							<th class="th-position text-uppercase font-500 font-12">Update Records</th>
    						</tr>
    						@foreach ($crms as $crm)
    						<tr>
    							@if($crm->service_image == NULL)
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							@else
    							<td><img src="hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
    							@endif
    							<td>{{ $crm->pros_name }}</td>
    							<?php $basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{ ?>
    							<td>{{ $basic->phone_p }}</td>
    							<td>{{ $basic->email_p }}</td>
    							<?php } ?>
    							<td class="padding-left-35"><a href="view_records/{{ $crm->id }}">
    								<i class="material-icons gray md-22"> visibility </i>
    							</td>							
    							<!--<td class="padding-left-45"><a href="add_records/{{ $crm->id }}">-->
    							<!--	<i class="material-icons material-icons md-22 gray"> update </i></a>-->
    							<td class="padding-left-45">
								{{$crm->stage}}
    							</td>								
    							<td class="padding-left-45"><a href="change_pro_records/{{ $crm->id }}">
    								<i class="material-icons material-icons gray md-22"> edit </i>
    								</a>
    							</td>
    								
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
			    <div class="text-center">{{ $crms->links() }}</div>
			</div>               
		</div>
    </div>
</div>
@endsection
@section('scripts-extra')
<script type="text/javascript" language="javascript" src="{{ asset('/js/rec/mar_crm.js') }}"></script>
@endsection