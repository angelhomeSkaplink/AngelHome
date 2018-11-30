@extends('layouts.app')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Prospective Info
@endsection

@section('main-content')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary border">
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Prospective</th>
								<th class="th-position text-uppercase font-500 font-12">Appointment Date</th>
								<th class="th-position text-uppercase font-500 font-12">Appointment Time</th>
								<th class="th-position text-uppercase font-500 font-12">Reschedule Appointment</th>
							</tr>
							@foreach ($appointments as $appointment)
							<tr>
								<td>{{ $appointment->pros_name }}</td>								
								<td>{{ $appointment->appointment_date }}</td>
								<td>{{ $appointment->appointment_time }}</td>
								<td class="padding-left-82"><a href="reschedule/{{ $appointment->appoiuntment_id }}" data-toggle="tooltip" data-placement="bottom" title="Reschedule Appointment"><i class="material-icons gray md-22">schedule </i></a></td>
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