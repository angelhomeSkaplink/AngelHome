
@extends('layouts.app')

@section('htmlheader_title')
     @lang("msg.New Service Plan")
@endsection

@section('contentheader_title')
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>@lang("msg.New Service Plan")</strong></h3>
	</div>
</div>
@endsection

@section('main-content')

<script type="text/javascript">
    function ShowHideDiv() {
        var sales_stage = document.getElementById("sales_stage");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = sales_stage.value == "Appointment" ? "block" : "none";
    }
	
	function HideToRange() {
		if($("#to_range").prop("disabled")){
			$("#to_range").prop("disabled", false);
		}else{
			$("#to_range").prop("disabled", true);
		}		
	}
</script>

<div class="row">		
	
	<div class="col-md-6 col-md-offset-3">
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
						<label>@lang("msg.Servive Plan Name")</label>
						<input type="text" class="form-control" name="service_plan_name" id="service_plan_name" required />
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.Point Range(From)")</label>
						<select name="from_range" id="from_range" class="form-control" style="width:100%; height: 34px;" onkeyup="getRangeinfo();" required >
							<option value="">@lang("msg.Select Point")</option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>							
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_max_range" name="check_max_range" onclick = "HideToRange()"> 
								<span class="label-text">@lang("msg.Please click here for max range")</span>
							</label>
						</div>
					</div>
					<div class="form-group has-feedback" >
						<label>@lang("msg.Point Range(to)")</label>
						<select name="to_range" id="to_range" class="form-control" style="width:100%; height: 34px;" onkeyup="getRangeinfo();" required >
							<option value="">Select Point</option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>							
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>@lang("msg.Price")</label>
						<input type="number" class="form-control" placeholder="" name="price" required />
					</div>
					<div class="form-group has-feedback">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">@lang("msg.Submit")</button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="{{  url('service_plan') }}" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">@lang("msg.Cancel")</a>
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
