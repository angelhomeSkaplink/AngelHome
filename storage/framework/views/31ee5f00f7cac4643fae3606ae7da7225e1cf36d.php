


<?php $__env->startSection('htmlheader_title'); ?>
    Edit Room Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Edit Room Details</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>

<div class="row">
	<form action="<?php echo e(action('RoomController@new_room_edit')); ?>" method="post">
		<input type="hidden" name="_method" value="PATCH">
			<?php echo e(csrf_field()); ?>

		<div class="col-md-6 col-md-offset-3">
			<div class="box box-primary">				
				<div class="box-body" style="height:500px">
					<input type="hidden" class="form-control" name="room_id" value="<?php echo e($row->room_id); ?>" />
					<div class="form-group has-feedback">
						<label>Room no</label>
						<input type="text" class="form-control" placeholder="ROOM NO" name="room_no" value="<?php echo e($row->room_no); ?>" required />
					</div> 
					<div class="form-group has-feedback">
						<label class="sm-heading">Room Type </label>
						<select name="room_type" id="room_type" class="form-control" required >
							<option value="<?php echo e($row->room_type); ?>"><?php echo e($row->room_type); ?></option>
							<option value="AC">AC</option>
							<option value="NON-AC">NON-AC</option>
						</select>
					</div>
					<div class="form-group has-feedback">
						<label>special feature </label>
						<textarea class="form-control" name="special_feature" type="text" rows="5" placeholder="SPECIAL FEATURE"><?php echo e($row->special_feature); ?></textarea>
					</div>
					<div class="form-group has-feedback">
					<label>price</label>
						<input type="number" class="form-control" placeholder="PRICE" name="price" value="<?php echo e($row->price); ?>" required pattern="[0-9]"
						oninvalid="this.setCustomValidity('Required Field.Numeric Value Only')"
						oninput="this.setCustomValidity('')"/>
					</div>
					
					<div class="form-group has-feedback">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
            		</div>

					<div class="form-group has-feedback">
                        <a href="<?php echo e(url('room_details')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
            		</div>
				</div>
			</div>
		</div>		
		<div class="col-md-10"></div>					
	</form>
</div>
    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>