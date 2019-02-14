<?php $__env->startSection('htmlheader_title'); ?>
    Screening
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Screening</strong></h3>
    </div>
    <div class="col-lg-4">
      <a href="<?php echo e(url('screening')); ?>" class="btn btn-success btn-sm pull-right" style="margin-right:15px;border-radius:5px;"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
  
	.content-header
	{
		//display:none;
		padding: 2px 0px 1px 20px;
		margin-bottom: -18px;
	}
		
	.content {
		margin-top: 15px;
	}
</style>
<style>
    div.scrollmenu {
      background-color: #333;
      overflow: auto;
      white-space: nowrap;
    }
    
    div.scrollmenu a {
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px;
      text-decoration: none;
    }
    div.scrollmenu a.active {
      background-color: #999;
	    color: #333;
    }
    
    div.scrollmenu a:hover {
      background-color: #777;
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
								<img src="<?php echo e(asset('/hsfiles/public/img/538642-user_512x512.png')); ?>" class="img-circle" width="40" height="40">
							<?php else: ?>
								<img src="<?php echo e(asset('/hsfiles/public/img/'.$person->service_image)); ?>" class="img-circle" width="40" height="40">
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
  <div id="topheader">
    <nav class="navbar navbar-default responsive">
      <div class="container-fluid">
          <div class="scrollmenu">
              <a class="nav-link active" id="resp_per" href="javascript:load_main_content('resposible_personal')">RESPONSIBLE PERSONNEL</a>
              <a class="nav-link" href="javascript:load_main_content('significant_personal')">SIGNIFICANT PERSONNEL</a>
              <a class="nav-link" href="javascript:load_main_content('resident_details')">RESIDENT DETAILS</a>
              <a class="nav-link" href="javascript:load_main_content('primary_doctor')">PHYSICIAN & DENTIST</a>
              <a class="nav-link" href="javascript:load_main_content('pharmacy')">HOSPITAL & PHARMACY</a>
              <a class="nav-link" href="javascript:load_main_content('medical_equipment')">MEDICAL EQUIPMENT</a>
              <a class="nav-link" href="javascript:load_main_content('legal_doc')">LEGAL DOCUMENT</a>
              <a class="nav-link" href="javascript:load_main_content('insurance')">INSURANCE</a>
              <a class="nav-link" href="javascript:load_main_content('funeral_home')">FUNERAL HOME</a>
          </div>
      </div>
    </nav>
  </div>
  <div class="row" id="main_content_div">
    <!--this part will change-->
  </div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
 $(document).ready(function(){
  $('#resp_per')[0].click();  
 });
var id = <?php echo $id; ?>;
$( '.scrollmenu' ).on( 'click', function (e) {
  console.log(event.target)
	$( '.scrollmenu' ).find( 'a.active' ).removeClass( 'active' );
  $( event.target ).addClass( 'active' );
});
function load_main_content(urls)
  {
    $('#main_content_div').load('/'+urls+'/'+id);
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>