@extends('layouts.app')
@section('htmlheader_title')
    Salary
@endsection
@section('contentheader_title')
@endsection
@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<div class="col-md-4"></div>
<?php 
	$month = date('F');
	if($month=='March'){
 ?>
<div class="col-md-4">
	<a href="upload_income_excel" class="btn btn-primary btn-block btn-flat">Upload Income Tax Excelsheet</a>
</div>
<?php } ?>
<div class="row">
	<div class="col-md-4">
		@if(Session::has('msg'))
			<div class="alert alert-success">
				<strong>{{ Session::get('msg') }}</strong>
			</div>
		@endif	
	</div>
	<form action="insert_sallary_claim"  method="post" >	
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
								<option value="2029">2029</option>
								<option value="2030">2030</option>
							</select>
						</div>
					</div>
				</div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							@foreach ($views as $employee)							
                            <tr>
								<?php 
								$row = DB::table('servicebooks')->where([['emp_id', $employee->emp_id], ['status', '1']])->get();
								foreach($row as $employee){
								?>
                                <td><input type="hidden" class="form-control" placeholder="" name="emp_id[]" id="emp_id" onkeyup="" value="{{$employee->emp_id}}" readonly />
								<td><input type="hidden" class="form-control" placeholder="" name="initial_pay[]" id="initial_pay" onkeyup="" value="{{$employee->initialpay}}" />
								<td><input type="hidden" class="form-control" placeholder="" name="status" id="status" value="1" readonly />
								<?php							
									$i=0;	
									$row = DB::table('parameter_values')->select('value')->where([['parameter_id', '7'], ['status', '1']])->first();
									$hra= ceil(($row->value/100)*$employee->basic_pay);
									//$city_allowance = 0;
									$others = 0;
									$i++;
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->da }}" name="dearness_allowance[]" id="dearness_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->hra }}" name="hra[]" id="hra<?php echo $i ?>" onkeyup="getGrossSalary();" readonly /></td>
								<?php
									$row = DB::table('parameter_values')->select('value')->where([['parameter_id', '8'], ['status', '1']])->first();
								?>							
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $row->value }}" name="medical_allowance[]" id="medical_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly /></td>
								
								<?php $row = DB::table('conveyance_allowance_parameter')->select('amount')->where([['post_id', $employee->post_id], ['status', '1']])->first(); ?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $row->amount }}" name="conveyance_allowance[]" readonly /></td>
								<?php $charges = DB::table('charge_allo')->where('emp_id', $employee->emp_id)->get(); {?>
								@forelse($charges as $charge)
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $charge->amount }}" name="charge_allow[]" /></td>
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="charge_allow[]" id="gpf_loan<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse	
								<?php } ?>								
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->city_allowance }}" name="city_allowance[]" id="city_allowance<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $others }}" name="others[]" id="others<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>
								
								<!--<td><input type="text" class="form-control" placeholder="" value="0" name="gross_salary[]" id="gross_salary<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();"  /></td>-->
							</tr>
							<?php } ?>
							@endforeach
							<?php $i=0; ?>
							@foreach ($views as $employee)
							<?php 
								$row = DB::table('servicebooks')->where([['emp_id', $employee->emp_id], ['status', '1']])->get();
								foreach($row as $employee){
								?>
                            <tr>						
								<input type="hidden" class="form-control" placeholder="" value="{{ $employee->basic_pay }}" name="basic_pay[]" id="basic_pay<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" readonly />
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->gpf_persentage }}" name="gpf_persentage[]" id="gpf_persentage<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>								
								
								<?php 
									$number = ($employee->gpf_persentage/100)*$employee->basic_pay;
									$gpf = ceil($number / 100) * 100;
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->gpf_persentage }}" name="gpf_deduction[]" id="gpf_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>								
								
								<?php $loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '4'], ['status', 3]])->get(); ?>
								@forelse($loans as $l)
								<?php if($l->principal_installment==0 && $l->f_installment>0) { ?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $l->f_installment }}" name="gpf_loan[]" id="gpf_loan<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>									
								<?php } else {?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $l->emi }}" name="gpf_loan[]" id="gpf_loan<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								<?php } ?>
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="gpf_loan[]" id="gpf_loan<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse							
								
								<td><input type="hidden" class="form-control" placeholder="" value="<?php echo round(($employee->nps_persentage/100)*($employee->basic_pay+$employee->da)); ?>" name="nps_deduction[]" id="nps_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								<?php $loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '5'], ['status', 3]])->orderBy('loan_transection_id', 'desc')->get();	?>
								@forelse($loans as $l)
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $l->emi }}" name="festival_deduction[]" id="festival_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="festival_deduction[]" id="festival_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<?php $loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '1'], ['status', 3]])->get(); {?>	
								@forelse($loans as $l)
								<?php if($l->principal_installment==0 && $l->f_installment>0){
									$amounts = DB::table('loan_trasection')->select(DB::raw("SUM(f_installment) as f_installment"))		
									->where('emp_id', $l->emp_id)
									->where('loan_type_id', '1')
									->where('status', '3')									
									->first();
									$house_building_deduction = $amounts->f_installment;
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $house_building_deduction }}" name="house_building_deduction[]" /></td>										
								<?php } elseif($l->outstanding_principal>0){
									$amounts = DB::table('loan_trasection')->select(DB::raw("SUM(emi) as emi"))		
										->where('emp_id', $l->emp_id)
										->where('loan_type_id', '1')
										->where('status', '3')									
										->get(); 
									foreach($amounts as $amount){
										$house_building_deduction = $amount->emi;
									}									
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $house_building_deduction }}" name="house_building_deduction[]" /></td>										
								<?php } elseif($l->interest_installment==0 && $l->f_i_installment>0){
									$amounts = DB::table('loan_trasection')->select(DB::raw("SUM(f_i_installment) as f_i_installment"))		
										->where('emp_id', $l->emp_id)
										->where('loan_type_id', '1')
										->where('status', '3')									
										->get(); 
									foreach($amounts as $amount){
										$house_building_deduction = $amount->f_i_installment;
									}									
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $house_building_deduction }}" name="house_building_deduction[]" /></td>
								
								<?php } elseif($l->outstanding_interest_amount>0){
									$amounts = DB::table('loan_trasection')->select(DB::raw("SUM(interest_emi) as interest_emi"))		
										->where('emp_id', $l->emp_id)
										->where('loan_type_id', '1')
										->where('status', '3')									
										->get(); 
									foreach($amounts as $amount){
										$house_building_deduction = $amount->interest_emi;
									}									
								?>
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $house_building_deduction }}" name="house_building_deduction[]" /></td>
								<?php }?>
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="house_building_deduction[]" /></td>
								@endforelse
								<?php } ?>	
								<?php 									
									$loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '2'], ['status', 3]])->orderBy('loan_transection_id', 'desc')->get();									
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
									$loans = DB::table('loan_trasection')->where([['emp_id', $employee->emp_id], ['loan_type_id', '3'], ['status', 3]])->orderBy('loan_transection_id', 'desc')->get();									
								?>
								@forelse($loans as $l)
								<?php if($l->emi>0){
									$emi = $l->emi;
								}else{
									$emi = $l->interest_emi;
								} ?>
								<td><input type="hidden" class="form-control" placeholder="" value="<?php echo $emi ?>" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="motor_cycle_deduction[]" id="motor_cycle_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<?php 
									$current_date = date("Y-m-d");
									$ammounts = DB::table('assets')->select(DB::raw("SUM(ammount) as ammount"))
									->where('emp_id', $employee->emp_id)
									->whereDate('policy_date', '>', $current_date)
									->get(); 
								?>								
								@foreach($ammounts as $ammount)
								@if($ammount->ammount != NULL)
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $ammount->ammount }}" name="salary_saving_deduction[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>										
								@else
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="salary_saving_deduction[]" id="emi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>	
								@endif
								@endforeach
								
								<td><input type="hidden" class="form-control" placeholder="" value="208" name="professional_tax_deduction[]" id="professional_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								<?php $ammounts = DB::table('tax')->where([['emp_id', $employee->emp_id], ['status', '1']])->get();																				
								?>
								@forelse($ammounts as $ammount)
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $ammount->tax_amount }}" name="income_tax_deduction[]" id="income_tax_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="income_tax_deduction[]" id="salary_saving_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								@endforelse
								
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="other_deduction[]" id="other_deduction<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>
								
								
								<td><input type="hidden" class="form-control" placeholder="" value="" name="union_fee[]" id="union_fee<?php echo $i ?>" onkeyup="getGrossSalary<?php //echo $i ?>();" /></td>
								<?php 									
									$kss = DB::table('kss')->where([['emp_id', $employee->emp_id], ['status', '1']])->get();									
								?>
								@forelse($kss as $k)								
								<td><input type="hidden" class="form-control" placeholder="0" value="{{ $k->total }}" name="kss[]" id="kss" /></td>										
								@empty
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="kss[]" id="kss" /></td>
								@endforelse	
								@if($employee->glsi != NULL)
								<td><input type="hidden" class="form-control" placeholder="" value="{{ $employee->glsi }}" name="glsi[]" id="glsi" /></td>								
								@else
								<td><input type="hidden" class="form-control" placeholder="" value="0" name="glsi[]" id="glsi<?php echo $i ?>" onkeyup="getGrossSalary<?php echo $i ?>();" /></td>	
								@endif
								<?php $i++; ?>
							</tr>
							<?php } ?>
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
