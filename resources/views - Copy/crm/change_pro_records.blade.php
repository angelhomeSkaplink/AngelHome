
@extends('layouts.app')

@section('htmlheader_title')
    Prospective Add
@endsection

@section('contentheader_title')
    edit Prospective record
@endsection

@section('main-content')

<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="js/bootstrap-datepicker.js"></script>

<div class="row">	
	<form action="{{action('ProspectiveController@change_pro_record')}}" method="post">					
	<input type="hidden" name="_method" value="PATCH">
	{{ csrf_field() }}
	<div class="col-md-4">
		<div class="box box-primary">
			@if(Session::has('msg'))
				<div class="alert alert-danger">
					<strong>{{ Session::get('msg') }}</strong>
				</div>
			@endif
			<div class="box-body" style="height:525px">					
				
				<input type="hidden" class="form-control" name="pros_id" value="{{ $row->pros_id }}"  />
				
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Phone No</label>
					<input type="text" class="form-control" value="{{ $row->phone_p }}" name="phone_p" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Email</label>
					<input type="email" class="form-control" value="{{ $row->email_p }}" name="email_p"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Address 1</label>
					<input type="text" class="form-control" value="{{ $row->address_p }}" name="address_p"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Address 2 </label>
					<input type="text" class="form-control" value="{{ $row->address_p_two }}" name="address_p_two"  />
				</div>
				
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>City </label>
					<input type="text" class="form-control" value="{{ $row->city_p }}" name="city_p" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />						
				</div>-->
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Zip </label>
					<input type="number" class="form-control" value="{{ $row->zip_p }}" name="zip_p" pattern="[0-9]" Title="Numeric Value."  />
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Contact Person</label>
					<input type="text" class="form-control" value="{{ $row->contact_person }}" name="contact_person" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div> 
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Phone </label>
					<input type="text" class="form-control" value="{{ $row->phone_c }}" name="phone_c" pattern="[0-9]{10}" Title="Numeric Value. 10 Digit"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Email</label>
					<input type="email" class="form-control" value="{{ $row->email_c }}" name="email_c"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Address 1</label>
					<input type="text" class="form-control" value="{{ $row->address_c }}" name="address_c"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Address 2 </label>
					<input type="text" class="form-control" value="{{ $row->address_c_two }}" name="address_c_two"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>City</label>
					<input type="text" class="form-control" value="{{ $row->city_c }}" name="city_c" required pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<!--<div class="form-group has-feedback">
					State
					<input type="text" class="form-control" value="Assam" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
						
				</div>-->
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Zip</label>
					<input type="number" class="form-control" value="{{ $row->zip_c }}" name="zip_c" pattern="[0-9]" Title="Numeric Value."  />
				</div>
					
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body">
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Relation</label>
					<input type="text" class="form-control" value="{{ $row->relation }}" name="relation" id="relation" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<label>Source</label>
					<input type="text" class="form-control" value="{{ $row->source }}" name="source" id="source" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"  />
				</div>			
				<div class="form-group has-feedback" style="margin-bottom:15px !important">
					<button type="submit" class="btn btn-primary btn-block btn-flat" style="position:relative; top:52px; left:-58px">Submit</button>
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
