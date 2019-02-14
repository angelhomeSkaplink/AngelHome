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
</style>
<div class="box box-primary">
    <div class="tab-content" id="myTabContent">
        <div class="col-md-12">
			<form action="<?php echo e(action('ScreeningController@add_funeralhome')); ?>" method="post">
				<input type="hidden" name="_method" value="PATCH">
				<?php echo e(csrf_field()); ?>

				<div class="box box-body">
					<div class="col-md-6">
						<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>"/>
						<label>NAME</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_home" value="<?php echo e($data->funeral_home); ?>" pattern="[A-Za-z\s]+" required />
						</div>
						<label>PHONE</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" name="funeral_phone" value="<?php echo e($data->phone); ?>" required />
						</div>
					</div>
					<div class="col-md-6">
					    <label>City</label>
					    <div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_city" value="<?php echo e($data->city); ?>" pattern="[A-Za-z\s]+" required />
						</div>
						<label>Address</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" name="funeral_address" value="<?php echo e($data->address); ?>" required />
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
						</div>
						<div class="form-group has-feedback">
							<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></button>
						</div>
						<br><br><br/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
