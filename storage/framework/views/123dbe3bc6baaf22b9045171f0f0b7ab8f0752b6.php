<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
	<p class="text-danger"><b>residents</b></p>
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
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-400 font-13">###</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="autocomplete" style="width:200px;">
									<input id="myInput" type="text" placeHolder="RESIDENTS">
								</div>
							</th>
							<th class="th-position text-uppercase font-400 font-13">Phone No</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="emailautocomplete" style="width:200px;">
									<input id="emailInput" type="text" placeHolder="EMAIL">
								</div>
							</th>
							<th class="th-position text-uppercase font-500 font-12">
								<div class="contactautocomplete" style="width:200px;">
									<input id="contactInput" type="text" placeHolder="CONTACT PERSON">
								</div>
							</th>
							<th class="th-position text-uppercase font-400 font-13">Make Payment</th>
						</tr>
						<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<?php if($crm->service_image == NULL): ?>
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							<?php else: ?>
							<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
							<td><?php echo e($crm->pros_name); ?></td>
							<?php 
								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
							?>
							<td><?php echo e($basic->phone_p); ?></td>
							<td><?php echo e($basic->email_p); ?></td>
							<td><?php echo e($basic->contact_person); ?></td>
							<?php } ?>
							<td><a href="resident_make_payment/<?php echo e($crm->id); ?>"><span class="label label-primary font-size-80pc padding-7 success-bg padding-top-bottom-5 font-400">MAKE PAYMENT</a></span></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
				<div class="text-center"><?php echo e($crms->links()); ?></div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/payment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>