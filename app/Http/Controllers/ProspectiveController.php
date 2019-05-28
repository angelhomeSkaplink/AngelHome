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
use App\MedicationIncident;
use App\MedicationIncidentAction;
use DB, Auth, Validator, App;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;

class ProspectiveController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    	
	public function prospective(Request $request){	
	    
		App::setlocale(session('locale'));
		$prospectives = ProspectiveBasic::all();
        return view('receptionist.pross_view', compact('prospectives'));
    }
	
	public function pross_add(Request $request){
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage','!=',"MoveIn")->orderby('id','DESC')->paginate(6);
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->where('stage','!=',"MoveIn")->orderby('id','DESC')->get();
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
	    
		App::setlocale(session('locale'));
        return view('crm.new_pross_add');
    }
	
	public function new_prospective(Request $request){
		$name = implode(",",$request['pros_name']);
		$contact_person = implode(",",$request['contact_person']);
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
		$pross->contact_person = $contact_person;
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
		$prosspect->contact_person = $contact_person;
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
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
		$leads = DB::table('leads')->get();
        $row = DB::table('sales_pipeline')->where('id', $pipeline_id)->first();
		$details = DB::table('change_pross_record')->where([['pros_id', $pipeline_id],['status', 1]])->first();
		$stages = DB::table('stage_pipeline')->where('pipeline_id', $pipeline_id)->orderBy('stage_pipeline_id', 'DESC')->get();
		
		return view('crm.view_records', compact('row', 'stages', 'details','leads'));
    }
	
	public function sales_stage_pipeline(Request $request){	
	    
		App::setlocale(session('locale'));
// 		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
// 		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=',"MoveIn"]])->orderby('id','DESC')->paginate(6);
		$prospectives = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=',"MoveIn"]])->orderby('id','DESC')->get();
        return view('crm.pipeline_stage_view', compact('crms', 'prospectives'));
    }
	
	public function personal_details(Request $request){	
	    
		App::setlocale(session('locale'));
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
	
	public function details(Request $request,$id){	
        return view('crm.personal_details_add_form', compact('id'));
    }
	
	public function change_records(Request $request, $pipeline_id){
	    
		App::setlocale(session('locale'));
//         $row = DB::table('change_pross_record')->where([['pros_id', $pipeline_id], ['status', 1]])->first();
// 		return view('crm.change_records', compact('row'));
        
        $row = DB::table('sales_pipeline')->where('id', $pipeline_id)->first();
        $facility = DB::table('facility')->where('id',$row->facility_id)->first();
		return view('crm.change_records', compact('row','facility'));
    }
	
	public function change_pross_records(Request $request){
		$pros_name = implode(",",$request['pros_name']);
		$up_prosName = DB::table('sales_pipeline')->where('id',$request['pros_id'])->update(['pros_name' => $pros_name]);
		
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
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
		$reports = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=','MoveIn'], ['marketing_id', '!=', NULL]])->orderby('id','DESC')->paginate(6);
		return view('crm.inquery_reports', compact('reports'));
    }
	
	public function inquiery_reports(Request $request){
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
        $appointments = DB::table('appointment')
						->where('appointment.status', 1)
						->Join('sales_pipeline', 'appointment.pros_id', '=', 'sales_pipeline.id')
						->where('sales_pipeline.facility_id', Auth::user()->facility_id)
						->select('sales_pipeline.pros_name', 'sales_pipeline.service_image', 'sales_pipeline.id', 'appointment.appoiuntment_id', 'appointment.pros_id', 'appointment.appointment_date', 'appointment.appointment_time');
    
		$appointments = $appointments->paginate(6);
		return view('crm.appointment_view', compact('appointments')); 
	}	
	
	public function reschedule(Request $request, $appoiuntment_id){
	    
		App::setlocale(session('locale'));
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
        
		App::setlocale(session('locale'));
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
		App::setlocale(session('locale'));
		$prospects = crm::where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->get();
		// dd($prospects);
		$event_codes = DB::table('event_code')->get();
		$location_codes = DB::table('location_code')->get();
		$injury_codes = DB::table('injury_code')->get();
		$action_takens = DB::table('action_taken')->get();
		$cp_updates = DB::table('cp_update')->get();
        // return view('injury_details.injury_record_entry_form', compact('event_codes', 'prospects', 'location_codes', 'injury_codes', 'action_takens', 'cp_updates'));
        return view('injury_details.injury_incident_view', compact('prospects'));
    }
    
    public function injury_entry_form(Request $request, $pros_id, $incident_id){
        App::setlocale(session('locale'));
		$prospects = crm::where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->get();
		$event_codes = DB::table('event_code')->get();
		$location_codes = DB::table('location_code')->get();
		$injury_codes = DB::table('injury_code')->get();
		$action_takens = DB::table('action_taken')->get();
		$cp_updates = DB::table('cp_update')->get();
		
		$data = new ResidentInjury();
		if($incident_id != 0){ 
		    $incident_data = DB::table('resident_injury')->where([['resident_injury_id', $incident_id],['pros_id', $pros_id],['injury_status', 1]])->first();
		  //  dd($incident_data);
		    $data->med_record_no = $incident_data->med_record_no;
		    $data->injury_date = $incident_data->injury_date;
		    $data->injury_time = $incident_data->injury_time;
		    $data->event_code  = $incident_data->event_code ;
		    $data->location_code  = $incident_data->location_code ;
		    $data->injury_code  = $incident_data->injury_code ;
		    $data->injury_brief_details  = $incident_data->injury_brief_details ;
		    $data->person_involve  = $incident_data->person_involve ;
		    $data->attachment  = $incident_data->attachment ;
		    $data->rulled_out  = $incident_data->rulled_out ;
		    $data->how_rulled_out  = $incident_data->how_rulled_out ;
		    $data->aps_notified  = $incident_data->aps_notified ;
		    $data->action_taken  = $incident_data->action_taken ;
		    $data->action_taken_nurse  = $incident_data->action_taken_nurse ;
		    $data->cp_update  = $incident_data->cp_update ;
		    $data->cp_upload_nurse  = $incident_data->cp_upload_nurse ;
		    $data->check_notice  = $incident_data->check_notice ;
		    $data->check_notice1  = $incident_data->check_notice1 ;
		    $data->check_notice2  = $incident_data->check_notice2 ;
		    $data->check_notice3  = $incident_data->check_notice3 ;
		    $data->check_notice4  = $incident_data->check_notice4 ;
		    $data->check_notice5  = $incident_data->check_notice5 ;
		    $data->check_notice6  = $incident_data->check_notice6 ;
		    $data->check_notice7  = $incident_data->check_notice7 ;
		    $data->check_notice8  = $incident_data->check_notice8 ;
		    $data->fall_time  = $incident_data->fall_time ;
		    $data->where_found  = $incident_data->where_found ;
		    $data->bp_lying  = $incident_data->bp_lying ;
		    $data->bp_sitting  = $incident_data->bp_sitting ;
		    $data->puls  = $incident_data->puls ;
		    $data->resp  = $incident_data->resp ;
		    $data->diabetic  = $incident_data->diabetic ;
		    $data->blood_suger  = $incident_data->blood_suger ;
		    $data->incontinence  = $incident_data->incontinence ;
		    $data->use_of_wc  = $incident_data->use_of_wc ;
		    $data->last_meal_time  = $incident_data->last_meal_time ;
		    $data->type_of_location_of_assist_device  = $incident_data->type_of_location_of_assist_device ;
		    $data->glasses  = $incident_data->glasses ;
		    $data->hearing_aide  = $incident_data->hearing_aide ;
		    $data->floor_clear  = $incident_data->floor_clear ;
		    $data->floor_clear_specific  = $incident_data->floor_clear_specific ;
		    $data->lighting_other  = $incident_data->lighting_other ;
		    $data->last_toilet  = $incident_data->last_toilet ;
		    $data->shoes  = $incident_data->shoes ;
		    $data->socks  = $incident_data->socks ;
		    $data->fall_activity  = $incident_data->fall_activity ;
		    $data->use_of_call_light  = $incident_data->use_of_call_light ;
		    $data->call_light_within_use  = $incident_data->call_light_within_use ;
		    $data->bedrail_position  = $incident_data->bedrail_position ;
		    $data->brakes_on_wc  = $incident_data->brakes_on_wc ;
		    $data->ambulatory  = $incident_data->ambulatory ;
		    $data->alarm_bed  = $incident_data->alarm_bed ;
		    $data->alarm_chair  = $incident_data->alarm_chair ;
		    $data->alarm_other  = $incident_data->alarm_other ;
		    $data->resident_confused  = $incident_data->resident_confused ;
		    $data->psychotropic_med  = $incident_data->psychotropic_med ;
		    $data->psychotropic_med_time  = $incident_data->psychotropic_med_time ;
		    $data->bed_brakes  = $incident_data->bed_brakes ;
		    $data->other_info  = $incident_data->other_info ;
		    $data->environmental_issues_specify  = $incident_data->environmental_issues_specify ;
		    $data->resident_location_when_found  = $incident_data->resident_location_when_found ;
		    $data->visitor_prior_8_hours  = $incident_data->visitor_prior_8_hours ;
		    $data->visitor_prior_8_hours_who  = $incident_data->visitor_prior_8_hours_who ;
		    $data->new_staff_assigned  = $incident_data->new_staff_assigned ;
		    $data->new_staff_assigned_who  = $incident_data->new_staff_assigned_who ;
		    $data->behavior_issues_past_72_hours  = $incident_data->behavior_issues_past_72_hours ;
		    $data->behavior_issues_past_72_hours_yes  = $incident_data->behavior_issues_past_72_hours_yes ;
		    $data->bedrail_position_skin  = $incident_data->bedrail_position_skin ;
		    $data->resident_confused_skin  = $incident_data->resident_confused_skin ;
		    $data->on_prednisone  = $incident_data->on_prednisone ;
		    $data->other_pertinent_info  = $incident_data->other_pertinent_info ;
		    $data->equipment_issues  = $incident_data->equipment_issues ;
		    $data->equipment_issues_specify  = $incident_data->equipment_issues_specify ;
		    $data->activity_at_time_of_bruiseskin_tear  = $incident_data->activity_at_time_of_bruiseskin_tear ;
		    $data->transfer_from_bed_or_chair  = $incident_data->transfer_from_bed_or_chair ;
		    $data->recent_fall_past_72_hours_skin  = $incident_data->recent_fall_past_72_hours_skin ;
		    $data->seated_next_to  = $incident_data->seated_next_to ;
		    $data->seated_next_to_person  = $incident_data->seated_next_to_person ;
		    $data->ambulatory_skin  = $incident_data->ambulatory_skin ;
		    $data->on_coumadin  = $incident_data->on_coumadin ;
		    $data->other_pertinent_info_skin  = $incident_data->other_pertinent_info_skin ;
		    $data->behaviour_environmental_issues  = $incident_data->behaviour_environmental_issues ;
		    $data->behaviour_environmental_issues_specify  = $incident_data->behaviour_environmental_issues_specify ;
		    $data->assessed_for_pain  = $incident_data->assessed_for_pain ;
		    $data->assessed_for_pain_medicated  = $incident_data->assessed_for_pain_medicated ;
		    $data->urine_dip_results  = $incident_data->urine_dip_results ;
		    $data->activity_at_time_of_behavior  = $incident_data->activity_at_time_of_behavior ;
		    $data->unfamiliar_care_giver  = $incident_data->unfamiliar_care_giver ;
		    $data->care_giver_name  = $incident_data->care_giver_name ;
		    $data->other_pertinent_info_behaviour  = $incident_data->other_pertinent_info_behaviour ;
		    $data->investigation  = $incident_data->investigation ;
		    $data->user_id  = $incident_data->user_id ;
		    $data->injury_entry_date  = $incident_data->injury_entry_date ;
		    
		}
		
        return view('injury_details.injury_record_entry_form', compact('data','incident_id', 'event_codes', 'prospects', 'pros_id', 'location_codes', 'injury_codes', 'action_takens', 'cp_updates'));
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
	
	public function injury_history($pros_id){
	    $history_data = DB::table('resident_injury')->where([['pros_id', $pros_id],['injury_status', 1]])->get();
	   // dd($history_data);
	    return view('injury_details.resident_injury_incident_history', compact('pros_id','history_data'));
	}
	
	public function add_prospect_record(Request $request,$stage, $id){
		
		App::setlocale(session('locale'));
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
	
	public function reports_pros(Request $request,$pros_id){
	    
		App::setlocale(session('locale'));
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
		$id = array();
		foreach($medicines as $row) {
			$countries[] = $row->pros_name;
			$id[] = $row->id;
		}			
		return $id;
	}
	public function get_movein_list(){
		$medicines = DB::table('sales_pipeline')->groupBy('pros_name')->where('facility_id', Auth::user()->facility_id)->where('stage',"MoveIn")->get();
		$countries = array();
		foreach($medicines as $row) {
			$name = explode(",",$row->pros_name);
			$name = $name[0]." ".$name[1]." ".$name[2];
			$obj = new \stdClass();
			$obj->id =  $row->id;
			$obj->name =  $name;
			$countries[] = $obj;
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
	
	public function search_appointment(Request $request,$pros_id){
	    
		App::setlocale(session('locale'));
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
    
   
    
    public function medication_incident_report(Request $request){
        
		App::setlocale(session('locale'));
      $prospects = crm::where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->get();
      $incidents = DB::table('med_incident_record')->where([['med_incident_record.facility_id',Auth::user()->facility_id],['med_incident_record.status',1],['med_incident_record.action',0]])
                    ->join('sales_pipeline','sales_pipeline.id','=','med_incident_record.pros_id')
                    ->get();
      // dd($prospects);
      $facility_desig = DB::table('staff_position')->where('facility_id', Auth::user()->facility_id)->get();
      $employee = DB::table('users')->where([['users.facility_id', Auth::user()->facility_id],['users.status',1]])
  						->join('staff_position','staff_position.staff_position_id','=','users.staff_position_id')
  						->get();
      return view('injury_details.medication_incident_report',compact('prospects','incidents','employee'));
    }

    public function medication_incident_resident_report(Request $request,$pros_id){
      // dd($pros_id);
      
	  App::setlocale(session('locale'));
      $employee = DB::table('users')->where([['users.facility_id', Auth::user()->facility_id],['users.status',1]])
  						->join('staff_position','staff_position.staff_position_id','=','users.staff_position_id')
  						->get();
      return view('injury_details.medication_incident_resident_report', compact('pros_id','employee'));
    }

    public function medication_incident_resident_history(Request $request,$pros_id){
        
		App::setlocale(session('locale'));
      $history = DB::table('med_incident_record')->where([['med_incident_record.pros_id',$pros_id],['med_incident_record.facility_id',Auth::user()->facility_id],['med_incident_record.status',1]])
                  ->join('users','users.user_id','=','med_incident_record.err_made_emp')
                  ->join('staff_position','staff_position.staff_position_id','=','users.staff_position_id')
                  ->where([['staff_position.facility_id',Auth::user()->facility_id],['staff_position.status',1]])
                  ->get();

      // dd($history);
      return view('injury_details.medication_incident_resident_history',compact('pros_id','history'));
    }

    public function medication_incident_entry(Request $request){
      // dd($request);
      $new_incident = new MedicationIncident();
      $new_incident->pros_id = $request['pros_id'];
      $new_incident->err_made_emp = $request['error_done_by'];
      // $new_incident->emp_role = $request['emp_role'];
      $new_incident->dt_incident = $request['incident_date'];
      $new_incident->shift_incident = $request['shift'];
      $new_incident->time_incident = $request['incident_time'];
      $new_incident->dt_recording = date('Y/m/d');
      $new_incident->err_desc = $request['error_desc'];
      $new_incident->err_contribution = $request['error_contrib'];
      $new_incident->dt_physcn_infrmd = $request['physician_informed_date'];
      $new_incident->tm_physcn_infrmd = $request['physician_informed_time'];
      $new_incident->resident_infrmd = $request['resident_informed'];
      $new_incident->physcn_response = $request['physician_response'];
      $new_incident->physcn_action = $request['action_taken'];
      $new_incident->resp_person_infrmd = $request['Res_party_informed'];
      $new_incident->direction_received = $request['direction_received'];
      $new_incident->user_err_entry = Auth::user()->user_id;
      $new_incident->facility_id = Auth::user()->facility_id;
      $new_incident->save();
      Toastr::success("Medication Incident Report Added Successfully !!");
      return redirect('medication_incident_resident_report/'.$request['pros_id']);
    }

    public function medication_incident_action(Request $request){
      // dd($request);
      $new_action = new MedicationIncidentAction();
      $new_action->med_incident_record_id = $request['incident_id'];
      $new_action->res_diagnosis = $request['resident_diagnosis'];
      $new_action->medication = $request['Medication'];
      $new_action->other_err = $request['other_err'];
      $new_action->scope_severity = $request['scope_severity'];
      $new_action->action_taken = $request['action_taken'];
      $new_action->prevention_step = $request['prevention_step'];
      $new_action->user_supervised = Auth::user()->user_id;
      $new_action->updated_datetime = date('Y/m/d', time());
      $new_action->status = 1;
      $new_action->save();

      $update_incident = DB::table('med_incident_record')->where('med_incident_record_id',$request['incident_id'])->update(['action' => 1]);
      Toastr::success("Medication Incident Action Report Saved Successfully !!");
      return redirect('medication_incident_report');
    }

	public function moveinResident(Request $request){
		$j = DB::table('sales_pipeline')->where('id',$request['pros_id'])
		->update(['stage' => "MoveIn", 'movein_date' => $request['moveinDate']]);
		Toastr::success("Succeccfully Moved in !!");
		return redirect('view_records/'.$request['pros_id']);
	}
	public function storeNextAssessmentDate(Request $request){
		$j = DB::table('next_assessment')->where([['pros_id',$request['pros_id']],['assessment_status',1]])->first();
		if($j){
			$update = DB::table('next_assessment')->where([['pros_id',$request['pros_id']],['assessment_status',1]])->update(['assessment_status' => 0]);
		}
		$next_save = new NextAssessment();
		$next_save->pros_id = $request['pros_id'];
		$next_save->next_assessment_date = $request['next_date'];
		$next_save->user_id = Auth::user()->user_id;
		$next_save->facility_id = Auth::user()->facility_id;
		$next_save->save();

		return redirect()->back();
	}
}



