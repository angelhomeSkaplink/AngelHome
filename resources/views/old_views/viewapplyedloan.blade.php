@extends('layouts.app')

@section('htmlheader_title')
    Applyed Loans
@endsection

@section('contentheader_title')
    Applyed Loans
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>						
							<tr>
								<th>Employee</th>
								<th>Loan Type</th>
								<th>Application</th>
								<th>Approve On</th>
								<th>Approve By</th>
								<th>Status</th>
								<th>Month</th>
								<th>Year</th>
							</tr>
							<tr>
							<?php $users = DB::table('apply_loans')->where('fld_DeptID', $row->fld_DeptID)->get();
								foreach ($users as $user)
								{ 
									?>
										<td>{{ $user->emp_id }}</td>
										<td>{{ $user->loan_type_id }}</td>
										<td>{{ $user->application }}</td>
										<td>{{ $user->approved_on }}</td>
										<td>{{ $user->approved_by }}</td>
										<td>{{ $user->status }}</td>
										<td>{{ $user->month }}</td>
										<td>{{ $user->year }}</td>
									<?php
								}														
							?>							
                            </tr> 
                        </tbody>
                    </table>
                </div>                
            </div>
            <!-- /.box -->
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