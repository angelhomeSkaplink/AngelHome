<!-- jQuery 2.1.4 
<script src="<?php echo e(asset('/plugins/jQuery/jQuery-2.1.4.min.js')); ?>"></script> -->
<!-- Bootstrap 3.3.2 JS -->
<script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('/js/app.min.js')); ?>" type="text/javascript"></script>
<!-- Toastr -->
<script src="<?php echo e(asset('/js/toastr.min.js')); ?>" type="text/javascript"></script>
<!-- Bootstrap Calender -->
<script type="text/javascript" src="<?php echo e(asset('/js/bootstrap-datepicker.js')); ?>"></script>
<!--<script src="<?php echo e(asset('/js/jquery.min.js')); ?>" type="text/javascript"></script>-->


<!-- css and js for wicketpicker -->
<link href="<?php echo e(asset('/css/wickedpicker.min.css')); ?>" rel="stylesheet" type="text/css"/>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/wickedpicker.min.js')); ?>"></script>
<script>
	$('.timepicker').wickedpicker();
</script>
<!-- css and js for wicketpicker -->

<?php echo Toastr::render(); ?>

<!-- SweetAlert2 -->
<script src="<?php echo e(asset('/js/sweetalert2.min.js')); ?>" type="text/javascript"></script>
 
 		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/knockout-debug.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/survey.ko.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/surveyeditor.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/editor.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/bootstrap-notify.min.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/config.js')); ?>"></script>		
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/jquery-confirm.min.js')); ?>"></script>		
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/jquery-ui.min.js')); ?>"></script>			
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/survey.app.js')); ?>"></script>		
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/survey.js')); ?>"></script>
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/submit.js')); ?>"></script>		
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/assessment/surveyjs-widgets.js')); ?>"></script>		
		<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/nav-bar.js')); ?>"></script>
<?php echo $__env->yieldContent('scripts-extra'); ?>