
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
@endsection

@section('main-content')
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
		
	.content {
		margin-top: 15px;
	}
	.form-control{
		//text-transform: uppercase;
	}
</style>
<script>
function ShowCheque() {
    var payment_method = document.getElementById("payment_method");
    var cheque_no = document.getElementById("cheque_no");
    cheque_no.style.display = payment_method.value == "Cheque" ? "block" : "none";
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".row").on("contextmenu",function(){
             //alert('right click disabled');
           return false;
        }); 
    });
</script>
<div class="row">	
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">resident payment</h4>
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
					@if($reports == NULL)
						<h4 class="font-500 text-uppercase font-15">No record found</h4>
					@endif
					@if($reports != NULL)
						<!--<form action="make_payment_res" method="post" enctype="multipart/form-data">-->
						<form action="{{action('PaymentController@make_payment_res')}}" method="post">					
							<input type="hidden" name="_method" value="PATCH">
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
										<td><label>Total Payable amount</label></td>
										<input type="hidden" class="form-control" name="ammount_pay" value="{{ $total_payable_ammount }}" readonly />
										<td>{{ $total_payable_ammount }}</td>
									</tr>
									<tr>
										<td><label>Amount To Be Paid</label></td>
										<td><input type="number" class="form-control" name="ammount_paid" /></td>
									</tr>
									@if (! Auth::guest())
									<tr>
										<td><label>Method of payment</label></td>
										<td>
											<div class="form-group has-feedback">
												<select name="payment_method" id="payment_method" class="form-control" onchange = "ShowCheque()" required >
													<option value="">Choose an option</option>
													<option value="Cash">Cash</option>
													<option value="Cheque">Cheque</option>
												</select>
											</div>
										</td>
									</tr>
									<tr id="cheque_no" style="display: none">
										<td><label>Cheque No</label></td>
										<td><input type="text" class="form-control" name="cheque_no" /></td>
									</tr>
									@endif
									<input type="hidden" class="form-control" name="facility_id" value="{{ $check_id->facility_id }}" />
								</tbody>
							</table>
							<div>
								<div class="form-group has-feedback">
									<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button" style="margin-right: 5px;">@lang("msg.Submit")</button>
								</div>

								<div class="form-group has-feedback">
									<a href="../resident_payment" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;">@lang("msg.Cancel")</a>
								</div>
							</div><br/><br/><br/>
						</form>
					@endif
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
