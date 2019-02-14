<?php $__env->startSection('htmlheader_title'); ?>
     Edit Plan Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Edit Plan Details</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

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
				<?php if(Session::has('msg')): ?>
					<div class="alert alert-danger">
						<strong><?php echo e(Session::get('msg')); ?></strong>
					</div>
				<?php endif; ?>
				<form action="<?php echo e(action('AdminmoduleController@update_plan')); ?>" method="post">
					<?php echo e(csrf_field()); ?>

          <input type="hidden" name="plan_id" value="<?php echo e($plan->service_plan_id); ?>">
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Servive Plan Name"); ?></label>
						<input type="text" class="form-control" name="service_plan_name" id="service_plan_name" value="<?php echo e($plan->service_plan_name); ?>" readonly />
					</div>
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Point Range (From)"); ?></label>
						<select name="from_range" id="from_range" class="form-control" required >
							<option value="<?php echo e($plan->from_range); ?>"><?php echo e($plan->from_range); ?></option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<div class="form-check">
							<label>
								<input type="checkbox" id="check_max_range" name="check_max_range" onclick = "HideToRange()">
								<span class="label-text"><?php echo app('translator')->get("msg.Please click here for max range"); ?></span>
							</label>
						</div>
					</div>
					<div class="form-group has-feedback" >
						<label><?php echo app('translator')->get("msg.Point Range (to)"); ?></label>
						<select name="to_range" id="to_range" class="form-control" required >
							<option value="<?php echo e($plan->to_range); ?>"><?php echo e($plan->to_range); ?></option>
							<?php for($i=1; $i<=1000; $i++){?>
							<option value="<?php echo $i?>"><?php echo $i?></option>
							<?php }?>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Price"); ?></label>
						<input type="number" class="form-control" placeholder="" value="<?php echo e($plan->price); ?>" name="price" required />
					</div>
					<div class="form-group has-feedback">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Update"); ?></button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="<?php echo e(url('service_plan')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
            		</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".myselect").select2();
</script>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>