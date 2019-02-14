<?php $__env->startSection('htmlheader_title'); ?>
    Task Sheet
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Task Sheet</strong></h3>
	</div>
	<div class="col-lg-4">
	<a href="<?php echo e(url('tasksheet')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
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
<script type="text/javascript" language="javascript" src="<?php echo e(asset('/js/tasksheet.js')); ?>"></script>
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
        <div class="box box-primary border">			
            <div class="box-body border padding-top-0 padding-left-right-0">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
    						<tr>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Title"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Frequency"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Person Required"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Start Time"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.End Time"); ?></th>							
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Start Date"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.End Date"); ?></th>
    							<th class="th-position text-uppercase font-500 font-12"><?php echo app('translator')->get("msg.Special Equipment"); ?></th>
    						</tr>
    						<form action="<?php echo e(action('AttendeeController@store_tasklist')); ?>" method="post">	
    							<input type="hidden" name="_method" value="PATCH">
    							<?php echo e(csrf_field()); ?>

    							<input type="hidden" class="form-control" placeholder="" name="pros_id" value="<?php echo e($id); ?>" required />
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="eating" name="eating[]" value="NO">-->
    									<input type="checkbox" id="eating" name="title[]" value="EATING"  onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Eating"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time" class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date" autocomplete="off" required disabled />
    									<script type="text/javascript"> $('#s_date').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment" class="form-control" style="width:100%; height: 34px;" disabled>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="continence" name="continence[]" value="NO">-->
    									<input type="checkbox" id="continence" name="title[]" value="CONTINENCE" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Continence"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency1" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required1" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time1"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time1"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date1" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date1" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date1').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment1" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="transferring" name="transferring[]" value="NO">-->
    									<input type="checkbox" id="transferring" name="title[]" value="TRANSFER" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Transfer"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency2" class="form-control" required disabled >
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required2" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time2"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time2"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date2" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date2" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date2').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment2" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="ambulation" name="ambulation[]" value="NO">-->
    									<input type="checkbox" id="ambulation" name="title[]" value="AMBULATION" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Ambulation"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency3" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required3" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time3"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time3"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date3" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date3" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date3').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment3" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="dressing" name="dressing[]" value="NO">-->
    									<input type="checkbox" id="dressing" name="title[]" value="DRESSING" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Dressing"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency4" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required4" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time4"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time4"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date4" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date4" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date4').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment4" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="bathing" name="bathing" value="NO">-->
    									<input type="checkbox" id="bathing" name="title[]" value="BATHING" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Bathing"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency5" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required5" name="person_required[]" disabled required >
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time5"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time5"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date5" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date5" autocomplete="off" disabled/>
    									<script type="text/javascript"> $('#e_date5').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment5" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>							
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="med_management" name="med_management" value="NO">-->
    									<input type="checkbox" id="med_management" name="title[]" value="MED.-MANAGEMENT" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Med. Management"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency6" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required6" name="person_required[]" disabled required >
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time6"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time6"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date6" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date6" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date6').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment6" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled >
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								<input class="form-control" type="hidden" id="" name="count_row[]" value="1">
    								<td>
    									<label style="padding-right:10px;">
    									<!--<input type="hidden" id="communication" name="communication" value="NO">-->
    									<input type="checkbox" id="communication" name="title[]" value="COMMUNICATION" onclick = "ChangeSdate()">
    									<span class="label-text"><?php echo app('translator')->get("msg.Communication"); ?></span>
    								</td>
    								<td>
    									<select name="frequency[]" id="frequency7" class="form-control" disabled required>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Frequency"); ?></label></option>
    										<option value="Daily"><label><?php echo app('translator')->get("msg.Daily"); ?></label></option>
    										<option value="Alt.Days"><label><?php echo app('translator')->get("msg.Alt. Days"); ?></label></option>
    										<option value="Weekly"><label><?php echo app('translator')->get("msg.Weekly"); ?></label></option>
    										<option value="Monthly"><label><?php echo app('translator')->get("msg.Monthly"); ?></label></option>
    									</select>
    								</td>
    								<td>
    									<input class="form-control" type="text" id="person_required7" name="person_required[]" disabled required>
    								</td>
    								<td class='input-group date' id='datetimepicker3'>
    									<input type="text" name="s_time[]" id="s_time7"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" name="e_time[]" id="e_time7"  class="form-control timepicker" disabled />
    								</td>
    								<td>
    									<input type="text" class="form-control" name="s_date[]" id="s_date7" autocomplete="off" disabled required />
    									<script type="text/javascript"> $('#s_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<input type="text" class="form-control" name="e_date[]" id="e_date7" autocomplete="off" disabled />
    									<script type="text/javascript"> $('#e_date7').datepicker({format: 'yyyy-mm-dd'});</script> 
    								</td>
    								<td>
    									<select name="special_equipment[]" id="special_equipment7" class="form-control" style="width:100%; height: 34px;" onchange="calculateEndTime();" disabled>
    										<option value=""><label><?php echo app('translator')->get("msg.Select Equipment"); ?></label></option>
    										<option value="Standard/straight cane"><label><?php echo app('translator')->get("msg.Standard/Straight Cane"); ?></label></option>
    										<option value="Offset cane"><label><?php echo app('translator')->get("msg.Offset Cane"); ?></label></option>
    										<option value="Quadripod (four-legged) cane"><label><?php echo app('translator')->get("msg.Quadripod (Four-Legged) Cane"); ?></label></option>
    										<option value="Axillary crutches"><label><?php echo app('translator')->get("msg.Axillary Crutches"); ?></label></option>
    										<option value="Forearm (Lofstrand) crutches"><label><?php echo app('translator')->get("msg.Forearm (Lofstrand) Crutches"); ?></label></option>
    										<option value="Platform crutches"><label><?php echo app('translator')->get("msg.Platform Crutches"); ?></label></option>
    										<option value="Standard walker"><label><?php echo app('translator')->get("msg.Standard Walker"); ?></label></option>
    										<option value="Front-wheeled (two-wheeled) walker"><label><?php echo app('translator')->get("msg.Front-Wheeled (Two-Wheeled) Walker"); ?></label></option>
    										<option value="Four-wheeled walker (rollator)"><label><?php echo app('translator')->get("msg.Four-Wheeled Walker (Rollator)"); ?></label></option>
    										<option value="Standard- Legs on or off when resident is in it."><label><?php echo app('translator')->get("msg.Standard- Legs On Or Off When Resident Is In It."); ?></label></option>
    										<option value="Tilt and Space"><label><?php echo app('translator')->get("msg.Tilt and Space"); ?></label></option>
    										<option value="Geri Chair"><label><?php echo app('translator')->get("msg.Geri Chair"); ?></label></option>
    										<option value="Electric Wheelchair"><label><?php echo app('translator')->get("msg.Electric Wheelchair"); ?></label></option>
    										<option value="prior to implanting"><label><?php echo app('translator')->get("msg.Prior To Implanting"); ?></label></option>
    										<option value="Transfer pole 1 or 2 person"><label><?php echo app('translator')->get("msg.Transfer Pole 1 Or 2 Person"); ?></label></option>
    										<option value="Adaptive Dining"><label><?php echo app('translator')->get("msg.Adaptive Dining"); ?></label></option>
    										<option value="Adaptive Plate"><label><?php echo app('translator')->get("msg.Adaptive Plate"); ?></label></option>
    										<option value="Adaptive Silverware"><label><?php echo app('translator')->get("msg.Adaptive Silverware"); ?></label></option>
    										<option value="Oxygen Tank or concentrator "><label><?php echo app('translator')->get("msg.Oxygen Tank Or Concentrator"); ?> </label></option>
    										<option value="Oxygen C-Pap Machine "><label><?php echo app('translator')->get("msg.Oxygen C-Pap Machine"); ?> </label></option>
    										<option value="Tab Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Tab Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Pad Alarm Bed or wheelchair or stationary chair"><label><?php echo app('translator')->get("msg.Pad Alarm Bed Or Wheelchair Or Stationary Chair"); ?></label></option>
    										<option value="Motion Sensor"><label><?php echo app('translator')->get("msg.Motion Sensor"); ?></label></option>
    										<option value="Direction:Right side weakness"><label><?php echo app('translator')->get("msg.Right Side Weakness"); ?></label></option>
    										<option value="Direction:Left side weakness"><label><?php echo app('translator')->get("msg.Left Side Weakness"); ?></label></option>
    										<option value="Direction:No use of Left Side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Left Side"); ?></label></option>
    										<option value="Direction:No use of right side"><label><?php echo app('translator')->get("msg.Direction:No Use Of Right Side"); ?></label></option>
    										<option value="Amputee:Left or Right Leg or both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Leg Or Both"); ?> </label></option>
    										<option value="Amputee:Left or Right Arm or Both "><label><?php echo app('translator')->get("msg.Amputee:Left Or Right Arm Or Both"); ?> </label></option>
    									</select>
    								</td>
    							</tr>
    							<tr>
    								
    								<td></td><td></td><td></td><td></td><td></td><td></td>
    								<td>
    									<a href="<?php echo e(url('tasksheet')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
    								</td>
    								<td>
    									<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
    								</td>
    							</tr>
    						</form>
                        </tbody>
                    </table>
				</div>
            </div>                
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts-extra'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>