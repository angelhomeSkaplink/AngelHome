<?php $__env->startSection('htmlheader_title'); ?>
    Notes
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 text-center">
    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>All Notes</strong></h3>
  </div>
  <div class="col-lg-4">
    <a href="#modal" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" data-toggle="modal" data-target="#addNewNote"><i class="material-icons">add_circle</i>Add New</a>
    <button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button>
    <a href="<?php echo e(url('all_res_notes')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<style>
  .content-header
  {
    padding: 2px 0px 1px 20px;
    margin-bottom: -18px;
  }
  .content {
    margin-top: 15px;
  }
</style>
<style  type = "text/css" media = "screen">
  .print-header{ display:none; }
  .print-footer{ display:none; }
  table tr td,th{
    border:none !important;
    padding: 0px!important;
  }
</style>
<style  type = "text/css" media = "print">
  .print-header{ display:block; }
  .print-footer{ display:block; }
  table tr td,th{
    border:none !important;
    padding: 0px!important;
  }
  @media  print {
  #accordion .collapse:not(.show) {
    display: unset;
  }
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
  <div class="panel-body" id="printableDiv">
  <div class="row">
      <div class="col-lg-12">
        <div class="print-header">
          <div class="row">
              <div class="col-lg-12 text-center">
                <table>
                  <tr style="border-bottom:5px solid #333">
                    <td>
                      <?php if($facility->facility_logo == NULL): ?>
                      <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/images.png"/>
                      <?php else: ?>
                      <img src="http://seniorsafetech.com/angel_home_s_admin/hsfiles/public/facility_logo/<?php echo e($facility->facility_logo); ?>" />
                      <?php endif; ?>
                    </td>
                    <td style="width:90%;" class="text-center">
                      <h3><strong>Notes</strong></h3>
                      <h4><strong>Facility :: <?php echo e($facility->facility_name); ?></strong></h4>
                      <p><strong><?php echo e($facility->address); ?> <?php echo e($facility->address_two); ?></strong></p>
                      <p><strong><i class="material-icons"> phone</i><?php echo e($facility->phone); ?>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">email</i>
                        <?php echo e($facility->facility_email); ?>

                      </strong></p>
                      <hr style="height:5px;border:none;color:#333;background-color:#333;">
                    </td>
                    <td style="width:5%;"></td>
                  </tr>
                </table>
              </div>
            </div>
          <div class="row">
            <div class="col-lg-12">
              <h4><strong>Resident:
                <?php if($person->service_image == NULL): ?>
                  <img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                <?php else: ?>
                  <img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
                <?php endif; ?>
                <?php echo e($name[0]); ?> <?php echo e($name[1]); ?> <?php echo e($name[2]); ?></strong></h4>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="row">
  <div class="" style="padding:10px;margin-top:-20px;">
    <div class="panel-group" id="accordion">
      <?php 
        $i=0;
       ?>
      <?php $__currentLoopData = $notes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php 
            $i=$i+1;
         ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($note->id); ?>">
                <strong><span style="color:#003d99;"><i class="material-icons">message</i> <?php echo e(date("D d-m-Y", strtotime($note->date))); ?> <span class="pull-right"> <i class="material-icons">access_time</i> <?php echo e(date('h:i A', strtotime($note->time))); ?></span></span></strong>
              </a>
            </h4>
          </div>
          <div id="<?php echo e($note->id); ?>" class="showAll panel-collapse collapse <?php echo e($i); ?>">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>NOTE</strong>
                        </div>
                        <div class="panel-body">
                            <?php $user_name = DB::table('users')->where('user_id',$note->recorder)->select('users.firstname','users.lastname')->first(); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                  <p> <strong> NOTE DATE:</strong> <?php echo e($note->date); ?> </p>
                                  <p> <strong> Record Collected By:</strong> <?php echo e($user_name->firstname); ?> <?php echo e($user_name->lastname); ?> </p>
                                  <p> <strong> Note:</strong> <?php echo e($note->notes); ?> </p>
                                </div>
                            </div>
                        </div>
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
  <!-- Modal for adding new note -->
  <div id="addNewNote" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-header" style="background-color:#333333;">
                <h4><button type="button" class="close" data-dismiss="modal"><span style="color:#fff;"> &times;</span></button>
                <span style="color:#fff;">Add New Note <i class="material-icons">message</i></span>
                </h4>

        </div>
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                       <form action="<?php echo e(action('WellnessController@storeNote')); ?>" method="post">
                        <input name="_method" type="hidden" value="POST">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" class="form-control" value="<?php echo e($id); ?>" name="res_id" required readonly />
                        <div class="form-group has-feedback">
                            <textarea rows="8" class="form-control" name="notes" placeholder="Add note here..." style="resize:none;" required/></textarea>
                        </div>
                        <div class="form-group has-feedback">
                            <button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
                        </div>
                        <div class="form-group has-feedback">
                            <button class="btn btn-default btn-block btn-flat btn-width btn-sm" data-dismiss="modal" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  <?php $__env->stopSection(); ?>


  <?php $__env->startSection('scripts-extra'); ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
  <script>
    $(document).ready(function(){
        $('.1').addClass('in');
    });
    function printDiv(printableDiv) {      
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
    $('.showAll').addClass('in');
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload();
	}
  </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>