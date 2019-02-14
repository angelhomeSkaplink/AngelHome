<?php $__env->startSection('htmlheader_title'); ?>
    Vital Statistics
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Vital Statistics</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="../all_res_checkup" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<?php if(count($errors)): ?>
<div class="form-group">
    <div class="alert alert-danger">
      <ul>
          <li><b>At least one field is required</b></li>
      </ul>
    </div>
</div>
<?php endif; ?>
<?php 
$person = DB::table('sales_pipeline')->where('id',$name->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
		->join('facility_room','resident_room.room_id','=','facility_room.room_id')
		->where([['resident_room.pros_id',$name->id],['resident_room.status',1]])->first();
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
	$person = DB::table('sales_pipeline')->where('id',$name->id)->first();
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
<div class="card">
    <div class="card-body px-lg-5 pt-0">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="height:500px; padding-top:0">
                    <form action="<?php echo e(action('DoctorController@storeCheckup')); ?>" method="post">
                        <input name="_method" type="hidden" value="POST">
                        <?php echo csrf_field(); ?>

                        <div class="form-group has-feedback">
                            <input type="hidden" class="form-control" value="<?php echo e($id); ?>" name="res_id" required readonly />
                        </div>					
                        <div class="form-group has-feedback">
                            <label>Weight</label>
                            <input type="text" class="form-control" name="weight"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Sugar</label>
                            <input type="text" class="form-control" name="sugar"/>
                        </div>
                        <div class="form-group has-feedback">
                        <label>Blood Pressure</label>
                            <input type="text" class="form-control" name="pressure"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>Temperature</label>
                            <input type="text" class="form-control" name="temperature"/>
                        </div>
                        <div class="form-group has-feedback">
                            <label>O2 Stats</label>
                            <input type="text" class="form-control" name="o2_stat"/>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm">Save</button>
                        </div>
                        <div class="form-group has-feedback">
                            <a href="<?php echo e(url('all_res_checkup')); ?>" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right:15px">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body" style="overflow-y: scroll; height:500px; padding-top:0">
                    <h4><strong>Previous Records</strong></h4>
                    <?php 
                        if($checkups->isEmpty()){
                            echo "No previous Record!";
                        }
                     ?>
                    <?php $__currentLoopData = $checkups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $check): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <?php 
                        $user_name = DB::table('users')->where('user_id',$check->recorder)->select('users.firstname','users.lastname')->first();
                        $array = [];
                        if (!$check->weight=="") {
                            array_push($array,"wt");
                        }
                        if (!$check->sugar=="") {
                            array_push($array,"bs");
                        }
                        if (!$check->pressure=="") {
                            array_push($array,"bp");
                        }
                        if (!$check->temperature=="") {
                            array_push($array,"tp");
                        }
                        if (!$check->o2_stat=="") {
                            array_push($array,"o2");
                        }
                        $array = implode(", ",$array);
                     ?>
                    <div class="panel-heading">
                    <li><a href="#modal" data-toggle="modal" data-target="#modalRegister<?php echo e($check->id); ?>"> <?php echo e($check->date); ?> </a>  <?php echo e($check->time); ?> <br/><strong>By:</strong> <?php echo e($user_name->firstname); ?> <?php echo e($user_name->lastname); ?> <br/><strong>Paramemter: </strong><?php echo e($array); ?></li>
                    </div>
                    <div id="modalRegister<?php echo e($check->id); ?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title" style="text-align-last: center"><strong>Date: </strong><?php echo e($check->date); ?></h4>
                                        <h6 class="modal-title" style="text-align-last: center"><strong>Record Collected By:</strong> <?php echo e($user_name->firstname); ?> <?php echo e($user_name->lastname); ?></h6>
                                    </div>
                                    <div class="modal-body">
                                        <div class="panel-body">
                                            <div class="row">
                                                  <p> <strong> Weight:</strong> <?php echo e($check->weight); ?> </p>
                                                  <p> <strong> Blood Sugar:</strong> <?php echo e($check->sugar); ?> </p>
                                                  <p> <strong> Blood Pressure:</strong> <?php echo e($check->pressure); ?> </p>
                                                  <p> <strong> Temperature:</strong> <?php echo e($check->temperature); ?> </p>
                                                  <p> <strong> O2 Stats:</strong> <?php echo e($check->o2_stat); ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>