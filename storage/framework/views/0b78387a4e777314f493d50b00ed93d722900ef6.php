<?php $__env->startSection('htmlheader_title'); ?>
    Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<div class="panel panel-default text-center" style="margin-top:-15px;background-color:#f2f2f2 !important;">
		<div class="panel-header" style="padding:2px;">
		<h3><span style="color:#003366;text-shadow: 1px 1px #000;"><strong>Dashboard :: </strong><?php echo Auth::user()->firstname." ".Auth::user()->lastname ?></span></h3>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>	
	
	.content-header
	{
		/* display:none; */
		padding:0px;
		margin:0px;
	}
	.make-scrollable{
		overflow:scroll; 
		height:200px;
	}
	.wiget-head{
		background-color:#262626;
	}
	.wiget-head:hover{
		background-color:#006622;
		color:#fff;
	}
	.wiget-head > h4{
		color:#fff !important;
	}	
	.zoom {
  		transition: transform .2s; /* Animation */
  		/* margin: 0 auto; */
	}
	.zoom:hover {
		transform: scale(1.1); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
	}
</style>

	
	<?php $facility_name = DB::table('facility')->where('id', Auth::user()->facility_id)->first(); 
		$id=Auth::user()->facility_id; 
	?>
	<?php if(Auth::user()->role == '1'): ?>   
	   <?php echo $__env->make('dashboard.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	<?php endif; ?>

	<?php if(Auth::user()->role == '11'): ?>   
	   <?php echo $__env->make('dashboard.ed', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	<?php endif; ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>