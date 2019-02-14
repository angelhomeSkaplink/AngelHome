<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Room Details"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Reschedule Appointment</strong></h3>
	</div>
	<div class="col-lg-4">
		<a href="../booking" class="btn btn-success btn-block btn-flat btn-width btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<br/>
<style>
.content-header {
    position: relative;
    padding: 1px 0px 1px 12px;
}
.content {
	margin-top: 0px;
}

</style>
<script>
	$(document).ready(function(){
        $("#roomModal").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');
            $.get( '../room_details_view/' + id, function( data ) {
				var res = JSON.parse(data);
				var $template = `
					<div class="user_info">
						<h4><b>${res.pros_name}</b></h4>
					</div>
				`;
                $(".modal-body").html($template);
            });

        });
    });
</script>
<style>
  .btn-circle.btn-lg {
    width: 35px;
    height: 35px;
    padding: 5px 8px;
    font-size: 12px;
    line-height: 1.00;
    border-radius: 25px;
  }
</style>
<?php 
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name); 
 ?>
<div class="row" style="background-color:rgb(49, 68, 84) !important;">
	<div class="col-lg-12">
		<h4><?php if($person->service_image == NULL): ?>
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
			<img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
		<?php endif; ?>
		<span class="text-success" style="color:aliceblue;"><strong><?php echo e($name[0]); ?> <?php echo e($name[1]); ?> <?php echo e($name[2]); ?></strong>
		<span class="pull-right" style="color:aliceblue;padding-top:10px;"><strong>Age: <?php echo e($age); ?> </strong></span>		
		</h4>
	</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary border">
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
              				<tr>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Room No"); ?></th>
              					<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Room Type"); ?></th>
              					<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Special Feature"); ?></th>
              					<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Market Rate"); ?></th>
              					<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Actual Rate"); ?></th>
              					<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Book"); ?></th>
              				</tr>
              				<tr>
              					<?php if($reports == NULL && $rooms != NULL): ?>
              						<?php $__currentLoopData = $rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    									<form action="<?php echo e(action('RoomController@room_change')); ?>" method="post">
    										<input type="hidden" name="_method" value="PATCH">
    										<?php echo e(csrf_field()); ?>

    										<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>"/>
        									<input type="hidden" class="form-control" name="room_id" value="<?php echo e($room->room_id); ?>"/>
              								<td style="vertical-align:middle"><?php echo e($room->room_no); ?></td>
              								<td style="vertical-align:middle"><?php echo e($room->room_type); ?></td>
              								<td style="vertical-align:middle"><?php echo e($room->special_feature); ?></td>
              								<td style="vertical-align:middle">$<?php echo e($room->price); ?></td>
              								<!--<input type="hidden" class="form-control" name="actual_price" value="<?php echo e($room->price); ?>"/>-->
              								<?php if($room->room_status == 1): ?>
              									<?php $actual_rate = DB::table('resident_room')->where([['room_id', $room->room_id], ['status', 1]])->first(); ?>
              									<td style="vertical-align:middle">$<?php echo e($actual_rate->price); ?></td>
              									<?php endif; ?>
              									<?php if($room->room_status == 0): ?>
              									<td ><input style="width:110px" type="number" class="form-control" placeholder="PRICE" name="price" value="<?php echo e($room->price); ?>" required pattern="[0-9]"/></td>
              									<?php endif; ?>
              									<input style="width:110px" type="hidden" class="form-control" name="orgnl_price" value="<?php echo e($room->price); ?>"/>
              									<?php if($room->room_status == 0): ?>
              									<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i></button></td></tr>
              									<?php endif; ?>
              									<?php if($room->room_status == 1): ?>
              									<!--<td><a href="view_book_resident/<?php echo e($room->room_id); ?>" class="btn btn-danger btn-block btn-flat">Room Booked</a></td></tr>-->
              									<td><button type="button" class="btn btn-danger btn-circle btn-lg" id="<?php echo e($room->room_id); ?>" data-toggle="modal" data-target-id="<?php echo e($room->room_id); ?>"  data-target="#roomModal" ><i class="glyphicon glyphicon-remove"></i></button></td></tr>
              									<?php endif; ?>
              							</form>
              						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              					<?php endif; ?>
              					<?php if($reports == NULL && $rooms == NULL): ?>
              						<?php echo app('translator')->get("msg.No Rooms Available"); ?>
              					<?php endif; ?>
              					<?php if($reports != NULL): ?>
              						<?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $room): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
              							<form action="<?php echo e(action('RoomController@room_change')); ?>" method="post">
              								<input type="hidden" name="_method" value="PATCH">
              								<?php echo e(csrf_field()); ?>

              								<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($id); ?>"/>
              								<input type="hidden" class="form-control" name="room_id" value="<?php echo e($room->room_id); ?>"/>
              									<td><?php echo e($room->room_no); ?></td>
              									<td><?php echo e($room->room_type); ?></td>
              									<td><?php echo e($room->special_feature); ?></td>
              									<?php if($room->room_status == 1): ?>
              									<td>$<?php echo e($room->price); ?></td>
              									<?php endif; ?>
              									<?php if($room->room_status == 0): ?>
              									<td><input type="number" class="form-control" placeholder="PRICE" name="price" value="<?php echo e($room->price); ?>" required pattern="[0-9]" /></td>
              									<?php endif; ?>
              									<?php if($room->room_status == 0): ?>
              									<td><button type="submit" class="btn btn-success btn-circle btn-lg"><i class="glyphicon glyphicon-link"></i><?php echo app('translator')->get("msg.Available"); ?></button></td></tr>
              									<?php endif; ?>
              									<?php if($room->room_status == 1): ?>
              									<!--<td><a href="view_book_resident/<?php echo e($room->room_id); ?>" class="btn btn-danger btn-block btn-flat">Room Booked</a></td></tr>-->
              									<td><button type="button" class="btn btn-danger btn-circle btn-lg" id="<?php echo e($room->room_id); ?>" data-toggle="modal" data-target-id="<?php echo e($room->room_id); ?>"  data-target="#roomModal"><i class="glyphicon glyphicon-remove"></i></button></td></tr>
              									<?php endif; ?>
              							</form>
              						<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
              					<?php endif; ?>
              				</tr>
                        </tbody>
                    </table>
                </div>
				<div class="text-center"><?php echo e($rooms->links()); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roomModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myModalLabel"><b><?php echo app('translator')->get("msg.This Room Is Booked By"); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="adv_booking/<?php echo e($id); ?>"><?php echo app('translator')->get("msg.Advance Booking"); ?></b></h4>
			</div>
			<div class="modal-body">
			<h4 class="modal-title" id=""><b></b></h4>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>