<?php

namespace App\Http\Controllers;
use App\TemporaryServicePlan;
use App\FallTsp;
use App\DeclineTsp;
use App\IncreasePainTsp;
use App\NewMedicationTsp;
use App\SkinProblemTsp;
use App\RespiratoryProblemTsp;
use App\CastSplintTsp;
use App\EyeProblemTsp;
use App\GastroProblemTsp;
use App\UrinaryProblemTsp;
use Request;
use DB, Auth, Carbon;

class tspController extends Controller
{
    public function viewResidents(){
        $residents = DB::table('resident_room')->join('sales_pipeline','resident_room.pros_id','=','sales_pipeline.id')
        ->where('sales_pipeline.facility_id','=',Auth::user()->facility_id)
        ->where('resident_room.status','=',1)->select('sales_pipeline.*')
        ->get();
        // dd($residents);
        return view('tsp.allResident',compact('residents'));
    }
    public function all_tsp($id){
        $residents = DB::table('sales_pipeline')
        ->where('id','=',$id)
        ->where('facility_id','=',Auth::user()->facility_id)->select('sales_pipeline.*')
        ->first();
        // dd($residents);
        return view('tsp.allTsp',compact('id','residents'));
    }
    public function fall_tsp() {
        return view('tsp.fallTsp');
    }
    public function decline_tsp() {
        return view('tsp.declineApetiteTsp');
    }
    public function cast_splint() {
      return view('tsp.castOrSplintTsp');
    }
    public function eye_problem() {
      return  view('tsp.eyeProblemTsp');
    }
    public function gastrointestinal() {
      return view('tsp.gastrointestinalTsp');
    }
   public function increase_pain(){
       return view('tsp.increasePainTsp');
   }
   public function new_medication(){
       return view('tsp.newMedicationTsp');
   }
   public function skin_problem(){
       return view('tsp.skinProblemTsp');
   }
   public function respiratory_problem(){
       return view('tsp.respiratoryTsp');
   }
   public function urinary() {
     return view('tsp.utiTsp');
   }

   public function storeTsp(Request $request){
    $input = Request::all();
    // dd($input);
    $numberOfForms = count($input['tsp_type']);
    $new_tsp = new TemporaryServicePlan();
    $new_tsp->facility_id = Auth::user()->facility_id;
    $new_tsp->pros_id = $input['pros_id'];
    $new_tsp->tsp_date = $input['tsp_date'];
    $new_tsp->last_update_date_time = Carbon\Carbon::now();
    $new_tsp->save();

    for($i=0;$i<$numberOfForms;$i++){
      if($input['tsp_type'][$i]==1){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['fall'=>1]);

        $new_fall = new FallTsp();
        $new_fall->tsp_id = $new_tsp->tsp_id;
        $new_fall->fall_date = $input['fall_date'];
        $new_fall->fall_time = $input['fall_time'];
        $parameter = $input['fall_injury'];
        $new_fall->injuries = implode(", ",$parameter);
        $new_fall->pain = $input['fall_pain'];
        $new_fall->further_injury = $input['fall_further_injury'];
        $new_fall->ability_to_transfer = $input['fall_transfer'];
        $new_fall->mental_status = $input['fall_mental_status'];
        $new_fall->temperature = $input['fall_temperature'];
        $new_fall->pulse = $input['fall_pulse'];
        $new_fall->bp = $input['fall_bp'];
        $new_fall->complete_report = $input['fall_report'];
        $new_fall->last_update_date_time = Carbon\Carbon::now();
        $new_fall->save();
      }
      if($input['tsp_type'][$i]==2){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['decline'=>1]);

        $new_decline = new DeclineTsp();
        $new_decline->tsp_id = $new_tsp->tsp_id;
        $new_decline->specific_symptoms = $input['decline_symptoms'];
        $new_decline->ongoing_symptoms = $input['decline_ongoing_symptoms'];
        $new_decline->assistance_provided = $input['decline_assistance'];
        $new_decline->appetite_issue = $input['decline_appetite_issue'];
        $new_decline->temperature = $input['decline_temperature'];
        $new_decline->pulse = $input['decline_pulse'];
        $new_decline->bp = $input['decline_bp'];
        $new_decline->last_update_date_time = Carbon\Carbon::now();
        $new_decline->save();
      }
      if($input['tsp_type'][$i]==3){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['increase_pain'=>1]);

        $new_increasePain = new IncreasePainTsp();
        $new_increasePain->tsp_id = $new_tsp->tsp_id;
        $new_increasePain->pain_location = $input['increase_pain_loc'];
        $new_increasePain->symptoms = $input['increase_symptoms'];
        $new_increasePain->pain_type_loc = $input['increase_pain_type'];
        $new_increasePain->swelling_bruising = $input['increase_swelling_bruising'];
        $new_increasePain->pulse = $input['increase_pain_pulse'];
        $new_increasePain->bp = $input['increase_pain_bp'];
        $new_increasePain->last_update_date_time = Carbon\Carbon::now();
        $new_increasePain->save();
      }
      if($input['tsp_type'][$i]==4){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['new_medication'=>1]);

        $new_medication = new NewMedicationTsp();
        $new_medication->tsp_id = $new_tsp->tsp_id;
        $new_medication->medication_order = $input['new_med_order'];
        $new_medication->precautions = $input['new_med_precaution'];
        $new_medication->symptoms = $input['new_med_symptoms'];
        $new_medication->complaints = $input['new_med_complaints'];
        $new_medication->last_update_date_time = Carbon\Carbon::now();
        $new_medication->save();
      }
      if($input['tsp_type'][$i]==5){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['skin_problem'=>1]);

        $new_skinProblem = new SkinProblemTsp();
        $new_skinProblem->tsp_id = $new_tsp->tsp_id;
        $new_skinProblem->location = $input['skin_prob_loc'];
        $new_skinProblem->type = $input['skin_prob_type'];
        $new_skinProblem->pain = $input['skin_prob_pain'];
        $new_skinProblem->healing = $input['skin_prob_healing'];
        $new_skinProblem->drainage = $input['skin_prob_drainage'];
        $new_skinProblem->complaints = $input['skin_prob_complaints'];
        $new_skinProblem->report = $input['skin_prob_report'];
        $new_skinProblem->last_update_date_time = Carbon\Carbon::now();
        $new_skinProblem->save();
      }
      if($input['tsp_type'][$i]==6){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['respiratory_problem'=>1]);

        $new_respiratoryProb= new RespiratoryProblemTsp();
        $new_respiratoryProb->tsp_id = $new_tsp->tsp_id;
        $new_respiratoryProb->problem_char = $input['resp_char'];
        $new_respiratoryProb->precautions = $input['resp_precautions'];
        $new_respiratoryProb->pain = $input['resp_pain'];
        $new_respiratoryProb->symptoms = $input['resp_symptoms'];
        $new_respiratoryProb->appetite = $input['resp_appetite'];
        $new_respiratoryProb->amount_sputum = $input['resp_sputum'];
        $new_respiratoryProb->temperature = $input['resp_temp'];
        $new_respiratoryProb->pulse = $input['resp_pulse'];
        $new_respiratoryProb->bp = $input['resp_bp'];
        $new_respiratoryProb->adverse_symptoms = $input['resp_adverse_symptoms'];
        $new_respiratoryProb->complaints = $input['resp_complaints'];
        $new_respiratoryProb->last_update_date_time = Carbon\Carbon::now();
        $new_respiratoryProb->save();
      }
      if($input['tsp_type'][$i]==7){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['cast_splint'=>1]);

        $new_castSplint = new CastSplintTsp();
        $new_castSplint->tsp_id = $new_tsp->tsp_id;
        $new_castSplint->cast = $input['castSplint_cast'];
        $new_castSplint->splint = $input['castSplint_splint'];
        $new_castSplint->injuries = $input['castSplint_injuries'];
        $new_castSplint->location = $input['castSplint_location'];
        $new_castSplint->pain = $input['castSplint_pain'];
        $new_castSplint->skin_issues = $input['castSplint_skinIssues'];
        $new_castSplint->transfer_ability = $input['castSplint_transfer'];
        $new_castSplint->last_update_date_time = Carbon\Carbon::now();
        $new_castSplint->save();
      }
      if($input['tsp_type'][$i]==8){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['eye_problem'=>1]);

        $new_eyeProblem = new EyeProblemTsp();
        $new_eyeProblem->tsp_id = $new_tsp->tsp_id;
        $new_eyeProblem->eye_problem = $input['eye_problem'];
        $new_eyeProblem->precautions = $input['eye_pracaution'];
        $new_eyeProblem->pain = $input['eye_pain'];
        $new_eyeProblem->symptoms = $input['eye_symptoms'];
        $new_eyeProblem->safety_issue = $input['eye_safety_issue'];
        $new_eyeProblem->amt_drainage = $input['eye_amt_drainage'];
        $new_eyeProblem->adverse_symptoms = $input['eye_adverse_symptoms'];
        $new_eyeProblem->complaints = $input['eye_complaints'];
        $new_eyeProblem->last_update_date_time = Carbon\Carbon::now();
        $new_eyeProblem->save();
      }
      if($input['tsp_type'][$i]==9){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['gastrointestinal'=>1]);

        $new_gastroProblem = new GastroProblemTsp();
        $new_gastroProblem->tsp_id = $new_tsp->tsp_id;
        $new_gastroProblem->gastro_problem = $input['gastro_problem'];
        $new_gastroProblem->precautions = $input['gastro_pracaution'];
        $new_gastroProblem->pain = $input['gastro_pain'];
        $new_gastroProblem->symptoms = $input['gastro_symptoms'];
        $new_gastroProblem->appetite = $input['gastro_appetite'];
        $new_gastroProblem->weight = $input['gastro_weight'];
        $new_gastroProblem->amt_drainage = $input['gastro_amt_drainage'];
        $new_gastroProblem->temperature = $input['gastro_temp'];
        $new_gastroProblem->pulse = $input['gastro_pulse'];
        $new_gastroProblem->respirations = $input['gastro_respirations'];
        $new_gastroProblem->bp = $input['gastro_bp'];
        $new_gastroProblem->complaints = $input['gastro_complaints'];
        $new_gastroProblem->last_update_date_time = Carbon\Carbon::now();
        $new_gastroProblem->save();
      }
      if($input['tsp_type'][$i]==10){
        DB::table('temporary_service_plan')->where('tsp_id',$new_tsp->tsp_id)->update(['urinary'=>1]);

        $new_urinaryProblem = new UrinaryProblemTsp();
        $new_urinaryProblem->tsp_id = $new_tsp->tsp_id;
        $new_urinaryProblem->problem = $input['uti_problem'];
        $new_urinaryProblem->precautions = $input['uti_pracaution'];
        $new_urinaryProblem->pain = $input['uti_pain'];
        $new_urinaryProblem->symptoms = $input['uti_symptoms'];
        $new_urinaryProblem->appetite = $input['uti_appetite'];
        $new_urinaryProblem->temperature = $input['uti_temp'];
        $new_urinaryProblem->pulse = $input['uti_pulse'];
        $new_urinaryProblem->respirations = $input['uti_respirations'];
        $new_urinaryProblem->bp = $input['uti_bp'];
        $new_urinaryProblem->adverse_symptoms = $input['uti_adverse_symptoms'];
        $new_urinaryProblem->complaints = $input['uti_complaints'];
        $new_urinaryProblem->last_update_date_time = Carbon\Carbon::now();
        $new_urinaryProblem->save();
      }
    }
    return redirect('view_resident_tsp/'.$input['pros_id']);
   }

   public function view_resident_tsp(Request $request, $id){
     $residents = DB::table('sales_pipeline')
     ->where('id','=',$id)
     ->where('facility_id','=',Auth::user()->facility_id)->select('sales_pipeline.*')
     ->first();
     $tsps = DB::table('temporary_service_plan')->where('pros_id',$id)->where('facility_id', Auth::user()->facility_id)->get();
     return view('tsp.viewResidentTsp', compact('residents','id','tsps'));
   }
}
