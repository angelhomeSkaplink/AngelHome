@extends('layouts.app')

@section('htmlheader_title')
    Reteired Employees
@endsection

@section('contentheader_title')
    Reteired Employees
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
								<th>Date of Retirement</th>
								<th>Add Bank Details</th>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>								
								<td>{{ $employee->emp_date_of_retirement }}</td>
                                <td><a href="add_pension_bank/{{ $employee->emp_id }}"><span class="label label-primary">Add Bank Details</a></span></td>							
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