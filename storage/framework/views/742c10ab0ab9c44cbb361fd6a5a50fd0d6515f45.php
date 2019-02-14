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
			<form action="<?php echo e(action('ScreeningController@add_insurance')); ?>" method="post">
				<input type="hidden" name="_method" value="PATCH">
				<?php echo e(csrf_field()); ?>

				<div class="box box-body">		
					<div class="col-md-6">
						<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>"/>
						<label>Social Security</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="social_security" value="<?php echo e($data->ss); ?>" required />
						</div>
						<label>Medicare</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="medicare" value="<?php echo e($data->medicare); ?>" required />
						</div>
						<label>Supplemantal Insurance Name</label>
						<div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="insurance_name" value="<?php echo e($data->supplemental_insurance_name); ?>" pattern="[A-Za-z0-9\s]+" required />
						</div>
						<label>Policy</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="policy" value="<?php echo e($data->policy); ?>" required />
						</div>
				    	
					</div>
					<div class="col-md-6">
					    <label>Medicaid</label>
					    <div class="form-group has-feedback">
							<input type="text" class="form-control" placeholder="" name="medicaid" value="<?php echo e($data->medicaid); ?>" required />
						</div>
						<label>Responsible For Financial Matters</label>
						<?php 
							$name = explode(",",$data->personal_responcible);
						 ?>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name[0]); ?>" placeholder="First Name*" pattern="[A-Za-z\s]+" name="personal_responcible[]" required/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name[1]); ?>" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="personal_responcible[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name[2]); ?>" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="personal_responcible[]" required/>
								</div>
							</div>
						</div>						
						<label>Case Manager</label>
						<?php 
								$name1 = explode(",",$data->case_manager);
						 ?>
						<div class="row">
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name1[0]); ?>" placeholder="First Name*" pattern="[A-Za-z\s]+" name="case_manager[]" required/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name1[1]); ?>" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="case_manager[]"/>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<input type="text" class="form-control" value="<?php echo e($name1[2]); ?>" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="case_manager[]" required/>
								</div>
							</div>
						</div>
						<label>Case Manager Phone</label>
						<div class="form-group has-feedback">
							<input type="number" class="form-control" placeholder="" name="manager_phone" value="<?php echo e($data->manager_phone); ?>" required />
						</div>
						<div class="form-group has-feedback">
							<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Submit</button>
						</div>
						<div class="form-group has-feedback">
							<button type="button" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px">Cancel</button>
						</div>
						<br><br><br/>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

