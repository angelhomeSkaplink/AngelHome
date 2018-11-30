@extends('layouts.app')

@section('htmlheader_title')
    Employees Deputation/Lien
@endsection

@section('contentheader_title')
    Employees Deputation/Lien
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('deputation') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee Code</th>
								<th>Employee Name</th>
								<th>Deputation/Lien</th>
								<th>Date</th>
							</tr>
							@foreach ($promotions as $promotion)
                            <tr>                                								
								<td>{{ $promotion->emp_id }}</td>
								<?php $employee = DB::table('employees')->where('emp_id', $promotion->emp_id)->first();	{ ?>
								<td>{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}</td>
								<?php } ?>
								<td>{{ $promotion->deputation }}</td>
								<td>{{ $promotion->date }}</td>                            
                            </tr>
							@endforeach
                        </tbody>
                    </table>
					<form action="deputation_excel" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="data" value="{{ json_encode($promotions) }}">
						<button class="btn btn-info" type="submit">Export Data to Excel <i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
					</form>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
@endsection