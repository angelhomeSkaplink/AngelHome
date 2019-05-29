<?php $__env->startSection('htmlheader_title'); ?>
    All Screening
<?php $__env->stopSection(); ?>

<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
    <div class="col-md-4 offset-md-4 text-center">
      <h3><strong>Resident Details</strong></h3>
    </div>
    <div class="col-md-4">
      <div class="col-md-6">
          <span class="pull-right"><button class="btn btn-primary btn-sm" onclick="printDiv('printableDiv')" id="printButton"><i class="material-icons md-22"> print </i> Print</button></span>
      </div>
      <div class="col-md-6">
          <a class="btn btn-success btn-sm pull-right" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
      </div>
    </div>
</div>
<div class="row padding-7">
    <div class="col-md-2 offset-md-10 text-center">
      <select class="form-control" name="quicklink" id="quicklink" onchange="load_url()">
        <option value="#" selected>Quick Links</option>
        <option value="<?php echo e(url('assessment_period/resident/'.$id)); ?>">Assessment History</option>
        <option value="<?php echo e(url('select_period/resident/'.$id)); ?>">Assessment</option>
        <option value="<?php echo e(url('service_plan_period/'.$id)); ?>">Service Plan</option>
        <option value="<?php echo e(url('all_tsp/'.$id)); ?>">Temporary Service Plan</option>
        <option value="<?php echo e(url('change_own_room/'.$id)); ?>">Room Book</option>
        <option value="<?php echo e(url('injury_history/'.$id)); ?>">Incident</option>
        <option value="<?php echo e(url('medication_incident_resident_report/'.$id)); ?>">Medication Incident</option>
        <option value="<?php echo e(url('checkup/'.$id)); ?>">Vital Statistics</option>
        <option value="<?php echo e(url('take_note/'.$id)); ?>">Notes</option>
        <option value="<?php echo e(url('set_task/'.$id)); ?>">Set Tasksheet</option>
      </select>
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
  .edit_btn {
    display: block;
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
  .edit_btn {
    display: none !important;
    visibility: hidden !important;
  }
</style>
<style>
  html{
      scroll-behavior: smooth;
  }
  div.h-scroll{
      background-color: #75a4b7;
      overflow: auto;
      white-space: nowrap;
  }
  div.h-scroll a{
      display: inline-block;
      color: white;
      text-align: center;
      padding: 14px;
      text-decoration: none;
  }
  div.h-scroll a:hover{
      background: #999;
  }
</style>
<?php 
$person = DB::table('sales_pipeline')->where('id',$name->id)
    ->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
    ->first();
  $room = DB::table('resident_room')
    ->where([['pros_id', $name->id],['release_date',null]])
    ->first();
    if($room == null){
      $room = DB::table('resident_room')
    ->where([['pros_id', $name->id],['release_date','>',date('Y-m-d')]])
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
	$person = DB::table('sales_pipeline')->where('id',$name->id)->first();
	$age = "Not specified";
}
$n =  explode(",",$person->pros_name);
 ?>
<div class="row" >
    <div class="col-lg-12 table-responsive">
      <table class="table">
        <tr class="border" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
          <td>
              <h4><?php if($person->service_image == null): ?>
                  <img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
                <?php else: ?>
                  <img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
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
<div class="h-scroll text-center" style="">
    <a href="#panel1">Personal Details</a>
    <a href="#panel2">Responsible Person</a>
    <a href="#panel3">Significant Person</a>
    <a href="#panel4">Physician</a>
    <a href="#panel5">Hospital & Pharmacy</a>
    <a href="#panel6">Medical Equipment</a>
    <a href="#panel7">Legal Document</a>
    <a href="#panel8">Insurance</a>
    <a href="#panel9">Funeral Home</a>
</div>
<div class="panel-body border" id="printableDiv">
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
                  <?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?></strong></h4>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Resident Details Data  -->

    <div id="panel1" class="row" style="padding-top:5px; ">
    <?php 
        $data = DB::table('resident_details')->where([['pros_id',$id],['status',1]])->first();
        if($data->social_security_resident != ""){
          $soc_sec= decrypt($data->social_security_resident);
        }else{
          $soc_sec = "";
        }
        $moveIn = DB::table('sales_pipeline')->where('id',$id)->first();
     ?>
    <div class="col-md-12">
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Personal Information
          <span class="edit_btn pull-right">
            <a href="<?php echo e(url('edit_details/resident_details/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
              <i class="material-icons">create</i>
            </a>
          </span>
        </h4>
        <div class="form-inline border-top" style="padding-top:10px">
          <?php if($data): ?>
          <div class="table-responsive">
              <table class="table" >
              <tr style="border:none !important;">
                  <td>
                <label class="text-capitalize font-500 font-14">Name : </label>
                <span class="font-14"><?php echo e($n[0]); ?> <?php echo e($n[1]); ?> <?php echo e($n[2]); ?> </span>
              </td>
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
                  <span class="font-14"> <?php echo e($soc_sec); ?> </span>
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
              <td>
                <label class="text-capitalize font-500 font-14">Move In Date : </label>
                <span class="font-14"> <?php echo e($moveIn->movein_date); ?> </span>
              </td>
              <td>
                <label class="text-capitalize font-500 font-14">Move Out Date : </label>
                <span class="font-14"> <?php echo e($moveIn->moveout_date); ?> </span>
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
    <!--resposible person-->
    <div id="panel2" class="row" style="padding-top:5px; ">
        <?php 
          $data = DB::table('responsible_person_details')->where([['pros_id',$id],['status',1]])->first();
         ?>
      <div class="col-md-12">
          <div class="box box-primary border-light-blue">
            <div class="box-body padding-top-5" style="padding-bottom:10px">
              <h4 class="font-500 text-uppercase font-15" >Responsible Personnel Information 
                <span id="edit_btn" class="pull-right">
                <a href="<?php echo e(url('edit_details/responsible_personnel/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
                    <i class="material-icons">create</i>
                  </a>
                </span>
              </h4>
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
    <div id="panel3" class="row" style="padding-top:5px; ">
        <?php 
            $data = DB::table('significant_person_details')->where([['pros_id',$id],['status',1]])->first();
         ?>
    <div class="col-md-12">

        <div class="box box-primary border-light-blue">
          <div class="box-body padding-top-5" style="padding-bottom:10px">
            <h4 class="font-500 text-uppercase font-15" >Significant Personnel Information
              <span class="edit_btn pull-right">
                <a href="<?php echo e(url('edit_details/significant_personnel/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
                  <i class="material-icons">create</i>
                </a>
              </span>
            </h4>
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

    
   
  <!-- Physician and Doctor Details Data -->
  <div id="panel4" class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('primary_doctor_details')->where([['pros_id',$id],['status',1]])->first();
     ?>
<div class="col-md-12">
  <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Primary Physician Information
        <span class="edit_btn pull-right">
          <a href="<?php echo e(url('edit_details/physician/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
            <i class="material-icons">create</i>
          </a>
        </span>
      </h4>
    <div class="form-inline border-top" style="padding-top:10px">
  <?php if($data): ?>
  <?php 
  $prime = explode(",",$data->primary_doctor_primary);
  $spec = explode(",",$data->specialist_doctor_primary);
  $dent = explode(",",$data->dentist);
   ?>
  <div class="box box-primary border-light-blue">
    <div class="box-body padding-top-5" style="padding-bottom:10px">
      <h4 class="font-500 text-uppercase font-15" >Primary Physician</h4>
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
          <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        
        <?php endif; ?>
      </div>
    </div>
    </div>  
    </div>
    </div>

    <!-- Hospital and Pharmacy Details  -->

<div id="panel5" class="row" style="padding-top:5px; ">
  <?php 
    $data = DB::table('pharmacy_details')->where([['pros_id',$id],['status',1]])->first();
   ?>
    <div class="col-md-12">
      <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
          <h4 class="font-500 text-uppercase font-15" >Hospital And Pharmacy Information
            <span class="edit_btn pull-right">
              <a href="<?php echo e(url('edit_details/pharmacy/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
                <i class="material-icons">create</i>
              </a>
            </span>
          </h4>
        <div class="form-inline border-top" style="padding-top:10px">
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
          <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
</div>
    <!-- Medical Equipment Data  -->
    <div id="panel6" class="row" style="padding-top:5px; ">
    <?php 
    $data = DB::table('medical_equip_supp_resident_need')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
      <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
          <h4 class="font-500 text-uppercase font-15" >Medical Equipment Information
            <span class="edit_btn pull-right">
              <a href="<?php echo e(url('edit_details/medical_equipment/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
                <i class="material-icons">create</i>
              </a>
            </span>
          </h4>
          <div class="form-inline border-top" style="padding-top:10px">
    <?php if($data): ?>
    <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Medical Equipments Details</h4>
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
        <?php else: ?>
            <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
</div>

        <!-- Legal Document Data  -->
    <div id="panel7" class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('legal_doc_upload')->where([['pros_id',$id],['status',1]])->get();
      $slno = 1;
     ?>
    <div class="col-md-12">
      <div class="box box-primary border-light-blue">
        <div class="box-body padding-top-5" style="padding-bottom:10px">
          <h4 class="font-500 text-uppercase font-15" >Legal Document Information
            <span class="edit_btn pull-right">
              <a href="<?php echo e(url('edit_details/legal_document/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
                <i class="material-icons">create</i>
              </a>
            </span>
          </h4>
          <div class="form-inline border-top" style="padding-top:10px">
    <?php if(!$data->isEmpty()): ?>
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
        <?php else: ?>
            <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
  </div>
</div>
        <!-- Insurance Data  -->
    <div id="panel8" class="row" style="padding-top:5px; ">
        <?php 
            $data = DB::table('insurance')->where([['pros_id',$id],['status',1]])->first();
         ?>
    <div class="col-md-12">
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Insurance Information
          <span class="edit_btn pull-right">
            <a href="<?php echo e(url('edit_details/insurance/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
              <i class="material-icons">create</i>
            </a>
          </span>
        </h4>
        <div class="form-inline border-top" style="padding-top:10px">
        <?php if($data): ?>
        <?php 
            $pers_res = explode(",",$data->personal_responcible);
            $case = explode(",",$data->case_manager);
         ?>
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
            <?php else: ?>
                <h4 class="text-center"><b><span style="color:#b3b3b3;">NO RECORD FOUND</span></b></h4>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

        <!-- Funeral Home Data -->
   <div id="panel9" class="row" style="padding-top:5px; ">
    <?php 
      $data = DB::table('funeral_home')->where([['pros_id',$id],['status',1]])->first();
     ?>
    <div class="col-md-12">
    <?php if($data): ?>
    <div class="box box-primary border-light-blue">
      <div class="box-body padding-top-5" style="padding-bottom:10px">
        <h4 class="font-500 text-uppercase font-15" >Funeral Home Information
          <span class="edit_btn pull-right">
            <a href="<?php echo e(url('edit_details/funeral_home/'.$name->id)); ?>" class="btn btn-primary btn-sm">Edit
              <i class="material-icons">create</i>
            </a>
          </span>
        </h4>
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
<?php echo $__env->make('quick_link.quicklink', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>