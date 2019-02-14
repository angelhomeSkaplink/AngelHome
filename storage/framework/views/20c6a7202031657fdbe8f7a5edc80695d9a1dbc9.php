<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important; margin:.5px;"><strong>Resident Serice Plan</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: 0.5px;
	}
	.content {
		margin-top: 5px;
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
								<th class="th-position text-uppercase font-500 font-12">
									<div class="emailautocomplete" style="width:200px;">
										<input id="emailInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Email'); ?>">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="contactautocomplete" style="width:200px;">
										<input id="contactInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Contact Person'); ?>">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><h5 style="color:aliceblue !important;"><strong><?php echo app('translator')->get("msg.View Plan Details"); ?></strong></h5></th>
							</tr>
							<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php 
							    $n = explode(",", $crm->pros_name);
							    $m = explode(",", $crm->contact_person);
							 ?>
							<tr>
								<?php if($crm->service_image == NULL): ?>
								<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
								<?php else: ?>
								<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
								<?php endif; ?>
								<td><strong><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></strong></td>
								<td><?php echo e($crm->phone_p); ?></td>
								<td><?php echo e($crm->email_p); ?></td>
								<td><?php echo e($m[0]); ?> <?php echo e($m[1]); ?> <?php echo e($m[2]); ?></td>
								<td style="padding-left:55px !important">
									<a class="btn btn-default" href="service_plan_period/<?php echo e($crm->id); ?>">
										<i class="material-icons gray md-22"> visibility </i> View
									</a>
								</td>
								<!--<td style="padding-left:22px !important"><a href="view_plan_details/<?php echo e($crm->id); ?>">
								<i class="material-icons material-icons gray md-22"> pageview </i> </a></td>-->
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
<!--<div class="modal fade" id="pointModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel">Resident Service plan details</h4>
			</div>
			<div class="modal-body">					
			</div>
		</div>
	</div>
</div>-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/service.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>