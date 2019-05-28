
@extends('layouts.app')

@section('htmlheader_title')
    Post Redesignation
@endsection

@section('contentheader_title')
    Post Redesignation
@endsection

@section('main-content')

<div class="row">  
	<form action="{{action('PostController@update_post_update')}}" method="post">      
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Post Redesignation</h3>
				</div>
				<div class="box-body">
					{{ csrf_field() }}
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="fld_PostID" value="{{ $row->fld_PostID }}" />
					</div>
					<div class="form-group has-feedback">
						Post Name
						<input type="text" class="form-control" name="fld_PostName" value="{{ $row->fld_PostName }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Total Post(old)
						<input type="text" class="form-control" name="fld_TotalPost_old" value="{{ $row->fld_TotalPost }}" readonly />
					</div>
					<div class="form-group has-feedback">
						Total Post(New)
						<input type="text" class="form-control" name="fld_TotalPost" value="" required pattern="[0-9]+"/>
					</div>
					<input type="hidden" class="form-control" name="fld_SanctionNo" value="{{ $row->fld_SanctionNo }}" />
					<input type="hidden" class="form-control" name="fld_SanctionDate" value="{{ $row->fld_SanctionDate }}" />
					<input type="hidden" class="form-control" name="fld_Status" value="1" />
					<div class="row">                    
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
				</div>
			</div>	
		</div>
	</form>
</div>
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@include('layouts.partials.scripts_auth')

@endsection
