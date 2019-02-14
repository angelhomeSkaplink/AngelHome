


<?php $__env->startSection('htmlheader_title'); ?>
     <?php echo app('translator')->get("msg.Facility Info"); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Total Revenue Of Each Facility</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('facility_aggregated_revenue_graph')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back To Graph</a>
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
</style>
   
<div class="row">
	<br/>
        <div class="col-md-12">	
            <div class="box box-primary border">				
                <div class="box-header with-border col-sm-2 pull-right">                   
                </div>
				
                <div class="box-body border padding-top-0 padding-left-right-0">
                    <table class="table">
                        <tbody>
							<tr>
								<th class="th-position text-uppercase font-500 font-12"></th>
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Facility"); ?></th>
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Total Revenue"); ?></th>
								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View Details"); ?></th>
							</tr>
							<?php $__currentLoopData = $payable_sum; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<?php $facility_name = DB::table('facility')->where('id', $facility->facility_id)->first(); ?>
								<td></td>
								<td><?php echo e($facility_name->facility_name); ?></a></td>
								<td><?php echo e($facility->ammount_pay); ?></td>
								<td class="padding-left-45"><a href="monthly_revenue/<?php echo e($facility->facility_id); ?>">
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