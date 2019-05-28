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
								<th>Loan Amount</th>
								<th>No of Installment</th>
								<th>Interest Amount</th>
								<th>Total Loan Amount</th>
								<th>Status</th>
							</tr>
							@foreach ($view_loan_status as $view_status)
                            <tr>
								<td>
									<?php
									$employee = DB::table('employees')->where('emp_id', $view_status->emp_id)->first();
										echo $employee->emp_f_name?>&nbsp;<?php echo $employee->emp_m_name?>&nbsp;<?php echo $employee->emp_l_name
									 ?>
								</td>
								<td>
									<?php
									$employee = DB::table('loan_type')->where('loan_type_id', $view_status->loan_type_id)->first();
										echo $employee->loan_type
									?>
								</td>                                
                                <td>{{ $view_status->loan_ammount }}</td>
								<td>{{ $view_status->no_of_instalment }}</td>
								<td>{{ $view_status->interest_amount }}</td>
								<td>{{ $view_status->pricipal_ammount }}</td>
								<td>
								<?php if($view_status->status == 1){ ?>
									<a href=""><span class="label label-primary">Applied</a></span>
								<?php } elseif($view_status->status == 2) { ?>
									<a href=""><span class="label label-primary">Processing</a></span>
								<?php } elseif($view_status->status == 3){ ?>
									<a href=""><span class="label label-primary">Loan Approved</a></span>
                                <?php } elseif($view_status->status == 4) { ?>
									<a href=""><span class="label label-primary">Loan Rejected</a></span>
								<?php } ?>
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