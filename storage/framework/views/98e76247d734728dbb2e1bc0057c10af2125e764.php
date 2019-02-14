<?php $__env->startSection('htmlheader_title'); ?>
Room Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Room Details</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="<?php echo e(url('new_room_add')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">add</i>New Room</a>
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
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Room No"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Room Type"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Special Feature"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Price"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Edit"); ?></th>
    								<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Delete"); ?></th>
    							</tr>
    							<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    							<tr>
    								<td><?php echo e($room->room_no); ?></td>								
    								<td><?php echo e($room->room_type); ?></td>
    								<td><?php echo e($room->special_feature); ?></td>
    								<td>$<?php echo e($room->price); ?></td>
    								<td><a href="room_edit/<?php echo e($room->room_id); ?>"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
    								<td style="padding-left:22px !important"><a href="room_delete/<?php echo e($room->room_id); ?>">
    								<i class="material-icons material-icons gray md-22" onclick="return confirm('Are you sure you want Delete this record ??');"> delete </i> </a></td>
    							</tr>
    							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </tbody>
                        </table>
                    </div>
					<div class="text-center"><?php echo e($rooms->links()); ?></div>					
                </div>                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>