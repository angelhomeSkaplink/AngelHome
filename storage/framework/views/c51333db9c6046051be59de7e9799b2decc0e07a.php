

<?php $__env->startSection('htmlheader_title'); ?>
     <?php echo app('translator')->get("msg.Assessments"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <?php echo app('translator')->get("msg.Assessments"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<br/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
						<tr>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View assessment ID"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Assessments"); ?></th>
							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.View assessment"); ?></th>
						</tr>
						<?php $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assessment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						<tr>
							<td><?php echo e($assessment->assessment_id); ?></td>
							<td><label><?php echo e($assessment->assessment_form_name); ?></label></td>
							<td><a href="assessment_form_view/<?php echo e($assessment->assessment_id); ?>"><i class="material-icons material-icons gray md-22"> details </i></a></td>
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