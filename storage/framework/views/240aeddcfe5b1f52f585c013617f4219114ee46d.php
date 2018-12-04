<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- <a href="#"><b>Angel Home</b></a> -->
        </div><!-- /.login-logo -->

    <?php if(count($errors) > 0): ?>
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
				<li>These credentials do not match our records.</li>
				<li>Check Your User Name and Password</li>
				<li>Or Your Account has been Deactivated</li>
                <!--<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>-->
            </ul>
        </div>
    <?php endif; ?>

		<div class="login-box-body">
			<p class="login-box-msg">Log-in</p>
				<form action="<?php echo e(url('/login')); ?>" method="post">

				<?php echo csrf_field(); ?>


				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="User Name" name="email"/>
					<span class="form-control-feedback"> <i class="material-icons" style="position: relative; top:5px;"> email </i> </span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password"/>
					<span class="form-control-feedback"> <i class="material-icons" style="position: relative; top:5px;"> lock </i> </span>
				</div>
				<input type="hidden" class="form-control" name="status" value="1"/>
				<!--<div class="form-group has-feedback">
					<select class="form-control" name="role" id="role" data-validation="required" data-validation-error-msg="This Field Is Required" >
						<option value="">Select a Role</option>
						<option value="1">Admin</option>
						<option value="2">Receptionist</option>						
						<option value="3">Marketing</option>
						<option value="4">RCC</option>
						<option value="5">Back Office</option>
						<option value="6">Doctor</option>
						<option value="7">Wellness Director</option>
					</select>
				</div>-->
				<div class="row">
					<!--<div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div><!-- /.col -->
					<div class="col-xs-4"></div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat" style="width:100% !important">Login</button>
					</div><!-- /.col -->
					<div class="col-xs-4"></div>
				</div>
			</form>	
    <!--<a href="<?php echo e(url('/password/reset')); ?>">I forgot my password</a><br>
    <a href="<?php echo e(url('/register')); ?>" class="text-center">Register a new membership</a>-->
		</div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

    <?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>