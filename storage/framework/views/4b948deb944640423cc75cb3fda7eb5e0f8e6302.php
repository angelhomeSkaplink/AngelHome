<?php $__env->startSection('htmlheader_title'); ?>
    Resident Payment
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
	<div class="col-lg-4 col-lg-offset-4 text-center">
		<h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Resident Payment</strong></h3>
	</div>
	<div class="col-lg-4">
	<a href="<?php echo e(url('resident_payment')); ?>" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		padding: 2px 0px 1px 20px;
		margin-bottom: -10px;
	}
		
	.content {
		margin-top: 15px;
	}
	.form-control{
		text-transform: uppercase;
	}
</style>
<script>
function ShowCheque() {
    var payment_method = document.getElementById("payment_method");
    var cheque_no = document.getElementById("cheque_no");
    cheque_no.style.display = payment_method.value == "Cheque" ? "block" : "none";
}
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".row").on("contextmenu",function(){
             //alert('right click disabled');
           return false;
        }); 
    });
</script>
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
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div class="box box-primary border-light-blue">			
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">resident payment</h4>
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
					<?php if($reports == NULL): ?>
						<h4 class="font-500 text-uppercase font-15">No record found</h4>
					<?php endif; ?>
					<?php if($reports != NULL): ?>
						<!--<form action="make_payment_res" method="post" enctype="multipart/form-data">-->
						<form action="<?php echo e(action('PaymentController@make_payment_res')); ?>" method="post">					
							<input type="hidden" name="_method" value="PATCH">
							<?php echo csrf_field(); ?>

							<div class="table-responsive">
    							<table class="table">
    								<tbody>
    									<tr>
    										<td>
    											<div class="form-group has-feedback">
    												<label>Month</label>
    												<select name="month" class="form-control" required >
    													<option value="">Select Month</option>
    													<option value="January">January</option>
    													<option value="February">February</option>
    													<option value="March">March</option>
    													<option value="April">April</option>
    													<option value="May">May</option>
    													<option value="June">June</option>
    													<option value="July">July</option>
    													<option value="August">August</option>
    													<option value="September">September</option>
    													<option value="October">October</option>
    													<option value="November">November</option>
    													<option value="December">December</option>
    												</select>
    											</div>
    										</td>
    										<td>
    											<div class="form-group has-feedback">
    												<label>Year</label>
    												<select name="year" class="form-control"required >
    													<option value="">Select Year</option>
    													<option value="2018">2018</option>
    													<option value="2019">2019</option>
    													<option value="2020">2020</option>
    													<option value="2021">2021</option>
    													<option value="2022">2022</option>
    													<option value="2023">2023</option>
    													<option value="2024">2024</option>
    													<option value="2025">2025</option>
    												</select>
    											</div>
    										</td>
    									</tr>
    									<input type="hidden" class="form-control" name="pros_id" value="<?php echo e($check_id->id); ?>" readonly />
    										
    									<tr>
    										<td><label>Room Rent</label></td>
    										<input type="hidden" class="form-control" name="" value="<?php echo e($reports->price); ?>" readonly />
    										<td><?php echo e($reports->price); ?></td>
    									</tr>
    									<tr>
    										<td><label>Service Plan Price</label></td>
    										<input type="hidden" class="form-control" name="" value="<?php echo e($service_plan_price->price); ?>" readonly />
    										<td><?php echo e($service_plan_price->price); ?></td>
    									</tr>
    									<tr>
    										<td><label>Outstanding</label></td>
    										<?php if($check_payment == NULL): ?>
    										<input type="hidden" class="form-control" name="due_ammount" value="0" readonly />
    										<td>0</td>
    										<?php endif; ?>
    										<?php if($check_payment != NULL): ?>
    										<input type="hidden" class="form-control" name="due_ammount" value="<?php echo e($check_payment->due_ammount); ?>" readonly />
    										<td><?php echo e($check_payment->due_ammount); ?></td>
    										<?php endif; ?>							
    									</tr>
    									<tr>
    										<td><label>Total Payable amount</label></td>
    										<input type="hidden" class="form-control" name="ammount_pay" value="<?php echo e($total_payable_ammount); ?>" readonly />
    										<td><?php echo e($total_payable_ammount); ?></td>
    									</tr>
    									<tr>
    										<td><label>Amount To Be Paid</label></td>
    										<td><input type="number" class="form-control" name="ammount_paid" /></td>
    									</tr>
    									<?php if(! Auth::guest()): ?>
    									<tr>
    										<td><label>Method of payment</label></td>
    										<td>
    											<div class="form-group has-feedback">
    												<select name="payment_method" id="payment_method" class="form-control" onchange = "ShowCheque()" required >
    													<option value="">Choose an option</option>
    													<option value="Cash">Cash</option>
    													<option value="Cheque">Cheque</option>
    												</select>
    											</div>
    										</td>
    									</tr>
    									<tr id="cheque_no" style="display: none">
    										<td><label>Cheque No</label></td>
    										<td><input type="text" class="form-control" name="cheque_no" /></td>
    									</tr>
    									<?php endif; ?>
    									<input type="hidden" class="form-control" name="facility_id" value="<?php echo e($check_id->facility_id); ?>" />
    								</tbody>
    							</table>
							</div>
							<div>
								<div class="form-group has-feedback">
									<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm" id="submit-button" style="margin-right: 5px;"><?php echo app('translator')->get("msg.Submit"); ?></button>
								</div>

								<div class="form-group has-feedback">
									<a href="../resident_payment" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" style="margin-right: 15px;"><?php echo app('translator')->get("msg.Cancel"); ?></a>
								</div>
							</div><br/><br/><br/>
						</form>
					<?php endif; ?>
                <!--</div>-->
			</div>
		</div>
	</div>
	<!--<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			
			<div class="box-body padding-top-5">
				<h4 class="font-500 text-uppercase font-15">Service plan details</h4>
				<!--<div class="box-body border padding-top-0 padding-left-right-0">-->
                    <!--<table class="table">
                        <tbody>							
							<tr>
								<td><label>Service Plan score</label></td>
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<td><label>Note</label></td>
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
							<tr>
								<td><label>Resident service plan</label></td>
								
								
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>								
							</tr>
							<tr>
								<td><label>Price</label></td>
								
								<td></td>	
								<td></td><td></td><td></td><td></td><td></td><td></td>
							</tr>
                        </tbody>
                    </table>					
                <!--</div>-->
			<!--</div>
		</div>
		
	</div>-->
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>