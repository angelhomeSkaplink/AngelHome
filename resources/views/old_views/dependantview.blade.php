@extends('layouts.app')

@section('htmlheader_title')
     Dependant View
@endsection

@section('contentheader_title')
    Dependant View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href={{ url('dependant') }} class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Dependant Name</th>								
								<th>Relation</th>
								<th>Employee Name</th>
								<th>Date of Birth</th>
								<th>Profession</th>
								<?php if(Auth::user()->role == '1'){ ?>
								<th>Status</th>
								<th>Submission Date</th>
								<th>Delete</th>
								<?php } ?>
							</tr>
							@foreach ($dependants as $dependant)
							<tr>
								<td>{{ $dependant->first_name }} {{ $dependant->last_name }}</td>
								
								<td>{{ $dependant->relation }}</td>
								<td>
									<?php
										$employee = DB::table('employees')->where('emp_id', $dependant->emp_id)->get();
										foreach($employee as $emp)
										echo $emp->emp_f_name ?>&nbsp;<?php echo $emp->emp_m_name ?>&nbsp;<?php echo $emp->emp_l_name														
									?>
								</td>
								<td>{{ $dependant->dob }}</td>
								<td>{{ $dependant->profession }}</td>
								<?php if(Auth::user()->role == '1'){ ?>
								<?php if($dependant->status == 1) { ?>
								<td>Active</td>
								<?php } else { ?>
								<td>Inactive</td>
								<?php } ?>
								<td>{{ $dependant->submission_date }}</td>
								<td><a href="delete_dependant/{{ $dependant-> dependant_id }}"><span class="label label-primary" onclick="return confirm('Are you sure you want Delete this record ??');">Delete</a></span></td>
								<?php } ?>
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