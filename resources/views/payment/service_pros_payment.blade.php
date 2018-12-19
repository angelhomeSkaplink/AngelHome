
@extends('layouts.app')

@section('htmlheader_title')
    Payment History
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>@lang("msg.Payment History")</b>
	<a href="{{ url('payment_report') }}" class="btn btn-primary btn-block btn-flat btn-width btn-custom" style="width:122px !important; margin-top: -2px; margin-right: 15px;"><i class="material-icons md-14 font-weight-600"> keyboard_arrow_left </i> back</a>
	
	</p>
@endsection

@section('main-content')
<style>	
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: 0px;
	}
	.content {
		margin-top: 15px;
	}
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-700 font-12">@lang("msg.Resident")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Room Rent")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Service Plan")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.Total Payable Ammount")</th>
    							<th class="th-position text-uppercase font-500 font-12">@lang("msg.View Payment History")</th>
    						</tr>
    						@foreach ($reports as $report)
    						<tr>
    							<td>{{ $report->pros_name }}</td>								
    							<td>{{ $report->price }}</td>
    							<?php
    								$service_plan_price = DB::table('service_plan')
    									->where([['from_range', '<=', $report->total_point],['to_range', '>=', $report->total_point]])
    									->orderBy('to_range', 'DESC')
    									->first();
    							?>
    							<td>{{ $service_plan_price->price }}</td>
    							<td>{{ $report->price + $service_plan_price->price }}</td>
    							<td class="padding-left-35">
    								<a href="../detail_history/{{ $report->id }}">
    								<i class="material-icons gray md-22"> visibility </i></a>
    							</td>
    						</tr>
    						@endforeach
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
@section('scripts-extra')
@endsection