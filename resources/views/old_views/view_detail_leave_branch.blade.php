@extends('layouts.app')

@section('htmlheader_title')
    Leave Detail View
@endsection

@section('contentheader_title')
    Leave Detail View
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="{{action('LeaveController@brforward')}}" method="post">       
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Leave Detail View</h3>
				</div>
				<div class="box-body">                 
					<input type="hidden" name="_method" value="PATCH">

						{{ csrf_field() }}
						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="leave_transaction_id"
							value="{{ $row->leave_transaction_id }}" />
					</div>	
												
					<?php	$employee = DB::table('employees')->where('emp_id', $row->emp_id)->first(); { ?>
					<div class="form-group has-feedback">
						Employee
						<input type="text" class="form-control" name="emp_id"
							value="{{ $employee->emp_f_name }} {{ $employee->emp_m_name }} {{ $employee->emp_l_name }}" readonly />
					</div>
					<?php } ?>
					<?php $leavetype = DB::table('leavetypes')->where('leave_type_id', $row->leave_type_id)->first(); {	?>
					<div class="form-group has-feedback">
						Leave Type
						<input type="text" class="form-control" name="leave_type_id"
							value="{{ $leavetype->leave_type }}" readonly />
					</div>
					<?php } ?>
					<div class="form-group has-feedback">
						From Date
						<input type="date" class="form-control" name="from_date"
							value="{{ $row->from_date }}" readonly />
					</div>					
					<div class="form-group has-feedback">	
						To Date
						<input type="date" class="form-control" name="to_date"
							value="{{ $row->to_date }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Reason
						<input type="text" class="form-control" name="reason"
							value="{{ $row->reason }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Applied On
						<input type="text" class="form-control" name="applied_on"
							value="{{ $row->applied_on }}" readonly />
					</div>					
				</div>
			</div>
		</div> 
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body">
					<div class="form-group has-feedback">
						No of Days
						<input type="text" class="form-control" name="no_of_day"
							value="{{ $row->no_of_day }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Applied For
						<input type="text" class="form-control" name="applied_for"
							value="{{ $row->applied_for }}" readonly />
					</div>
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="status"
							value="3"  />
					</div>
					<div class="form-group has-feedback">
						Section Head Forwarded On
						<input type="date" class="form-control" name="sh_forwarded_on"
							value="{{ $row->sh_forwarded_on }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Section Head Remarks
						<input type="text" class="form-control" name="sh_remarks"
							value="{{ $row->sh_remarks}}" readonly />
					</div>
					<div class="form-group has-feedback">
						Branch Forwarded On
						<input type="text" class="form-control" name="br_forwarded_on"
							value="<?php echo date("y/m/d")?>" />
					</div>
					<div class="form-group has-feedback">
						<?php $emp_id = Auth::user()->id;{ ?>
							<input type="hidden" class="form-control" name="br_forwarded_by"
								value="<?php echo $emp_id ?>"  />
						<?php } ?>
					</div>
					<div class="form-group has-feedback">
						Branch Remarks
						<input type="text" class="form-control" name="br_remarks"
							value="{{ $row->br_remarks}}" />
					</div>
					
					<?php if($row->status == 2){ ?>
					<div class="row">                    
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Forward to Secretary</button>
						</div><!-- /.col -->
					</div>
					<?php } elseif($row->status == 1){	?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Waiting for Section Head Approvel</a>
					<?php }	elseif($row->status == 3){	?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Forwarded To Secretary</a>
					<?php } elseif($row->status == 4) {?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Leave Approved</a>
					<?php } elseif($row->status == 5) {?>
					<a href="#" class="btn btn-primary btn-block btn-flat" readonly >Leave Rejected</a>
					<?php } ?>
				</div>
			</div>
		</div>		
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection