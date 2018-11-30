@extends('layouts.app')

@section('htmlheader_title')
    Employees
@endsection

@section('contentheader_title')
    Employees
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
								<th>Policy No</th>
								<th>Amount</th>
								<!--<th>Total</th>-->
								<th>Policy Date</th>
							</tr>
							@foreach ($employees as $employee)
                            <tr>								
                                <td>{{ $employee->emp_id }}</td>
								<td>{{ $employee->policy_no }}</td>
								<td>{{ $employee->ammount}}</td>
								<?php 
									$current_date = date("Y-m-d");
									$ammounts = DB::table('assets')->select(DB::raw("SUM(ammount) as ammount"))
									->where('emp_id', $employee->emp_id)
									->whereDate('policy_date', '>', $current_date)
									->get(); 
								?>
								@foreach($ammounts as $ammount)
								<!--<td>{{ $ammount->ammount }}</td>-->	
								@endforeach
								<td>{{ $employee->policy_date }}</td>                                
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