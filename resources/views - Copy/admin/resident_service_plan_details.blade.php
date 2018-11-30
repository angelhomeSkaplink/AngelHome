
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    
@endsection

@section('main-content')


<div class="row">

<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">Assessment details</h4>	 </div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
					@if($reports->isEmpty())
						<div class="alert alert-info"><b>&nbsp;&nbsp;NO ASSESSMENT RECORDS FOUND</b></div>
					@endif
					@if(!$reports->isEmpty())
					
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">Assessment</th>								
								<th class="th-position text-uppercase font-500 font-12">date</th>	
								<th class="th-position text-uppercase font-500 font-12">Point</th>
							</tr>
							@foreach ($reports as $report)
							<tr>
								<td>{{ $report->assessment_form_name }}</td>
								<td>{{ $report->assessment_date }}</td>
								<td>{{ $report->score }}</td>
							</tr>
							@endforeach
							<tr>
								<td><label>Total Assessment score</label></td>
								<td></td>
								<td>{{ $total_score }}</td>								
							</tr>
                        </tbody>
                    </table>
					@endif
                <!--</div>-->
			</div>
		</div>
	</div>
	@if(!$reports->isEmpty())
		<br/>
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">Service plan details</h4> </div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			
			<div class="box-body padding-top-5">
				
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
                    <table class="table">
                        <tbody>							
							<tr>
								<td><label>Service Plan score</label></td>
								<td>{{ $totalpointcount->total_point }}</td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<td><label>Note</label></td>
								<td>{{ $totalpointcount->care_plan_detail }}</td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<?php $plan = DB::table('service_plan')->where('to_range', '>=', $totalpointcount->total_point)->orderBy('to_range', 'ASC')->first(); ?>
								<td><label>Resident service plan</label></td>
								@if($totalpointcount->total_point>$plan->to_range)
									<td>No Service Plan Found</td>
								@endif
								@if($totalpointcount->total_point<=$plan->to_range)
								<td>{{ $plan->service_plan_name }}</td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>								
							</tr>
							<tr>
								<td><label>Price</label></td>
								
								<td>{{ $plan->price }}</td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							@endif
                        </tbody>
                    </table>					
                <!--</div>-->
			</div>
		</div>
		
	</div>
	@endif
</div>
@include('layouts.partials.scripts_auth')

@endsection
