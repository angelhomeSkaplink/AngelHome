@extends('layouts.app')

@section('htmlheader_title')
    Employee Loans
@endsection

@section('contentheader_title')
    Employee Loans
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Employee</th>
								<th>Loan Type</th>
								<th>Amount</th>
								<th>View Detail</th>
								<th width="1"></th>
							</tr>
							@foreach ($loan_views as $loan_view)
                            <tr>
								<td>
									<?php
									$employee = DB::table('employees')->where('emp_id', $loan_view->emp_id)->first();
										echo $employee->emp_f_name?>&nbsp;<?php echo $employee->emp_m_name?>&nbsp;<?php echo $employee->emp_l_name
									 ?>
								</td>
								<td>
									<?php
									$employee = DB::table('loan_type')->where('loan_type_id', $loan_view->loan_type_id)->first();
										echo $employee->loan_type
									 ?>
								</td>                                
                                <td>{{ $loan_view->loan_ammount }}</td>
								<td>
                                    <a href="show_loan_details/{{ $loan_view->loan_transection_id }}"><span class="label label-primary">View</a></span>
                                </td>
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
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}
@endsection