<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    Resident ASSESSMENT
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
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-400 font-13">#</th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Resident"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Add Assessment"); ?></th>								
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Assessment History"); ?></th>
    							<!--<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Next Assessment Date"); ?></th>-->
    						</tr>
    						<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    						<tr>
    							<input type="hidden" class="form-control" value="<?php echo e($crm->id); ?>" name="id"/>
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
    							<?php } ?>								
    							<input type="hidden" id="csrf" name="_token" value="<?php echo e(csrf_token()); ?>">
    							<td class="padding-left-45">
    								<a href="preadmin_select_assessments/<?php echo e($crm->id); ?>" class="material-icons material-icons gray md-22" style="background:transparent; border:none">add_circle_outline </button>
    							</td>
    							<td class="padding-left-45">
    								<a href="assessment_history/<?php echo e($crm->id); ?>" class="material-icons material-icons gray md-22" style="background:transparent; border:none">history </button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>