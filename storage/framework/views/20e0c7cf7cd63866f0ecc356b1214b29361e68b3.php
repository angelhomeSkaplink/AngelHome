

<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Resident Add"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
   <p class="text-danger"><b>reschedule appointment date for <?php echo e($pros->pros_name); ?></b></p>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.wickedpicker{
		z-index:999 !important;
	}
	.content-header{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}

</style>
<div class="row">	
	<form action="<?php echo e(action('ProspectiveController@change_appointment')); ?>" method="post">					
	<input type="hidden" name="_method" value="PATCH">
	<?php echo e(csrf_field()); ?>

	
	<div class="col-md-6 col-md-offset-3">
		<div class="box box-primary">			
			<div class="box-body padding-bottom-25">			
				
				<input type="hidden" class="form-control" name="appoiuntment_id" value="<?php echo e($row->appoiuntment_id); ?>"  />
				<input type="hidden" class="form-control" value="<?php echo e($row->pros_id); ?>" name="pros_id" />
				
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Appointment Date"); ?></label>
					<input type="text" class="form-control" placeholder="Appointment Date" name="appointment_date" id="appointment_date" value="<?php echo e($row->appointment_date); ?>" required
					oninvalid="this.setCustomValidity('Required Field')"
					oninput="this.setCustomValidity('')" 
					autocomplete="off"/>
					<script type="text/javascript"> $('#appointment_date').datepicker({format: 'yyyy/mm/dd'});</script> 
				</div>
				
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Appointment Time"); ?></label>
					<div class='input-group date' id='datetimepicker3' style="width:100%">
						<input type="text" name="appointment_time" value="<?php echo e($row->appointment_date); ?>" class="form-control timepicker" />
						<!-- <span class="input-group-addon">
							<i class="material-icons gray md-22"> watch_later </i> 
						</span> -->
					</div>
				</div>
				<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Comment"); ?> </label>
					<textarea class="form-control" name="comments" type="text" rows="4" placeholder=""></textarea>
				</div>
				<div class="form-group has-feedback">
					<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
				</div>

				<div class="form-group has-feedback">
					<a href="<?php echo e(url('appointment_schedule')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
				</div><br/><br/><br/>
				
			</div>
		</div>
	</div>	
	
	</form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>