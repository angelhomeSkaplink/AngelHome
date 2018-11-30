@extends('layouts.app_resident')

@section('htmlheader_title')
    
@endsection

@section('contentheader_title')
    
@endsection

@section('main-content')


<div class="row">	
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">Assessment details</h4>
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
					<form action="make_payment" method="post" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<table class="table">
							<tbody>
								<tr>
									<td>
										<div class="form-group has-feedback">
											<label>Month</label>
											<select name="month" class="form-control" required >
												<option value="">Select Month</option>
												<option value="January">January</option>
												<option value="February">February</option>
												<option value="March">March</option>
												<option value="April">April</option>
												<option value="May">May</option>
												<option value="June">June</option>
												<option value="July">July</option>
												<option value="August">August</option>
												<option value="September">September</option>
												<option value="October">October</option>
												<option value="November">November</option>
												<option value="December">December</option>
											</select>
										</div>
									</td>
									<td>
										<div class="form-group has-feedback">
											<label>Year</label>
											<select name="year" class="form-control"required >
												<option value="">Select Year</option>
												<option value="2018">2018</option>
												<option value="2019">2019</option>
												<option value="2020">2020</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
											</select>
										</div>
									</td>
								</tr>
								<input type="hidden" class="form-control" name="pros_id" value="{{ $check_id->id }}" readonly />
									
								<tr>
									<td><label>Room Rent</label></td>
									<input type="hidden" class="form-control" name="" value="{{ $reports->price }}" readonly />
									<td>{{ $reports->price }}</td>
								</tr>
								<tr>
									<td><label>Service Plan Price</label></td>
									<input type="hidden" class="form-control" name="" value="{{ $service_plan_price->price }}" readonly />
									<td>{{ $service_plan_price->price }}</td>
								</tr>
								<tr>
									<td><label>Outstanding</label></td>
									@if($check_payment == NULL)
									<input type="hidden" class="form-control" name="due_ammount" value="0" readonly />
									<td>0</td>
									@endif
									@if($check_payment != NULL)
									<input type="hidden" class="form-control" name="due_ammount" value="{{ $check_payment->due_ammount }}" readonly />
									<td>{{ $check_payment->due_ammount }}</td>
									@endif							
								</tr>
								<tr>
									<td><label>Total Payble ammount</label></td>
									<input type="hidden" class="form-control" name="ammount_pay" value="{{ $total_payable_ammount }}" readonly />
									<td>{{ $total_payable_ammount }}</td>
								</tr>
								<tr>
									<td><label>Amount Paied for resident</label></td>
									<td><input type="number" class="form-control" name="ammount_paid" /></td>
								</tr>
								<input type="hidden" class="form-control" name="facility_id" value="{{ $check_id->facility_id }}" />
								<tr>
									<td></td>
									<td><button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
										 PAY
									</button></td>						
								</tr>
							</tbody>
						</table>
					</form>
                <!--</div>-->
			</div>
		</div>
	</div>
	<!--<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">Service plan details</h4>
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
                    <!--<table class="table">
                        <tbody>							
							<tr>
								<td><label>Service Plan score</label></td>
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<td><label>Note</label></td>
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<td><label>Resident service plan</label></td>
								
								
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>								
							</tr>
							<tr>
								<td><label>Price</label></td>
								
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
                        </tbody>
                    </table>					
                <!--</div>-->
			<!--</div>
		</div>
		
	</div>-->
</div>
@include('layouts.partials.scripts_auth')

@endsection
