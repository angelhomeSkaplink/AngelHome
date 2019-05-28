@extends('layouts.app')

@section('htmlheader_title')
    Ploicy View
@endsection

@section('contentheader_title')
    Ploicy View
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
								<th>Name</th>
								<th>Policy No</th>
								<th>Amount</th>
								<th>Policy Date</th>
								<th>Remark</th>
								<?php if(Auth::user()->role == '1') { ?>
								<th>Edit</th>
								<th>Close</th>
								<?php } ?>
							</tr>
							@foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->emp_id }}</td>								
								<td>
									<?php $name = DB::table('employees')->where('emp_id', $employee->emp_id)->first(); ?>
									{{ $name->emp_f_name }} {{ $name->emp_m_name }} {{ $name->emp_l_name }}
								</td>
								<td>{{ $employee->policy_no }}</td>
								<td>{{ $employee->ammount}}</td>
								<td>{{ $employee->policy_date }}</td> 
								<td>{{ $employee->remarks }}</td>
								<?php if(Auth::user()->role == '1') { ?>
								<td><a href="policy_edit/{{ $employee->asset_id }}"><span class="label label-primary">Edit</a></span></td>
								<td><a href="policy_close/{{ $employee->asset_id }}"><span class="label label-primary">Close</a></span></td>
								<?php } ?>
							</tr>	
                        @endforeach
                        </tbody>
                    </table>
					<form action="lic_excel" method="post">
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