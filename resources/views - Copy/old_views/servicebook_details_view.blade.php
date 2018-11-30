@extends('layouts.app')

@section('htmlheader_title')
   Pay Fixation Record Details
@endsection

@section('contentheader_title')
    Pay Fixation Record Details
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">        
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Pay Fixation Record Details</h3>
            </div>
            <div class="box-body">                   
                <form action="" method="post">
					<input type="hidden" name="_method" value="PATCH">

                        {{ csrf_field() }}
						
					<div class="form-group has-feedback">
						<?php
							$employee = DB::table('employees')->where('emp_id', $full->emp_id)->first();							
						{ ?>
						Name
						<input type="text" class="form-control" name="firstname"
                            value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
						<?php } ?>
                    </div>						
					<div class="form-group has-feedback">
						<?php
							$department = DB::table('departments')->where('fld_DeptID', $full->dept_id)->first();							
						{ ?>
						Department
						<input type="text" class="form-control" name="firstname"
                            value="{{ $department->fld_Department }}" readonly />
						<?php } ?>
                    </div>					
					<div class="form-group has-feedback">
						<?php
							$post = DB::table('posts')->where('fld_PostID', $full->post_id)->first();							
						{ ?>
						Post
						<input type="text" class="form-control" name="firstname"
                            value="{{ $post->fld_PostName }}" readonly />
						<?php } ?>
                    </div>					
					<div class="form-group has-feedback">
						Application ID
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $full->application_id }}" readonly />
					</div>
					<div class="form-group has-feedback">
						DA
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $full->da }}" readonly />
                    </div>
					<div class="form-group has-feedback">
						Basic Pay
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $full->basic_pay }}" readonly />
                    </div>
					<div class="form-group has-feedback">
						Scale
						<?php $scale= DB::table('scale')->where('scale_id', $full->scaleId)->first();	?>				
                        <input type="text" class="form-control" name="firstname"
                            value="{{ $scale->payScale_lower_limit}}-{{ $scale->payScale_uper_limit}}" readonly />
                    </div>					
                </form>
            </div>
        </div>
    </div> 
	<div class="col-md-4">
        <div class="box box-primary">            
        <div class="box-body">
			<div class="form-group has-feedback">
				Employee Type
                <input type="text" class="form-control" name="firstname"
                    value="{{ $full->emp_type }}" readonly />
            </div>
			<div class="form-group has-feedback">
				Provident Fund Category
                <input type="text" class="form-control" name="firstname"
                    value="{{ $full->emp_pf_category }}" readonly />
            </div>
			<div class="form-group has-feedback">
				Date of Apointment
                <input type="date" class="form-control" name="firstname"
                    value="{{ $full->doa }}" readonly />
            </div>
			<div class="form-group has-feedback">
				Date of Joining
                <input type="date" class="form-control" name="firstname"
                    value="{{ $full->doj }}" readonly />
            </div>
			<div class="form-group has-feedback">
				Date of Promotion
                <input type="date" class="form-control" name="firstname"
					value="{{ $full->dop }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Date Of Lien
                    <input type="date" class="form-control" name="firstname"
                        value="{{ $full->dol }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Date Of Increament
                    <input type="date" class="form-control" name="firstname"
                        value="{{ $full->doi }}" readonly />
                </div>
				<div class="form-group has-feedback">
					Date Of Retirement
                    <input type="date" class="form-control" name="firstname"
                        value="{{ $full->dor }}" readonly />
                </div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
        <div class="box box-primary">            
			<div class="box-body">
				<div class="form-group has-feedback">
					Fixation Reason
					<input type="text" class="form-control" name="firstname"
						value="{{ $full->action }}" readonly />
				</div>
				<div class="form-group has-feedback">
					Remarks
					<input type="text" class="form-control" name="firstname"
						value="{{ $full->remarks }}" readonly />
				</div>				
				<div class="form-group has-feedback">
				Service Image
					<input type="text" class="form-control" name="firstname"
						value ="{{ $full->service_image }}" readonly />
				<a href="/images/{{ $full->service_image }}" target="_blank" class="btn btn-large pull-right"><i class="icon-download-alt"> </i> View File </a>
				</div>				
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts-extra')

@endsection