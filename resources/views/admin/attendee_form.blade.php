
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Resident Info") 
@endsection

@section('contentheader_title')
    @lang("msg.Attendee")
@endsection

@section('main-content')
<style>	
	.content-header{
		display:none;
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
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Residents")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Status")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Notes")</th>
							</tr>
							
							@foreach ($crms as $crm)
							@php
							    $n = explode(",",$crm->pros_name);
							@endphp
							<tr>
								@if($crm->service_image == NULL)
								<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								@else
								<td><img src="../hsfiles/public/img/{{ $crm->service_image }}" class="img-circle" width="40" height="40"></td>
								@endif
								<td>{{ $n[0] }} {{ $n[1] }} {{ $n[2] }}</td>
								<input type="hidden" class="form-control" placeholder="" name="pros_id[]" value="{{  $crm->id }}" required />
								<input type="hidden" class="form-control" placeholder="" name="event_id[]" value="{{ $event_id }}" required />
								<td>
									<select name="attenedee_status[]" id="attenedee_status" class="form-control" required >
										<option value="Absent">@lang("msg.Absent")</option>											
										<option value="Active">@lang("msg.Active")</option>							
										<option value="Passive">@lang("msg.Passive")</option>
										<option value="Absorbed">@lang("msg.Absorbed")</option>										
									</select>
								</td>
								<td><textarea class="form-control" name="note[]" type="text" rows="2" ></textarea></td>
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