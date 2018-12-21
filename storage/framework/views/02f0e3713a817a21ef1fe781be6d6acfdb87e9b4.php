<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD significant personal details for <?php echo e($name->pros_name); ?></b></p>
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
<script type="text/javascript">
    function ShowHideDiv() {
        var ms = document.getElementById("ms");
        var appointScedule = document.getElementById("appointScedule");
        appointScedule.style.display = ms.value == "Married" ? "block" : "none";
    }

	function ShowInsuranceDiv() {
        var personal_responcible = document.getElementById("personal_responcible");
        var financial_matter = document.getElementById("financial_matter");
        financial_matter.style.display = personal_responcible.value == "Others" ? "block" : "none";
		financial_matter1.style.display = personal_responcible.value == "Others" ? "block" : "none";
    }
</script>
<div class="box box-primary padding-bottom-25">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-left:-14px; margin-right:-14px; margin-top:1px">
       <li class="nav-item">
        <a class="nav-link" href="../resposible_personal/<?php echo e($id); ?>">RESPOSIBLE PERSONAL</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../significant_personal/<?php echo e($id); ?>">SIGNIFICANT PERSONAL</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../resident_details/<?php echo e($id); ?>">RESIDENT DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../primary_doctor/<?php echo e($id); ?>">PHYSICIAN & DENTIST</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pharmacy/<?php echo e($id); ?>">HOSPITAL & PHARMACY</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../medical_equipment/<?php echo e($id); ?>">MEDICAL EQUIPMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../legal_doc/<?php echo e($id); ?>">LEGAL DOCUMENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../insurance/<?php echo e($id); ?>">INSURANCE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../funeral_home/<?php echo e($id); ?>">FUNERAL HOME</a>
      </li>
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../mental_status/<?php echo e($id); ?>">MENTAL STATUS</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../bathing/<?php echo e($id); ?>">BATHING</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../dressing/<?php echo e($id); ?>">DRESSING</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../toileting/<?php echo e($id); ?>">TOILETING</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../ambulation_transfer/<?php echo e($id); ?>">AMBULATION/TRANSFER</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../personal_grooming_hygiene/<?php echo e($id); ?>">PERSONAL GROOMING/HYGIENE</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../feeding_nutrition/<?php echo e($id); ?>">FEEDING/NUTRITION</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../communication_abilities/<?php echo e($id); ?>">COMMUNICATION ABILITIES</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../night_need/<?php echo e($id); ?>">NIGHT NEED</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../emergency_exiting/<?php echo e($id); ?>">EMERGENCY EXITING</a>-->
      <!--</li>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link" href="../overall/<?php echo e($id); ?>">OVERALL LEVEL OF FUNCTIONING</a>-->
      <!--</li>-->
    </ul>
    <div style="margin-top:35px"></div>
    <div class="tab-content" id="myTabContent">
      <!-- <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"> -->
      <div class="">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<div class="box-body">
							<form action="<?php echo e(action('ScreeningController@add_significant_person')); ?>" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_method" value="PATCH">
								<?php echo e(csrf_field()); ?>

								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="<?php echo e($id); ?>"/>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Name" name="other_significant_person_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Adderss 1" name="address1_significant"/>
									</div>

									<div class="form-group has-feedback">
										<select name="state_significant" id="state_id" class="form-control" required >
											<option value="">Select State</option>
											<?php
												$states = DB::table('state')->get();
												foreach ($states as $state)
												{
													?>
														<option value="<?php echo e($state->state_name); ?>"><?php echo e($state->state_name); ?></option>
													<?php
												}
											?>
										</select>
									</div>
									<div class="form-group has-feedback">
										<input type="email" class="form-control" placeholder="Email" name="email_significant"/>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Phone No" name="phone_significant" />
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="Address 2" name="address2_significant"/>
									</div>
									<div class="form-group has-feedback">
										<input type="text" class="form-control" placeholder="City" name="city_significant" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
									</div>
									<div class="form-group has-feedback">
										<input type="number" class="form-control" placeholder="Zip" name="zipcode_significant" />
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-block btn-success btn-flat btn-width btn-sm"><?php echo app('translator')->get("msg.Submit"); ?></button>
									</div>
									<div class="form-group has-feedback">
										<button type="submit" class="btn btn-primary btn-danger btn-block btn-flat btn-width btn-sm" onclick="history.back()" style="margin-right:15px"><?php echo app('translator')->get("msg.Cancel"); ?></button>
									</div>
										</br></br><br/>
								</div>
							</form>
						</div>
					</div>
				</div>
    </div>
  </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>