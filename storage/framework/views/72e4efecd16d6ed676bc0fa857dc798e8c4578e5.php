<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
		  <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Service Plan View</strong></h3>
		</div>
		<div class="col-lg-4">
			<a href="../resident_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
<div class="row" style="margin-bottom:0px;" >
	<div class="col-lg-12 " >
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
	<div class="col-lg-12">
		<h4><strong>Current Service Plan</strong> </h4>
	</div>
</div>
<div class="row" style="margin:0.5px;">
<div class="box box-primary ">   
	<h4 class="margin-0" style="padding:15px;margin:0px;"><b class="text-success"><?php echo e($query->service_plan_name); ?></b>	
	<span><b class="pull-right text-success">Price: $<?php echo e($query->price); ?></b></span>
	</h4>    
 
</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<h4><strong>Service Plan History</strong></h4>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-body border padding-top-0 padding-left-right-0">
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgb(49, 68, 84) !important;">
								<th class="th-position text-uppercase font-500 font-12"><h6 style="color:aliceblue !important;"><strong>Period</strong></h6></th>							
								<th class="th-position text-uppercase font-500 font-12"><h6 style="color:aliceblue !important;"><strong>Date</strong></h6></th>						
								<th class="th-position text-uppercase font-500 font-12"><h6 class="pull-right" style="color:aliceblue !important;margin-right:15px;"><strong>Action</strong></h6></th>
							</tr>
							<?php $__currentLoopData = $all_care; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><strong><?php echo e($ac->period); ?></strong></td>
								<td><strong><?php echo e($ac->date); ?></strong></td>
								<td><span class="pull-right"><a href="../view_plan_details/<?php echo e($ac->pros_id); ?>/<?php echo e($ac->care_plan_id); ?>" class="btn btn-default"><i class="material-icons md-22"> visibility </i> View</a></span></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				</div>					
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/res_assessment.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>