


<?php $__env->startSection('htmlheader_title'); ?>
    Facility Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b><?php echo app('translator')->get("msg.room report of each facility"); ?></b></p>
	
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    
<div class="row">
	<br/>
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
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View Room Details"); ?></th>
						</tr>
						<?php $__currentLoopData = $facilities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facility): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($facility->facility_name); ?></a></td>
							<td><?php echo e($facility->address); ?></td>
							<td><?php echo e($facility->phone); ?></td>
							<td><?php echo e($facility->facility_email); ?></td>
							<td class="padding-left-45"><a href="facility_room_graph/<?php echo e($facility->id); ?>">
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