<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    List Of Patients
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Today's Task List for: <?php echo e($task); ?></strong></h3>
		</div>
		<div class="col-lg-4">
		  <a href=" <?php echo e(url('main_task')); ?> " class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.wickedpicker{
		z-index:999 !important;
	}
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
<div class="row margin-left-right-15" style="box-sizing: border-box !important;">
	<div class="col-md-6"></div>
	<form action="<?php echo e(action('AttendeeController@assign_tasklist')); ?>" method="post">
		<input type="hidden" name="_method" style="width:20px;" value="PATCH">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" name="task" value="<?php echo e($task); ?>" style="width:20px;" value="PATCH">
		<div class="col-md-4">
			<div class="form-group has-feedback">
				<select name="user_id[]" id="user_id" class="form-control" multiple required >
					<?php $__currentLoopData = $assignees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assignee): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
					<option value="<?php echo e($assignee->user_id); ?>"><?php echo e($assignee->firstname); ?> <?php echo e($assignee->middlename); ?> <?php echo e($assignee->lastname); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group has-feedback">
				<button type="submit" class="btn btn-primary btn-block btn-flat padding-top-bottom-4" style="width:90% !important;">
					SET
				</button>
			</div>			
		</div>
	</form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div id="DivIdToPrint">
				<div class="box-body border padding-top-0 padding-left-right-0">
				    <div class="table-responsive">
    					<table class="table">
    						<tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Resident"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Person Required"); ?> </th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Start Time"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.End Time"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Special Equipment"); ?></th>
    							</tr>
								<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php 
									$n = explode(",",$medicine->pros_name);
								 ?>
    							<tr>
    								<?php if($medicine->frequency=='Daily'): ?>
    									<?php if($medicine->service_image == NULL): ?>
    									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    									<?php else: ?>
    									<td><img src="../hsfiles/public/img/<?php echo e($medicine->service_image); ?>" class="img-circle" width="40" height="40"></td>
    									<?php endif; ?>
    									
										<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    									<td><?php echo e($medicine->person_required); ?></td>	
    									<td><?php echo e($medicine->s_time); ?></td>	
    									<td><?php echo e($medicine->e_time); ?></td>	
    									<td><?php echo e($medicine->special_equipment); ?></td>									
    								<?php endif; ?>
    								<?php if($medicine->frequency=='Alt.Days'): ?>
    									<?php 										
    										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
    										$result = fmod($diff,2);
    									if($result==0){	
    									?>
    									<?php if($medicine->service_image == NULL): ?>
    									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    									<?php else: ?>
    									<td><img src="../hsfiles/public/img/<?php echo e($medicine->service_image); ?>" class="img-circle" width="40" height="40"></td>
    									<?php endif; ?>
    									
										<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    									<td><?php echo e($medicine->person_required); ?></td>	
    									<td><?php echo e($medicine->s_time); ?></td>	
    									<td><?php echo e($medicine->e_time); ?></td>	
    									<td><?php echo e($medicine->special_equipment); ?></td>										
    									<?php } ?>
    								<?php endif; ?>
    								<?php if($medicine->frequency=='Weekly'): ?>
    									<?php 										
    										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
    										$result = fmod($diff,7);
    									if($result==0){	
    									?>
    									<?php if($medicine->service_image == NULL): ?>
    									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    									<?php else: ?>
    									<td><img src="../hsfiles/public/img/<?php echo e($medicine->service_image); ?>" class="img-circle" width="40" height="40"></td>
    									<?php endif; ?>
    									
										<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    									<td><?php echo e($medicine->person_required); ?></td>	
    									<td><?php echo e($medicine->s_time); ?></td>	
    									<td><?php echo e($medicine->e_time); ?></td>	
    									<td><?php echo e($medicine->special_equipment); ?></td>									
    									<?php } ?>
    								<?php endif; ?>	
    								<?php if($medicine->frequency=='Monthly'): ?>
    									<?php 										
    										$diff = (date_diff(date_create($medicine->s_date),date_create(date("Y-m-d"))))->days;
    										$result = fmod($diff,7);
    										if($result==0){	
    									?>
    									<?php if($medicine->service_image == NULL): ?>
    									<td><img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    									<?php else: ?>
    									<td><img src="../hsfiles/public/img/<?php echo e($medicine->service_image); ?>" class="img-circle" width="40" height="40"></td>
    									<?php endif; ?>
    									
										<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    									<td><?php echo e($medicine->person_required); ?></td>	
    									<td><?php echo e($medicine->s_time); ?></td>	
    									<td><?php echo e($medicine->e_time); ?></td>	
    									<td><?php echo e($medicine->special_equipment); ?></td>									
    									<?php } ?>
    								<?php endif; ?>
    							</tr>
    							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    						</tbody>
    					</table>
					</div>
				</div>
			</div>
			<!--<div class="form-group has-feedback" style="float:right;margin-right:5px;">
				<input type='button' id='btn' value='Print' onclick='printDiv();'>-->
			</div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script>
  $(document).ready(function(){
    $('#user_id').select2();
  });
</script>
<script>
	function printDiv() {
		var divToPrint = document.getElementById('DivIdToPrint');
		var newWin = window.open('', 'Print-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
		newWin.document.close();
		setTimeout(function() {
		newWin.close();
		}, 10);
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>