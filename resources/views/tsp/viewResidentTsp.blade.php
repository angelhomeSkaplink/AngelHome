@extends('layouts.app')

@section('htmlheader_title')
TSP
@endsection


@section('contentheader_title')
<div class="row">
  <div class="col-lg-4 col-lg-offset-4 text-center">
    <h3 style="margin:0px;color:rgba(0, -3, 0, 0.87) !important;"><strong>TSP HISTORY</strong></h3>
  </div>
  <div class="col-lg-4">
    <a href="../temporary_service_plan" class="btn btn-success btn-block btn-flat btn-width btn-sm " style="margin-right:15px;border-radius:5px;" onclick="history.back();"><i class="material-icons">keyboard_arrow_left</i>Back</a>
  </div>
</div>
@endsection

@section('main-content')
@php
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
@endphp
<div class="row" style="background-color:rgb(49, 68, 84) !important;margin:0.5px;">
	<div class="col-lg-12">
		<h4>@if($person->service_image == null)
			<img src="../hsfiles/public/img/538642-user_512x512.png" class="img-circle" width="40" height="40">
		@else
			<img src="../hsfiles/public/img/{{ $person->service_image }}" class="img-circle" width="40" height="40">
		@endif
		<span class="text-success" style="color:aliceblue;"><strong>{{ $name[0] }} {{ $name[1] }} {{ $name[2] }}</strong>
		<span class="pull-right" style="color:aliceblue;padding-top:10px;"><strong>Age: {{ $age }} </strong></span>
		</h4>
	</div>
</div>
  <div class="" style="padding:0.5px;margin-top:10px;">
    <div class="panel-group" id="accordion">
      @foreach ($tsps as $tsp)
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#{{$tsp->tsp_id}}">
              <h4><strong><span style="color:#fff;">{{$tsp->tsp_date}}</span></strong></h4>
              </a>
            </h4>
          </div>
          <div id="{{$tsp->tsp_id}}" class="panel-collapse collapse">
            <div class="panel-body">
              @if ($tsp->fall == 1)
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
                                  <p> <strong> FALL DATE:</strong> {{ $query1->fall_date }} </p>
                                  <p> <strong> FALL TIME:</strong> {{ $query1->fall_time }} </p>
                                  <p> <strong> INJURIES:</strong> {{ $query1->injuries }} </p>
                                </div>
                                <div class="col-lg-6">
                                  <p> <strong> PAIN:</strong> {{ $query1->pain }} </p>
                                  <p> <strong> ANY FURTHER INJURIES IDENTIFIED:</strong> {{ $query1->further_injury }} </p>
                                  <p> <strong> OVERALL RESIDENT ABILITY TO TRANSFER:</strong> {{ $query1->ability_to_transfer }} </p>
                                  <p> <strong> RESIDENT MENTAL STATUS:</strong> {{ $query1->mental_status }} </p>
                                  <p> <strong> TEMPERATURE:</strong> {{ $query1->temperature }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query1->pulse }} </p>
                                  <p> <strong> BLOOD PRESSURE:</strong> {{ $query1->bp }} </p>
                                  <p> <strong> COMPLETE REPORT:</strong> {{ $query1->complete_report }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->decline ==1)
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
                                  <p> <strong> STATE SPECIFIC SYMPTOMS:</strong> {{ $query2->specific_symptoms }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> SPECIFIC ONGOING SYMPTOMS:</strong> {{ $query2->ongoing_symptoms }} </p>
                                  <p> <strong> ASSISTANCE PROVIDED TO RESIDENT:</strong> {{ $query2->assistance_provided }} </p>
                                  <p> <strong> IF APPETITE ISSUES - INTAKE:</strong> {{ $query2->appetite_issue }} </p>
                                  <p> <strong> TEMPERATURE:</strong> {{ $query2->temperature }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query1->pulse }} </p>
                                  <p> <strong> BLOOD PRESSURE:</strong> {{ $query1->bp }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->increase_pain ==1)
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
                                  <p> <strong> STATE PAIN LOCATION:</strong> {{ $query3->pain_location }} </p>
                                  <p> <strong> SYMPTOMS:</strong> {{ $query3->symptoms }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN TYPE, LOCATION, AND OTHER CHARACTERISTICS:</strong> {{ $query3->pain_type_loc }} </p>
                                  <p> <strong> IF LIMB PAIN, COLOR, BRUISING, SWELLING AND OTHER SYMPTOMS:</strong> {{ $query3->swelling_bruising }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query3->pulse }} </p>
                                  <p> <strong> B/P:</strong> {{ $query3->bp }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->new_medication ==1)
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
                                  <p> <strong> NEW MEDICATION ORDER:</strong> {{ $query4->medication_order }} </p>
                                  <p> <strong> PRECAUTIONS:</strong> {{ $query4->precautions }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> ANY SIGNS AND SYMPTOMS OF ADVERSE REACTIONS:</strong> {{ $query4->symptoms }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT:</strong> {{ $query4->complaints }} </p>
                                </div>
                            </div>
                        </div>
                      </div>


                    </div>
                </div>
              @endif
              @if($tsp->skin_problem ==1)
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
                                  <p> <strong> AREA LOCATION:</strong> {{ $query5->location }} </p>
                                  <p> <strong> TYPE:</strong> {{ $query5->type }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> {{ $query5->pain }} </p>
                                  <p> <strong> PROGRESS TOWARD HEALING:</strong> {{ $query5->healing }} </p>
                                  <p> <strong> COLOR, ODOR & AMOUNT OF DRAINAGE IF ANY:</strong> {{ $query5->drainage }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT:</strong> {{ $query5->complaints }} </p>
                                  <p> <strong> COMPLETE REPORT:</strong> {{ $query5->report }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->respiratory_problem ==1)
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
                                  <p> <strong> RESPIRATORY PROBLEM CHARACTERIZED BY:</strong> {{ $query6->problem_char }} </p>
                                  <p> <strong> PRECAUTIONS:</strong> {{ $query6->precautions }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> CHEST OR OTHER PAIN:</strong> {{ $query6->pain }} </p>
                                  <p> <strong> ONGOING SYMPTOMS SUCH AS COUGH, SHORTNESS OF BREATH, CONGESTION:</strong> {{ $query6->symptoms }} </p>
                                  <p> <strong> APPETITE:</strong> {{ $query6->appetite }} </p>
                                  <p> <strong> COLOR & AMOUNT SPUTUM IF PRESENT:</strong> {{ $query6->amount_sputum }} </p>
                                  <p> <strong> TEMPERATURE:</strong> {{ $query6->temperature }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query6->pulse }} </p>
                                  <p> <strong> B/P:</strong> {{ $query6->bp }} </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> {{ $query6->adverse_symptoms }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> {{ $query6->complaints }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->cast_splint ==1)
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
                                  <p> <strong> CAST:</strong> {{ $query7->cast }} </p>
                                  <p> <strong> SPLINT:</strong> {{ $query7->splint }} </p>
                                  <p> <strong> INJURIES:</strong> {{ $query7->injuries }} </p>
                                  <p> <strong> LOCATION:</strong> {{ $query7->location }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> {{ $query7->pain }} </p>
                                  <p> <strong> ANY INJURIES OR SKIN ISSUES IDENTIFIED:</strong> {{ $query7->skin_issues }} </p>
                                  <p> <strong> OVERALL RESIDENT ABILITY TO TRANSFER:</strong> {{ $query7->transfer_ability }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->eye_problem ==1)
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
                                  <p> <strong> EYE PROBLEM CHARACTERIZED BY:</strong> {{ $query8->eye_problem }} </p>
                                  <p> <strong> PRECAUTIONS:</strong> {{ $query8->precautions }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> {{ $query8->pain }} </p>
                                  <p> <strong> ONGOING SYMPTOMS:</strong> {{ $query8->symptoms }} </p>
                                  <p> <strong> ANY SAFETY ISSUES RELATED TO VISION AFFECTED BY EYE PROBLEM:</strong> {{ $query8->safety_issue }} </p>
                                  <p> <strong> COLOR & AMOUNT DRAINAGE IF PRESENT:</strong> {{ $query8->amt_drainage }} </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> {{ $query8->adverse_symptoms }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> {{ $query8->complaints }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->gastrointestinal ==1)
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
                                  <p> <strong> GASTROINTESTINAL PROBLEM CHARACTERIZED BY:</strong> {{ $query9->gastro_problem }} </p>
                                  <p> <strong> PRECAUTIONS:</strong> {{ $query9->precautions }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> {{ $query9->pain }} </p>
                                  <p> <strong> ONGOING SYMPTOMS:</strong> {{ $query9->symptoms }} </p>
                                  <p> <strong> APPETITE:</strong> {{ $query9->appetite }} </p>
                                  <p> <strong> WEIGHT IF OBTAINED:</strong> {{ $query9->weight }} </p>
                                  <p> <strong> COLOR & AMOUNT OF VOMITING, DIARRHEA IF ANY:</strong> {{ $query9->amt_drainage }} </p>
                                  <p> <strong> TEMPERATURE:</strong> {{ $query9->temperature }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query9->pulse }} </p>
                                  <p> <strong> RESPIRATIONS:</strong> {{ $query9->respirations }} </p>
                                  <p> <strong> B/P:</strong> {{ $query9->bp }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> {{ $query9->complaints }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
              @if($tsp->urinary ==1)
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
                                  <p> <strong> URINARY TRACT INFECTION CHARACTERIZED BY:</strong> {{ $query10->problem }} </p>
                                  <p> <strong> PRECAUTIONS:</strong> {{ $query10->precautions }} </p>
                                </div>
                                <div class="col-lg-6">
                                  WHAT TO CHART:
                                  <p> <strong> PAIN:</strong> {{ $query10->pain }} </p>
                                  <p> <strong> ONGOING SYMPTOMS SUCH AS BURNING, URINE COLOR, ODOR AND AMOUNT:</strong> {{ $query10->symptoms }} </p>
                                  <p> <strong> APPETITE:</strong> {{ $query10->appetite }} </p>
                                  <p> <strong> TEMPERATURE:</strong> {{ $query10->temperature }} </p>
                                  <p> <strong> PULSE:</strong> {{ $query10->pulse }} </p>
                                  <p> <strong> RESPIRATIONS:</strong> {{ $query10->respirations }} </p>
                                  <p> <strong> B/P:</strong> {{ $query10->bp }} </p>
                                  <p> <strong> IF ON ANTIBIOTIC ANY ADVERSE SYMPTOMS:</strong> {{ $query10->adverse_symptoms }} </p>
                                  <p> <strong> OTHER COMPLAINTS BY RESIDENT OR OTHER SYMPTOMS:</strong> {{ $query10->complaints }} </p>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
              @endif
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </div>
  @endsection


  @section('scripts-extra')
  <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js"></script>
  @endsection
