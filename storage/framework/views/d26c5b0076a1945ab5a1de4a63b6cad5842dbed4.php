<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Facility Info"); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Sales Report Of Each Facility</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="<?php echo e(url('facility_aggregated_sales_report')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">details</i>Aggregated Group Report</a>
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
            <div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Facility"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Address"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Phone No"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Email"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View Details"); ?></th>
						</tr>
						<?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($facility->facility_name); ?></a></td>
							<td><?php echo e($facility->address); ?></td>
							<td><?php echo e($facility->phone); ?></td>
							<td><?php echo e($facility->facility_email); ?></td>
							<td class="padding-left-45"><a href="facility_sales_reports_detail/<?php echo e($facility->id); ?>">
								<i class="material-icons material-icons md-22 gray"> visibility </i></a>
							</td>		
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>