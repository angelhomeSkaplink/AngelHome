<?php $__env->startSection('htmlheader_title'); ?>
    Service Plan:<?php echo e($plan); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment History</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('resident_service_plan_graph')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
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
					<table class="table">
						<tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12">#</th>
								<th class="th-position text-uppercase font-500 font-12">
									<div class="autocomplete" style="width:200px;">
										<input id="myInput" type="text" placeHolder="<?php echo app('translator')->get('msg.Resident'); ?>">
									</div>
								</th>
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
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
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View Plan Details"); ?></th>
							</tr>
							<?php if($data->isempty()): ?>
							<tr>
							    <td colspan=6 class="text-center"><p>Currently there is no resident in this service plan.</p></td>
							</tr>
							<?php else: ?>
                              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                                <td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
                                <td><?php echo e($crm->phone_p); ?></td>
                                <td><?php echo e($crm->email_p); ?></td>
                                <td><?php echo e($m[0]); ?> <?php echo e($m[1]); ?> <?php echo e($m[2]); ?></td>
                                <td style="padding-left:55px !important">
                                  <a href="../service_plan_period/<?php echo e($crm->id); ?>">
                                    <i class="material-icons gray md-22"> visibility </i>
                                  </a>
                                </td>
                              </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endif; ?>
						</tbody>
					</table>
				</div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/service.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>