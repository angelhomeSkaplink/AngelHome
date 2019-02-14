<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Info 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Room Booking</strong></h3>
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
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
	.content {
		margin-top: 15px;
	}
</style>
<script>
	$(document).ready(function() {
	  $('select[name="id"]').on('change', function() {
		var pros_id = $(this).val();
		console.log(pros_id);
		if(pros_id) {
		  $.ajax({
			url: 'booking_pros/'+pros_id,
			type: "GET",
			success:function(data) {
			  window.location.replace('booking_pros/'+pros_id);
			}
		  });
		}
	  });
	});
</script>
<link href="<?php echo e(asset('/css/type_ahead.css')); ?>" rel="stylesheet" type="text/css"/>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">				
            <div class="box-header with-border col-sm-2 pull-right"></div>
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12">#</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="autocomplete" style="width:200px;">
    									<input id="myInput" type="text" placeHolder="&#61442; RESIDENT" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<th class="th-position text-uppercase font-500 font-12">Phone No</th>
    							<th class="th-position text-uppercase font-500 font-12">
    								<div class="emailautocomplete" style="width:200px;">
    									<input id="emailInput" type="text" placeHolder="&#61442; EMAIL" style="font-family: FontAwesome, Arial; font-style: normal">
    								</div>
    							</th>
    							<!--<th class="th-position text-uppercase font-500 font-12">Book Room</th>-->
    							<th class="th-position text-uppercase font-500 font-12">Status</th>
    							<th class="th-position text-uppercase font-500 font-12">Change Room</th>
    							<th class="th-position text-uppercase font-500 font-12">Leave Room</th>
    						</tr>
							<?php $__currentLoopData = $crms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $crm): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
							<?php 
								$n = explode(",",$crm->pros_name);
							 ?>
    						<tr>
    							<?php if($crm->service_image == NULL): ?>
    							<td><img src="hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40"></td>	
    							<?php else: ?>
    							<td><img src="hsfiles/public/img/<?php echo e($crm->service_image); ?>" class="img-circle" width="40" height="40"></td>
    							<?php endif; ?>
    							<td><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></td>
    							<?php 
    								$basic = DB::table('change_pross_record')->where([['pros_id', $crm->id], ['status', 1]])->first();{
    							?>
    							<td><?php echo e($basic->phone_p); ?></td>
    							<td><?php echo e($basic->email_p); ?></td>
    							<?php } ?>
    							<!--<td style="padding-left:35px"><a data-toggle="tooltip" data-placement="bottom" data-original-title="Add Screening Records" href="book_room/<?php echo e($crm->id); ?>"><i class="material-icons gray md-22"> add_circle</i></a></td>-->
    							<?php 
    								$room = DB::table('resident_room')->where([['pros_id', $crm->id], ['status', 1]])->first(); if($room){
    								$room_no = DB::table('facility_room')->where([['room_id', $room->room_id]])->first();
    							?>
    							<td class="text-success"><b>BOOKED ROOM NO <label><?php echo e($room_no->room_no); ?></label> FROM <label><?php echo e($room->booked_date); ?></label></b> </td>
    							<?php } else{?>
    							<td class="text-danger"><b>NO BOOKING HISTORY FOUND</b></td>
    							<?php } ?>
    							<td style="padding-left:35px"><a href="change_own_room/<?php echo e($crm->id); ?>"><i class="material-icons gray md-22"> track_changes</i></a></td>
    							<td style="padding-left:35px"><a href="leave_own_room/<?php echo e($crm->id); ?>"><i class="material-icons gray md-22"> cancel_presentation</i></a></td>
    						</tr>
    						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                           </tbody>
                    </table>
                </div>
				<div class="text-center"><?php echo e($crms->links()); ?></div>					
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/rec/booking.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>