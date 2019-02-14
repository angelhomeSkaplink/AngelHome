<?php $__env->startSection('htmlheader_title'); ?>
  Change Your Password
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 text-center">
    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Change Your Password</strong></h3>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('header-extra'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="row">
      <div class="col-md-4">

      </div>
      <div class="col-md-4">
        <div class="box box-primary">
          <!--<div class="box-header with-border">

          </div>-->
          <div class="box-body">
            <form action="<?php echo e(action('ProfileController@update_password')); ?>" method="post">
              <input type="hidden" name="_method" value="PATCH">
              <?php echo e(csrf_field()); ?>

              <div class="form-group has-feedback">
                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->user_id); ?>">
                <input type="password" id="txtPassword" class="form-control" placeholder="New Password" name="password"
                value="" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{6,}$"
				oninvalid="this.setCustomValidity('Required.Password should be Minimum 6 Character Long, Atleast One Number, One Special Character and One Upper Case')"
				oninput="this.setCustomValidity('')"/>
                <span class="fa fa-lock fa-lg form-control-feedback"></span>
              </div>

              <div class="form-group has-feedback">
                <input type="password" id="txtConfirmPassword" class="form-control" placeholder="Password again"
                name="password_confirmation"
                value="" required />
                <span class="fa fa-lock fa-lg form-control-feedback"></span>
              </div>
			  <div class="form-group has-feedback">
            		<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" onclick="return Validate()"><?php echo app('translator')->get("msg.Update"); ?></button>
				</div>

				<div class="form-group has-feedback">
                    <a href="<?php echo e(url('dashboard')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
            	</div><br/><br/><br/>
              <!--<div class="form-group has_feedback">
                <button type="submit" class="btn btn-flat" onclick="history.goback()">Cancel</button>
                <button type="submit" class="btn btn-primary btn-flat" onclick="return Validate()"><?php echo app('translator')->get("msg.Change password"); ?></button>
              </div>-->

            </form>
          </div>
        </div>
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
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>