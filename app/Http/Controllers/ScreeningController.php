<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, App;
use App\User;
use App\crm;
use App\Responsibleperson;
use App\SignificantPerson;
use App\ResidentDetails;
use App\PrimaryDoctorDetails;
use App\PharmacyDetails;
use App\MedicalEquipSuppResidentNeed;
use App\MentalStatus;
use App\Bathing;
use App\Dressing;
use App\Toileting;
use App\AmbulationTransfer;
use App\PersonalGroomingHygiene;
use App\FeedingNutrition;
use App\CommunicationAbilities;
use App\NightNeed;
use App\EmergencyExiting;
use App\OverallLevelOfFunctioning;
use Kamaln7\Toastr\Facades\Toastr;
class ScreeningController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	public function screening(Request $request){
	    $val = $request['language'];
	    App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
		$crms_all = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('screening.screening', compact('crms','crms_all'));
    }

	public function screening_details($id){
        return view('screening.screening_add_form', compact('id'));
    }

	public function add_responsible_person(Request $request){
		$query = Responsibleperson::where('pros_id',$request['pros_id'])->first();
		if ($query) {
		$update = Responsibleperson::where('pros_id',$request['pros_id'])
							->update(['status'=> 0]);
		$responsibleperson = new Responsibleperson();
		$responsibleperson->pros_id = $request['pros_id'];
		$responsibleperson->responsible_person_responsible = $request['responsible_person_responsible'];
		$responsibleperson->address1_responsible = $request['address1_responsible'];
		$responsibleperson->address2_responsible = $request['address2_responsible'];
		$responsibleperson->city_responsible = $request['city_responsible'];
		$responsibleperson->state_responsible = $request['state_responsible'];
		$responsibleperson->zipcode_responsible = $request['zipcode_responsible'];
		$responsibleperson->phone_responsible = $request['phone_responsible'];
		$responsibleperson->email_responsible = $request['email_responsible'];
		$responsibleperson->date_responsible = date('Y/m/d');
		$responsibleperson->user_id = Auth::user()->user_id;
		$responsibleperson->status = 1;

		$responsibleperson->save();
		}
		else{
			$responsibleperson = new Responsibleperson();
		$responsibleperson->pros_id = $request['pros_id'];
		$responsibleperson->responsible_person_responsible = $request['responsible_person_responsible'];
		$responsibleperson->address1_responsible = $request['address1_responsible'];
		$responsibleperson->address2_responsible = $request['address2_responsible'];
		$responsibleperson->city_responsible = $request['city_responsible'];
		$responsibleperson->state_responsible = $request['state_responsible'];
		$responsibleperson->zipcode_responsible = $request['zipcode_responsible'];
		$responsibleperson->phone_responsible = $request['phone_responsible'];
		$responsibleperson->email_responsible = $request['email_responsible'];
		$responsibleperson->date_responsible = date('Y/m/d');
		$responsibleperson->user_id = Auth::user()->user_id;
		$responsibleperson->status = 1;

		$responsibleperson->save();
		}
		
    Toastr::success("Responsible Personal Details Added Successfully !!");
		return redirect('significant_personal/'.$request['pros_id']);
    }

	public function add_significant_person(Request $request){

		$significant = new SignificantPerson();	
		$significant->pros_id = $request['pros_id'];
		$significant->other_significant_person_significant = $request['other_significant_person_significant'];				
		$significant->address1_significant = $request['address1_significant'];				
		$significant->state_significant = $request['state_significant'];				
		$significant->phone_significant = $request['phone_significant'];
		$significant->email_significant = $request['email_significant'];
		$significant->address2_significant = $request['address2_significant'];			
		$significant->city_significant = $request["city_significant"];			
		$significant->zipcode_significant = $request["zipcode_significant"];				
		$significant->date_significant = date('Y/m/d');				
		$significant->user_id = Auth::user()->user_id;				
		$significant->status = 1;

		$significant->save();
		Toastr::success("Significant Personal Details Added Successfully !!");
		return redirect('resident_details/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
    }

	public function add_resident_details(Request $request){

		$residentdetails = new ResidentDetails();
		$residentdetails->pros_id = $request['pros_id'];
		$residentdetails->height_resident = $request['height_resident'];
		$residentdetails->weight_resident = $request['weight_resident'];
		$residentdetails->social_security_resident = $request['social_security_resident'];
		$residentdetails->medicare_resident = $request['medicare_resident'];
		$residentdetails->va_resident = $request['va_resident'];
		$residentdetails->other_insurance_name_resident = $request['other_insurance_name_resident'];
		$residentdetails->date_resident = date('Y/m/d');
		$residentdetails->user_id = Auth::user()->user_id;
		$residentdetails->status = 1;

		$residentdetails->save();
    Toastr::success("Resident Details Added Successfully !!");
		return redirect('primary_doctor/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
    }

	public function add_primary_doctor(Request $request){

		$primarydoctor = new PrimaryDoctorDetails();
		$primarydoctor->pros_id = $request['pros_id'];
		$primarydoctor->primary_doctor_primary = $request['primary_doctor_primary'];
		$primarydoctor->address1_primary = $request['address1_primary'];
		$primarydoctor->address2_primary = $request['address2_primary'];
		$primarydoctor->city_primary = $request['city_primary'];
		$primarydoctor->state_primary = $request['state_primary'];
		$primarydoctor->zipcode_primary = $request['zipcode_primary'];
		$primarydoctor->phone_primary_doctor = $request['phone_primary_doctor'];
		$primarydoctor->medical_diagnosis = $request['medical_diagnosis'];
		$primarydoctor->other_m_p_prob_primary = $request['other_m_p_prob_primary'];
		$primarydoctor->email_primary_doctor = $request['email_primary_doctor'];
		$primarydoctor->fax_primary_doctor = $request['fax_primary_doctor'];
		$primarydoctor->specialist_doctor_primary = $request['specialist_doctor_primary'];
		$primarydoctor->specialist_address1_primary = $request['specialist_address1_primary'];
		$primarydoctor->specialist_address2_primary = $request['specialist_address2_primary'];
		$primarydoctor->specialist_city_primary = $request['specialist_city_primary'];
		$primarydoctor->specialist_state_primary = $request['specialist_state_primary'];
		$primarydoctor->specialist_zipcode_primary = $request['specialist_zipcode_primary'];
		$primarydoctor->specialist_phone_primary_doctor = $request['specialist_phone_primary_doctor'];
		$primarydoctor->date = date('Y/m/d');
		$primarydoctor->user_id = Auth::user()->user_id;
		$primarydoctor->status = 1;

		$primarydoctor->save();
    Toastr::success("Primary Doctor Details Added Successfully !!");
		return redirect('pharmacy/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
    }

	public function add_pharmacy(Request $request){

		$pharmacydetails = new PharmacyDetails();
		$pharmacydetails->pros_id = $request['pros_id'];
		$pharmacydetails->pharmacy = $request['pharmacy'];
		$pharmacydetails->phone_pharmacy = $request['phone_pharmacy'];
		$pharmacydetails->mortuary = $request['mortuary'];
		$pharmacydetails->phone2_mortuary = $request['phone2_mortuary'];
		$pharmacydetails->special_med_needs_pharmacy = $request['special_med_needs_pharmacy'];
		$pharmacydetails->date_pharmacy = date('Y/m/d');
		$pharmacydetails->user_id = Auth::user()->user_id;
		$pharmacydetails->status = 1;

		$pharmacydetails->save();
    Toastr::success("Pharmacy Details Added Successfully !!");
		return redirect('medical_equipment/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
    }

	public function add_equipment(Request $request){

		$medicalequipmeny = new MedicalEquipSuppResidentNeed();
		$medicalequipmeny->pros_id = $request['pros_id'];
		$medicalequipmeny->inconsistency_supplies_type = $request['inconsistency_supplies_type'];
		$medicalequipmeny->pressure_relief_dev_type = $request['pressure_relief_dev_type'];
		$medicalequipmeny->bed_pan_medical = $request['bed_pan_medical'];
		$medicalequipmeny->walker_medical = $request['walker_medical'];
		$medicalequipmeny->trapeze_medical = $request['trapeze_medical'];
		$medicalequipmeny->comode_medical = $request['comode_medical'];
		$medicalequipmeny->wheelchair_medical = $request['wheelchair_medical'];
		$medicalequipmeny->oxygen_medical = $request['oxygen_medical'];
		$medicalequipmeny->urinal_medical = $request['urinal_medical'];
		$medicalequipmeny->cane_medical = $request['cane_medical'];
		$medicalequipmeny->protective_pads_medical = $request['protective_pads_medical'];
		$medicalequipmeny->crutches_medical = $request['phone_primary_doctor'];
		$medicalequipmeny->hospital_beds_medical = $request['hospital_beds_medical'];
		$medicalequipmeny->other_medical = $request['other_medical'];
		$medicalequipmeny->eqp_date = date('Y/m/d');
		$medicalequipmeny->user_id = Auth::user()->user_id;
		$medicalequipmeny->status = 1;

		$medicalequipmeny->save();
    Toastr::success("Medical Equipment Details Added Successfully !!");
		return redirect('mental_status/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
    }

	public function add_mental_status(Request $request){
		$mentalstatus = new MentalStatus();
		$mentalstatus->pros_id = $request['pros_id'];
		$mentalstatus->oriented = $request['oriented'];
		$mentalstatus->oriented_note = $request['oriented_note'];
		$mentalstatus->wanders = $request['wanders'];
		$mentalstatus->wanders_note = $request['wanders_note'];
		$mentalstatus->history_mental_ill = $request['history_mental_ill'];
		$mentalstatus->history_mental_ill_note = $request['history_mental_ill_note'];
		$mentalstatus->memory_lapses = $request['memory_lapses'];
		$mentalstatus->memory_lapses_note = $request['memory_lapses_note'];
		$mentalstatus->danger_to_s_o = $request['danger_to_s_o'];
		$mentalstatus->danger_to_s_o_note = $request['danger_to_s_o_note'];
		$mentalstatus->behaviors = $request['behaviors'];
		$mentalstatus->behaviors_note = $request['behaviors_note'];
		$mentalstatus->mental_date = date('Y/m/d');
		$mentalstatus->user_id = Auth::user()->user_id;
		$mentalstatus->status = 1;

		$mentalstatus->save();
    Toastr::success("Mental Status Details Added Successfully !!");
		return redirect('bathing/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_bathing(Request $request){
		$bathing = new Bathing();
		$bathing->pros_id = $request['pros_id'];
		$bathing->need_assist = $request['need_assist'];
		$bathing->need_assist_note = $request['need_assist_note'];
		$bathing->spec_equip = $request['spec_equip'];
		$bathing->spec_equip_note = $request['spec_equip_note'];
		$bathing->date_bathing = date('Y/m/d');
		$bathing->user_id = Auth::user()->user_id;
		$bathing->status = 1;

		$bathing->save();
    Toastr::success("Bathing Details Added Successfully !!");
		return redirect('dressing/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_dressing(Request $request){
		$dressing = new Dressing();
		$dressing->pros_id = $request['pros_id'];
		$dressing->choose_own_clothes = $request['choose_own_clothes'];
		$dressing->choose_own_clothes_note = $request['choose_own_clothes_note'];
		$dressing->need_assist_dressing = $request['need_assist_dressing'];
		$dressing->need_assist_dressing_note = $request['need_assist_dressing_note'];
		$dressing->date_dressing = date('Y/m/d');
		$dressing->user_id = Auth::user()->user_id;
		$dressing->status = 1;

		$dressing->save();
    Toastr::success("Dressing Details Added Successfully !!");
		return redirect('toileting/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_toileting(Request $request){
		$toileting = new Toileting();
		$toileting->pros_id = $request['pros_id'];
		$toileting->physical_assist = $request['physical_assist'];
		$toileting->physical_assist_note = $request['physical_assist_note'];
		$toileting->incont_supplies = $request['incont_supplies'];
		$toileting->incont_supplies_note = $request['incont_supplies_note'];
		$toileting->agree_to_wear = $request['agree_to_wear'];
		$toileting->agree_to_wear_note = $request['agree_to_wear_note'];
		$toileting->date_toileting = date('Y/m/d');
		$toileting->user_id = Auth::user()->user_id;
		$toileting->status = 1;

		$toileting->save();
    Toastr::success("Toileting Details Added Successfully !!");
		return redirect('ambulation_transfer/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_transfer(Request $request){
		$ambulation = new AmbulationTransfer();
		$ambulation->pros_id = $request['pros_id'];
		$ambulation->tired_easy = $request['tired_easy'];
		$ambulation->tired_easy_note = $request['tired_easy_note'];
		$ambulation->need_assist_ambu = $request['need_assist_ambu'];
		$ambulation->need_assist_ambu_note = $request['need_assist_ambu_note'];
		$ambulation->walking_ambu = $request['walking_ambu'];
		$ambulation->walking_ambu_note = $request['walking_ambu_note'];
		$ambulation->transfers_ambu = $request['transfers_ambu'];
		$ambulation->transfers_ambu_note = $request['transfers_ambu_note'];
		$ambulation->date_ambu = date('Y/m/d');
		$ambulation->user_id = Auth::user()->user_id;
		$ambulation->status = 1;

		$ambulation->save();
    Toastr::success("Ambulation/Transfer Details Added Successfully !!");
		return redirect('personal_grooming_hygiene/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_grooming(Request $request){
		$grooming = new PersonalGroomingHygiene();
		$grooming->pros_id = $request['pros_id'];
		$grooming->aware_of_needs = $request['aware_of_needs'];
		$grooming->aware_of_needs_note = $request['aware_of_needs_note'];
		$grooming->need_assist_groom = $request['need_assist_groom'];
		$grooming->need_assist_groom_note = $request['need_assist_groom_note'];
		$grooming->special_equip_groom = $request['special_equip_groom'];
		$grooming->special_equip_groom_note = $request['special_equip_groom_note'];
		$grooming->date_groom = date('Y/m/d');
		$grooming->user_id = Auth::user()->user_id;
		$grooming->status = 1;

		$grooming->save();
    Toastr::success("Personal Grooming Details Added Successfully !!");
		return redirect('feeding_nutrition/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_feeding(Request $request){
		$feeding = new FeedingNutrition();
		$feeding->pros_id = $request['pros_id'];
		$feeding->feed_self = $request['feed_self'];
		$feeding->feed_self_note = $request['feed_self_note'];
		$feeding->spec_equip_feeding = $request['spec_equip_feeding'];
		$feeding->spec_equip_feeding_note = $request['spec_equip_feeding_note'];
		$feeding->special_diet = $request['special_diet'];
		$feeding->special_diet_note = $request['special_diet_note'];
		$feeding->allergies_feeding = $request['allergies_feeding'];
		$feeding->allergies_feeding_note = $request['allergies_feeding_note'];
		$feeding->limitation_feeding = $request['limitation_feeding'];
		$feeding->limitation_feeding_note = $request['limitation_feeding_note'];
		$feeding->good_appetite = $request['good_appetite'];
		$feeding->good_appetite_note = $request['good_appetite_note'];
		$feeding->date_feeding = date('Y/m/d');
		$feeding->user_id = Auth::user()->user_id;
		$feeding->status = 1;

		$feeding->save();
    Toastr::success("Feeding/Nutrition Details Added Successfully !!");
		return redirect('communication_abilities/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_communucation(Request $request){
		$communication = new CommunicationAbilities();
		$communication->pros_id = $request['pros_id'];
		$communication->speech_comm = $request['speech_comm'];
		$communication->speech_comm_note = $request['speech_comm_note'];
		$communication->vision_comm	 = $request['vision_comm'];
		$communication->vision_comm_note = $request['vision_comm_note'];
		$communication->hearing_comm = $request['hearing_comm'];
		$communication->hearing_comm_note = $request['hearing_comm_note'];
		$communication->date_comm = date('Y/m/d');
		$communication->user_id = Auth::user()->user_id;
		$communication->status = 1;

		$communication->save();
    Toastr::success("Communication Details Added Successfully !!");
		return redirect('night_need/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_night_need(Request $request){
		$nightneed = new NightNeed();
		$nightneed->pros_id = $request['pros_id'];
		$nightneed->sleep_well = $request['sleep_well'];
		$nightneed->sleep_well_note = $request['sleep_well_note'];
		$nightneed->assist_at_night	 = $request['assist_at_night'];
		$nightneed->assist_at_night_note = $request['assist_at_night_note'];
		$nightneed->date_night = date('Y/m/d');
		$nightneed->user_id = Auth::user()->user_id;
		$nightneed->status = 1;

		$nightneed->save();
    Toastr::success("Night Need Details Added Successfully !!");
		return redirect('emergency_exiting/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_exiting(Request $request){
		$emergency = new EmergencyExiting();
		$emergency->pros_id = $request['pros_id'];
		$emergency->need_assist_emer = $request['need_assist_emer'];
		$emergency->need_assist_emer_note = $request['need_assist_emer_note'];
		$emergency->equip_need_emer	 = $request['equip_need_emer'];
		$emergency->equip_need_emer_note = $request['equip_need_emer_note'];
		$emergency->activity_pref_emer = $request['activity_pref_emer'];
		$emergency->date_emer = date('Y/m/d');
		$emergency->user_id = Auth::user()->user_id;
		$emergency->status = 1;

		$emergency->save();

    Toastr::success("Exiting Details Added Successfully !!");
		return redirect('overall/'.$request['pros_id']);

		//return redirect('/sales_stage_pipeline');
	}

	public function add_overall_fuctioning(Request $request){
		$overall = new OverallLevelOfFunctioning();
		$overall->pros_id = $request['pros_id'];
		$overall->level_ov = $request['level_ov'];
		$overall->other_concerns = $request['other_concerns'];
		$overall->pre_acceptable	 = $request['pre_acceptable'];
		$overall->reasons = $request['reasons'];
		$overall->date_ov = date('Y/m/d');
		$overall->user_id = Auth::user()->user_id;
		$overall->status = 1;

		$overall->save();
    Toastr::success("Overall Details Added Successfully !!");
		return redirect('screening');

		//return redirect('/sales_stage_pipeline');
	}

	//Added by Nilotpal
    public function screening_view($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		// dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_view', compact('reports_1', 'reports_2', 'id'));
    }
	
	public function screening_next($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		//dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_next', compact('reports_1', 'reports_2', 'id'));
    }
	
	public function screening_status($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		//dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_status', compact('reports_1', 'reports_2', 'id'));
    }
	
	public function screening_data($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		//dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_data', compact('reports_1', 'reports_2', 'id'));
    }
	
	public function screening_data_next($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		//dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_data_next', compact('reports_1', 'reports_2', 'id'));
    }
	
	public function screening_data_status($id){

        $reports_1 = DB::table('responsible_person_details')
                    ->Join('mental_status', 'responsible_person_details.pros_id', '=', 'mental_status.pros_id')
                    ->Join('medical_equip_supp_resident_need', 'responsible_person_details.pros_id', '=', 'medical_equip_supp_resident_need.pros_id')
                    ->Join('pharmacy_details', 'responsible_person_details.pros_id', '=', 'pharmacy_details.pros_id')
                    ->Join('primary_doctor_details', 'responsible_person_details.pros_id', '=', 'primary_doctor_details.pros_id')
                    ->Join('significant_person_details', 'responsible_person_details.pros_id', '=', 'significant_person_details.pros_id')
                    ->Join('resident_details', 'responsible_person_details.pros_id', '=', 'resident_details.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('responsible_person_details.*','mental_status.*','medical_equip_supp_resident_need.*','pharmacy_details.*', 'primary_doctor_details.*', 'significant_person_details.*', 'resident_details.*')
                    ->first();
		//dd($reports_1);

        $reports_2 = DB::table('responsible_person_details')
                    ->Join('ambulation_transfer', 'responsible_person_details.pros_id', '=', 'ambulation_transfer.pros_id')
                    ->Join('overall_level_of_functioning', 'responsible_person_details.pros_id', '=', 'overall_level_of_functioning.pros_id')
                    ->Join('night_need', 'responsible_person_details.pros_id', '=', 'night_need.pros_id')
                    ->Join('emergency_exiting', 'responsible_person_details.pros_id', '=', 'emergency_exiting.pros_id')
                    ->Join('communication_abilities', 'responsible_person_details.pros_id', '=', 'communication_abilities.pros_id')
                    ->Join('personal_grooming_hygiene', 'responsible_person_details.pros_id', '=', 'personal_grooming_hygiene.pros_id')
                    ->Join('feeding_nutrition', 'responsible_person_details.pros_id', '=', 'feeding_nutrition.pros_id')
                    ->Join('bathing', 'responsible_person_details.pros_id', '=', 'bathing.pros_id')
                    ->Join('dressing', 'responsible_person_details.pros_id', '=', 'dressing.pros_id')
                    ->Join('toileting', 'responsible_person_details.pros_id', '=', 'toileting.pros_id')
					->where('responsible_person_details.pros_id', $id)
                    ->select('ambulation_transfer.*','overall_level_of_functioning.*','night_need.*','emergency_exiting.*', 'communication_abilities.*', 'personal_grooming_hygiene.*', 'feeding_nutrition.*', 'bathing.*', 'dressing.*', 'toileting.*')
                    ->first();

        return view('screening.screening_data_status', compact('reports_1', 'reports_2', 'id'));
    }
    public function resposible_personal($id){
      return view('screening.resposible_personal',compact('id'));
    }
    public function significant_personal($id){
      return view('screening.significant_personal',compact('id'));
    }
    public function resident_details($id){
      return view('screening.resident_details',compact('id'));
    }
    public function primary_doctor($id)
    {
      return view('screening.primary_doctor',compact('id'));
    }
    public function pharmacy($id)
    {
      return view('screening.pharmacy',compact('id'));
    }
    public function medical_equipment($id)
    {
      return view('screening.medical_equipment',compact('id'));
    }
    public function mental_status($id)
    {
      return view('screening.mental_status',compact('id'));
    }
    public function bathing($id)
    {
      return view('screening.bathing',compact('id'));
    }
    public function dressing($id)
    {
      return view('screening.dressing',compact('id'));
    }
    public function toileting($id)
    {
      return view('screening.toileting',compact('id'));
    }
    public function ambulation_transfer($id)
    {
      return view('screening.ambulation_transfer',compact('id'));
    }
    public function grooming($id)
    {
      return view('screening.grooming',compact('id'));
    }
    public function feeding($id)
    {
      return view('screening.feeding',compact('id'));
    }
    public function communication($id)
    {
      return view('screening.communication',compact('id'));
    }
    public function night_need($id)
    {
      return view('screening.night_need',compact('id'));
    }
    public function emergency($id)
    {
      return view('screening.emergency',compact('id'));
    }
    public function overall($id)
    {
      return view('screening.overall',compact('id'));
    }
    
    public function screening_pros($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('screening.screening_pros_view', compact('crms', 'prospectives'));
    }
	
	public function screening_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('screening.screening_pros_view', compact('crms', 'prospectives'));
    }
	
	public function screening_pros_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('screening.screening_pros_view', compact('crms', 'prospectives'));
    }
	// Finish
}
