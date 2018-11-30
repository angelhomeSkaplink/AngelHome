@extends('layouts.app')

@section('htmlheader_title')
    DA Arrear(MIS)
@endsection

@section('contentheader_title')
   DA Arrear(MIS)
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Code</th>
								<th>Name</th>
								<th>Amount</th>
								<th>Month</th>
								<th>Year</th>									
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>
								<?php $emp = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>
								<td>{{ $emp->emp_f_name }} {{ $emp->emp_m_name }} {{ $emp->emp_l_name }}</td>
								<td>{{ $employee->arrears }}</td>
								<td>{{ $employee->month}}</td>
								<td>{{ $employee->year}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
					<form action="da_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($employees) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
				</div>               
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection