@extends('layouts.app')
@section('htmlheader_title')
    Salary
@endsection
@section('contentheader_title')
    Salary
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="row">
	<form action="insert_sallary_claim"  method="post">	
		{!! csrf_field() !!}	
        <div class="col-md-12">			
            <div class="box box-primary">
				<div class="col-md-4">
					<div class="required">
						<div class="form-group has-feedback">
							<b>Month</b>
							<select required x-moz-errormessage="Please Select an item from the list" name="month" id="month" class="form-control">
								<option value="">Select month</option>
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
				</div>
				<div class="col-md-4">
					<div class="required">
						<div class="form-group has-feedback">
							<b>Year</b>
							<select required x-moz-errormessage="Please Select an item from the list" name="year" id="year" class="form-control">
								<option value="">Select Year</option>
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								<option value="2018">2018</option>
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
								<option value="2026">2026</option>
								<option value="2027">2027</option>
								<option value="2028">2028</option>
							</select>
						</div>
					</div>
				</d
				iv>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							@foreach ($views as $employee)							
                            <tr>
                                <td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								<td><input type="hidden" class="form-control" placeholder="" name="status" id="status" value="1" readonly />
								<?php							
									$i=0;	
									$hra= (15/100)*$employee->basic_pay;
									$medical_allowance = 750;
									$conveyance_allowance = 1200;
									$city_allowance = 0;
									$others = 0;
									$i++;
								?>								
								<?php  ?>	
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->da }}" name="dearness_allowance[]" id="dearness_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $hra }}" name="hra[]" id="hra<?php echo $i ?>" onkeyup="getGrossSalary();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $medical_allowance }}" name="medical_allowance[]" id="medical_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $conveyance_allowance }}" name="conveyance_allowance[]" id="conveyance_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $city_allowance }}" name="city_allowance[]" id="city_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $others }}" name="others[]" id="others<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								<!--<td><input type="text" class="form-control" placeholder="" value="0" name="gross_salary[]" id="gross_salary<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>-->
							</tr>							
							@endforeach
							<?php $i=0; ?>
							@foreach ($views as $employee)							
                            <tr>						
								<input type="hidden" class="form-control" placeholder="" value="{{ $employee->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly />
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->gpf_persentage }}" name="gpf_persentage[]" id="gpf_persentage<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>								
								
								<?php $loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '4']])->orderBy('loan_transection_id', 'desc')->get();	?>
								@forelse($loans as $l)
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $l->emi }}" name="emi[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="emi[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<td><input type="hidden" class="form-control" placeholder="" value="<?php echo (($employee->gpf_persentage/100)*$employee->basic_pay)+$l->emi; ?>" name="gpf_deduction[]" id="gpf_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="<?php echo ($employee->nps_persentage/100)*$employee->basic_pay; ?>" name="nps_deduction[]" id="nps_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								<?php $loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '5']])->orderBy('loan_transection_id', 'desc')->get();	?>
								@forelse($loans as $l)
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $l->emi }}" name="festival_deduction[]" id="festival_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="festival_deduction[]" id="festival_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<!--<td><input type="text" class="form-control" placeholder="" value="100" name="festival_deduction[]" id="festival_deduction<?php //echo $i ?>" onkeyup="getGrossSalary<?php //echo $i ?>();" /></td>-->
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '1']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="hidden" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="house_building_deduction[]" id="house_building_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="house_building_deduction[]" id="house_building_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '2']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="hidden" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="car_loan_deduction[]" id="car_loan_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="car_loan_deduction[]" id="car_loan_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '3']])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="hidden" class="form-control" placeholder="0" value="<?php echo $emi ?>" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="group_deduction[]" id="group_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								<?php $ammounts = DB::table('assets')->select(DB::raw("SUM(ammount) as count"))->where('emp_id', $employee->emp_id)->get();	?>
								@forelse($ammounts as $ammount)
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $ammount->count }}" name="salary_saving_deduction[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="salary_saving_deduction[]" id="salary_saving_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="professional_tax_deduction[]" id="professional_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="income_tax_deduction[]" id="income_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<script>
									$(document).ready(function() {  
										$(document).ready(function() {
											$('select[name="month"]').on('change', function() {
												var month = $(this).val();
												if(month=='December'){
													document.getElementById('welfare_deduction<?php echo $i ?>').value = '300';
												}
												else{
													document.getElementById('welfare_deduction<?php echo $i ?>').value = '0';
												}
											});
										});
									});
								</script>
								
								<td><input type="hidden" class="form-control" placeholder="" value="" name="welfare_deduction[]" id="welfare_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="other_deduction[]" id="other_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								<script>
									$(document).ready(function() {  
										$(document).ready(function() {
											$('select[name="month"]').on('change', function() {
												var month = $(this).val();
												if(month=='July'){
													document.getElementById('union_fee<?php echo $i ?>').value = '300';
												}
												else{
													document.getElementById('union_fee<?php echo $i ?>').value = '0';
												}
											});
										});
									});
								</script>
								
								<td><input type="hidden" class="form-control" placeholder="" value="" name="union_fee[]" id="union_fee<?php echo $i ?>" onkeyup="getGrossSalary<?php //echo $i ?>();" /></td>
								<?php 									
									$kss = DB::table('kss')->where([['emp_id', $employee->emp_id], ['status', '1']])->get();									
								?>
								@forelse($kss as $k)								
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $k->total }}" name="kss[]" id="kss" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="kss[]" id="kss" /></td>
								@endforelse								
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="glsi[]" id="glsi" /></td>								
								<?php $i++; ?>
							</tr>
							@endforeach							
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
