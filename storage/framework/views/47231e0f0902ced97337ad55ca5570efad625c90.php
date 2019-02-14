<?php $__env->startSection('htmlheader_title'); ?>
    All Member List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment History</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="<?php echo e(url('add_new_member')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;" ><i class="material-icons">add</i>Add New Member</a>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		//display:none;
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
    						<!-- <th class="th-position text-uppercase font-500 font-12">ID</th> -->
    						<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Name"); ?></th>
    						<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.User Name"); ?></th>
    						<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Role"); ?></th>
    						<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Edit"); ?></th>
    						<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Status"); ?></th>
    					  </tr>
    					  <?php $__currentLoopData = $all_records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rec): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    					  <tr>
    						<td><?php echo e($rec->firstname); ?> <?php echo e($rec->middlename); ?> <?php echo e($rec->lastname); ?></td>
    						<td><?php echo e($rec->email); ?></td>
    						<td>
    							<?php $req = DB::table('role')->select('role.id')->where('role.u_id','=',$rec->user_id)->where('status',1)->get();
    								foreach ($req as $r) {
    									?>
    									<?php if ($r->id == 3): ?>
    										| Marketing |
    									<?php endif; ?>
    									<?php if ($r->id == 2): ?>
    										| Receptionist |
    									<?php endif; ?>
    									<?php if ($r->id == 4): ?>
    										| RCC |
    									<?php endif; ?>
    									<?php if ($r->id == 5): ?>
    										| Back Office |
    									<?php endif; ?>
    									<?php if ($r->id == 6): ?>
    										| Doctor |
    									<?php endif; ?>
    									<?php if ($r->id == 7): ?>
    										| Wellness Director |
    									<?php endif; ?>
    									<?php if ($r->id == 8): ?>
    									| Care Taker |
    									<?php endif; ?>
    									<?php if ($r->id == 9): ?>
    									| Activity Manager |
    									<?php endif; ?>
    									<?php if ($r->id == 10): ?>
    									| Dietacian |
    									<?php endif; ?>
    									<?php if ($r->id == 11): ?>
    									| ED |
    									<?php endif; ?>
    									<?php
    								}
    							?>
    						</td>
    						<td><a href="edit_member/<?php echo e($rec->user_id); ?>"><i class="material-icons material-icons gray md-22"> edit </i></a></td>
    						<?php if($rec->status==1): ?>
    						<td><a href="inactive_member/<?php echo e($rec->user_id); ?>" class="text-success"><b> ACTIVE</b> </a></td>
    						<?php else: ?>
    							<td><a href="active_member/<?php echo e($rec->user_id); ?>" class="text-danger"><b> INACTIVE </b></a></td>
    						<?php endif; ?>
    					  </tr>
    					  <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    					  
    					</tbody>
    				</table>
				</div>
				<div class="text-center"><?php echo e($all_records->links()); ?></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>