
@extends('layouts.app')

@section('htmlheader_title')
    new event details
@endsection

@section('contentheader_title')
   new event details
@endsection

@section('main-content')
<br/> 
<style>
.wickedpicker{
	z-index:999 !important;
}

</style>
<div class="row">
	<form action="new_event_add" method="post" enctype="multipart/form-data">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">				
				<div class="box-body padding-bottom-15">
					<div class="form-group has-feedback">
						<label>Name</label>
						<input type="text" class="form-control" name="event_name" required />
					</div> 
					
					<div class="form-group has-feedback">
						<label>description </label>
						<textarea class="form-control" name="event_description" type="text" rows="4" ></textarea>
					</div>
					<div class="form-group has-feedback">
						<label>vanue</label>
						<input type="text" class="form-control" name="event_place" required />
					</div>
					<div class="form-group has-feedback">
						<label class="sm-heading">start Date</label>
						<input type="text" class="form-control" name="event_date" id="event_date" onkeyup="getdateofretirement();" autocomplete="off"/>
						<script type="text/javascript"> $('#event_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<label class="sm-heading">end Date</label>
						<input type="text" class="form-control" name="event_end_date" id="event_end_date" onkeyup="getdateofretirement();" autocomplete="off"/>
						<script type="text/javascript"> $('#event_end_date').datepicker({format: 'yyyy/mm/dd'});</script> 
					</div>
					<div class="form-group has-feedback">
						<label>event Time</label>
						<div class='input-group date' id='datetimepicker3'>
							<input type="text" name="event_time"  class="form-control timepicker" />
							<span class="input-group-addon" style="padding:3px">
								<i class="material-icons"> access_time </i>
							</span>
						</div>
					</div>
					<div class="col-md-12" style="padding-right:0; padding-left:0">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-flat btn-width">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>		
		<div class="col-md-10"></div>					
	</form>
</div>
    @include('layouts.partials.scripts_auth')

@endsection
