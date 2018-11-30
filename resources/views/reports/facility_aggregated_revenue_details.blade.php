
@extends('layouts.app')

@section('htmlheader_title')
     @lang("msg.Facility Info") 
@endsection

@section('contentheader_title')
    <p class="text-danger"><b> @lang("msg.Total Revenue Of Each Facility")</b>
	<a href="{{ url('facility_aggregated_revenue_graph') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:150px !important; margin-top: -2px; margin-right: 10px;"><i class="material-icons md-14 font-weight-600"> details </i> @lang("msg.Back")</a>
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
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.Total Revenue")</th>
								<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Details")</th>
							</tr>
							@foreach ($payable_sum as $facility)
							<tr>
								<?php $facility_name = DB::table('facility')->where('id', $facility->facility_id)->first(); ?>
								<td></td>
								<td>{{ $facility_name->facility_name }}</a></td>
								<td>{{ $facility->ammount_pay }}</td>
								<td class="padding-left-45"><a href="monthly_revenue/{{ $facility->facility_id }}">
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