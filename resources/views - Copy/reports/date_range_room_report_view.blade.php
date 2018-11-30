
@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')
    Facility List
@endsection

@section('main-content')
    
	<div class="row">
	<br/>
        <div class="col-md-12">	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Room no</th>
								<th class="th-position text-uppercase font-500 font-12">Room Type</th>								
								<th class="th-position text-uppercase font-500 font-12">Booked from</th>
								<th class="th-position text-uppercase font-500 font-12">release date</th>
								<th class="th-position text-uppercase font-500 font-12">unit status</th>
								<th class="th-position text-uppercase font-500 font-12">original rate</th>
								<th class="th-position text-uppercase font-500 font-12">resident room rate</th>
								<th class="th-position text-uppercase font-500 font-12">room occupaied by</th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								<?php 
									$room = DB::table('facility_room')
										->where([['room_id',$report->room_id]])->first();
								?>
								<td>{{ $room->room_no }}</a></td>
								<td>{{ $room->room_type }}</td>
								<td>{{ $report->booked_date }}</td>
								<td>{{ $report->release_date }}</td>
								@if($report->release_date==NULL)
								<td class="text-danger"><b>OCCUPIED<b/></td>
								@endif
								@if($report->release_date!=NULL)
								<td class="text-success"><b>VACANT<b/></td>
								@endif								
								<td>{{ $report->orgnl_price }}</td>
								<td>{{ $report->price }}</td>
								<?php 
									$doc = DB::table('sales_pipeline')
										->where([['id',$report->pros_id]])->first();
								?>
								<td>{{ $doc->pros_name }}</td>
										
							</tr>
							@endforeach
							@foreach ($vacants as $vacant)
							<tr>
								<td>{{ $vacant->room_no }}</a></td>
								<td>{{ $vacant->room_type }}</a></td>
								<td></td>
								<td></td>
								<td class="text-success"><b>VACANT<b/></td>
								<td>{{ $vacant->price }}</a></td>
								<td></td>
								<td></td>
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