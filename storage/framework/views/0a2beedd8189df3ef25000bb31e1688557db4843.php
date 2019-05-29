<?php $__env->startSection('htmlheader_title'); ?>
    Edit Resident Details
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 offset-lg-4 text-center">
      <h3><strong>Edit Resident Details</strong></h3>
    </div>
    <div class="col-lg-4">
    <a href="<?php echo e(url('screening_view/'.$id)); ?>" class="btn btn-success btn-sm pull-right padding-7"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
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
	.print-footer{ 
    display:block;
    border-top: 5px solid #000;
   }
  table tr td,th{
    border:none !important;
    padding: 0px!important;
  }
</style>
<?php 
$person = DB::table('sales_pipeline')->where('id',$id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
$room = DB::table('resident_room')
    ->where([['pros_id', $id],['release_date',null]])
    ->first();
    if($room == null){
      $room = DB::table('resident_room')
    ->where([['pros_id', $id],['release_date','>',date('Y-m-d')]])
    ->orderby('release_date','dsc')
    ->first();
        }
if($room){
  $room_no = DB::table('facility_room')->where('room_id',$room->room_id)->first();
	$room_no = $room_no->room_no;
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
$n =  explode(",",$person->pros_name);
 ?>
<div class="row" >
    <div class="col-lg-12 table-responsive">
        <table class="table">
        <tr style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
            <td>
                <h4><?php if($person->service_image == null): ?>
                    <img src="<?php echo e(asset('hsfiles/public/img/538642-user_512x512.png')); ?>" class="img-circle" width="40" height="40">
                <?php else: ?>
                    <img src="<?php echo e(asset('hsfiles/public/img/'.$person->service_image)); ?>" class="img-circle" width="40" height="40">
                <?php endif; ?>
                <span class="text-success" style="color:aliceblue;"><strong><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></strong>
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
<?php if($scr == "responsible_personnel"): ?>
    <?php echo $__env->make('screening.resposible_personal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "significant_personnel"): ?>
    <?php echo $__env->make('screening.significant_personal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "resident_details"): ?>
    <?php echo $__env->make('screening.resident_details', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "physician"): ?>
    <?php echo $__env->make('screening.primary_doctor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "pharmacy"): ?>
    <?php echo $__env->make('screening.pharmacy', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "medical_equipment"): ?>
    <?php echo $__env->make('screening.medical_equipment', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "legal_document"): ?>
    <?php echo $__env->make('screening.legal_doc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "insurance"): ?>
    <?php echo $__env->make('screening.insurance', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php elseif($scr == "funeral_home"): ?>
    <?php echo $__env->make('screening.funeral_home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>