@extends('layouts.app')

@section('htmlheader_title')
    Loan MIS Report
@endsection

@section('contentheader_title')
    Loan MIS Report
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">               
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>Designation</th>
								<th>Loan Type</th>
								<th>Principal Amount</th>
								<th>EMI(Principal Amount)</th>
								<th>Installment(Principal Amount)</th>
								<th>Interest Amount</th>
								<th>EMI(Interest Amount)</th>
								<th>Installment(Interest Amount)</th>
							</tr>
							@foreach ($loans as $loan)
							<tr>
								<td>{{ $loan->emp_id }}</td>
								<?php $row = DB::table('employees')->where('emp_id', $loan->emp_id)->first(); ?>
								<td>{{ $row->emp_f_name }}&nbsp;&nbsp;{{ $row->emp_m_name }}&nbsp;&nbsp;{{ $row->emp_l_name }}</td>
								<?php $r = DB::table('posts')->where('fld_PostID', $row->post_id)->first(); ?>
								<td>{{ $r->fld_PostName }}</td>
								<?php $row = DB::table('loan_type')->where('loan_type_id', $loan->loan_type_id)->first(); ?>
								<td>{{ $row->loan_type }}</td>
								<td>{{ $loan->loan_ammount }}</td>
								<td>{{ $loan->emi }}</td>
								<td>{{ $loan->no_of_instalment }}</td>
								<td>{{ $loan->interest_amount }}</td>
								<td>{{ $loan->interest_emi }}</td>
								<td>{{ $loan->no_of_instalment_interest }}</td>
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