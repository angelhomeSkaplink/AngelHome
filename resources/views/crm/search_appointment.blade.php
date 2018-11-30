@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
   <p class="text-danger"><b>Future resident</b>
		<a href="{{ url('appointment_schedule') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:135px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> back</a>
	</p>
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
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
				
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">#</th>
							<th class="th-position text-uppercase font-700 font-12">FUTURE RESIDENT</th>
							<th class="th-position text-uppercase font-500 font-12">Appointment Date</th>
							<th class="th-position text-uppercase font-500 font-12">Appointment Time</th>
							<th class="th-position text-uppercase font-500 font-12">Reschedule Appointment</th>
						</tr>
						@foreach ($appointments as $appointment)
						<tr>
							@if($appointment->service_image == NULL)
							<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							@else
							<td><img src="../hsfiles/public/img/{{ $appointment->service_image }}" class="img-circle" width="40" height="40"></td>
							@endif
							<td>{{ $appointment->pros_name }}</td>								
							<td>{{ $appointment->appointment_date }}</td>
							<td>{{ $appointment->appointment_time }}</td>
							<td class="padding-left-82"><a href="../reschedule/{{ $appointment->appoiuntment_id }}"><i class="material-icons gray md-22">schedule </i></a></td>
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