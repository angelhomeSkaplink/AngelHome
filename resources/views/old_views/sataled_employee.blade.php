@extends('layouts.app')

@section('htmlheader_title')
    Sattled Employee
@endsection

@section('contentheader_title')
    Sattled Employee
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">               
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Name</th>
								<th>Pension Order No</th>
								<th>Pension Order Date</th>
								<th>Pension Type</th>
								<th>Basic Pay</th>
								<th>DR</th>								
								<th>Medical</th>
								<th>Monthly Pension Amount</th>
								<th>Remarks</th>
							</tr>
							@foreach ($pensions as $pension)
							<tr>
								<?php $employee = DB::table('employees')->where('emp_id', $pension->employee_id)->first(); ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<td>{{ $pension->pension_order_number }}</td>
								<td>{{ $pension->pension_order_date }}</td>
								<td>{{ $pension->pension_type }}</td>
								<td>{{ $pension->basic }}</td>
								<td>{{ $pension->dr }}</td>
								<td>{{ $pension->medical }}</td>								
								<td>{{ $pension->total_pension }}</td>
								<td>{{ $pension->remark }}</td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="sattle_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($pensions) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')

@endsection