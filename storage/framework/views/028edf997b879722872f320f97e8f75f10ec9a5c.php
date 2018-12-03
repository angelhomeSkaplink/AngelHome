<!-- Nilutpal Boruah Jr. -->



<?php $__env->startSection('htmlheader_title'); ?>
List of Patients
<?php $__env->stopSection(); ?>
<?php $__env->startSection('contentheader_title'); ?>
<div class="row" style="padding:0px;margin:0px;">
    <div class="col-lg-12 text-center">
        <h3 style="padding:0px;margin:0px;"><strong>Medication Administration Record (MAR)</strong></h3>
    </div>
</div>
<div class="row" style="margin-top:20px;">
	<div class="col-lg-4">
		<h3 style="margin:0px;padding:0px;"><?php if($name->service_image == NULL): ?>
		<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
		<img src="../hsfiles/public/img/<?php echo e($name->service_image); ?>" class="img-circle" width="40" height="40">
	<?php endif; ?><b><span class="text-danger"><?php echo e($name->pros_name); ?> </span></b></h3>
	</div>
	
	<div class="col-lg-4 text-center">
		<form action="<?php echo e(action('ReportController@mar_monthly_report')); ?>" method="post">
			<input name="_method" type="hidden" value="POST">
			<?php echo csrf_field(); ?>

			<input type="hidden" name="user_id" value="<?php echo e($name->id); ?>">
			<div class="row">
			    
				<div class="col-lg-8 col-lg-offset-2">
					<div class="row">
						<div class="col-lg-4" style="padding-right:0px;">
							<select type="text" name="mar_month" id="mar_month" class="form-control" placeholder="">
								<option value=""></option>
								<option value="01">Jan</option>
								<option value="02">Feb</option>
								<option value="03">Mar</option>
								<option value="04">Apr</option>
								<option value="05">May</option>
								<option value="06">Jun</option>
								<option value="07">Jul</option>
								<option value="08">Aug</option>
								<option value="09">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
						</div>
						<div class="col-lg-4" style="padding-left:0px;padding-right:0px;">
							<select type="text" name="mar_year" id="mar_year" class="form-control" placeholder="">
							    <option value=""></option>
							    <?php  
							    for($i=2018;$i<=2050;$i++){
							     ?>
								<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
								<?php 
								}
								 ?>
							</select>
						</div>
						<div class="col-lg-4" style="padding-left:0px;">
							<button class="btn btn-default form-control" type="submit" name="submit"><i class="material-icons md-36" style="color:#000;"> search </i></a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
	<div class="col-lg-4" style="padding-right:30px;">
		<button class="btn btn-info pull-right" id="printButton" type="submit" onclick="printDiv('printableDiv')">Print<i class="material-icons md-22" aria-hidden="true"> description </i></button>
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.tableContainer{
	  padding: 20px;
	}
	.content-header
	{
	  /* display:none; */
	  padding: 2px 0px 1px 20px;
	  margin-bottom: -18px;
	}
	.content {
	  margin-top: 15px;
	}
	.placeholder {
	  color: red;
	  opacity: 1; /* Firefox */
	}
</style>
<style  type = "text/css" media = "screen">
	.print-header{
		display:none;
	}
	.print-footer{
		display:none;
	}
</style>
<style  type = "text/css" media = "print">
	.print-header{
		display:block;
	}
	.print-footer{
		display:block;
	}
</style>
<div class="tableContainer" style="background-color:#fff;">
	<div>
		<!-- Bootstrap core CSS -->
		<!-- TOP BAR -->
		<div class="row" style="overflow-x:auto;">
			<div class="box box-primary border" id="printableDiv">
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
										<h3><strong>Medication Administration Record (MAR)</strong></h3>
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
							<h4><strong>Resient Name: <?php echo e($name->pros_name); ?></strong></h4>
						</div>
					</div>
				</div>
				<div>
					<!--Table-->
					<table class="table table-bordered table-responsive">
						<thead>
							<tr>
								<th style="vertical-align : middle;text-align:center;" rowspan="3" class="th-position text-uppercase font-500 font-12">#</th>
								<th style="vertical-align : middle;text-align:center;" rowspan="3"class="th-position text-uppercase font-500 font-12">Drugs/Strenth/Form/Dose</th>
								<th style="vertical-align : middle;text-align:center;" rowspan="3" class="th-position text-uppercase font-500 font-12">Time to Take</th>
								<th colspan="31" class="align-middle th-position text-uppercase font-500 font-12">Month & Year: <?php echo e($month); ?>, <?php echo e($year); ?></th>
							</tr>
							<tr>
								<?php
									$eachDate =  new Carbon\Carbon($start_month);
								?>
								<?php for($i=1;$i<=$days;$i++): ?>
								<?php
									$eachDateString = $eachDate->toDateString();
									$eachDay = $eachDate->format('D');
								?>
								<th><?php echo e($eachDay); ?></th>
								<?php
									$eachDate =  new Carbon\Carbon($eachDateString);
									$eachDate = $eachDate->addDays(1);
								?>
								<?php endfor; ?>
							</tr>
							<tr>
								<?php for($i=1;$i<=$days;$i++): ?>
								<th><?php echo e($i); ?></th>
								<?php endfor; ?>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $result; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
						   <?php $time_to_take_med_12=date('h:i A', strtotime($r->time_to_take_med)); ?>
							<tr>
								<td></td>
								<td><strong>Doctor: </strong><?php echo e($r->doctor_name); ?></br>
								<strong>Medicine: </strong><?php echo e($r->medicine_name); ?></br>
								<strong>Quantity: </strong> <?php echo e($r->quantity_of_med); ?></br>
								<strong>Administer Via:</strong> <?php echo e($r->apply_on); ?></br>
								<strong>Allergy: </strong><?php echo e($r->allergy); ?></br>
								<strong>Diet: </strong> <?php echo e($r->diet); ?></br>
								<strong>Instruction:</strong> <?php echo e($r->other_instructions); ?></br>
								</td>
								<td><?php echo e($time_to_take_med_12); ?></td>
								<?php
									for ($i=1;$i<=$days;$i++) {
									$flag =-1;
									foreach($query as $q) {
										$date=$q->mar_date;
										$date = explode('-',$date);
										$day_no = $date[2];
										if ($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 0) {
											$flag=0;
											break;
										}elseif ($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 1) {
											$earlyMarTime = strtotime($q->time_to_take_med) - 60*60;
											$lateMarTime = strtotime($q->time_to_take_med) + 60*60;
											$action_time = strtotime($q->action_performed_on);
											if ($action_time>$earlyMarTime && $action_time<$lateMarTime) {
												$flag=1;
												break;
											}
											else {
												$flag=2;
												break;
										   }
										}elseif($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 2){
											$flag=3;
											break;
										}elseif($i==$day_no && $r->time_to_take_med == $q->time_to_take_med && $q->status == 3){
											$flag=4;
											break;
										}else{
											$flag=-1;
										}
										if($q->user_id != 0 ){
											$user_query = DB::table('users')->where('user_id',$q->user_id)->select('firstname','lastname')->first();
											$firstname=$user_query->firstname;
											$lastname=$user_query->lastname;
										}
									}
									if($flag==0){
										echo'<td style="padding:5px;text-align:center;color:gray;"><i class="material-icons md-36" style="margin-top:40%;"> schedule</i></td>';
									}elseif($flag==1){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover"data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:green;"><i class="material-icons md-36" style="margin-top:40%;"> offline_pin</i></span></a></td>';
									}
									elseif($flag==2){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover"data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:orange;"><i class="material-icons md-36" style="margin-top:40%;">  check_circle_outline </i></span></a></td>';
									}
									elseif($flag==3){
										echo'<td style="padding:5px;text-align:center;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Medicine not given.'.$q->reason_title.'. '.$q->reason_desc.' Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><span style="color:black;"><i class="material-icons md-36" style="margin-top:40%;"> cancel</i></span></a></td>';
									}elseif($flag==4){
										echo'<td style="padding:5px;text-align:center;color:blue;"><a href="#" data-toggle="popover" data-placement="top" data-trigger="focus" title="'.$firstname.' '.$lastname.'" data-content="Refused ! Mail sent to doctor. Action Time: '.date('h:i A', strtotime($q->action_performed_on)).'"><i class="material-icons md-36" style="margin-top:40%;"> email</i></a></td>';
									}else{
										echo'<td></td>';
									}
								}
								?>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
						</tbody>
					</table>
				<!--Table-->
			
				</div>
				<div>
				    <p><strong>Note: </strong><i class="material-icons md-36"> schedule</i> To be administered <strong>::</strong> <i class="material-icons md-36"> offline_pin</i>  Given in due time <strong>::</strong> <i class="material-icons md-36">  check_circle_outline </i>  Given either early or late <strong>::</strong> <i class="material-icons md-36"> cancel</i> Not given <strong>::</strong> <i class="material-icons md-36"> email</i> Refused-Mail sent to Doctor</p>
				    
				</div>
				<div class="print-footer">
					<div class="row">
						<div class="col-lg-12 text-center">
							<table>
								<tr>
									<td style="width:90%;" class="text-center">
										<h4><strong>Powered by Senior Safe Technology LCC.</strong></h4>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom JavaScript for this theme -->
<!-- <script src="js/scrolling-nav.js"></script> -->
<script type="text/javascript">
  function getdate(){
    var date = new Date();
    document.getElementById("today").innerHTML=date;
  }
</script>

<script>
	$(document).ready(function(){
		$('[data-toggle="popover"]').popover({ container: 'body' });
	});
</script>
<script>
	function printDiv(printableDiv) {
		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var mar_month = "<?php echo($month); ?>";
		var month = monthMaping(mar_month);
		var year = "<?php echo($year); ?>";
		$("#mar_month").val(month);
		$("#mar_year").val(year);
	});
	function monthMaping(m){
		var v ="";
		switch(m){
			case "January":v="01";break;
			case "February":v="02";break;
			case "March":v="03";break;
			case "April":v="04";break;
			case "May":v="05";break;
			case "June":v="06";break;
			case "July":v="07";break;
			case "August":v="08";break;
			case "September":v="09";break;
			case "October":v="10";break;
			case "November":v="11";break;
			case "December":v="12";break;
		}
		return v;
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>