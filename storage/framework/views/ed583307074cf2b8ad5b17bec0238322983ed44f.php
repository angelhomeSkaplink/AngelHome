<?php $__env->startSection('htmlheader_title'); ?>
    Temporary Service Plan
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
			<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Temporary Service Plan</strong></h3>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-header with-border col-sm-2 pull-right">
            </div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12">#</th>
							<th class="th-position text-uppercase font-500 font-13">Resident</th>
							<th class="th-position text-uppercase font-500 font-12">Add TSP</th>
							<th class="th-position text-uppercase font-500 font-12">View TSP</th>
						</tr>
						<?php $__currentLoopData = $residents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<?php 
							$n = explode(",",$r->pros_name);
						 ?>
						<tr>
							<?php if($r->service_image == NULL): ?>
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>
							<?php else: ?>
							<td><img src="hsfiles/public/img/<?php echo e($r->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
							<td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add TSP Records" href="all_tsp/<?php echo e($r->id); ?>"><i class="material-icons gray md-22"> add_circle</i></a></td>
							<td style=""><a data-toggle="tooltip" data-placement="bottom" data-original-title="View TSP Records" href="view_resident_tsp/<?php echo e($r->id); ?>"><i class="material-icons gray md-22"> visibility </i></a></td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>