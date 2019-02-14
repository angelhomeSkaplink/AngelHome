<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
    Tasks Resident
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
	<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Today's Residents For Task: <?php echo e($task); ?></strong></h3>
	</div>
	<div class="col-lg-4">
		
		<a href=" <?php echo e(url('main_task_list')); ?> " class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">			
			<div class="box-body border padding-top-0 padding-left-right-0">
			    <div class="table-responsive">
    				<div id="DivIdToPrint">
    					<table class="table">
    						<tbody>
    							<tr>
    								<th class="th-position text-uppercase font-500 font-12">#</th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Resident"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Person Required"); ?> </th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Start Time"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.End Time"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Special Equipment"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Status"); ?></th>
    							</tr>
								<?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicine): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
								<?php 
									$n = explode(",",$medicine->pros_name);
								 ?>
    							<tr>
    								<?php if($medicine->frequency=='Daily'): ?>
    									<?php 
    										$user = DB::table('task_assingee')->where([['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
											// dd($user);
											if($user>0){
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
    									<?php
    										$history = DB::table('task_history')->where([['task_id', $medicine->task_id], ['history_date', date("Y-m-d",time())]])->first();
    										if($history==NULL){
    									?>
    									<td class="padding-left-72">
    										<a href="../add_task_history/<?php echo e($medicine->task_id); ?>/<?php echo e($task); ?>" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> check_box_outline_blank</i>
    										</a>
    									</td>
    									<?php } else {?>
    									<td class="padding-left-72">
    										<a href="" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> beenhere</i>
    										</a>
    									</td>
    									<?php } ?>
    									
    									
    									<?php } ?>
    								<?php endif; ?>
    								<?php if($medicine->frequency=='Alt.Days'): ?>
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    									<?php
    										$history = DB::table('task_history')->where([['task_id', $medicine->task_id], ['history_date', date("Y-m-d",time())]])->first();
    										if($history==NULL){
    									?>
    									<td class="padding-left-72">
    										<a href="../add_task_history/<?php echo e($medicine->task_id); ?>/<?php echo e($task); ?>" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> check_box_outline_blank</i>
    										</a>
    									</td>
    									<?php } else {?>
    									<td class="padding-left-72">
    										<a href="" data-toggle="tooltip" data-placement="bottom">
    											<i class="material-icons gray md-22"> beenhere</i>
    										</a>
    									</td>
    									<?php } } ?>
    									<?php } ?>
    								<?php endif; ?>
    								<?php if($medicine->frequency=='Weekly'): ?>
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    									<td></td>
    									<?php } } ?>
    								<?php endif; ?>	
    								<?php if($medicine->frequency=='Monthly'): ?>
    									<?php 
    										$user = DB::table('task_assingee')->where([['user_id', $user_id], ['task', $medicine->title], ['task_date', date("Y-m-d",time())]])->count(); 
    										if($user>0){
    									?>
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
    									<td></td>
    									<?php } }?>
    								<?php endif; ?>
    							</tr>
    							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    						</tbody>
    					</table>
					</div>
					<br/>
				</div>
			</div>						
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
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