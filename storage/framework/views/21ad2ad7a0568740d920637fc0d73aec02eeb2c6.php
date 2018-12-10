<?php $__env->startSection('htmlheader_title'); ?>
    List of Patients
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
    <p class="text-danger"><b>List of Patients</b></p>
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
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <th class="th-position text-uppercase font-500 font-12">###</th>
                            <th class="th-position text-uppercase font-500 font-12">
								<div class="autocomplete" style="width:200px;">
									<input id="myInput" type="text" placeHolder="RESIDENT">
								</div>
							</th>
                            <th class="th-position text-uppercase font-500 font-12">Contact no</th>
                            <th class="th-position text-uppercase font-500 font-12">Address</th>
                            <th class="th-position text-uppercase font-500 font-12">
								<div class="contactautocomplete" style="width:200px;">
									<input id="contactInput" type="text" placeHolder="CONTACT PERSON">
								</div>
							</th>
                            <th class="th-position text-uppercase font-500 font-12">Add Medication</th>
                            <th class="th-position text-uppercase font-500 font-12">View Details</th>
                        </tr>
                        <?php $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
							<?php if($patient->service_image == NULL): ?>
							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
							<?php else: ?>
							<td><img src="hsfiles/public/img/<?php echo e($patient->service_image); ?>" class="img-circle" width="40" height="40"></td>
							<?php endif; ?>
                            <td><?php echo e($patient->pros_name); ?></td>
                            <td><?php echo e($patient->phone_p); ?></td>
                            <td><?php echo e($patient->city_p); ?></td>
                            <td><?php echo e($patient->contact_person); ?></td>
                            <td class="padding-left-35">
                                <a href="add_patient_details/<?php echo e($patient->id); ?>">
                                    <i class="material-icons gray md-22"> add_circle</i>
                                </a>
                            </td>
                            <td class="padding-left-35">
                                <a href="view_patient_details/<?php echo e($patient->id); ?>">
                                    <i class="material-icons gray md-22"> visibility</i>
                                </a>
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
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/patient.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>