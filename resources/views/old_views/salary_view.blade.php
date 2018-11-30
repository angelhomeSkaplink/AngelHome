@extends('layouts.app')

@section('htmlheader_title')
     Salary View
@endsection

@section('contentheader_title')
    Salary View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee ID</th>
								<th>Employee Name</th>
								<th>Claims</th>
								<th>Deductions</th>
							</tr>
							@foreach ($employees as $employee)
							<tr>
								<td>{{ $employee-> emp_id }}</td>
								<td>{{ $employee-> emp_f_name }} {{ $employee-> emp_m_name }} {{ $employee-> emp_l_name }} </td>
								<td><a href="view_claims/{{ $employee-> emp_id }}"><span class="label label-primary">Claims</a></span></td>
								<td><a href="view_deductions/{{ $employee-> emp_id }}"><span class="label label-primary">Deductions</a></span></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
	
@endsection
