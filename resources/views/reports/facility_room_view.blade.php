
@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.room report of each facility")</b></p>
	
@endsection

@section('main-content')
    
<div class="row">
	<br/>
    <div class="col-md-12">	
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>				
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Facility")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Address")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Phone No")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Email")</th>
							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Room Details")</th>
						</tr>
						@foreach ($facilities as $facility)
						<tr>
							<td>{{ $facility->facility_name }}</a></td>
							<td>{{ $facility->address }}</td>
							<td>{{ $facility->phone }}</td>
							<td>{{ $facility->facility_email }}</td>
							<td class="padding-left-45"><a href="facility_room_graph/{{ $facility->id }}">
								<i class="material-icons material-icons md-22 gray"> visibility </i></a>
							</td>		
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