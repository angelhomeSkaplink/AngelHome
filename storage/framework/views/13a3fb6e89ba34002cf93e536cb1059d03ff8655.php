<?php $__env->startSection('htmlheader_title'); ?>
    Prospective Add
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<?php $name = DB::table('sales_pipeline')->where('id', $id)->first(); ?>
  <p class="text-danger"><b>ADD resident details for <?php echo e($name->pros_name); ?></b></p>
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
      <li class="nav-item">
        <a class="nav-link" href="../significant_personal/<?php echo e($id); ?>">SIGNIFICANT PERSONAL</a>
      </li>
      <li class="nav-item active">
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
    <!--Gender :  Male Date Of Birth :  1980-02-05 Place Of Birth :  Guwahati Marital Status :  Single Religion :  Hindu-->
    <div class="tab-content" id="myTabContent">
      <div class="">
        <div class="col-md-2"></div>
						<div class="col-md-8">
						<div class="box-body">
							<form action="<?php echo e(action('ScreeningController@add_resident_details')); ?>" method="post">
								<input type="hidden" name="_method" value="PATCH">
								<?php echo e(csrf_field()); ?>

								<div class="col-md-6">
									<input type="hidden" class="form-control" placeholder="" name="pros_id" value="<?php echo e($id); ?>"/>
									<div class="form-group has-feedback">
										<label></label>
										<select name="height_resident" id="height_resident"  class="form-control" required >
											<option value="">Select Height(feet inc)</option>
											<option value="4.0">4.0</option>
											<option value="4.1">4.1</option>
											<option value="4.2">4.2</option>
											<option value="4.3">4.3</option>
											<option value="4.4">4.4</option>
											<option value="4.5">4.5</option>
											<option value="4.6">4.6</option>
											<option value="4.7">4.7</option>
											<option value="4.8">4.8</option>
											<option value="4.9">4.9</option>
											<option value="4.10">4.10</option>
											<option value="4.11">4.11</option>
											<option value="5.0">5.0</option>
											<option value="5.1">5.1</option>
											<option value="5.2">5.2</option>
											<option value="5.3">5.3</option>
											<option value="5.4">5.4</option>
											<option value="5.5">5.5</option>
											<option value="5.6">5.6</option>
											<option value="5.7">5.7</option>
											<option value="5.8">5.8</option>
											<option value="5.9">5.9</option>
											<option value="5.10">5.10</option>
											<option value="5.11">5.11</option>
											<option value="6.0">6.0</option>
											<option value="6.1">6.1</option>
											<option value="6.2">6.2</option>
											<option value="6.3">6.3</option>
											<option value="6.4">6.4</option>
											<option value="6.5">6.5</option>
											<option value="6.6">6.6</option>
											<option value="6.7">6.7</option>
											<option value="6.8">6.8</option>
											<option value="6.9">6.9</option>
											<option value="6.10">6.10</option>
											<option value="6.11">6.11</option>
											<option value="7.0">7.0</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="date" class="form-control" placeholder="Date Of Birth" name="dob" id="dob"/>
										<!--<script type="text/javascript"> $('#dob').datepicker({format: 'yyyy/mm/dd'});</script>-->
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="gender" id="gender" class="form-control" required >
											<option value="">Select Gender</option>
											<option value="Male">Male</option>
											<option value="Female">Female</option>
											<option value="Other">Other</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Religion" name="religion" pattern="[A-Za-z\s]+"/>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="medicare_resident" id="medicare_resident" class="form-control" required >
											<option value="">Select Medicare</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label> </label>
										<input type="text" class="form-control" placeholder="Social Security" name="social_security_resident" required />
									</div>
								</div>
								<div class="col-md-6">
								    <div class="form-group has-feedback">
										<label></label>
										<select name="weight_resident" id="weight_resident" class="form-control" required >
											<option value="">Select Weight(LB)</option>
											<?php for($i=60; $i<=300; $i++){?>
											<option value="<?php echo $i?>"><?php echo $i?></option>
											<?php }?>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Place of Birth" name="pob" pattern="[A-Za-z\s]+"/>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="marital" id="marital_status" class="form-control" required >
											<option value="">Marital Status</option>
											<option value="Single">Single</option>
											<option value="Married">Married</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<select name="va_resident" id="va_resident" class="form-control" required >
											<option value="">Select VA</option>
											<option value="Yes">Yes</option>
											<option value="No">No</option>
										</select>
									</div>
									<div class="form-group has-feedback">
										<label></label>
										<input type="text" class="form-control" placeholder="Other Insurance Name" name="other_insurance_name_resident" pattern="[A-Za-z\s]+" Title="Alphabate Character Only"/>
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
        <!-- <script type="text/javascript">
          $(".myselect").select2();
        </script> -->
      </div>
    </div>
  </div>
</div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>