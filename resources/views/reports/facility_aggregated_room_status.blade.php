
@extends('layouts.app')

@section('htmlheader_title')
    @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Facility Room Status")</b>
	<a href="{{ url('facility_aggregated_room_graph') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i> @lang("msg.Back")</a>
	</p>
@endsection

@section('main-content')
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}	
</style>
   
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
								<th class="th-position text-uppercase font-500 font-12"></th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Facility")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Total Room")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Occupied")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Vacant")</th>
							</tr>
							<tr>
								<td></td>
								<?php $facility_name = DB::table('facility')->where('id', $vacant->facility_id)->first(); ?>
								<td>{{ $facility_name->facility_name }}</td>
								<td>{{ $room->room_id }}</td>
								<td>{{ $vacant->vacant_position }}</td>
								<td>{{ $room->room_id - $vacant->vacant_position }}</td>
							</tr>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection