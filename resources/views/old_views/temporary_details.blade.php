@extends('layouts.app')

@section('htmlheader_title')
    Loan Detail View
@endsection

@section('contentheader_title')
    Loan Detail View
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../js/bootstrap-datepicker.js"></script>
<div class="row">  
	<form action="{{action('LoanController@loan_calculation')}}" method="post">       
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Loan Detail View</h3>
				</div>
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="temporary_loan_transection_id" value="{{ $row->temporary_loan_transection_id }}" />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="loan_id" value="{{ $row->loan_type_id }}" />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="em_id" value="{{ $row->emp_id }}" />
					</div>					
					<?php	$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); { ?>
					<div class="form-group has-feedback">
						Employee
						<input type="text" class="form-control" name="emp_id"
							value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
					</div>
					<?php } ?>
					<?php $leavetype = DB::table('loan_type')->where('loan_type_id', $row->loan_type_id)->first(); { ?>
					
					<div class="form-group has-feedback">
						Loan Type
						<input type="text" class="form-control" name="loan_type_id" id="loan_type_id" value="{{ $leavetype->loan_type }}" readonly />
					</div>
					<?php } ?>
					<div class="form-group has-feedback">
						Principal Amount
						<input type="text" class="form-control" name="loan_ammount" id="loan_ammount" value="{{ $row->loan_ammount }}" readonly />
					</div>
					<?php if($row->loan_type_id == 1){ ?>
					<script>
						function getLoan(){
							var loan_ammount = parseFloat(document.getElementById('loan_ammount').value); // Loan Amount							
							var no_of_instalment = parseFloat(document.getElementById('no_of_instalment').value);
							var emi = Math.floor(loan_ammount/no_of_instalment);
							document.getElementById('emi').value = emi;
							var emi_of_instalment = no_of_instalment-1;
							var f_installment = loan_ammount-(emi*emi_of_instalment);
							document.getElementById('f_installment').value = f_installment;
							var interest_persentage = parseFloat(document.getElementById('interest_persentage').value);
							var interest_amount = Math.floor(no_of_instalment*((no_of_instalment+1)/2)*(emi/12)*(interest_persentage/100));
							document.getElementById('interest_amount').value = interest_amount;
							var pricipal_ammount = interest_amount+loan_ammount;
							document.getElementById('pricipal_ammount').value = pricipal_ammount;
							var no_of_instalment_interest = interest_persentage = parseFloat(document.getElementById('no_of_instalment_interest').value);
							var interest_emi = Math.floor(interest_amount/no_of_instalment_interest);
							console.log(interest_emi);
							document.getElementById('interest_emi').value = interest_emi;
						}
					</script>
					<!--<div class="form-group has-feedback">	
						No of Instalment
						<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="" onkeyup='getLoan();' />
					</div>					
					<div class="form-group has-feedback">
						EMI
						<input type="text" class="form-control" name="emi" id="emi" value="" readonly />
					</div>
					<div class="form-group has-feedback">
						First Installment
						<input type="text" class="form-control" name="f_installment" id="f_installment" value="" readonly />
					</div>
					<div class="form-group has-feedback">
						Interest Persentage
						<input type="text" class="form-control" name="interest_persentage" id="interest_persentage" onkeyup='getLoan();' />
					</div>
					<div class="form-group has-feedback">
						Interset Amount
						<input type="text" class="form-control" name="interest_amount" id="interest_amount" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Total Loan Ammount
						<input type="text" class="form-control" name="pricipal_ammount" id="pricipal_ammount" value="" readonly />
					</div>
					<div class="form-group has-feedback">	
						No of Instalment(Interest Amount)
						<input type="text" class="form-control" name="no_of_instalment_interest" id="no_of_instalment_interest" value="" onkeyup='getLoan();'  />
					</div>
					<div class="form-group has-feedback">	
						EMI(Interest Amount)
						<input type="text" class="form-control" name="interest_emi" id="interest_emi" value="" onkeyup='getLoan();' readonly />
					</div>-->									
				</div>
			</div>
		</div> 
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<?php	$employee = DB::table('loan_trasection')->where([['emp_id', $row->emp_id],['status', '3']])->first(); { ?>
					<?php if(count($employee)>0) {?>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" name="loan_amount" id="loan_amount" value="{{ $employee->loan_ammount }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Outstanding Principal Amount
						<input type="text" class="form-control" name="outstanding_principal" id="outstanding_principal" value="{{ $employee->outstanding_principal }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Outstanding Principal Installment
						<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="{{ $employee->no_of_instalment - $employee->principal_installment }}" />
					</div>
					<?php } else {?>
					<input type="hidden" class="form-control" name="loan_amount" id="loan_amount" value="0" readonly />
					<div class="form-group has-feedback">
						Outstanding Principal Amount
						<input type="text" class="form-control" name="outstanding_principal" id="outstanding_principal" value="0" readonly />
					</div>
					<div class="form-group has-feedback">
						Outstanding Principal Installment
						<input type="text" class="form-control" name="no_of_instalment" id="no_of_instalment" value="0" />
					</div>
					<?php } ?>	
					<?php } ?>					
					<?php } ?>				
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						Applied On
						<input type="date" class="form-control" name="applied_on" value="{{ $row->applied_on }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Applied For
						<input type="text" class="form-control" name="applied_for" value="{{ $row->applied_for }}" readonly />
					</div>
					<div class="form-group has-feedback">						
						<input type="hidden" class="form-control" name="status" value="2" readonly />
					</div>					
					<div class="form-group has-feedback">
						Forwarded By
						<input type="text" class="form-control" name="forwarded_by" value="{{ $row->forwarded_by }}"  />
					</div>	
					<div class="form-group has-feedback">
						Forwarded On
						<input type="text" class="form-control" name="forwarded_on" id="forwarded_on" value="{{ $row->forwarded_on }}"  />
						<script type="text/javascript"> $('#forwarded_on').datepicker({format: 'yyyy/mm/dd'});</script>
					</div>
					<div class="form-group has-feedback">
						Remarks
						<input type="text" class="form-control" name="remarks" value="{{ $row->remarks}}"  />
					</div>
					<?php if($row->status == 1){ ?>
					<div class="row">                    
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Calculate</button>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection