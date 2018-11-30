@extends('layouts.app')

@section('htmlheader_title')
    Leave Update
@endsection

@section('contentheader_title')
    Leave Update
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="update_leave_type" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Leave Edit</h3>
				</div>
				<div class="box-body"> 
					{!! csrf_field() !!}						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="leave_type_id" value="{{ $row->leave_type_id }}" />
					</div>												
					<div class="form-group has-feedback">
						Leave Type
						<input type="text" class="form-control" name="leave_type" value="{{ $row->leave_type }}" readonly />
					</div>	
					<div class="form-group has-feedback">
						No of Days
						<input type="text" class="form-control" name="no_of_days" value="{{ $row->no_of_days }}" />
					</div>
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection