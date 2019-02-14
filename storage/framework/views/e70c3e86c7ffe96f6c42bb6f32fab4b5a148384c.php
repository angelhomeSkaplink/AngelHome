

<?php $__env->startSection('htmlheader_title'); ?>
TSP
<?php $__env->stopSection(); ?>


<?php $__env->startSection('contentheader_title'); ?>
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 text-center">
    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>TSP HISTORY</strong></h3>
  </div>
  <div class="col-lg-4">
    <a href="../temporary_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
<?php 
$person = DB::table('sales_pipeline')->where('id',$residents->id)
			->join('resident_details','sales_pipeline.id','=','resident_details.pros_id')
			->first();
if($person){
	$age = (date('Y') - date('Y',strtotime($person->dob)))." years";
}
else{
	$person = DB::table('sales_pipeline')->where('id',$residents->id)->first();
	$age = "Not specified";
}
$name =  explode(",",$person->pros_name);
 ?>
<div class="row" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
	<div class="col-lg-12">
		<h4><?php if($person->service_image == null): ?>
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		<?php else: ?>
			<img src="../hsfiles/public/img/<?php echo e($person->service_image); ?>" class="img-circle" width="40" height="40">
		<?php endif; ?>
		<span class="text-success" style="color:aliceblue;"><strong><?php echo e($name[0]); ?> <?php echo e($name[1]); ?> <?php echo e($name[2]); ?></strong>
		<span class="pull-right" style="color:aliceblue;padding-top:10px;"><strong>Age: <?php echo e($age); ?> </strong></span>
		</h4>
	</div>
</div>
  <div class="" style="padding:0.5px;margin-top:10px;">
    <div class="panel-group" id="accordion">
      <?php $__currentLoopData = $tsps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tsp): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo e($tsp->tsp_id); ?>">
              <h4><strong><span style="color:#fff;"><?php echo e($tsp->tsp_date); ?></span></strong></h4>
              </a>
            </h4>
          </div>
          <div id="<?php echo e($tsp->tsp_id); ?>" class="panel-collapse collapse">
            <div class="panel-body">
              <?php if($tsp->fall == 1): ?>
                <div class="row">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>Fall TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query1 = DB::table('fall_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  <p> <strong> FALL DATE:</strong> <?php echo e($query1->fall_date); ?> </p>
                                  <p> <strong> FALL TIME:</strong> <?php echo e($query1->fall_time); ?> </p>
                                  <p> <strong> INJURIES:</strong> <?php echo e($query1->injuries); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  <p> <strong> PAIN:</strong> <?php echo e($query1->pain); ?> </p>
                                  <p> <strong> ANY FURTHER INJURIES IDENTIFIED:</strong> <?php echo e($query1->further_injury); ?> </p>
                                  <p> <strong> OVERALL RESIDENT ABILITY TO TRANSFER:</strong> <?php echo e($query1->ability_to_transfer); ?> </p>
                                  <p> <strong> RESIDENT MENTAL STATUS:</strong> <?php echo e($query1->mental_status); ?> </p>
                                  <p> <strong> TEMPERATURE:</strong> <?php echo e($query1->temperature); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query1->pulse); ?> </p>
                                  <p> <strong> BLOOD PRESSURE:</strong> <?php echo e($query1->bp); ?> </p>
                                  <p> <strong> COMPLETE REPORT:</strong> <?php echo e($query1->complete_report); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->decline ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>DECLINE IN APPETITE OR ACTIVITIES OF DAILY LIVING</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query2 = DB::table('decline_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> STATE SPECIFIC SYMPTOMS:</strong> <?php echo e($query2->specific_symptoms); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> SPECIFIC ONGOING SYMPTOMS:</strong> <?php echo e($query2->ongoing_symptoms); ?> </p>
                                  <p> <strong> ASSISTANCE PROVIDED TO RESIDENT:</strong> <?php echo e($query2->assistance_provided); ?> </p>
                                  <p> <strong> IF APPETITE ISSUES - INTAKE:</strong> <?php echo e($query2->appetite_issue); ?> </p>
                                  <p> <strong> TEMPERATURE:</strong> <?php echo e($query2->temperature); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query1->pulse); ?> </p>
                                  <p> <strong> BLOOD PRESSURE:</strong> <?php echo e($query1->bp); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->increase_pain ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>INCREASE IN PAIN TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query3 = DB::table('increase_pain__tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> STATE PAIN LOCATION:</strong> <?php echo e($query3->pain_location); ?> </p>
                                  <p> <strong> SYMPTOMS:</strong> <?php echo e($query3->symptoms); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN TYPE, LOCATION, AND OTHER CHARACTERISTICS:</strong> <?php echo e($query3->pain_type_loc); ?> </p>
                                  <p> <strong> IF LIMB PAIN, COLOR, BRUISING, SWELLING AND OTHER SYMPTOMS:</strong> <?php echo e($query3->swelling_bruising); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query3->pulse); ?> </p>
                                  <p> <strong> B/P:</strong> <?php echo e($query3->bp); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->new_medication ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>NEW MEDICATION TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query4 = DB::table('new_medication_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> NEW MEDICATION ORDER:</strong> <?php echo e($query4->medication_order); ?> </p>
                                  <p> <strong> PRECAUTIONS:</strong> <?php echo e($query4->precautions); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> ANY SIGNS AND SYMPTOMS OF ADVERSE REACTIONS:</strong> <?php echo e($query4->symptoms); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT:</strong> <?php echo e($query4->complaints); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>


                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->skin_problem ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>SKIN PROBLEM TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query5 = DB::table('skin_problem_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> AREA LOCATION:</strong> <?php echo e($query5->location); ?> </p>
                                  <p> <strong> TYPE:</strong> <?php echo e($query5->type); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> <?php echo e($query5->pain); ?> </p>
                                  <p> <strong> PROGRESS TOWARD HEALING:</strong> <?php echo e($query5->healing); ?> </p>
                                  <p> <strong> COLOR, ODOR & AMOUNT OF DRAINAGE IF ANY:</strong> <?php echo e($query5->drainage); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT:</strong> <?php echo e($query5->complaints); ?> </p>
                                  <p> <strong> COMPLETE REPORT:</strong> <?php echo e($query5->report); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->respiratory_problem ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>RESPIRATORY PROBLEM TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query6 = DB::table('respiratory_problem_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> RESPIRATORY PROBLEM CHARACTERIZED BY:</strong> <?php echo e($query6->problem_char); ?> </p>
                                  <p> <strong> PRECAUTIONS:</strong> <?php echo e($query6->precautions); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> CHEST OR OTHER PAIN:</strong> <?php echo e($query6->pain); ?> </p>
                                  <p> <strong> ONGOING SYMPTOMS SUCH AS COUGH, SHORTNESS OF BREATH, CONGESTION:</strong> <?php echo e($query6->symptoms); ?> </p>
                                  <p> <strong> APPETITE:</strong> <?php echo e($query6->appetite); ?> </p>
                                  <p> <strong> COLOR & AMOUNT SPUTUM IF PRESENT:</strong> <?php echo e($query6->amount_sputum); ?> </p>
                                  <p> <strong> TEMPERATURE:</strong> <?php echo e($query6->temperature); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query6->pulse); ?> </p>
                                  <p> <strong> B/P:</strong> <?php echo e($query6->bp); ?> </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> <?php echo e($query6->adverse_symptoms); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> <?php echo e($query6->complaints); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->cast_splint ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>CAST OR SPLINT TSP</strong>
                        </div>
                        <div class="panel-body">
                              <?php $query7 = DB::table('cast_splint_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> CAST:</strong> <?php echo e($query7->cast); ?> </p>
                                  <p> <strong> SPLINT:</strong> <?php echo e($query7->splint); ?> </p>
                                  <p> <strong> INJURIES:</strong> <?php echo e($query7->injuries); ?> </p>
                                  <p> <strong> LOCATION:</strong> <?php echo e($query7->location); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> <?php echo e($query7->pain); ?> </p>
                                  <p> <strong> ANY INJURIES OR SKIN ISSUES IDENTIFIED:</strong> <?php echo e($query7->skin_issues); ?> </p>
                                  <p> <strong> OVERALL RESIDENT ABILITY TO TRANSFER:</strong> <?php echo e($query7->transfer_ability); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->eye_problem ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>EYE PROBLEM TSP</strong>
                        </div>
                        <div class="panel-body">
                              <?php $query8 = DB::table('eye_problem_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> EYE PROBLEM CHARACTERIZED BY:</strong> <?php echo e($query8->eye_problem); ?> </p>
                                  <p> <strong> PRECAUTIONS:</strong> <?php echo e($query8->precautions); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> <?php echo e($query8->pain); ?> </p>
                                  <p> <strong> ONGOING SYMPTOMS:</strong> <?php echo e($query8->symptoms); ?> </p>
                                  <p> <strong> ANY SAFETY ISSUES RELATED TO VISION AFFECTED BY EYE PROBLEM:</strong> <?php echo e($query8->safety_issue); ?> </p>
                                  <p> <strong> COLOR & AMOUNT DRAINAGE IF PRESENT:</strong> <?php echo e($query8->amt_drainage); ?> </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> <?php echo e($query8->adverse_symptoms); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> <?php echo e($query8->complaints); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->gastrointestinal ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>GASTROINTESTINAL PROBLEM TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query9 = DB::table('gastrointestinal_problem_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> GASTROINTESTINAL PROBLEM CHARACTERIZED BY:</strong> <?php echo e($query9->gastro_problem); ?> </p>
                                  <p> <strong> PRECAUTIONS:</strong> <?php echo e($query9->precautions); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> <?php echo e($query9->pain); ?> </p>
                                  <p> <strong> ONGOING SYMPTOMS:</strong> <?php echo e($query9->symptoms); ?> </p>
                                  <p> <strong> APPETITE:</strong> <?php echo e($query9->appetite); ?> </p>
                                  <p> <strong> WEIGHT IF OBTAINED:</strong> <?php echo e($query9->weight); ?> </p>
                                  <p> <strong> COLOR & AMOUNT OF VOMITING, DIARRHEA IF ANY:</strong> <?php echo e($query9->amt_drainage); ?> </p>
                                  <p> <strong> TEMPERATURE:</strong> <?php echo e($query9->temperature); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query9->pulse); ?> </p>
                                  <p> <strong> RESPIRATIONS:</strong> <?php echo e($query9->respirations); ?> </p>
                                  <p> <strong> B/P:</strong> <?php echo e($query9->bp); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> <?php echo e($query9->complaints); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
              <?php if($tsp->urinary ==1): ?>
                <div class="row" style="padding-top:10px;">
                    <div class="col-lg-12">

                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong>URINARY TRACT INFECTION TSP</strong>
                        </div>
                        <div class="panel-body">
                            <?php $query10 = DB::table('urinary_tsp')->where('tsp_id', $tsp->tsp_id)->first(); ?>
                            <div class="row">
                                <div class="col-lg-6">
                                  PROBLEM/NEED:
                                  <p> <strong> URINARY TRACT INFECTION CHARACTERIZED BY:</strong> <?php echo e($query10->problem); ?> </p>
                                  <p> <strong> PRECAUTIONS:</strong> <?php echo e($query10->precautions); ?> </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> <?php echo e($query10->pain); ?> </p>
                                  <p> <strong> ONGOING SYMPTOMS SUCH AS BURNING, URINE COLOR, ODOR AND AMOUNT:</strong> <?php echo e($query10->symptoms); ?> </p>
                                  <p> <strong> APPETITE:</strong> <?php echo e($query10->appetite); ?> </p>
                                  <p> <strong> TEMPERATURE:</strong> <?php echo e($query10->temperature); ?> </p>
                                  <p> <strong> PULSE:</strong> <?php echo e($query10->pulse); ?> </p>
                                  <p> <strong> RESPIRATIONS:</strong> <?php echo e($query10->respirations); ?> </p>
                                  <p> <strong> B/P:</strong> <?php echo e($query10->bp); ?> </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> <?php echo e($query10->adverse_symptoms); ?> </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> <?php echo e($query10->complaints); ?> </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </div>

  </div>
  <?php $__env->stopSection(); ?>


  <?php $__env->startSection('scripts-extra'); ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>