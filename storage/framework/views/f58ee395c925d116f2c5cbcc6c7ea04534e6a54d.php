<?php $__env->startSection('htmlheader_title'); ?>
    Notes
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
    <p><b> <span class="text-danger" style="text-align:center;"> 
        <?php if($name->service_image == NULL): ?>
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
		<img src="../hsfiles/public/img/<?php echo e($name->service_image); ?>" class="img-circle" width="40" height="40">
	<?php endif; ?>
    
    <?php echo e($name->pros_name); ?></span> </b>
    <h4><p style="text-align:center;"><strong>Notes</strong></p></h4>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="card">
    <div class="card-body px-lg-5 pt-0">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-body" style="height:300px; padding-top:0">
                    <form action="<?php echo e(action('WellnessController@storeNote')); ?>" method="post">
                        <input name="_method" type="hidden" value="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group has-feedback">
                            <input type="hidden" class="form-control" value="<?php echo e($id); ?>" name="res_id" required readonly />
                        </div>					
                        <div class="form-group has-feedback">
                            <label>Note:</label>
                            <textarea rows="8" class="form-control" name="notes" placeholder="add notes..."></textarea>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?php echo e(url('all_res_notes')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="overflow-y: scroll; height:500px; padding-top:0">
                    <h4><strong>Previous Records</strong></h4>
                    <?php 
                        if($notes->isEmpty()){
                            echo "No previous Record!";
                        }
                     ?>
                    <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php 
                        $user_name = DB::table('users')->where('user_id',$note->recorder)->select('users.firstname','users.lastname')->first();
                     ?>
                    <div class="panel-heading">
                    <li><a href="#modal" data-toggle="modal" data-target="#modalRegister<?php echo e($note->id); ?>"> <?php echo e($note->date); ?>  <?php echo e($note->time); ?></a></li>
                    </div>
                    <div id="modalRegister<?php echo e($note->id); ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align-last: center"><strong>Date: </strong><?php echo e($note->date); ?></h4>
                                        <h6 class="modal-title" style="text-align-last: center"><strong>Record Collected By:</strong> <?php echo e($user_name->firstname); ?> <?php echo e($user_name->lastname); ?></h6>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel-body">
                                            <div class="row">
                                                  <p> <strong> Note:</strong> <?php echo e($note->notes); ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>