@extends('layouts.app')
@section('htmlheader_title')
    Salary Claim
@endsection
@section('contentheader_title')
    Salary Claim
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>

<div class="row">
	<form action="salary_deduction_insert"  method="post">			
        <div class="col-md-12">			
            <div class="box box-primary">
				<div class="col-md-4">
					<div class="form-group has-feedback">
						<b>Month</b>
						<select name="month" id="month" class="form-control">
							<option value="0">Select month</option>
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
				</div>
				<div class="col-md-4">
					<b>Year</b>
					<input type="text" class="form-control" placeholder="Year" value="" name="year" id="year" />
				</div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Name</th>
								<!--<th>Basic Pay</th>-->
								<th>GPF %</th>
								<th>GPF Loan</th>
								<th>GPF</th>
								<th>NPS</th>
								<th>Festival</th>
								<th>House Building</th>
								<th>Car Loan</th>
								<th>Bike Loan</th>
								<th>Group</th>
								<th>Salary Saving</th>
								<th>Professional Tax</th>
								<th>Income Tax</th>
								<th>Welfare</th>
								<th>Other</th>
							</tr>
							<?php $i=0; ?>
							@foreach ($views as $employee)							
                            <tr>
                                <td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php									
									$rows = DB::table('servicebooks')->where('emp_id', $employee->emp_id)->orderBy('service_id', 'asc')->get();	
									foreach($rows as $r){
									$i++; } 
								?>
								<script>
									function getGrossSalary<?php echo $i ?>(){
										var basic_pay = parseFloat(document.getElementById('basic_pay<?php echo $i ?>').value);
										var emi = parseFloat(document.getElementById('emi<?php echo $i ?>').value);
										var gpf_persentage = parseFloat(document.getElementById('gpf_persentage<?php echo $i ?>').value);
										var gpf_deduction = ((gpf_persentage/100)*basic_pay)+emi;
										if(gpf_persentage!=0){
											document.getElementById('nps<?php echo $i ?>').value = '0';
										}
										else if(gpf_persentage==0){
											var nps = (10/100)*basic_pay;
											document.getElementById('nps<?php echo $i ?>').value = nps;
										}
										console.log(gpf_deduction);
										document.getElementById('gpf_deduction<?php echo $i ?>').value = gpf_deduction;
									}	
								</script>									
								<input type="hidden" class="form-control" placeholder="" value="{{ $r->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly />
								<td><input type="text" class="form-control" placeholder="" value="" name="gpf_persentage[]" id="gpf_persentage<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>								
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $r->emp_id], ['loan_type_id', '4']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<td><input type="text" class="form-control" placeholder="0" value="{{ $l->emi }}" name="emi[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="text" class="form-control" placeholder="" value="0" name="emi[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								<td><input type="text" class="form-control" placeholder="" value="0" name="gpf_deduction[]" id="gpf_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="" name="nps[]" id="nps<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="0" name="festival_deduction[]" id="festival_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $r->emp_id], ['loan_type_id', '1']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="text" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="house_building_deduction[]" id="house_building_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="text" class="form-control" placeholder="" value="0" name="house_building_deduction[]" id="house_building_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $r->emp_id], ['loan_type_id', '2']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="text" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="car_loan_deduction[]" id="car_loan_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="text" class="form-control" placeholder="" value="0" name="car_loan_deduction[]" id="car_loan_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $r->emp_id], ['loan_type_id', '3']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="text" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="text" class="form-control" placeholder="" value="0" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								<td><input type="text" class="form-control" placeholder="" value="0" name="group_deduction[]" id="group_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="208" name="salary_saving_deduction[]" id="salary_saving_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="0" name="professional_tax_deduction[]" id="professional_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="0" name="income_tax_deduction[]" id="income_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="0" name="welfare_deduction[]" id="welfare_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="text" class="form-control" placeholder="" value="0" name="other_deduction[]" id="other_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
							</tr>
							@endforeach
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="row">                    
								<div class="col-xs-4">
									<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
								</div>
							</div>
                        </tbody>
                    </table>
                </div>                
            </div>            
        </div>
	</form>
</div>
@include('layouts.partials.scripts_auth')
@endsection
