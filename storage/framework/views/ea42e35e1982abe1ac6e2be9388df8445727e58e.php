<?php $__env->startSection('htmlheader_title'); ?>
    SELECT ASSESSMENT
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>   
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4 text-center">
			<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Assessments</strong></h3>
			<span class="text-danger"><strong>Period: <span style="color:#0047b3;"><?php echo e($period); ?></span></strong></span>
		</div>
		<div class="col-lg-4">
			<?php 
			$status = array();
			foreach($status_array as $sa){
				array_push($status,$sa->status);
			}
		 ?>
		<?php if(!in_array("Work in progress",$status) && in_array("Done",$status)): ?>
		<a href="../../care_plan/<?php echo e($id); ?>/<?php echo e($period); ?>" class="btn btn-primary  btn-flat   pull-right" style="margin-right:15px;border-radius:5px;"><strong><i class="material-icons material-icons md-22"> add_circle_outline </i> <?php echo app('translator')->get("msg.Care Plan"); ?></strong></a>
		<?php else: ?>		
		<a href="javascript:ShowWarning()" class="btn btn-primary  btn-flat   pull-right" style="margin-right:15px;border-radius:5px;"><strong><i class="material-icons material-icons md-22"> add_circle_outline </i> <?php echo app('translator')->get("msg.Care Plan"); ?></strong></a>
		<?php endif; ?>
		<a class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;" onclick="history.back();"><strong><i class="material-icons">keyboard_arrow_left</i><?php echo app('translator')->get("msg.Back"); ?></strong></a>
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
<?php if(!empty(Session::get('error_code')) && Session::get('error_code') == 5): ?>
    <script type="text/javascript">
        $(document).ready(function() {
			console.log('HI');
			//alert('You must done the assessment first.');
            $('#popupmodal').modal();
        });
    </script>
    <div id="popupmodal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h3>Notification: Please read</h3>
        </div>
        <div class="modal-body">
            <p>
                <?php echo e(Session::get('error_code')); ?>

            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo app('translator')->get("msg.Close"); ?></button>
        </div>
    </div>
<?php endif; ?>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
			<div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
    						<tr style="background-color:rgb(49, 68, 84) !important;color:aliceblue;">
								<th class="th-position text-uppercase font-500 font-12"><strong><?php echo app('translator')->get("msg.Assessments"); ?></strong></th>
								<th class="th-position text-uppercase font-500 font-12"><strong><?php echo app('translator')->get("msg.Status"); ?></strong></th>
    							<th class="th-position text-uppercase font-500 font-12"><span class="pull-right" style="padding-right:20px;"><strong>Action</strong></span></th>
    							
    						</tr>
    						<?php $__currentLoopData = $assessments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $assessment): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    						<tr>
    							<td><i class="material-icons">library_books</i><strong>&nbsp; <?php echo e($assessment->assessment_form_name); ?></strong></td>
    							
    															
							<td style="color:<?php echo e($status_array[$key]->color); ?>;">
									<strong><?php echo e($status_array[$key]->status); ?></strong>
								</td>
								<td>
    								<span class="pull-right"><a class="btn btn-default" href="../../assessment_choose/<?php echo e($assessment->assessment_id); ?>/<?php echo e($period); ?>/<?php echo e($id); ?>/<?php echo e($cur_date); ?>"><i class="material-icons material-icons gray md-22"> add_circle_outline </i> Add</a></span>
    							</td>
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
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
<script teype="text/javascript">
	function ShowWarning(){
		toastr.optionsOverride = 'positionclass = "toast-bottom-right"';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.warning('Please complete the assessment', 'Warning', 'positionclass = "toast-bottom-right"');
	}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>