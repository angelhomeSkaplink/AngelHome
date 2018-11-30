
@extends('layouts.app')

@section('htmlheader_title')
     New SERVice plan
@endsection

@section('contentheader_title')
    New SERVice plan
@endsection

@section('main-content')

<script type="text/javascript">
    function ShowHideDiv() {
        var sales_stage = document.getElementById("sales_stage");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = sales_stage.value == "Appointment" ? "block" : "none";
    }
</script>

<div class="row">		
	
	<div class="col-md-6 col-md-offset-2">
		<div class="box box-primary">
			<div class="box-body padding-bottom-15">
				@if(Session::has('msg'))
					<div class="alert alert-danger">
						<strong>{{ Session::get('msg') }}</strong>
					</div>
				@endif
				<form action="add_new_service_plan" method="post">	
					{{ csrf_field() }}
					<div class="form-group has-feedback">	
						<label>Plan name</label>
						<input type="text" class="form-control" name="service_plan_name" id="service_plan_name" required />
					</div>
					<div class="form-group has-feedback">
						<label>Point Range (From)</label>
						<select name="from_range" id="from_range" class="myselect" style="width:100%; height: 34px;" onkeyup="getRangeinfo();" required >
							<option value="">Select Point</option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>							
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>Point Range (to)</label>
						<select name="to_range" id="to_range" class="myselect" style="width:100%; height: 34px;" onkeyup="getRangeinfo();" required >
							<option value="">Select Point</option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>							
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>Plan price</label>
						<input type="number" class="form-control" placeholder="" name="price" required />
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
<script type="text/javascript">
	$(".myselect").select2();
</script>
@include('layouts.partials.scripts_auth')

@endsection
