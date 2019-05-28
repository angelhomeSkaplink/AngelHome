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
<div class="row">  
	<form action="{{action('LoanController@temporary_loan_forward')}}" method="post">       
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">
					{{ csrf_field() }}						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="temporary_loan_transection_id" value="{{ $row->temporary_loan_transection_id }}" />
					</div>													
					<?php	$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); { ?>
					<div class="form-group has-feedback">
						Employee
						<input type="text" class="form-control" name="emp_id" value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
					</div>
					<?php } ?>
					<?php $leavetype = DB::table('loan_type')->where('loan_type_id', $row->loan_type_id)->first(); { ?>
					<div class="form-group has-feedback">
						Loan Type
						<input type="text" class="form-control" name="loan_type_id" value="{{ $leavetype->loan_type }}" readonly />
					</div>
					<?php } ?>
					<div class="form-group has-feedback">
						Loan Amount
						<input type="text" class="form-control" name="loan_ammount" value="{{ $row->loan_ammount }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Outstanding Amount
						<input type="text" class="form-control" name="outstanding_principal" value="{{ $row->outstanding_principal }}" readonly />
					</div>
					<div class="form-group has-feedback">
						No of Instalment
						<input type="text" class="form-control" name="no_of_instalment" value="{{ $row->no_of_instalment }}" readonly />
					</div>
					<div class="form-group has-feedback">
						EMI
						<input type="text" class="form-control" name="emi" value="{{ $row->emi }}" readonly />
					</div>
					<div class="form-group has-feedback">
						First Installment
						<input type="text" class="form-control" name="f_installment" value="{{ $row->f_installment }}" readonly />
					</div>
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
						<input type="date" class="form-control" name="forwarded_on" value="{{ $row->forwarded_on }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Remarks
						<input type="text" class="form-control" name="remarks" value="{{ $row->remarks}}" readonly />
					</div>
					<?php if($row->status == 2){ ?>
						<a href="../approved_temporary_loan/{{ $row->temporary_loan_transection_id }}" class="btn btn-primary btn-block btn-flat" >Approve</a>
						<a href="../rejected_temporary_loan/{{ $row->temporary_loan_transection_id }}" class="btn btn-primary btn-block btn-flat" >Reject</a>				
					<?php } 
					elseif($row->status == 3){
					?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Loan Approved</a>
					<?php } elseif($row->status == 4){?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Loan Rejected</a>
					<?php } ?>
				</div>
			</div>
		</div>		
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection