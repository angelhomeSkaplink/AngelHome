
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    <p class="text-danger"><b>set next assessment date for {{ $name->pros_name }}</b></p>
@endsection

@section('main-content')

<style>
.wickedpicker{
	z-index:999 !important;
}
</style>
<div class="row">
	<div class="col-md-6 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body padding-bottom-15">				
				<form action="{{action('AssessmentController@set_date')}}" method="post">					
					<input type="hidden" name="_method" value="PATCH">
						{{ csrf_field() }}
						<input type="hidden" class="form-control" placeholder="Appointment Date" name="pros_id" value="{{ $id }}" />
							
						<div class="form-group has-feedback">
							<label>Next Assessment Date</label>
							<input type="text" class="form-control" placeholder="Next Assessment Date" name="next_assessment_date" id="next_assessment_date" required 
							oninvalid="this.setCustomValidity('Required Field.Please Select Date')"
							oninput="this.setCustomValidity('')" autocomplete="off"/>
							<script type="text/javascript"> $('#next_assessment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
						</div>
						
					<div class="col-md-6"></div>					
					<div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button" style="margin-right: 5px;">@lang("msg.Submit")</button>
						</div>

						<div class="form-group has-feedback">
							<a href="../select_assessments/{{ $id }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;">@lang("msg.Cancel")</a>
						</div>
					</div><br/><br/>
				</form>				
			</div>			
		</div>
	</div>
</div>

    @include('layouts.partials.scripts_auth')

@endsection
