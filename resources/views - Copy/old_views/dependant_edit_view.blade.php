@extends('layouts.app')

@section('htmlheader_title')
    Dependant Edit
@endsection

@section('contentheader_title')
    Dependant Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>
<div class="row"> 
	<div class="col-md-4"></div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Dependant Edit</h3>
            </div>
            <div class="box-body">                   
                <form action="{{action('DependantController@update_dependant')}}" method="post">
					<input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}
						
					<div class="form-group has-feedback">
                    <input type="hidden" class="form-control" name="dependant_id"
                        value="{{ $row->dependant_id }}" />
					</div>
					<div class="form-group has-feedback">
						Employee Name
						<select name="emp_id" id="emp_id" class="form-control">							
							<?php
								$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first();
								{
								?>
									<option value="<?php echo $employee->emp_id ?>"><?php echo $employee->emp_f_name ?>&nbsp;<?php echo $employee->emp_m_name ?>&nbsp;<?php echo $employee->emp_l_name ?></option>
							<?php } ?>
							<?php
								$users = DB::table('employees')->get();							
								foreach ($users as $user)
								{ 
									?>
										<option value="{{ $user->emp_id}}">{{ $user->emp_f_name }} {{ $user->emp_m_name }} {{ $user->emp_l_name }}</option>
									<?php
								}														
							?>												
						</select>
					</div>
					<div class="form-group has-feedback">
						<select name="relation" id="relation" class="form-control" required >
							<option value="{{ $row->relation }}">{{ $row->relation }}</option>
							<option value="Mother">Mother</option>
							<option value="Father">Father</option>
							<option value="Brother">Brother</option>
							<option value="Sister">Sister</option>
							<option value="Spouse">Spouse</option>
						</select>
					</div>
					<!--<div class="form-group has-feedback">
						Relation
                        <input type="text" class="form-control" name="relation"
                            value="{{ $row->relation }}" />
					</div>-->					
					<div class="form-group has-feedback">
						First Name
                        <input type="text" class="form-control" name="first_name"
                            value="{{ $row->first_name }}" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div>
					<div class="form-group has-feedback">
						Last Name
                        <input type="text" class="form-control" name="last_name"
                            value="{{ $row->last_name }}" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                    </div>
					<div class="form-group has-feedback">
						Date of Birth
                        <input type="date" class="form-control" name="dob" id="dob"
                            value="{{ $row->dob }}" required />
							<script type="text/javascript"> $('#dob').datepicker({format: 'yyyy/mm/dd'});</script> 
                    </div>
					<div class="form-group has-feedback">
						Profession
                        <input type="text" class="form-control" name="profession"
                            value="{{ $row->profession }}" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
                    </div>
					<div class="form-group has-feedback">
						<select name="status" id="status" class="form-control">
							<option value="{{ $row->status }}" required>
							<?php if($row->status == 1){ ?>
							Active
							<?php } elseif($row->status == 2) {?>
							Inactive </option>
							<?php } ?>
							<option value="1">Active</option>
							<option value="2">Inactive</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" placeholder="Profession" name="submission_date" value="<?php echo date('Y/m/d'); ?>"/>
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div><!-- /.col -->
					</div>
                </form>
            </div>
        </div>
    </div> 	
</div>
@endsection
@section('scripts-extra')

@endsection