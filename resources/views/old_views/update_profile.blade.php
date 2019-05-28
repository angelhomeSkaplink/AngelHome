@extends('layouts.app')

@section('htmlheader_title')
    Profile Update
@endsection

@section('contentheader_title')
    Profile Update
@endsection

@section('header-extra')

@endsection

@section('main-content')
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#address').click(function () {
		if (this.checked){
			var emp_present_house_no = document.getElementById('emp_present_house_no').value;
			var emp_present_locality = document.getElementById('emp_present_locality').value;
			var emp_present_city = document.getElementById('emp_present_city').value;
			var emp_present_district = document.getElementById('emp_present_district').value;
			
			document.getElementById('emp_permanent_house_no').value = emp_present_house_no;
			document.getElementById('emp_permanent_locality').value = emp_present_locality;
			document.getElementById('emp_permanent_city').value = emp_present_city;
			document.getElementById('emp_permanent_district').value = emp_present_district;
        }
		else{
			document.getElementById('emp_permanent_house_no').value = '';
			document.getElementById('emp_permanent_locality').value = '';
			document.getElementById('emp_permanent_city').value = '';
			document.getElementById('emp_permanent_district').value = '';
		}
    });		
});
</script>
<div class="row">  
	<form action="{{action('PostController@profile_update')}}" method="post"> 
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						<input type="hidden" class="form-control" name="emp_id" value="{{ $row->emp_id }}"   />
					</div>
					<div class="form-group has-feedback">
						Phone No
						<input type="text" class="form-control" name="emp_contact_no" value="{{ $row->emp_contact_no }}"   />
					</div>
					<div class="form-group has-feedback">
						Alternate Phone No
						<input type="text" class="form-control" name="emp_alt_contact_no" value="{{ $row->emp_alt_contact_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Present House No
						<input type="text" class="form-control" name="emp_present_house_no" id="emp_present_house_no" value="{{ $row->emp_present_house_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Present Locality
						<input type="text" class="form-control" name="emp_present_locality" id="emp_present_locality" value="{{ $row->emp_present_locality }}"  />
					</div>
					<div class="form-group has-feedback">
						Present City
						<input type="text" class="form-control" name="emp_present_city" id="emp_present_city"	value="{{ $row->emp_present_city }}"  />
					</div>
					<div class="form-group has-feedback">
						Present District
						<input type="text" class="form-control" name="emp_present_district" id="emp_present_district"	value="{{ $row->emp_present_district }}"  />
					</div>
				</div>
			</div>
		</div>	
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body">
					<div class="form-group has-feedback">
						<div class="col-md-12"><input id="address" name="address" type="checkbox" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Same as Present Address</b></div></br>
					</div>
					<div class="form-group has-feedback">
						Permanent House No
						<input type="text" class="form-control" name="emp_permanent_house_no" id="emp_permanent_house_no" value="{{ $row->emp_permanent_house_no }}"  />
					</div>
					<div class="form-group has-feedback">
						Permenent Locality
						<input type="text" class="form-control" name="emp_permanent_locality" id="emp_permanent_locality" value="{{ $row->emp_permanent_locality }}"  />
					</div>
					<div class="form-group has-feedback">
						Permanent City
						<input type="text" class="form-control" name="emp_permanent_city" id="emp_permanent_city" value="{{ $row->emp_permanent_city }}"  />
					</div>
					<div class="form-group has-feedback">
						Permanent District
						<input type="text" class="form-control" name="emp_permanent_district" id="emp_permanent_district" value="{{ $row->emp_permanent_district }}"  />
					</div>					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					
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
<script type="text/javascript" language="javascript" src="js/jquery.min.js"></script>
<script src="js/jquery.form-validator.min.js" type="text/javascript"></script>
<script>
    $.validate({
    });
</script>
@endsection
@section('scripts-extra')

@endsection