<?php $__env->startSection('htmlheader_title'); ?>
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Service Plan Details</strong></h3>
	</div>
	<div class="col-lg-4">
		<a class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header{
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
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
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<?php if(count($reports)<=0): ?>
					<p class="text-danger"><b>&nbsp;&nbsp;NO ASSESSMENT RECORDS FOUND</b></p>
				<?php endif; ?>
				<?php if(count($reports)>0): ?>
				<div class="table-responsive">
					<table class="table table-striped">
						<tbody>
							<tr style="background-color:rgba(0, 0, 0, 0.87);color:aliceblue;">
								<th class="th-position text-uppercase font-500 font-12"><strong>Assessment</strong></th>								
								<th class="th-position text-uppercase font-500 font-12"><strong>date</strong></th>	
								<th class="th-position text-uppercase font-500 font-12"><strong>Point</strong></th>
								<th class="th-position text-uppercase font-500 font-12 text-center"><span class="pull-right" style="margin-right:15px;"><strong>Action</strong></span></th>
							</tr>
							<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<tr>
								<td><i class="material-icons">library_books</i> &nbsp; <?php echo e($report->assessment_form_name); ?></td>
								<td><?php echo e($report->assessment_date); ?></td>
								<td><?php echo e($report->score); ?></td>
								<td class="text-center" width="12%"><a class="btn btn-default btn-block" href="../../../history/<?php echo e($report->pros_id); ?>/<?php echo e($report->id); ?>"><i class="material-icons md-22"> visibility </i> View</a></span></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
							<tr style="background-color: #e3e3e3;color:black">
								<td><label><strong>Total Assessment score</strong></label></td>
								<td></td>
								<td><strong><?php echo e($total_score); ?></strong></td>	
								<td></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php if(count($reports)>0): ?>
	<br/>
	<div class="col-md-12"><h4 class="font-500 text-uppercase font-15">Service plan details</h4></div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<div class="table-responsive">
					<table class="table">
						<tbody>	
							<tr style="background-color:rgba(0, 0, 0, 0.87);color:aliceblue;">
								<th>Service Plan Total score(From all Assessments)</th>
								<th>Note</th>
								<th>Resident Service Plan</th>
								<th>Price</th>
							</tr>	
							<tr>
								<td><?php echo e($cp_data->total_point); ?></td>
								<td><?php echo e($cp_data->care_plan_detail); ?></td>
								<td><?php echo e($service_plan->service_plan_name); ?></td>
								<td><?php echo e($service_plan->price); ?></td>
							</tr>	
						</tbody>
					</table>
				</div>
			</div>
		</div>		
	</div>
	<?php endif; ?>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>