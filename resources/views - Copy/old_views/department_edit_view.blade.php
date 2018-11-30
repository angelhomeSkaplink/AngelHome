@extends('layouts.app')

@section('htmlheader_title')
    Department Edit
@endsection

@section('contentheader_title')
    Department Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="../update_department" method="post"> 
		<input type="hidden" name="_method" value="PATCH">
		{!! csrf_field() !!}
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Department Edit</h3>
				</div>
				<div class="box-body"> 
											
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="fld_DeptID" value="{{ $row->fld_DeptID }}" />
					</div>												
					<div class="form-group has-feedback">
						Department Name
						<input type="text" class="form-control" name="fld_Department" value="{{ $row->fld_Department }}" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
					</div>					
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Go</button>
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