<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Prospective Add</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<?php if($errors->any()): ?>
	<?= 'Please Fill the form according to the field'?>
	<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
		<li><?php echo e($error); ?></li>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php endif; ?>
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
	.placeholder {
    color: red;
    opacity: 1; /* Firefox */
}
</style>

<div class="row">
	<form action="new_prospective" name="form_p" method="post" enctype="multipart/form-data">		
		<div class="col-md-4">
			<div class="box box-primary">				
				<div class="box-body" style="height:520px">
					<h4>Prospective</h4>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">					
									
								<input type="text" class="form-control" placeholder="First Name*" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">					
								
								<input type="text" class="form-control" placeholder="Middle Name" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">					
								
								<input type="text" class="form-control" placeholder="Last Name*" pattern="[A-Za-z\s]+" name="pros_name[]" />
							</div>
						</div>
					</div>		
					<div class="form-group has-feedback">
					<!--<label>Phone No*</label>-->
						<input type="text" class="form-control" placeholder="Phone No"  pattern="[0-9]{10}" name="phone_p" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Email*</label>-->
						<input type="email" class="form-control" placeholder="Email" name="email_p" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 1*</label>-->
						<input type="text" class="form-control" placeholder="Address Line 1" name="address_p" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 2</label>-->
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_p_two" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>City*</label>-->
						<input type="text" class="form-control" placeholder="City" name="city_p" pattern="[A-Za-z\s]+" />
					</div>
					<div class="form-group has-feedback">
					<!--<label>State*</label>-->
						<select name="state_id_p" id="state_id_p" class="form-control" >
							<option value=""><?php echo app('translator')->get("msg.Select State"); ?></option>
							<?php
								$states = DB::table('state')->get();							
								foreach ($states as $state)
								{ 
									?>
										<option value="<?php echo e($state->state_id); ?>"><?php echo e($state->state_name); ?></option>
									<?php
								}														
							?>	
						</select>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Zip code*</label>-->
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_p" pattern="[0-9]" />
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:520px">
					<h4>Contact Person</h4>
					<div class="row">
						<div class="col-lg-4">
							<div class="form-group">
							<!--<label>Contact Person*</label>-->
								<input type="text" class="form-control" placeholder="First Name*" name="contact_person_firstname" />
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<!--<label>Contact Person*</label>-->
								<input type="text" class="form-control" placeholder="Middle Name" name="contact_person_middlename" pattern="[A-Za-z\s]+" />
							</div> 
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<!--<label>Contact Person*</label>-->
								<input type="text" class="form-control" placeholder="Last Name*" name="contact_person_lastname" />
							</div>
						</div>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Phone No*</label>-->
						<input type="text" class="form-control" placeholder="Phone No" name="phone_c" pattern="[0-9]{10}" />
					</div>
					<div class="form-group has-feedback">
					<!--<label>Email*</label>-->
						<input type="email" class="form-control" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email_c" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 1*</label>-->
						<input type="text" class="form-control" placeholder="Address Line 1*" name="address_c" />
					</div>					
					<div class="form-group has-feedback">
					<!--<label>Address Line 2</label>-->
						<input type="text" class="form-control" placeholder="Address Line 2" name="address_c_two" />
					</div> 					
					<div class="form-group has-feedback">
					<!--<label>City*</label>-->
						<input type="text" class="form-control" placeholder="City" name="city_c" pattern="[A-Za-z\s]+"/>
					</div>
					<div class="form-group has-feedback">
					<!--<label>Select State*</label>-->
						<select name="stste_id_c" id="stste_id_c" class="form-control" >
							<option value=""><?php echo app('translator')->get("msg.Select State"); ?></option>
							<?php
								$states = DB::table('state')->get();							
								foreach ($states as $state)
								{ 
									?>
										<option value="<?php echo e($state->state_id); ?>"><?php echo e($state->state_name); ?></option>
									<?php
								}														
							?>	
						</select>
					</div>
					<div class="form-group has-feedback">
					<!--<label>Zip Code *</label>-->
						<input type="number" class="form-control" placeholder="Zip Code" name="zip_c" />
					</div>					
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:520px">
					<div class="form-group has-feedback">
					<!--<label>Relation*</label>-->
						<input type="text" class="form-control" placeholder="Relation" name="relation" id="relation" pattern="[A-Za-z\s]+" />
					</div>
					<!--<div class="form-group has-feedback">
						<label>Source*</label>
						<input type="text" class="form-control" placeholder="Source*" name="source" id="source" pattern="[A-Za-z\s]+" oninvalid="this.setCustomValidity('Enter Source')" oninput="this.setCustomValidity('')"    />
					</div>-->
					<div class="form-group has-feedback">
					<!--<label>Select State*</label>-->
						<select name="source" id="source" class="form-control" >
							<option value=""><?php echo app('translator')->get("msg.Select Source"); ?></option>
							<option value="Referral"><?php echo app('translator')->get("msg.Referral"); ?></option>
							<option value="Internet"><?php echo app('translator')->get("msg.Internet"); ?></option>
							<option value="Newspaper"><?php echo app('translator')->get("msg.Newspaper"); ?></option>
							<option value="TV"><?php echo app('translator')->get("msg.TV"); ?></option>
							<option value="Flyer"><?php echo app('translator')->get("msg.Flyer"); ?></option>							
						</select>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Remarks </label>-->
						<textarea type="text" class="form-control" placeholder="Source Detail" name="source_detail" size="8"></textarea>
					</div>
					<div class="form-group has-feedback">
						<!--<label>Remarks </label>-->
						<textarea type="text" class="form-control" placeholder="Remarks" name="remarks" size="8"></textarea>
					</div>
					<div class="form-group has-feedback">
						<label>upload profile photo</label>
						<input type="file" class="form-control" name="service_image" id="service_image" value=""/>
					</div>
					<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
					<div class="form-group has-feedback">
						<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
					</div>
					<div class="form-group has-feedback">
						<a href="<?php echo e(url('sales_pipeline')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
					</div><br/><br/><br/>					
				</div>
			</div>
		</div>
		<div class="col-md-10"></div>
	</form>
</div>

<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>