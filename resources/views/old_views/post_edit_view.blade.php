@extends('layouts.app')

@section('htmlheader_title')
    Post Edit
@endsection

@section('contentheader_title')
    Post Edit
@endsection

@section('header-extra')

@endsection

@section('main-content')
<div class="row">  
	<form action="../update_post" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Post Edit</h3>
				</div>
				<div class="box-body"> 
					{!! csrf_field() !!}						
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="post_ID" value="{{ $row->post_ID }}" />
					</div>												
					<div class="form-group has-feedback">
						Post Name
						<input type="text" class="form-control" name="fld_PostName" value="{{ $row->fld_PostName }}" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only" />
					</div>					
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Go</button>
						</div><!-- /.col -->
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
@section('scripts-extra')

@endsection