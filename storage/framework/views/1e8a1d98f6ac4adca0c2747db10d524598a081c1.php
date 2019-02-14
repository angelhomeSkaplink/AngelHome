<?php $__env->startSection('htmlheader_title'); ?>
    Service Plan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Service Plan</strong></h3>
	</div>
	<div class="col-lg-4">
	<?php if(Auth::user()->role == '1' || Auth::user()->role == '11'): ?>
		<a href="<?php echo e(url('new_plan_add_form')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">add</i>Add New Plan</a>
	<?php endif; ?>
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
	.form-control{
		//text-transform: uppercase;
	}
</style>
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-body border padding-top-0 padding-left-right-0">
			    <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Service Plan Name"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Point Range (From)"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Point Range (to)"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Price"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Edit"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Delete"); ?></th>
    						</tr>
    						<?php $__currentLoopData = $serviceplans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceplan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    						<tr>
    							<td><?php echo e($serviceplan->service_plan_name); ?></td>								
    							<td><?php echo e($serviceplan->from_range); ?></td>
    							<?php if($serviceplan->to_range==200000): ?>
    							<td>MAX RANGE</td>
    							<?php else: ?>
    							<td><?php echo e($serviceplan->to_range); ?></td>
    							<?php endif; ?>								
    							<td><?php echo e($serviceplan->price); ?></td>
    							<td><a href="plan_edit/<?php echo e($serviceplan->service_plan_id); ?>"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
    							<td style="padding-left:22px !important"><a href="plan_delete/<?php echo e($serviceplan->service_plan_id); ?>">
    								<i class="material-icons material-icons gray md-22" onclick="return confirm('Are you sure you want Delete this record ??');"> delete </i> </a></td>	
    						</tr>
    						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
				<div class="text-center"><?php echo e($serviceplans->links()); ?></div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>