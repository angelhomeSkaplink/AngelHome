<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProspectiveBasic;
use App\crm;
use App\stage;
use App\User;
use App\Change_Records;
use App\Appointment;
use App\ResidentInjury;
use App\NextAssessment;
use App\FileUpload;
use App\LegalDocUpload;
use DB, Auth, Validator, App;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;

class ProspectiveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    	
	public function prospective(){		
		$prospectives = ProspectiveBasic::all();
        return view('receptionist.pross_view', compact('prospectives'));
    }
	
	public function pross_add(){
        return view('receptionist.pross_add');
    }
	
	public function pross_stor(Request $request){
        
		$basic = new ProspectiveBasic();
		$basic->prospective_name = $request['prospective_name'];
		$basic->phone_no = $request['phone_no'];
		$basic->email = $request['email'];
		$basic->self_or_other = $request['self_or_other'];
		$basic->person_name = $request['person_name'];
		$basic->relation = $request['relation'];
		$basic->date = $request['date'];
		$basic->moc = $request['moc'];
		$basic->user_id = Auth::user()->user_id;
		$basic->save();
		
		$msg = "Record Successfully Added";
		return redirect('/prospective')->with('msg', $msg);
    }
	
	public function sales_pipeline(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
// 		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage','!=',"MoveIn")->paginate(6);
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage','!=',"MoveIn")->get();
// 		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_view', compact('crms', 'prospectives'));
    }
	
	public function select_pros($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_pros_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	/*public function select_pros($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['id', $pros_id]])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_search_view', compact('crms', 'prospectives'));
    }*/
	
	public function new_pross_add(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
        return view('crm.new_pross_add');
    }
	
	public function new_prospective(Request $request){
		$name = implode(",",$request['pros_name']);
		// dd($name);
		$pross = new crm();
		$pross->pros_unique_id = uniqid();
		$pross->pros_name = $name;
		$pross->phone_p = $request['phone_p'];
		$pross->email_p = $request['email_p'];
		$pross->address_p = $request['address_p'];
		$pross->address_p_two = $request['address_p_two'];
		$pross->city_p = $request['city_p'];
		$pross->state_id_p = $request['state_id_p'];
		$pross->zip_p = $request['zip_p'];
		$pross->contact_person = $request['contact_person'];
		$pross->phone_c = $request['phone_c'];
		$pross->email_c = $request['email_c'];
		$pross->address_c = $request['address_c'];
		$pross->address_c_two = $request['address_c_two'];
		$pross->city_c = $request['city_c'];
		$pross->stste_id_c = $request['stste_id_c'];
		$pross->zip_c = $request['zip_c'];
		$pross->relation = $request['relation'];
		$pross->source = $request['source'];
		
		if($file = $request->hasFile('service_image')) {            
            $file = $request->file('service_image');            
            $fileName = $file->getClientOriginalName();
			$fileName = uniqid().$fileName;
            $destinationPath = public_path().'/img/';
			$file->move($destinationPath,$fileName);
            $pross->service_image = $fileName ;
        }
		
		$pross->facility_id = Auth::user()->facility_id;
		$pross->user_id = Auth::user()->user_id;
		$pross->date = date('Y/m/d');
		$pross->stage = 'Inquiry';
		$pross->save();
		
		$pross_id = $pross->id;

		
		$prosspect = new Change_Records();
		$prosspect->pros_id = $pross_id;
		$prosspect->phone_p = $request['phone_p'];
		$prosspect->email_p = $request['email_p'];
		$prosspect->address_p = $request['address_p'];
		$prosspect->address_p_two = $request['address_p_two'];
		$prosspect->city_p = $request['city_p'];
		$prosspect->state_id_p = $request['state_id_p'];
		$prosspect->zip_p = $request['zip_p'];
		$prosspect->contact_person = $request['contact_person'];
		$prosspect->phone_c = $request['phone_c'];
		$prosspect->email_c = $request['email_c'];
		$prosspect->address_c = $request['address_c'];
		$prosspect->address_c_two = $request['address_c_two'];
		$prosspect->city_c = $request['city_c'];
		$prosspect->stste_id_c = $request['stste_id_c'];
		$prosspect->zip_c = $request['zip_c'];
		$prosspect->relation = $request['relation'];
		$prosspect->source = $request['source'];
		$prosspect->source_detail = $request['source_detail'];
		$prosspect->remarks = $request['remarks'];
		$prosspect->facility_id = Auth::user()->facility_id;
		$prosspect->user_id = Auth::user()->user_id;
		$prosspect->date = date('Y/m/d');
		$prosspect->status = 1;
		$prosspect->save();
		
		Toastr::success("Prospective Added Successfully !!");
		return redirect('/sales_pipeline');
    }
	
	public function add_records(Request $request, $pipeline_id){
	    $val = $request['language'];
		App::setlocale($val);
        $row = DB::table('sales_pipeline')->where('id', $pipeline_id)->first();
		$stage = DB::table('stage_pipeline')->where([['pipeline_id', $pipeline_id], ['status', 1]])->orderBy('stage_pipeline_id', 'DESC')->first();
		return view('crm.add_new_records', compact('row', 'stage'));
    }
	
	public function new_records(Request $request){
		
		$marketing_id = Auth::user()->user_id;
		
		$j = DB::table('sales_pipeline')->where('id', $request['pipeline_id'])->update(['marketing_id' => $marketing_id]);
		
		$j = DB::table('stage_pipeline')->where('pipeline_id', $request['pipeline_id'])->update(['status' => 0]);
		
		$sales = new stage();		
		$sales->lead_id = $request['lead_id'];
		$sales->sales_stage = $request['sales_stage'];
		$sales->date = $request['date'];
		$sales->pipeline_id = $request['pipeline_id'];
		$sales->status = 1;
		$sales->notes = $request['notes'];
		$sales->moc = $request['moc'];		
		$sales->save();
		
		if($request['appointment_date'] != NULL){
			$appointment = new Appointment();
			$appointment->pros_id = $request['pipeline_id'];
			$appointment->appointment_date = $request['appointment_date'];
			$appointment->appointment_time = $request['appointment_time'];
			$appointment->user_id = Auth::user()->user_id;
			$appointment->status = 1;	
			$appointment->save();
		}
		
		Toastr::success("Sales Stages Update Successfully !!");
		return redirect('/sales_stage_pipeline');
    }
	
	public function view_records(Request $request, $pipeline_id){
	    $val = $request['language'];
		App::setlocale($val);
		$leads = DB::table('leads')->get();
        $row = DB::table('sales_pipeline')->where('id', $pipeline_id)->first();
		$details = DB::table('change_pross_record')->where([['pros_id', $pipeline_id],['status', 1]])->first();
		$stages = DB::table('stage_pipeline')->where('pipeline_id', $pipeline_id)->orderBy('stage_pipeline_id', 'DESC')->get();
		
		return view('crm.view_records', compact('row', 'stages', 'details','leads'));
    }
	
	public function sales_stage_pipeline(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
// 		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
// 		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=',"MoveIn"]])->orderby('id','DESC')->paginate(6);
		$prospectives = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=',"MoveIn"]])->orderby('id','DESC')->get();
        return view('crm.pipeline_stage_view', compact('crms', 'prospectives'));
    }
	
	public function personal_details(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage',"MoveIn")->paginate(6);
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage',"MoveIn")->get();
		return view('crm.personal_details', compact('crms', 'prospectives'));
    }
	
	public function select_personal_detail($pros_id){	
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		//$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['id', $pros_id]])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.personal_details_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_personal_detail_email($pros_id){	
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		//$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['id', $pros_id]])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.personal_details_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_personal_detail_contact($pros_id){	
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		//$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['id', $pros_id]])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.personal_details_search_view', compact('crms', 'prospectives'));
    }
	
	public function details($id){	
        return view('crm.personal_details_add_form', compact('id'));
    }
	
	public function change_records(Request $request, $pipeline_id){
	    $val = $request['language'];
		App::setlocale($val);
        $row = DB::table('change_pross_record')->where([['pros_id', $pipeline_id], ['status', 1]])->first();
		return view('crm.change_records', compact('row'));
    }
	
	public function change_pross_records(Request $request){
		
		$j = DB::table('change_pross_record')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		$contact_name = implode(",",$request['contact_person']);
		$update_contact = DB::table('sales_pipeline')->where('id',$request['pros_id'])->update(['contact_person'=>$contact_name]);
		$prosspect = new Change_Records();
		$prosspect->pros_id = $request['pros_id'];
		$prosspect->phone_p = $request['phone_p'];
		$prosspect->email_p = $request['email_p'];
		$prosspect->address_p = $request['address_p'];
		$prosspect->address_p_two = $request['address_p_two'];
		$prosspect->city_p = $request['city_p'];
		$prosspect->state_id_p = $request['state_id_p'];
		$prosspect->zip_p = $request['zip_p'];
		$prosspect->contact_person = $contact_name;
		$prosspect->phone_c = $request['phone_c'];
		$prosspect->email_c = $request['email_c'];
		$prosspect->address_c = $request['address_c'];
		$prosspect->address_c_two = $request['address_c_two'];
		$prosspect->city_c = $request['city_c'];
		$prosspect->stste_id_c = $request['stste_id_c'];
		$prosspect->zip_c = $request['zip_c'];
		$prosspect->relation = $request['relation'];
		$prosspect->source = $request['source'];		
		$prosspect->user_id = Auth::user()->user_id;
		$prosspect->facility_id = Auth::user()->facility_id;
		$prosspect->date = date('Y/m/d');
		$prosspect->status = 1;
		$prosspect->save();	

		$crm = new crm();
		if($file = $request->hasFile('service_image')) {            
            $file = $request->file('service_image'); 			
            $fileName = $file->getClientOriginalName();
			$fileName = uniqid().$fileName;
            $destinationPath = public_path().'/img/';
			$file->move($destinationPath,$fileName);
            $crm->service_image = $fileName ;
			$update_image = DB::table('sales_pipeline')->where('id', $request['pros_id'])->update(['service_image'=>$crm->service_image]);
        }

		$prosspect->pros_id = $request['pros_id'];
		
		Toastr::success("Prospective Record Updated Successfully !!");
		return redirect('/sales_pipeline');		
    }
	
	public function change_pro_records(Request $request, $pipeline_id){
	    $val = $request['language'];
		App::setlocale($val);
        $row = DB::table('change_pross_record')->where([['pros_id', $pipeline_id], ['status', 1]])->first();
		return view('crm.change_pro_records', compact('row'));
    }
	
	public function change_pro_record(Request $request){
		
		$j = DB::table('change_pross_record')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		$contact_name = implode(",",$request['contact_person']);
		$update_contact = DB::table('sales_pipeline')->where('id',$request['pros_id'])->update(['contact_person'=>$contact_name]);
		$prosspect = new Change_Records();
		$prosspect->pros_id = $request['pros_id'];
		$prosspect->phone_p = $request['phone_p'];
		$prosspect->email_p = $request['email_p'];
		$prosspect->address_p = $request['address_p'];
		$prosspect->address_p_two = $request['address_p_two'];
		$prosspect->city_p = $request['city_p'];
		$prosspect->state_id_p = $request['state_id_p'];
		$prosspect->zip_p = $request['zip_p'];
		$prosspect->contact_person = $contact_name;
		$prosspect->phone_c = $request['phone_c'];
		$prosspect->email_c = $request['email_c'];
		$prosspect->address_c = $request['address_c'];
		$prosspect->address_c_two = $request['address_c_two'];
		$prosspect->city_c = $request['city_c'];
		$prosspect->stste_id_c = $request['stste_id_c'];
		$prosspect->zip_c = $request['zip_c'];
		$prosspect->relation = $request['relation'];
		$prosspect->source = $request['source'];		
		$prosspect->user_id = Auth::user()->user_id;
		$prosspect->facility_id = Auth::user()->facility_id;
		$prosspect->date = date('Y/m/d');
		$prosspect->status = 1;
		$prosspect->save();	

		$crm = new crm();
		if($file = $request->hasFile('service_image')) {            
            $file = $request->file('service_image'); 			
            $fileName = $file->getClientOriginalName();
			$fileName = uniqid().$fileName;
            $destinationPath = public_path().'/img/';
			$file->move($destinationPath,$fileName);
            $crm->service_image = $fileName ;
			$update_image = DB::table('sales_pipeline')->where('id', $request['pros_id'])->update(['service_image'=>$crm->service_image]);
        }
		
		Toastr::success("Prospective Record Updated Successfully !!");
		return redirect('/sales_stage_pipeline');		
    }
	
	public function reports(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$reports = DB::table('sales_pipeline')->where([['stage', 'Inquiery'], ['marketing_id', '!=', NULL]])->paginate(6);
        return view('crm.inquery_reports', compact('reports'));
    }
	
	public function inquiery_reports(Request $request){
		$from = $request['from'];
		$to = $request['to'];
		$sales_stage = $request['sales_stage'];
		$id = $request['id'];
		
		$reports = DB::table('sales_pipeline')->whereBetween('sales_pipeline.date',[$from,$to])
                    ->Join('stage_pipeline', 'sales_pipeline.id', '=', 'stage_pipeline.pipeline_id')
                    ->Join('change_pross_record', 'sales_pipeline.id', '=', 'change_pross_record.pros_id')
					->where('change_pross_record.status', 1)
                    ->select('stage_pipeline.sales_stage','sales_pipeline.marketing_id','sales_pipeline.date','stage_pipeline.notes','sales_pipeline.service_image','stage_pipeline.moc','pros_name','id','change_pross_record.phone_p');
        if($request->sales_stage){
			$reports->where('stage_pipeline.sales_stage', '=', $request->sales_stage);
        }
		if($request->id){
			$reports->where('sales_pipeline.id', '=', $request->id);
        }

        $reports = $reports->get();
		$prospectives = DB::table('sales_pipeline')->get();
		return view('crm.inquery_reports_view', compact('reports', 'from', 'to', 'prospectives')); 
    }
	
	public function appointment_schedule(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
        $appointments = DB::table('appointment')
						->where('appointment.status', 1)
						->Join('sales_pipeline', 'appointment.pros_id', '=', 'sales_pipeline.id')
						->where('sales_pipeline.facility_id', Auth::user()->facility_id)
						->select('sales_pipeline.pros_name', 'sales_pipeline.service_image', 'sales_pipeline.id', 'appointment.appoiuntment_id', 'appointment.pros_id', 'appointment.appointment_date', 'appointment.appointment_time');
    
		$appointments = $appointments->paginate(6);
		return view('crm.appointment_view', compact('appointments')); 
	}	
	
	public function reschedule(Request $request, $appoiuntment_id){
	    $val = $request['language'];
		App::setlocale($val);
        $row = DB::table('appointment')->where('appoiuntment_id', $appoiuntment_id)->first();
		$pros = DB::table('sales_pipeline')->where('id', $row->pros_id)->first();
		return view('crm.reschedule_appointment', compact('row', 'pros'));
    }
	
	public function change_appointment(Request $request){
		$data =[
			'pros_id' => $request['pros_id'],
			'appointment_date' => $request['appointment_date'],
			'appointment_time' => $request['appointment_time'],
			'comments' => $request['comments'],
			'user_id' => Auth::user()->user_id, 
			'status' => 1
		];	
		$j = DB::table('appointment')->where('appoiuntment_id', $request['appoiuntment_id'])->update(['status' => 0]);
		$j = DB::table('appointment')->where('appoiuntment_id', $request['appoiuntment_id'])->insert($data);
		
		Toastr::success("Appointment Schedule Updated Successfully !!");
		return redirect('/appointment_schedule');
	}
	
	// Added by Nilotpal
    public function details_view(Request $request, $id){
        $val = $request['language'];
		App::setlocale($val);
        $reports_1 = DB::table('personal_details')
                    ->Join('insurance', 'personal_details.pros_id', '=', 'insurance.pros_id')
                    ->Join('emergency_contact', 'personal_details.pros_id', '=', 'emergency_contact.pros_id')
                    ->Join('physician', 'personal_details.pros_id', '=', 'physician.pros_id')
                    ->Join('dentist', 'personal_details.pros_id', '=', 'dentist.pros_id')
                    ->Join('other_medical_info', 'personal_details.pros_id', '=', 'other_medical_info.pros_id')
					->where('personal_details.pros_id', $id)
                    ->select('personal_details.*','insurance.*','emergency_contact.*','physician.*', 'dentist.*', 'other_medical_info.*')
                    ->first();

        $reports_2 = DB::table('personal_details')
                    ->Join('emergency_contact', 'personal_details.pros_id', '=', 'emergency_contact.pros_id')
					->where('personal_details.pros_id', $id)
                    ->select('personal_details.*','emergency_contact.*')
                    ->first();

        return view('crm.details_view', compact('reports_1', 'reports_2'));
    }
	//Finished
	
	public function injury(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$prospects = crm::all()->where('facility_id', Auth::user()->facility_id);
		$event_codes = DB::table('event_code')->get();
		$location_codes = DB::table('location_code')->get();
		$injury_codes = DB::table('injury_code')->get();
		$action_takens = DB::table('action_taken')->get();
		$cp_updates = DB::table('cp_update')->get();
        return view('injury_details.injury_record_entry_form', compact('event_codes', 'prospects', 'location_codes', 'injury_codes', 'action_takens', 'cp_updates'));
    }
	
	public function injury_record_entry(Request $request){
		
		if($request['event_code'] == 'event_others'){
			$event_code = $request['other_event_code'];
			$insert_event_code = DB::table('event_code')->insert(['event_code'=>$event_code]);
		}else{
			$event_code = $request['event_code'];
		}
		
		if($request['location_code'] == 'location_others'){			
			$location_code = $request['location_code_others'];
			$insert_location_code = DB::table('location_code')->insert(['location_code' =>$location_code]);
		}else{
			$location_code = $request['location_code'];
		}
		
		if($request['injury_code'] == 'injury_others'){
			$injury_code = $request['injury_code_others'];
			$insert_injury_code = DB::table('injury_code')->insert(['event_code'=>$injury_code]);
		}else{
			$injury_code = $request['injury_code'];
		}
		
		if($request['action_taken'] == 'non_action'){
			$action_taken = $request['no_action_reason'];
			$insert_action_taken = DB::table('action_taken')->insert(['action_taken'=>$action_taken]);
		}else{
			$action_taken = $request['action_taken'];
		}
		
		if($request['cp_update'] == 'specify_others'){
			$cp_update = $request['other_cp'];
			$insert_cp_update = DB::table('cp_update')->insert(['cp_update'=>$cp_update]);
		}else{
			$cp_update = $request['cp_update'];
		}
		
		$resident_injury = new ResidentInjury();
		$resident_injury->pros_id = $request['pros_id'];
		$resident_injury->med_record_no = $request['med_record_no'];
		$resident_injury->injury_date = $request['injury_date'];
		$resident_injury->injury_time = $request['injury_time'];		
		$resident_injury->event_code = $event_code;		
		$resident_injury->location_code = $location_code;
		
		$resident_injury->injury_code = $injury_code;
		$resident_injury->injury_brief_details = $request['injury_brief_details'];
		$resident_injury->person_involve = $request['person_involve'];
		$resident_injury->attachment = $request['attachment'];
		$resident_injury->action_taken = $action_taken;
		$resident_injury->action_taken_nurse = $request['action_taken_nurse'];
		
		$resident_injury->cp_update = $cp_update;
		$resident_injury->cp_upload_nurse = $request['cp_upload_nurse'];
		
		$resident_injury->check_notice = $request['check_notice'];
		$resident_injury->check_notice1 = $request['check_notice1'];
		$resident_injury->check_notice2 = $request['check_notice2'];
		$resident_injury->check_notice3 = $request['check_notice3'];
		$resident_injury->check_notice4 = $request['check_notice4'];
		$resident_injury->check_notice5 = $request['check_notice5'];
		$resident_injury->check_notice6 = $request['check_notice6'];
		$resident_injury->check_notice7 = $request['check_notice7'];
		$resident_injury->check_notice8 = $request['check_notice8'];	
		
		
		$resident_injury->fall_time = $request['fall_time'];
		$resident_injury->where_found = $request['where_found'];
		$resident_injury->bp_lying = $request['bp_lying'];
		$resident_injury->bp_sitting = $request['bp_sitting'];		
		$resident_injury->puls = $request['puls'];
		$resident_injury->resp =$request['resp'];
		$resident_injury->diabetic = $request['diabetic'];
		$resident_injury->blood_suger = $request['blood_suger'];
		$resident_injury->incontinence = $request['incontinence'];
		$resident_injury->use_of_wc = $request['use_of_wc'];
		$resident_injury->last_meal_time = $request['last_meal_time'];
		$resident_injury->type_of_location_of_assist_device = $request['type_of_location_of_assist_device'];
		$resident_injury->glasses = $request['glasses'];
		$resident_injury->hearing_aide = $request['hearing_aide'];
		
		
		$resident_injury->floor_clear = $request['floor_clear'];
		$resident_injury->floor_clear_specific = $request['floor_clear_specific'];
		$resident_injury->lighting = $request['lighting'];
		$resident_injury->lighting_other = $request['lighting_other'];
		$resident_injury->last_toilet = $request['last_toilet'];
		
		$resident_injury->shoes = $request['shoes'];
		$resident_injury->socks = $request['socks'];
		
		$resident_injury->fall_activity = $request['fall_activity'];
		$resident_injury->use_of_call_light = $request['use_of_call_light'];
		$resident_injury->call_light_within_use = $request['call_light_within_use'];
		$resident_injury->bedrail_position = $request['bedrail_position'];
		$resident_injury->brakes_on_wc = $request['brakes_on_wc'];
		$resident_injury->ambulatory = $request['ambulatory'];
		$resident_injury->alarm_bed = $request['alarm_bed'];
		$resident_injury->alarm_chair = $request['alarm_chair'];
		$resident_injury->alarm_other = $request['alarm_other'];
		
		
		
		$resident_injury->resident_confused = $request['resident_confused'];
		$resident_injury->psychotropic_med = $request['psychotropic_med'];
		$resident_injury->psychotropic_med_time = $request['psychotropic_med_time'];
		
		$resident_injury->bed_brakes = $request['bed_brakes'];
		$resident_injury->other_info = $request['other_info'];
		$resident_injury->environmental_issues = $request['environmental_issues'];
		$resident_injury->environmental_issues_specify = $request['environmental_issues_specify'];
		$resident_injury->resident_location_when_found = $request['resident_location_when_found'];
		$resident_injury->visitor_prior_8_hours = $request['visitor_prior_8_hours'];
		$resident_injury->visitor_prior_8_hours_who = $request['visitor_prior_8_hours_who'];
		$resident_injury->new_staff_assigned = $request['new_staff_assigned'];
		$resident_injury->new_staff_assigned_who = $request['new_staff_assigned_who'];
		$resident_injury->behavior_issues_past_72_hours = $request['behavior_issues_past_72_hours'];
		$resident_injury->behavior_issues_past_72_hours_yes = $request['behavior_issues_past_72_hours_yes'];
		$resident_injury->bedrail_position_skin = $request['bedrail_position_skin'];
		$resident_injury->resident_confused_skin = $request['resident_confused_skin'];
		$resident_injury->on_prednisone = $request['on_prednisone'];
		$resident_injury->other_pertinent_info = $request['other_pertinent_info'];
		
		$resident_injury->equipment_issues = $request['equipment_issues'];
		$resident_injury->equipment_issues_specify = $request['equipment_issues_specify'];
		$resident_injury->activity_at_time_of_bruiseskin_tear = $request['activity_at_time_of_bruiseskin_tear'];
		$resident_injury->transfer_from_bed_or_chair = $request['transfer_from_bed_or_chair'];
		$resident_injury->recent_fall_past_72_hours_skin = $request['recent_fall_past_72_hours_skin'];
		$resident_injury->seated_next_to = $request['seated_next_to'];
		$resident_injury->seated_next_to_person = $request['seated_next_to_person'];
		$resident_injury->ambulatory_skin = $request['ambulatory_skin'];
		$resident_injury->on_coumadin = $request['on_coumadin'];
		$resident_injury->other_pertinent_info_skin = $request['other_pertinent_info_skin'];
		$resident_injury->behaviour_environmental_issues = $request['behaviour_environmental_issues'];
		$resident_injury->behaviour_environmental_issues_specify = $request['behaviour_environmental_issues_specify'];
		$resident_injury->assessed_for_pain = $request['assessed_for_pain'];
		$resident_injury->assessed_for_pain_medicated = $request['assessed_for_pain_medicated'];
		$resident_injury->urine_dip_results = $request['urine_dip_results'];
		
		$resident_injury->activity_at_time_of_behavior = $request['activity_at_time_of_behavior'];
		$resident_injury->unfamiliar_care_giver = $request['unfamiliar_care_giver'];
		$resident_injury->care_giver_name = $request['care_giver_name'];
		$resident_injury->other_pertinent_info_behaviour = $request['other_pertinent_info_behaviour'];
		$resident_injury->investigation = $request['investigation'];
		$resident_injury->user_id = Auth::user()->user_id;
		$resident_injury->injury_entry_date = date('Y/m/d');
		$resident_injury->injury_status = 1;
		$resident_injury->save();
		
		if($request['need_assessment'] == 'Yes'){
			$j = DB::table('next_assessment')->where('pros_id', $request['pros_id'])->update(['assessment_status' => 0]);
			$nextassessment = new NextAssessment();
			$nextassessment->pros_id = $request['pros_id'];
			$nextassessment->next_assessment_date = $request['next_assessment_date'];
			$nextassessment->assessment_status = 1;
			$nextassessment->user_id = Auth::user()->user_id;
			$nextassessment->save();

			$user = DB::table('users')->where('user_id', Auth::user()->user_id)->first();
			
			$pros = DB::table('sales_pipeline')->where('id', $request['pros_id'])->first();
			
			Toastr::success("<b>Incident Record Added Successfully<br/>Next Assessment Date is ".$request['next_assessment_date']."<br/>for ".$pros->pros_name."<br/> set by ".$user->firstname." ".$user->middlename." ".$user->lastname."</b>");		
		}else{
			Toastr::success("Incident Record Added Successfully !!");
		}		
		
		return redirect('/injury');
	}
	
	public function add_prospect_record($stage, $id){
		
		$leads = DB::table('leads')->get();
		$name = DB::table('sales_pipeline')->where('id', $id)->first();
		return view('crm.add_prospect_record', compact('stage', 'leads', 'id', 'name'));
	}
	
	public function new_records_pros_add(Request $request){
		// dd($request['sales_stage']);
		$marketing_id = Auth::user()->user_id;
		
// 		$j = DB::table('sales_pipeline')->where('id', $request['pipeline_id'])->update(['marketing_id' => $marketing_id]);
		
		$j = DB::table('stage_pipeline')->where('pipeline_id', $request['pipeline_id'])->update(['status' => 0]);
		
		$sales = new stage();		
		$sales->lead_id = $request['lead_id'];
		$sales->sales_stage = $request['sales_stage'];
		$sales->date = date('Y/m/d');
		$sales->pipeline_id = $request['pipeline_id'];
		$sales->status = 1;
		$sales->notes = $request['notes'];
		$sales->moc = $request['moc'];		
		$sales->save();
		$k = DB::table('sales_pipeline')->where('id', $request['pipeline_id'])
		->update(['marketing_id' => $marketing_id,'stage' => $request['sales_stage']]);
		
		if($request['appointment_date'] != NULL){
			$appointment = new Appointment();
			$appointment->pros_id = $request['pipeline_id'];
			$appointment->appointment_date = $request['appointment_date'];
			$appointment->appointment_time = $request['appointment_time'];
			$appointment->user_id = Auth::user()->user_id;
			$appointment->status = 1;	
			$appointment->save();
		}
		if($request['sales_stage']=='Lease-Signing'){
			$new_doc = new LegalDocUpload();		
			
		$file = $request->file('doc_file');    
		       
		$fileName = $file->getClientOriginalName();
		$fileName = uniqid().$fileName;
		$fileType = substr($fileName, -4);
		$fileType = strtolower($fileType);
		if($fileType ==".jpg" || $fileType =="jpeg" || $fileType ==".png" || $fileType ==".gif" || $fileType =="tiff" || $fileType ==".bmp" || $fileType ==".pdf" || $fileType ==".odf" || $fileType ==".doc" || $fileType =="docx"){
			$fileSize = $file->getClientSize();
			if($fileSize>5242880){
				Toastr::warning("You can not upload file more than 5MB!");
			}else{
				$destinationPath = public_path().'/legal_doc/';	

				$new_doc->pros_id = $request['pros_id'];
				$file->move($destinationPath,$fileName);
				$new_doc->doc_name = $request['doc_name'];
				$new_doc->doc_file = $fileName ;
				$new_doc->file_type = $fileType ;
				$new_doc->user_id = Auth::user()->user_id;
				$new_doc->facility_id = Auth::user()->facility_id;
				$new_doc->upload_date = date('Y/m/d');
				$new_doc->save();
				Toastr::success("File Uploaded Successfully !!");
			}	
		}else{
				Toastr::warning("Oops ! unsupported file type.");
		}

		}
		if($request['sales_stage']=='MoveIn'){
			Toastr::success("Move In Completed !!<br/> Add Personal Details");
			return redirect('view_records/'.$request['pipeline_id']);
		}else{
			Toastr::success("Sales Stages Update Successfully !!");
			return redirect('view_records/'.$request['pipeline_id']);
		}		
    }

	public function file_upload(Request $request){		
		$fileupload = new FileUpload();		
			
		$file = $request->file('audio');            
		$fileName = $file->getClientOriginalName();
		$fileName = uniqid().$fileName;

		$fileSize = $file->getClientSize();
		if($fileSize>20971520){
			Toastr::danger("You Can not Upload More Than File Size of 20MB !!");
			return redirect('upload_file/'.$request['pros_id']);
		}else{
			$destinationPath = public_path().'/audio/';	

			$fileupload->pros_id = $request['pros_id'];
			$file->move($destinationPath,$fileName);
			$fileupload->audio = $fileName ;
			$fileupload->user_id = Auth::user()->user_id;
			$fileupload->facility_id = Auth::user()->facility_id;
			$fileupload->upload_date = date('Y/m/d');
			$fileupload->save();
			Toastr::success("File Uploaded Successfully !!");
			return redirect('upload_file/'.$request['pros_id']);
		}	
    }
	
	public function inactive_member($user_id){
		$j = DB::table('users')->where('user_id', $user_id)->update(['status' => 0]);
		Toastr::success("Status has been changed Successfully !!");
		return redirect('all_member_list');
	}
	
	public function active_member($user_id){
		$j = DB::table('users')->where('user_id', $user_id)->update(['status' => 1]);
		Toastr::success("Status has been changed Successfully !!");
		return redirect('all_member_list');
	}
	
	public function reports_pros($pros_id){
		$reports = DB::table('sales_pipeline')->where([['stage', 'Inquiery'], ['marketing_id', '!=', NULL], ['id', $pros_id]])->get();
		$reports_all = DB::table('sales_pipeline')->where([['stage', 'Inquiery'], ['marketing_id', '!=', NULL]])->get();
		return view('crm.inquery_reports_pros', compact('reports','reports_all'));
	}
	
	/*public function select_stage_pros($pros_id){			
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_stage_search_view', compact('crms', 'prospectives'));
    }*/
    
    public function select_stage_pros($pros_id){			
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_stage_search_view', compact('crms', 'prospectives'));
    }
    
    public function select_stage_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_stage_search_view', compact('crms', 'prospectives'));
    }


	
	/*public function select_stage_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('crm.pipeline_stage_search_view', compact('crms', 'prospectives'));
    }*/

	public function get_resident_list(){
		$medicines = DB::table('sales_pipeline')->groupBy('pros_name')->where('facility_id', Auth::user()->facility_id)->where('stage','!=',"MoveIn")->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->pros_name;
		}			
		return $countries;
	}
	public function get_movein_list(){
		$medicines = DB::table('sales_pipeline')->groupBy('pros_name')->where('facility_id', Auth::user()->facility_id)->where('stage',"MoveIn")->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->pros_name;
		}			
		return $countries;
	}
	public function get_resident_email_list(){
		$medicines = DB::table('change_pross_record')->groupBy('email_p')->where([['facility_id', Auth::user()->facility_id], ['status', 1]])->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->email_p;
		}		
		return $countries;
	}
	
	public function get_resident_contact_list(){
		$medicines = DB::table('change_pross_record')->groupBy('contact_person')->where([['facility_id', Auth::user()->facility_id], ['status', 1]])->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->contact_person;
		}		
		return $countries;
	}
	
	public function search_appointment($pros_id){
		$residents = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		foreach ($residents as $row){
			$appointments = DB::table('appointment')
						->where('appointment.status', 1)
						->Join('sales_pipeline', 'appointment.pros_id', '=', 'sales_pipeline.id')
						->where('sales_pipeline.facility_id', Auth::user()->facility_id)
						->where('sales_pipeline.id', $row->id)
						->select('sales_pipeline.pros_name', 'sales_pipeline.service_image', 'sales_pipeline.id', 'appointment.appoiuntment_id', 'appointment.pros_id', 'appointment.appointment_date', 'appointment.appointment_time');
    
		$appointments = $appointments->get();
		return view('crm.search_appointment', compact('appointments'));
		}
    }

	
}



