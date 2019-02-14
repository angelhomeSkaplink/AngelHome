<?php $__env->startSection('htmlheader_title'); ?>
    All Screening
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4 text-center">
      <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>Screening View</strong></h3>
    </div>
    <div class="col-lg-4">
      <span class="pull-right" style="padding-right:30px;"><button class="btn btn-primary" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></span>
      <a class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<style>
	.content-header
	{
		/* display:none; */
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
                      <h3><strong>Screening Report</strong></h3>
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
    <!--resposible person-->
    <div class="row" style="padding-top:5px; ">
        <?php 
          $data = DB::table('responsible_person_details')->where([['pros_id',$id],['status',1]])->first();
         ?>
      <div class="col-md-12">
          <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Responsible Personal Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                <?php if($data): ?>
                <?php 
                $resp_name = explode(",",$data->responsible_person_responsible)
                 ?>
                <div class="table-responsive">
                  <table class="table" >
                      <tr style="border:none !important;">
                      <td>
                        <label class="text-capitalize font-500 font-14">Name : </label>
                        <span class="font-14"><?php echo e($resp_name[0]); ?> <?php echo e($resp_name[1]); ?> <?php echo e($resp_name[2]); ?> </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Address 1 : </label>
                        <span class="font-14"><?php echo e($data->address1_responsible); ?> </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Address 2 : </label>
                        <span class="font-14"><?php echo e($data->address2_responsible); ?> </span>
                      </td>
                      </tr>
                      <tr>
                      <td>
                        <label class="text-capitalize font-500 font-14">City : </label>
                        <span class="font-14"><?php echo e($data->city_responsible); ?> </span>
                      </td>

                      <td>
                        <label class="text-capitalize font-500 font-14">State : </label>
                        <span class="font-14"><?php echo e($data->state_responsible); ?> </span>
                      </td>
                      <td>
                        <label class="text-capitalize font-500 font-14">Zip Code : </label>
                        <span class="font-14"><?php echo e($data->zipcode_responsible); ?></span>
                      </td>
                      </tr>
                      <tr>
                      <td>
                        <label class="text-capitalize font-500 font-14">Phone : </label>
                        <span class="font-14"> <?php echo e($data->phone_responsible); ?> </span>
                      </td>
                      <td>
                          <label class="text-capitalize font-500 font-14">Email : </label>
                          <span class="font-14"> <?php echo e($data->email_responsible); ?> </span>
                      </td>
                      <td></td>
                      </tr>
                  </table>
                </div>
                <div style="clear:both; margin-top:5px;"></div>
                <?php else: ?>
                <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
                <?php endif; ?>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Significant person data -->
    <div class="row" style="padding-top:5px; ">
        <?php 
            $data = DB::table('significant_person_details')->where([['pros_id',$id],['status',1]])->first();
         ?>
    <div class="col-md-12">

        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Significant Personal Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                <?php if($data): ?>
                <?php 
                    $sign_name = explode(",",$data->other_significant_person_significant);
                 ?>
              <div class="table-responsive">
            <table class="table" >
            <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14"><?php echo e($sign_name[0]); ?> <?php echo e($sign_name[1]); ?> <?php echo e($sign_name[2]); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Address 1 : </label>
                <span class="font-14"><?php echo e($data->address1_significant); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Address 2 : </label>
                <span class="font-14"><?php echo e($data->address2_significant); ?> </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14"><?php echo e($data->city_significant); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">State : </label>
                <span class="font-14"><?php echo e($data->state_significant); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Zip Code : </label>
                <span class="font-14"><?php echo e($data->zipcode_significant); ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"> <?php echo e($data->phone_significant); ?> </span>
              </td>

              <td>
                  <label class="text-capitalize font-500 font-14">Email : </label>
                  <span class="font-14"> <?php echo e($data->email_significant); ?> </span>
              </td>
              <td></td>
            </tr>
          </table>
          </div>
          <div style="clear:both; margin-top:5px;"></div>
          <?php else: ?>
              <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
          <?php endif; ?>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Resident Details Data  -->

    <div class="row" style="padding-top:5px; ">
    <?php 
        $data = DB::table('resident_details')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Personal Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <?php if($data): ?>
          <div class="table-responsive">
              <table class="table" >
              <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Height : </label>
                <span class="font-14"><?php echo e($data->height_resident); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Weight : </label>
                <span class="font-14"><?php echo e($data->weight_resident); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Gender : </label>
                <span class="font-14"><?php echo e($data->gender); ?> </span>
              </td>
              </tr>
              <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Date Of Birth : </label>
                <span class="font-14"><?php echo e($data->dob); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Place Of Birth : </label>
                <span class="font-14"><?php echo e($data->pob); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Marital Status : </label>
                <span class="font-14"><?php echo e($data->marital); ?></span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Religion : </label>
                <span class="font-14"> <?php echo e($data->religion); ?> </span>
              </td>

              <td>
                  <label class="text-capitalize font-500 font-14">Social Security : </label>
                  <span class="font-14"> <?php echo e($data->social_security_resident); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Medicare : </label>
                <span class="font-14"> <?php echo e($data->medicare_resident); ?> </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">VA : </label>
                <span class="font-14"> <?php echo e($data->va_resident); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Other Insurance : </label>
                <span class="font-14"> <?php echo e($data->other_insurance_name_resident); ?> </span>
              </td>
              <td style="clear:both; margin-top:5px;"></td>
            </tr>
              </table>
            </div>
              <?php else: ?>
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
    </div>
   
  <!-- Physician and Doctor Details Data -->
  <div class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('primary_doctor_details')->where([['pros_id',$id],['status',1]])->first();
     ?>
<div class="col-md-12">
  <?php if($data): ?>
  <?php 
  $prime = explode(",",$data->primary_doctor_primary);
  $spec = explode(",",$data->specialist_doctor_primary);
  $dent = explode(",",$data->dentist);
   ?>
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
    <h4 class="font-500 text-uppercase font-15" >Primary Physician Information</h4>
    <div class="form-inline border-top" style="padding-top:10px">
      <div class="table-responsive">
        <table class="table" >
        <tr style="border:none !important;">
          <td >
            <label class="text-capitalize font-500 font-14">Primary Physician : </label>
            <span class="font-14"><?php echo e($prime[0]); ?> <?php echo e($prime[1]); ?> <?php echo e($prime[2]); ?></span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14"><?php echo e($data->address1_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14"><?php echo e($data->address2_primary); ?> </span>
          </td>
        </tr>
        <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14"><?php echo e($data->city_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14"><?php echo e($data->state_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14"><?php echo e($data->zipcode_primary); ?></span>
          </td>
        </tr>
        <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> <?php echo e($data->phone_primary_doctor); ?> </span>
          </td>

          <td>
              <label class="text-capitalize font-500 font-14">Email : </label>
              <span class="font-14"> <?php echo e($data->email_primary_doctor); ?> </span>
          </td>
          <td></td>
        </tr>
      </table>
      </div>
    </div>
  </div>
  </div>
    
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Special Physician Information</h4>
      <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table" >
          <tr style="border:none !important;"> 
          <td>
            <label class="text-capitalize font-500 font-14">Special Physician : </label>
            <span class="font-14"><?php echo e($spec[0]); ?> <?php echo e($spec[1]); ?> <?php echo e($spec[2]); ?></span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14"><?php echo e($data->specialist_address1_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14"><?php echo e($data->specialist_address2_primary); ?> </span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14"><?php echo e($data->specialist_city_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14"><?php echo e($data->specialist_state_primary); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14"><?php echo e($data->specialist_zipcode_primary); ?></span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> <?php echo e($data->specialist_phone_primary_doctor); ?> </span>
          </td>
          <td></td><td></td>
          </tr>
          </table>
          </div>
        </div>
    </div>
  </div>
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Denstist Information</h4>
      <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table" >
          <tr style="border:none !important;"> 
          <td>
            <label class="text-capitalize font-500 font-14">Dentist : </label>
            <span class="font-14"><?php echo e($dent[0]); ?> <?php echo e($dent[1]); ?> <?php echo e($dent[2]); ?></span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 1 : </label>
            <span class="font-14"><?php echo e($data->dentist_address1); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Address 2 : </label>
            <span class="font-14"><?php echo e($data->dentist_address2); ?> </span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">City : </label>
            <span class="font-14"><?php echo e($data->dentist_city); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">State : </label>
            <span class="font-14"><?php echo e($data->dentist_state); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">Zip Code : </label>
            <span class="font-14"><?php echo e($data->dentist_zip); ?></span>
          </td>
          </tr>
          <tr>
          <td>
            <label class="text-capitalize font-500 font-14">Phone : </label>
            <span class="font-14"> <?php echo e($data->dentist_phone); ?> </span>
          </td>
          <td></td><td></td>
          </tr>
          </table>
          </div>
        </div>
        </div>
      </div>
        <?php else: ?>
        <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Physician and Denstist Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
       </div>
        </div>
        </div>   
        <?php endif; ?>
    </div>
    </div>

    <!-- Hospital and Pharmacy Details  -->

<div class="row" style="padding-top:5px; ">
  <?php 
    $data = DB::table('pharmacy_details')->where([['pros_id',$id],['status',1]])->first();
   ?>
    <div class="col-md-12">
      <?php if($data): ?>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Hospital Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">
                  <td>
                    <label class="text-capitalize font-500 font-14">Hospital : </label>
                    <span class="font-14"><?php echo e($data->hospital); ?> </span>
                  </td>
                  <td>
                    <label class="text-capitalize font-500 font-14">Phone: </label>
                    <span class="font-14"><?php echo e($data->phone_hospital); ?> </span>
                  </td>
              </tr>
            </table>
            </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Pharmacy Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
              <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">
              <td>
                <label class="text-capitalize font-500 font-14">Pharmacy : </label>
                <span class="font-14"><?php echo e($data->pharmacy); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"><?php echo e($data->phone_pharmacy); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Special Medicine Need : </label>
                <span class="font-14"><?php echo e($data->special_med_needs_pharmacy); ?> </span>
              </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Mortuary Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
            <div class="table-responsive">
              <table class="table">
                <tr style="border:none !important;">
                  <td>
                    <label class="text-capitalize font-500 font-14">Mortuary : </label>
                    <span class="font-14"><?php echo e($data->mortuary); ?></span>
                  </td>
                  <td>
                    <label class="text-capitalize font-500 font-14">Phone : </label>
                    <span class="font-14"> <?php echo e($data->phone2_mortuary); ?> </span>
                  </td>
                  <td style="clear:both; margin-top:5px;"></td>
                </tr>
              </table>
              </div>
            </div>
          </div>
        </div>
        <?php else: ?>
        <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Hospital and Pharmacy Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- Medical Equipment Data  -->
    <div class="row" style="padding-top:5px; ">
    <?php 
    $data = DB::table('medical_equip_supp_resident_need')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
    <?php if($data): ?>
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <div class="table-responsive">
            <table class="table">
              <tr style="border:none !important;">
          <td>
            <label class="text-capitalize font-500 font-14">Inconsistancy Supplies/Type : </label>
            <span class="font-14"><?php echo e($data->inconsistency_supplies_type); ?> </span>
          </td>

          <td>
            <label class="text-capitalize font-500 font-14">PressureRelief Device Type : </label>
            <span class="font-14"><?php echo e($data->pressure_relief_dev_type); ?> </span>
          </td>
        </table>
          </div>
        </div>
      </div>
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Medical Equipments Need</h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <div class="table-responsive">
            <table class="table">
              <tr style="border:none !important;"> 
              <td>
                <label class="text-capitalize font-500 font-14">Bed Pan: </label>
                <span class="font-14">
                  <?php if($data->bed_pan_medical == "on"): ?>
                    <i class="material-icons">done</i>
                    <?php else: ?>
                    <i class="material-icons">highlight_off</i>
                  <?php endif; ?>
                </span>
              </td>
              <td>
                <label class="text-capitalize font-500 font-14">Protective Pads: </label>
                <span class="font-14">
                  <?php if($data->protective_pads_medical == "on"): ?>
                    <i class="material-icons">done</i>
                    <?php else: ?>
                    <i class="material-icons">highlight_off</i>
                  <?php endif; ?>
                </span>
              </td>
              <td>
                <label class="text-capitalize font-500 font-14">Comode: </label>
                <span class="font-14">
                  <?php if($data->comode_medical == "on"): ?>
                    <i class="material-icons">done</i>
                    <?php else: ?>
                    <i class="material-icons">highlight_off</i>
                  <?php endif; ?>
                </span>
              </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Urinal: </label>
                  <span class="font-14">
                    <?php if($data->urinal_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Crutches: </label>
                  <span class="font-14">
                    <?php if($data->crutches_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Walker: </label>
                  <span class="font-14">
                    <?php if($data->walker_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Wheel Chair: </label>
                  <span class="font-14">
                    <?php if($data->wheelchair_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Cane: </label>
                  <span class="font-14">
                    <?php if($data->cane_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Hospital Bed: </label>
                  <span class="font-14">
                    <?php if($data->hospital_beds_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="text-capitalize font-500 font-14">Trapeze: </label>
                  <span class="font-14">
                    <?php if($data->trapeze_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Oxygen: </label>
                  <span class="font-14">
                    <?php if($data->oxygen_medical == "on"): ?>
                      <i class="material-icons">done</i>
                      <?php else: ?>
                      <i class="material-icons">highlight_off</i>
                    <?php endif; ?>
                  </span>
                </td>
                <td>
                  <label class="text-capitalize font-500 font-14">Others: </label>
                  <span class="font-14">
                    <?php echo e($data->other_medical); ?>

                  </span>
                </td>
              </tr>
            </table>    
            </div>
          </div>
        </div>
        <div style="clear:both; margin-top:5px;"></div>
    </div>
        <?php else: ?>
        <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                  <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
              </div>
            </div>
          </div>
        <?php endif; ?>
        </div>
    </div>

        <!-- Legal Document Data  -->
    <div class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('legal_doc_upload')->where([['pros_id',$id],['status',1]])->get();
      $slno = 1;
     ?>
    <div class="col-md-12">
    <?php if(!$data->isEmpty()): ?>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Legal Document Information</h4>
              <div class="form-inline border-top" style="padding-top:10px">
                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>
                         <th>SL. No.</th>
                         <th>Document Name</th>
                         <th>Date Uploaded</th>
                         <th>Uploaded By</th>
                       </tr>
                     </thead>
                     <tbody>
                      <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                       <tr>
                         <td><?php echo e($slno); ?></td>
                         <td><?php echo e($d->doc_name); ?></td>
                         <td><?php echo e($d->upload_date); ?></td>
                         <td>
                           <?php 
                              $user = DB::table('users')->where([['user_id',$d->user_id],['facility_id',$d->facility_id]])->first();
                              $slno = $slno+1;
                            ?>
                           <?php echo e($user->firstname); ?> <?php echo e($user->middlename); ?> <?php echo e($user->lastname); ?>

                         </td>
                       </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                     </tbody>
                   </table>
                   </div>
              </div>
            </div>
        </div>
        <?php else: ?>
        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Legal Document Information</h4>
            <div class="form-inline border-top" style="padding-top:10px">
                <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
            </div>
          </div>
        </div>
        <?php endif; ?>
    </div>
    </div>
        <!-- Insurance Data  -->
    <div class="row" style="padding-top:5px; ">
        <?php 
            $data = DB::table('insurance')->where([['pros_id',$id],['status',1]])->first();
         ?>
    <div class="col-md-12">
        <?php if($data): ?>
        <?php 
            $pers_res = explode(",",$data->personal_responcible);
            $case = explode(",",$data->case_manager);
         ?>
            <div class="box box-primary border-light-blue">
              <div class="box-body padding-top-5" style="padding-bottom:10px">
                <h4 class="font-500 text-uppercase font-15" >Insurance Information</h4>
                <div class="form-inline border-top" style="padding-top:10px">
                <div class="table-responsive">
                <table class="table">
                  <tr style="border:none !important;">     
                  <td>
                    <label class="text-capitalize font-500 font-14">Social Security : </label>
                    <span class="font-14"><?php echo e($data->ss); ?> </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Medicare : </label>
                    <span class="font-14"><?php echo e($data->medicare); ?> </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Supplement Insurance Name  : </label>
                    <span class="font-14"><?php echo e($data->supplemental_insurance_name); ?> </span>
                  </td>
                  </tr>
                  <tr>
                  <td>
                    <label class="text-capitalize font-500 font-14">Policy : </label>
                    <span class="font-14"><?php echo e($data->policy); ?> </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Medicaid : </label>
                    <span class="font-14"><?php echo e($data->medicaid); ?> </span>
                  </td>

                  <td>
                    <label class="text-capitalize font-500 font-14">Responsible for Financial Matters : </label>
                    <span class="font-14"><?php echo e($pers_res[0]); ?> <?php echo e($pers_res[1]); ?> <?php echo e($pers_res[2]); ?></span>
                  </td>
                  </tr>
                  <tr>
                  <td>
                    <label class="text-capitalize font-500 font-14">Case Manager : </label>
                    <span class="font-14"> <?php echo e($case[0]); ?> <?php echo e($case[1]); ?> <?php echo e($case[2]); ?></span>
                  </td>

                  <td>
                      <label class="text-capitalize font-500 font-14">Case Manager Phone : </label>
                      <span class="font-14"> <?php echo e($data->manager_phone); ?> </span>
                  </td>
                  <td style="clear:both; margin-top:5px;"></td>
                  </tr>
                  </table>
                  </div>
              </div>
            </div>
            </div>
            <?php else: ?>
            <div class="box box-primary border-light-blue">
                <div class="box-body padding-top-5" style="padding-bottom:10px">
                  <h4 class="font-500 text-uppercase font-15" >Insurance Information</h4>
                  <div class="form-inline border-top" style="padding-top:10px">
                      <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
                  </div>
                </div>
              </div>
            <?php endif; ?>
        </div>
        </div>

        <!-- Funeral Home Data -->
   <div class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('funeral_home')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
    <?php if($data): ?>
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Funeral Home Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
        <div class="table-responsive">
          <table class="table">
            <tr style="border:none !important;"> 
              <td>
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14"><?php echo e($data->funeral_home); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">Phone : </label>
                <span class="font-14"><?php echo e($data->phone); ?> </span>
              </td>

              <td>
                <label class="text-capitalize font-500 font-14">City : </label>
                <span class="font-14"><?php echo e($data->city); ?> </span>
              </td>
            </tr>
            <tr>
              <td>
                <label class="text-capitalize font-500 font-14">Address : </label>
                <span class="font-14"><?php echo e($data->address); ?> </span>
              </td>
              <td style="clear:both; margin-top:5px;"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php else: ?>
  <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Funeral Home Information</h4>
        <div class="form-inline border-top" style="padding-top:10px">
            <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
</div>
        
        <div class="print-footer">
					<div class="row">
						<div class="col-lg-12 text-center">
							<table>
								<tr>
									<td style="width:90%;" class="text-center">
										<h4><b>Powered by Senior Safe Technology LLC.</b></h4>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
</div>
 </div>
<?php echo $__env->make('layouts.partials.scripts_auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>
	function printDiv(printableDiv) {

		var printContents = document.getElementById(printableDiv).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
		window.location.reload(true);
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>