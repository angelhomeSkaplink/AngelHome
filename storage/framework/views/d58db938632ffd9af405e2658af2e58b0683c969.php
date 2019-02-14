<?php $__env->startSection('htmlheader_title'); ?>
    Assessment Period
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessment Period</strong></h3>
	</div>
	<div class="col-lg-4">
		<?php if($flag == "resident"): ?>
			<a href="../../resident_assessment" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
		<?php else: ?>
			<a href="../../initial_assessment" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
		<?php endif; ?>
	</div>
</div>   
<?php $__env->stopSection(); ?>


<?php $__env->startSection('main-content'); ?>
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
	.card{
	    border-radius:10px;
	    padding:100px;
	    background-color:rgb(49, 68, 84)!important;
	    text-align:center;
	}
	.card:hover{
	   background-color:#006622 !important;
	}
	h3{
	    color:#fff !important;
	}
	.zoom {
  		transition: transform .2s; /* Animation */
  		/* margin: 0 auto; */
	}
	.zoom:hover {
		transform: scale(1.04); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
		font-size:1.5em;
	}
</style>
<?php 
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$id],['resident_room.status',1]])->first();
if($room){
	$room_no = $room->room_no;
}
else{
	$room_no = "No Room Booked";
}
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
 ?>
<div class="row" >
	<div class="col-lg-12 table-responsive">
		<table class="table">
			<tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
				<td>
						<h4><?php if($person->service_image == null): ?>
								<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
							<?php else: ?>
								<img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
							<?php endif; ?>
							<span class="text-success" style="color:aliceblue;"><strong><?php echo e($name[0]); ?> <?php echo e($name[1]); ?> <?php echo e($name[2]); ?></strong>
						</h4>
				</td>				
				<td>
						<h4 class="text-center" style="margin-top:20px;">	<span class="text-center" style="color:aliceblue;"><strong>Room No: <?php echo e($room_no); ?> </strong></span></h4>
				</td>
				<td>
						<h4><span class="pull-right" style="color:aliceblue;margin-top:10px;"><strong>Age: <?php echo e($age); ?> </strong></span></h4>
				</td>
			</tr>
		</table>
	</div>
</div>
<div class="row">
    <a href="../../select_assessments/Initial/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Initial</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Monthly/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Monthly</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Quarterly/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom ">
           <h3>Quarterly</h3>
        </div>
	</div>
	</a>
</div>
<div class="row" style="padding-top:30px;">
    <a href="../../select_assessments/HalfYearly/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Half-Yearly</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Annual/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Annual</h3>
        </div>
	</div>
	</a>
	<a href="../../select_assessments/Adhoc/<?php echo e($id); ?>">
	<div class="col-md-4">
	    <div class="panel-body box-body card zoom">
           <h3>Ad-Hoc</h3>
        </div>
	</div>
	</a>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/res_assessment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>