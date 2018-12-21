


<?php $__env->startSection('htmlheader_title'); ?>
    <?php echo app('translator')->get("msg.Resident Add"); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
	<div class="form-group has-feedback pull-right" style="padding-right:15px;">
        <a href="<?php echo e(url('personal_details')); ?>" class="btn btn-primary btn-block btn-flat btn-width btn-custom"><?php echo app('translator')->get("msg.Go Back"); ?></a>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header{
		padding: 0px 0px 0px 20px;
		margin-bottom: -18px;
	}
	.content{
		margin-top: 15px;
	}
</style>
<?php if($reports_1 == NULL && $reports_2 == NULL): ?>
<div class="box box-primary border-light-blue" style="padding:10px;padding-left: 25px;font-size:20px;color:red;">
    <p class="text-danger"><b><?php echo app('translator')->get("msg.No Record Found"); ?></b></p>
</div>
<?php endif; ?>

<?php if($reports_1 != NULL && $reports_2 != NULL): ?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Personal Information"); ?></h4>
                <div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Gender"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->gender); ?> </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Date Of Birth"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->dob); ?> </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Place Of Birth"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->pob); ?> </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Age"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->age); ?> </span>
					</div>	

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Marital Status"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->ms); ?> </span>
					</div>	

                    <?php if($reports_1->ms == "Married"): ?>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Spouse name"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->spouse_name); ?></span>
					</div>	
                    <?php endif; ?>

					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Religion"); ?> : </label>
						<span class="font-14"> <?php echo e($reports_1->religion); ?> </span>
					</div>	

    				<div class="col-md-4" style="padding-left: 0; padding-right:0">
                        <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Comments"); ?> : </label>
                        <span class="font-14"> <?php echo e($reports_1->comment); ?> </span>
					</div>	
                    <div style="clear:both; margin-top:5px;"></div>
                </div>
				</div>
		</div>
	</div>

    <div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Insurance Information"); ?></h4>
                <div class="form-inline border-top" style="padding-top:10px">
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Social Security"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->ss); ?>  </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Medicare"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->medicare); ?> </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Supplemantal Insurance Name"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->supplemental_insurance_name); ?> </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Policy"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->policy); ?> </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Medicaid"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->medicaid); ?> </span>
					</div>
					<div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Responsible For Financial Matters"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->personal_responcible); ?></span>
					</div>
                    <?php if($reports_1->personal_responcible == "Others"): ?>
                    <div class="col-md-4" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Name"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->name); ?></span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Phone"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->phone); ?></span>
						</div>

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 1 : </label>
                        <span class="font-14"><?php echo e($reports_1->address_1); ?></span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

                        <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 2 : </label>
                        <span class="font-14"><?php echo e($reports_1->address_2); ?></span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.City"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->city); ?> </span>
						</div>

                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.State"); ?> : </label>
                        <?php if($reports_1->state_id == 1): ?>
						<span class="font-14">Assam</span>
                        <?php elseif($reports_1->state_id == 2): ?>
                        <span class="font-14">Megahlaya</span>
						</div>
                        <?php endif; ?>

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14">Zip : </label>
						<span class="font-14"><?php echo e($reports_1->zip); ?> </span>
					</div>	
						
                    <?php endif; ?>
                   <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Case Manager"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->case_manager); ?> </span>
					</div>	

                    <div class="col-md-4" style="padding-left: 0; padding-right:0">

						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Case Manager Phone"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->manager_phone); ?> </span>
						</div>

                    <div style="clear:both; margin-top:7px"></div>
                </div>
			</div>
		</div>
	</div>

    <div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Emergency Contact"); ?></h4>
                <div class="form-inline border-top" style="padding-top:10px">

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Name"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->name_1); ?> </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Relation"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->relation_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->address_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 2 : </label>
                    <span class="font-14"><?php echo e($reports_2->address_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.City"); ?> 1 : </label>
                    <span class="font-14"><?php echo e($reports_2->city_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Home Phone"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->home_phn_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Work Phone"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->work_phone_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Name"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_2->name_2); ?> </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Relation"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->relation_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->address_1_1); ?> </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Address"); ?> 2 : </label>
                    <span class="font-14"><?php echo e($reports_2->address_2_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.City"); ?> 2 : </label>
                    <span class="font-14"><?php echo e($reports_2->city_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Home Phone"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_2->home_phn_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Work Phone"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_2->work_phone_2); ?> </span>
				</div>	

               <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Power Of Attorney"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->poa); ?> </span>
				</div>	

				<div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA <?php echo app('translator')->get("msg.Relation"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->poa_relation); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14">POA <?php echo app('translator')->get("msg.Phone"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->poa_phone); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Guardian"); ?> : </label>
                    <span class="font-14"><?php echo e($reports_2->guardian); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
                    <label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Guardian Phone"); ?> : </label>
                    <span class="font-14"><?php echo e($reports_2->guardian_phone); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Guardian Address"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_2->guardian_address_1); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Guardian Address"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_2->guardian_address_2); ?> </span>
				</div>	

                <div class="col-md-4" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Guardian City"); ?> : </label>
					<span class="font-14"><?php echo e($reports_2->guardian_city); ?> </span>
				</div>	

                </div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Physician Details"); ?></h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Primary Physician"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->primary_physician); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Physician Phone"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->pry_phone); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Physician Address"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_1->pry_add_1); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Physician Address"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_1->pry_add_1); ?> </span>
					</div>
					

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Physician City"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->pry_city); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Specialist Physician"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->spc_physician); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Specialist Type"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->spc_type); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Specialist Phone"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->spc_phone); ?> </span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Dentist Details"); ?></h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Dentist Name"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->dentist_name); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Dentist Phone"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->dentist_phone); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Dentist Address"); ?> 1 : </label>
					<span class="font-14"><?php echo e($reports_1->dentist_address_1); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Dentist Address"); ?> 2 : </label>
					<span class="font-14"><?php echo e($reports_1->dentist_address); ?> </span>
					</div>

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Dentist City"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->dentist_city); ?> </span>
					</div>

					<div style="margin-top:10px"></div>
				</div>
			</div>
		</div>
	</div>

		<div class="col-md-12">
			<div class="box box-primary border-light-blue">
				<div class="box-body padding-top-5" style="padding-bottom:10px">
					<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Hospital & Pharmacy"); ?></h4>
					<div class="form-inline border-top" style="padding-top:10px">

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Hospital Name"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->hospital); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Hospital Phone"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->hospital_phone); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Pharmacy"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->pharmacy); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Pharmacy Phone"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->pharmacy_phone); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Allergies"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->allergies); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Diagnosis"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->diagnosis); ?> </span>
						</div>

						<div class="col-md-3" style="padding-left: 0; padding-right:0">
						<label class="text-capitalize font-500 font-14">CPR <?php echo app('translator')->get("msg.Status"); ?> : </label>
						<span class="font-14"><?php echo e($reports_1->cpr_status); ?> </span>
						</div>

						<div style="margin-top:10px"></div>
					</div>
				</div>
			</div>
		</div>
	<div class="col-md-12">
		<div class="box box-primary border-light-blue">
			<div class="box-body padding-top-5" style="padding-bottom:10px">
				<h4 class="font-500 text-uppercase font-15"><?php echo app('translator')->get("msg.Funeral Home"); ?></h4>
				<div class="form-inline border-top" style="padding-top:10px">

					<div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Funeral Home"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->funeral_home); ?> </span>
					</div>

				   <div class="col-md-3" style="padding-left: 0; padding-right:0">
					<label class="text-capitalize font-500 font-14"><?php echo app('translator')->get("msg.Phone"); ?> : </label>
					<span class="font-14"><?php echo e($reports_1->funeral_phone); ?> </span>
					</div>
					<div style="margin-top:10px"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>