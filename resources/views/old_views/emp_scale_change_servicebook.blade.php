@extends('layouts.app')

@section('htmlheader_title')
    Employee ServicesBook
@endsection

@section('contentheader_title')
    Employee ServicesBook
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
								<th>Pay Scale(Lower Limit)</th>
								<th>Pay Scale(Uper Limit)</th>
								<th>Grade Pay</th>								
							</tr>
							@foreach ($employees as $employee)
								<tr>
									<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>									
									<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>									
									<?php $scale = DB::table('scale')->where('scale_id', $employee->scaleId)->first(); ?>
									<td>{{ $scale->payScale_lower_limit }}</td>
									<td>{{ $scale->payScale_uper_limit }}</td>
									<td>{{ $scale->grade_pay }}</td>
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