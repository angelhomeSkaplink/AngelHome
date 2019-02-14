
@extends('layouts.app')

@section('htmlheader_title')
    Facility Info 
@endsection

@section('contentheader_title')'
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Monthly revenue</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="{{ url('facility_aggregated_revenue_details') }}" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
@endsection

@section('main-content')
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
								<th class="th-position text-uppercase font-500 font-12">Month</th>
								<th class="th-position text-uppercase font-500 font-12">Total revenue</th>
							</tr>
							@foreach ($monthly as $month)
							<tr>
								<td></td>
								<td>{{ $month->month }}</a></td>
								<td>{{ $month->ammount_pay }}</td>
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