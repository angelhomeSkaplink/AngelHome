<?php $__env->startSection('htmlheader_title'); ?>
     Task List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Task List</strong></h3>
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
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Task"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View"); ?></th>
    						</tr>
    						<tr>
    							<td>Eating</td>
    							<td><a href="daily_task/EATING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Continence</td>
    							<td><a href="daily_task/CONTINENCE"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Transfer</td>
    							<td><a href="daily_task/TRANSFER"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Ambulation</td>
    							<td><a href="daily_task/AMBULATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Dressing</td>
    							<td><a href="daily_task/DRESSING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Bathing</td>
    							<td><a href="daily_task/BATHING"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Med.-Management</td>
    							<td><a href="daily_task/MED.-MANAGEMENT"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
    						<tr>
    							<td>Communication</td>
    							<td><a href="daily_task/COMMUNICATION"><i class="material-icons material-icons gray md-22"> details </i></a></td>
    						</tr>
                        </tbody>
                    </table>
                </div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>