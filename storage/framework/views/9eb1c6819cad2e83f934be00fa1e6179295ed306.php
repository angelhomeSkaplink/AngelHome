<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
</style>
<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
		<div class="box box-body">
			<form action="<?php echo e(action('ScreeningController@add_equipment')); ?>" method="post">
				<input type="hidden" name="_method" value="PATCH">
				<?php echo e(csrf_field()); ?>

				<input type="hidden" class="form-control" placeholder="" name="pros_id" value="<?php echo e($id); ?>"/>
				<div class="col-md-6">
					<label>Incontinency Supplies/Type*</label>
					<div class="form-group has-feedback">
						<input type="text" placeholder="" name="inconsistency_supplies_type" value="<?php echo e($data->inconsistency_supplies_type); ?>" id="" value="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<label>Pressure Relief Device Type*</label>
					<div class="form-group has-feedback">
						<input type="text" placeholder="" name="pressure_relief_dev_type" value="<?php echo e($data->pressure_relief_dev_type); ?>" id="" value="" class="form-control" required>
					</div>
				</div>
				<div class="col-md-12">	 <br/>
					<div class="row">
						<div class="col-md-2">
							<div class="form-check">
								<label style="font-size: 2.5em">
									<input type="checkbox" name="bed_pan_medical" id="bed_pan_medical">
									<span class="label-text">BED PAN</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="comode_medical" name="comode_medical">
									<span class="label-text">COMODE</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
								<label>
									<input class="checkmark" type="checkbox" id="urinal_medical" name="urinal_medical"> <span class="label-text">URINAL</span>
								</label>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="crutches_medical" name="crutches_medical"> <span class="label-text">CRUTCHES</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="walker_medical" name="walker_medical"> <span class="label-text">WALKER</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="wheelchair_medical" name="wheelchair_medical"> <span class="label-text">WHEELCHAIR</span>
								</label>
							</div>
						</div>
					</div>
					<br/>
					<div class="row">
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="cane_medical" name="cane_medical"> <span class="label-text">CANE</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="hospital_beds_medical"> <span class="label-text">HOSPITAL BED</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
									<input type="checkbox" id="trapeze_medical" name="trapeze_medical"> <span class="label-text">TRAPEZE</span>
								</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-check">
								<label>
								<input type="checkbox" id="oxygen_medical" name="oxygen_medical"> <span class="label-text">OXYGEN</span>
								</label>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-check">
								<label>
									<input type="checkbox" id="protective_pads_medical" name="protective_pads_medical"> <span class="label-text">PROTECTIVE PADS</span>
								</label>
							</div>
						</div>
						</div>
						<br/>
						<div class="row">
							<div class="col-md-4">
								<div class="form-check">
									<div class="col-md-2" style="padding-left:0; padding-right:0"><label style="margin-top:7px">Others: </label> </div>
									<div class="col-md-10" style="padding-left:7px">
									<input type="text" id="other_medical" placeholder="" name="other_medical" value="<?php echo e($data->other_medical); ?>" class="form-control"> 
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6"></div>
					<div class="col=md-6">
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
						</div>
						<div class="form-group has-feedback">
							<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></button>
						</div>
						<br/><br/>
					</div>
				</form>
			</div>
		</div>
      </div>
    </div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
	$('document').ready(function(){
			var BED_PAN = "<?php echo $data->bed_pan_medical; ?>";
			var COMODE = "<?php echo $data->comode_medical ; ?>";
			var URINAL = "<?php echo $data->urinal_medical ; ?>";
			var CRUTCHES = "<?php echo $data->crutches_medical ; ?>";
			var WALKER = "<?php echo $data->walker_medical ?>";
			var WHEELCHAIR = "<?php echo $data->wheelchair_medical ; ?>";
			var CANE = "<?php echo $data->cane_medical ; ?>";
			var HOSPITAL_BED = "<?php echo $data->hospital_beds_medical ; ?>";
			var TRAPEZE = "<?php echo $data->trapeze_medical; ?>";
			var OXYGEN = "<?php echo $data->oxygen_medical ; ?>";
			var ROTECTIVE_PADS = "<?php echo $data->protective_pads_medical ; ?>";

			if(BED_PAN=="on"){
				$("#bed_pan_medical").prop('checked', true);
			}
			if(COMODE=="on"){
				$("#comode_medical").prop('checked', true);
			}
			if(URINAL=="on"){
				$("#urinal_medical").prop('checked', true);
			}
			if(CRUTCHES=="on"){
				$("#crutches_medical").prop('checked', true);
			}
			if(WALKER=="on"){
				$("#walker_medical").prop('checked', true);
			}
			if(WHEELCHAIR=="on"){
				$("#wheelchair_medical").prop('checked', true);
			}
			if(CANE=="on"){
				$("#cane_medical").prop('checked', true);
			}
			if(HOSPITAL_BED=="on"){
				$("#hospital_beds_medical").prop('checked', true);
			}
			if(TRAPEZE=="on"){
				$("#trapeze_medical").prop('checked', true);
			}
			if(OXYGEN=="on"){
				$("#oxygen_medical").prop('checked', true);
			}
			if(ROTECTIVE_PADS=="on"){
				$("#protective_pads_medical").prop('checked', true);
			}
	});
</script>
