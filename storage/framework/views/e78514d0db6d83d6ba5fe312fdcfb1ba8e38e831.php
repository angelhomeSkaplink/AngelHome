<?php $__env->startSection('htmlheader_title'); ?>
    Log in
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<body>
	
		<div class="limiter">
			<div class="container-login100">
					<form action="<?php echo e(url('login')); ?>" method="post" class="login100-form validate-form">
							<?php echo csrf_field(); ?>

						<span class="login100-form-title">
							Member Login
						</span>
	
						<div class="wrap-input100">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>
	
						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>
						<input type="hidden" class="form-control" name="status" value="1"/>
	
						<div class="container-login100-form-btn">
							<button class="login100-form-btn">
								Login
							</button>
						</div>
						<br>
						<?php echo $__env->make('layouts.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					</form>
					
			</div>
			
		</div>
		
	
		
	<!--===============================================================================================-->	
		<script src="<?php echo e(asset('/public/login/vendor/jquery/jquery-3.2.1.min.js')); ?>"></script>
	<!--===============================================================================================-->
		<script src="<?php echo e(asset('/public/login/vendor/bootstrap/js/popper.js')); ?>"></script>
		<script src="<?php echo e(asset('/public/login/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>
	<!--===============================================================================================-->
		<script src="<?php echo e(asset('/public/login/vendor/select2/select2.min.js')); ?>"></script>
	<!--===============================================================================================-->
	<!--===============================================================================================-->
		<script src="<?php echo e(asset('/public/login/js/main.js')); ?>"></script>
		<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</body>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>