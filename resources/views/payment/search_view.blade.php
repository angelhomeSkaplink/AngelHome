
@extends('layouts.app_resident')

@section('htmlheader_title')
    Prospective Info 
@endsection

@section('contentheader_title')
    Inquiry Reports
@endsection

@section('main-content')
    <div class="row">
		<form action="search_unique_id" method="post" enctype="multipart/form-data">
			{!! csrf_field() !!}
			
			<div class="col-md-3">
				<div class="form-group has-feedback">
					<label>Type Your unique ID*</label><br/>
					<input type="text" class="form-control" name="unique_id" required />
				</div>			
			</div>
			
			<div class="col-md-2">
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important; margin-top:24px">
						<i class="material-icons"> search </i> Search
					</button>
				</div>			
			</div>
		</form>
	</div>
	
@endsection
@section('scripts-extra')

@endsection