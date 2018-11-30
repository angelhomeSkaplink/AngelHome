
@extends('layouts.app')

@section('htmlheader_title')
   Set Defult point
@endsection

@section('contentheader_title')
   Set Defult point
@endsection

@section('main-content')

<div class="row">
	<div class="col-md-6 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body padding-bottom-15">
				<label>Set common value for {{ $assessment_name->assessment_form_name}}</label>
				<form action="{{action('AssessmentController@set_points')}}" method="post">					
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}					
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="assessment_id" value="{{ $assessment_id }}"/>
					</div>
					<div class="form-group has-feedback">						
						<input type="number" class="form-control" name="point" id="point" required />
					</div>										
					<div class="col-md-12"> 
						<div>
							<button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
						</div>
					</div>
				</form>				
			</div>			
		</div>		
	</div>
</div>

@include('layouts.partials.scripts_auth')

@endsection
