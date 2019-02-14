<?php $__env->startSection('htmlheader_title'); ?>
    All Member List
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Add New Member</strong></h3>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<br/>
<style>	
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
<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="card">
	<div class="card-body px-lg-5 pt-0">
	<form action="<?php echo e(action('AddMemberController@store_member_details')); ?>" method="post" style="color: #757575;" enctype="multipart/form-data">
        <!-- <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" /> -->
		<div class="col-md-2"></div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="height:400px; padding-top:0">
					<div class="form-group has-feedback">
					<!-- <label>ID</label> -->
						<input type="hidden" class="form-control" value="<?php echo e($new_id); ?>" name="new_id" required readonly />
					</div>					
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.First Name"); ?>*</label>
						<input type="text" class="form-control" name="first_name" pattern="[A-Za-z\s]+" required 
						oninvalid="this.setCustomValidity('Required Field.Use Alphabate Character Only')"
						oninput="this.setCustomValidity('')" value="<?php echo e(old('first_name')); ?>"/>
					</div>
					<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Middle Name"); ?></label>
						<input type="text" class="form-control" name="middle_name" pattern="[A-Za-z\s]+"
						oninvalid="this.setCustomValidity('Use Alphabate Character Only')"
						oninput="this.setCustomValidity('')" value="<?php echo e(old('middle_name')); ?>"/>
					</div>
					<div class="form-group has-feedback">
					<label><?php echo app('translator')->get("msg.Last Name"); ?>*</label>
						<input type="text" class="form-control" name="last_name" pattern="[A-Za-z\s]+" required 
						oninvalid="this.setCustomValidity('Required Field.Use Alphabate Character Only')"
						oninput="this.setCustomValidity('')" value="<?php echo e(old('last_name')); ?>"/>
					</div>
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.User Name"); ?>*</label>
						<input type="text" class="form-control" name="user_name" pattern="[A-Za-z\s]+" required 
						oninvalid="this.setCustomValidity('Required Field.Use Alphabate Character Only')"
						oninput="this.setCustomValidity('')"/>
					</div>
					<div class="form-group has-feedback">
					<!-- <label>Status</label> -->
						<input type="hidden" class="form-control" name="status" pattern="[0-9]" value="1"/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="box box-primary">
				<div class="box-body" style="padding-top:25px; height:400px;">					
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Password"); ?>*</label>
						<input type="password" class="form-control" name="_password" id="txtPassword" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$"
						oninvalid="this.setCustomValidity('Password should be Minimum 6 Character Long, Atleast One Number, One Special Character and One Upper Case')"
						oninput="this.setCustomValidity('')" value="<?php echo e(old('password')); ?>"/>
					</div>
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Confirm Password"); ?>*</label>
						<input type="password" id="txtConfirmPassword" class="form-control" name="password_confirmation" required />
					</div>
					<div class="form-group has-feedback">
						<label><?php echo app('translator')->get("msg.Role"); ?>*</label><br/>
						<label style="padding-right:10px;">
							<input type="checkbox" id="role_ed" name="role[]" value="11">
							<span class="label-text"><?php echo app('translator')->get("msg.ED"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="2">
							<span class="label-text"><?php echo app('translator')->get("msg.Receptionist"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="3">
							<span class="label-text"><?php echo app('translator')->get("msg.Marketing"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="4">
							<span class="label-text"><?php echo app('translator')->get("msg.RCC"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="5">
							<span class="label-text"><?php echo app('translator')->get("msg.Back Office"); ?></span>
						</label>
						<!--<label style="padding-right:10px;">-->
						<!--	<input type="checkbox" name="role[]" value="6">-->
						<!--	<span class="label-text"><?php echo app('translator')->get("msg.Doctor"); ?></span>-->
						<!--</label>-->
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="7">
							<span class="label-text"><?php echo app('translator')->get("msg.Wellness Director"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="8">
							<span class="label-text"><?php echo app('translator')->get("msg.Care Taker"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="9">
							<span class="label-text"><?php echo app('translator')->get("msg.Activity Manager"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="10">
							<span class="label-text"><?php echo app('translator')->get("msg.Dietician"); ?></span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="12">
							<span class="label-text">Med Tech</span>
						</label>
						<label style="padding-right:10px;">
							<input type="checkbox" name="role[]" value="13">
							<span class="label-text">BOM</span>
						</label>
					</div>			
					<div class="form-group has-feedback">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            			<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" onclick="return Validate()"><?php echo app('translator')->get("msg.Submit"); ?></button>
            		</div>
					<div class="form-group has-feedback">
                        <a href="<?php echo e(url('all_member_list')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
            		</div>
				</div>
			</div>
		</div>
	</form>
	</div>
</div>
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
    $('#role_ed').click(function(){
    var $inputs = $('input:checkbox')
        if($(this).is(':checked')){
            $inputs.not(this).prop('checked',false);
            $inputs.not(this).prop('disabled',true); // <-- disable all but checked one
        }else{
          $inputs.prop('disabled',false); // <--
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>