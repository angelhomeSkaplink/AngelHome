
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Info") 
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.Attendee")</strong></h3>
	</div>
</div>
@endsection

@section('main-content')
<style>	
	<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
	#submit-button {
		position: fixed;
		bottom: 30px;
		right: 130px; 
	}
	
	#cancel-button {
		position: fixed;
		bottom: 30px;
		right: 25px; 
	}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
				<form action="{{action('AttendeeController@add_attendee')}}" method="post">	
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-center text-uppercase font-500 font-12"></th>
								<th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Residents")</th>
								<th class="th-position text-center text-uppercase font-500 font-12">Expected Guests</th>
								<th class="th-position text-center text-uppercase font-500 font-12">RSVP</th>
								<th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Attendance")</th>
								<th class="th-position text-center text-uppercase font-500 font-12">@lang("msg.Notes")</th>
							</tr>
							
							@foreach ($crms as $crm)
							@php
								$n = explode(",",$crm->pros_name);
								$response = DB::table('event_rsvp')->where([['event_id',$event_id],['res_id',$crm->id]])->first();
								if ($response) {
									$details = DB::table('famlink_user')->join('famlink_user_connection','famlink_user.famlink_uid','=','famlink_user_connection.famlink_uid')
									->where('famlink_user.famlink_uid',$response->user_id)->first();
									// dd($details);
									$res_name = $details->name;
									$adult = $response->adult;
									$kids = $response->kid;
								}
							@endphp
							<tr>
								@if($crm->service_image == NULL)
								<td class="text-center"><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td class="text-center"><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td class="text-center">{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
								<td class="text-center">
									@if ($response)
										<div class="row"><b>Responded:</b> {{$res_name}}</div>
										<div class="row"><b>Adult:</b> {{$adult}}<br><b>Kids:</b> {{$kids}}</div>
									@else
										<div class="row"><b>Not Responded Yet</b></div>
									@endif									
								</td>
								<td class="text-center">
										{{-- <select class="form-control" name="rsvp[]">
											<option value="no">@lang("msg.No")</option>
											<option value="yes">@lang("msg.Yes")</option>
										</select> --}}
    								@if ($response)
										<div class="row"><b>Yes</b></div>
									@else
										<div class="row"><b>No</b></div>
									@endif	
								</td>
								<input type="hidden" class="form-control" placeholder="" name="pros_id[]" value="{{  $crm->id }}" required />
								<input type="hidden" class="form-control" placeholder="" name="event_id[]" value="{{ $event_id }}" required />
								<td class="text-center">
									<select name="attenedee_status[]" id="attenedee_status" class="form-control" required >
										<option value="Absent">@lang("msg.Absent")</option>											
										<option value="Active">@lang("msg.Active")</option>							
										<option value="Passive">@lang("msg.Passive")</option>
										<option value="Absorbed">@lang("msg.Absorbed")</option>										
									</select>
								</td>
								<td class="text-center"><textarea class="form-control" name="note[]" type="text" rows="2" ></textarea></td>
							</tr>
							@endforeach														
						</tbody>
					</table>
					<div id="button-position22">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button">@lang("msg.Submit")</button>
						</div>

						<div class="form-group has-feedback">
							<a href="{{  url('activity_calendar') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" id="cancel-button">@lang("msg.Cancel")</a>
						</div>
					</div><br/><br/>
				</form>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')

@endsection