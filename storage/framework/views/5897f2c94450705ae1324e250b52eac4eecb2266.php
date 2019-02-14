<?php $__env->startSection('htmlheader_title'); ?>
    Resident Assessment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
	<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong><?php echo e($flag); ?> Assessment</strong></h3>
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
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgb(49, 68, 84) !important;">								
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong>#</strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Resident'); ?>">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong><?php echo app('translator')->get("msg.Phone No"); ?></strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong><?php echo app('translator')->get("msg.Next Assessment Date"); ?></strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong><?php echo app('translator')->get("msg.Assessment History"); ?></strong></h5></th>
								<th class="th-position text-uppercase font-500 font-12"><h5 class="pull-right" style="color:aliceblue !important;"><strong>Action</strong></h5></th>								
							</tr>
							<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php 
							$n = explode(",",$crm->pros_name);
							 ?>
							<tr>
								<input type="hidden" class="form-control" value="<?php echo e($crm->id); ?>" name="id"/>
								<?php if($crm->service_image == NULL): ?>
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								<?php else: ?>
								<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
								<?php endif; ?>
								<td><strong><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></strong></td>
								<?php 
									$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
								?>
								<td><?php echo e($basic->phone_p); ?></td>
								<?php } ?>							
								<?php
									$status = DB::table('resident_assessment')->where([['pros_id', $crm->id], ['resident_assessment.assessment_status', 1]])->first();
									if(!$status){
								?>
								<td class="text-danger"><b><?php echo app('translator')->get("msg.No Assessment Done"); ?></b></td>
								<?php } else{
									$today = date("Y-m-d");
									$next_date = DB::table('next_assessment')->where([['pros_id', $crm->id], ['next_assessment.assessment_status', 1]])->first();
									if(!$next_date){
								?>
								<td class="text-danger"><b><?php echo app('translator')->get("msg.No Next Assessment Date Found"); ?></b></td>
								<?php } else{
									$max_date = $next_date->next_assessment_date;
									$diff = date_diff(date_create($max_date),date_create($today));
									$diff = $diff->days;
									if($diff>=30){
								?>
								<td class="text-success"><b><?php echo app('translator')->get("msg.Next Assessment Date"); ?>= <?php echo e($next_date->next_assessment_date); ?></b></td>
								<?php }elseif($diff<30 && $diff>0){ ?>
								<td class="text-warning"><b><?php echo app('translator')->get("msg.Next Assessment Date"); ?> = <?php echo e($next_date->next_assessment_date); ?></b></td>
								<?php } elseif($diff==0){?>
								<td class="text-danger"><b><?php echo app('translator')->get("msg.Next Assessment Date"); ?> = <?php echo e($next_date->next_assessment_date); ?></b></td>
								<?php } } } ?>
								<td class="padding-left-45">
									<a href="assessment_period/<?php echo e($flag); ?>/<?php echo e($crm->id); ?>" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
								</td>
								<td class="padding-left-15">										
									<span class="pull-right"><a class="btn btn-default" href="select_period/<?php echo e($flag); ?>/<?php echo e($crm->id); ?>"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></span>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				</div>
				<div class="text-center"><?php echo e($crms->links()); ?></div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/res_assessment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>