<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProspectiveBasic;
use App\crm;
use App\stage;
use App\User;
use App\Change_Records;
use App\Appointment;
use App\PersonalDetails;
use App\Insurance;
use App\EmergencyContact;
use App\Physician;
use App\Dentisit;
use App\OtherMedicalInfo;
use DB, Auth, App;
use Kamaln7\Toastr\Facades\Toastr;

class PersonalDetailsController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function add_personal_records(Request $request){
		
		$j = DB::table('personal_details')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$personaldetail = new PersonalDetails();
		$personaldetail->pros_id = $request['pros_id'];
		$personaldetail->gender = $request['gender'];
		$personaldetail->dob = $request['dob'];
		$personaldetail->pob = $request['pob'];
		$personaldetail->age = $request['age'];
		$personaldetail->ms = $request['ms'];
		$personaldetail->spouse_name = $request['spouse_name'];
		$personaldetail->religion = $request['religion'];
		$personaldetail->comment = $request['comment'];
		$personaldetail->status = 1;
		$personaldetail->user_id = Auth::user()->user_id;		
		$personaldetail->pd_date = date('Y/m/d');
		$personaldetail->save();		
		
		Toastr::success("Personal Details Added Successfully !!");
		return redirect('personal_insurance/'.$request['pros_id']);		
    }
	
	public function add_insurance(Request $request){
		
		$j = DB::table('insurance')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$insurance = new Insurance();
		$insurance->pros_id = $request['pros_id'];
		$insurance->ss = $request['ss'];
		$insurance->medicare = $request['medicare'];
		$insurance->supplemental_insurance_name = $request['supplemental_insurance_name'];
		$insurance->policy = $request['policy'];
		$insurance->medicaid = $request['medicaid'];
		$insurance->personal_responcible = $request['personal_responcible'];
		$insurance->name = $request['name'];
		$insurance->phone = $request['phone'];
		$insurance->address_1 = $request['address_1'];
		$insurance->address_2 = $request['address_2'];
		$insurance->city = $request['city'];
		$insurance->state_id = $request['state_id'];
		$insurance->zip = $request['zip'];
		$insurance->case_manager = $request['case_manager'];
		$insurance->manager_phone = $request['manager_phone'];
		$insurance->status = 1;
		$insurance->user_id = Auth::user()->user_id;		
		$insurance->inc_date = date('Y/m/d');
		$insurance->save();		
		
		Toastr::success("Insurance Record Added Successfully !!");
		return redirect('contact/'.$request['pros_id']);			
    }
	
	public function add_emergency(Request $request){
		
		$j = DB::table('emergency_contact')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$emergency = new EmergencyContact();
		$emergency->pros_id = $request['pros_id'];
		$emergency->name_1 = $request['name_1'];
		$emergency->address_1 = $request['address_1'];
		$emergency->address_2 = $request['address_2'];
		$emergency->city_1 = $request['city_1'];
		$emergency->home_phn_1 = $request['home_phn_1'];
		$emergency->work_phone_1 = $request['work_phone_1'];
		$emergency->name_2 = $request['name_2'];
		$emergency->address_1_1 = $request['address_1_1'];
		$emergency->address_2_2 = $request['address_2_2'];
		$emergency->city_2 = $request['city_2'];
		$emergency->home_phn_2 = $request['home_phn_2'];
		$emergency->work_phone_2 = $request['work_phone_2'];
		$emergency->poa = $request['poa'];
		$emergency->poa_relation = $request['poa_relation'];
		$emergency->poa_phone = $request['poa_phone'];
		$emergency->guardian = $request['guardian'];
		$emergency->guardian_phone = $request['guardian_phone'];
		$emergency->guardian_address_1 = $request['guardian_address_1'];
		$emergency->guardian_address_2 = $request['guardian_address_2'];
		$emergency->guardian_city = $request['guardian_city'];
		$emergency->user_id = Auth::user()->user_id;
		$emergency->status = 1;				
		$emergency->emergency_date = date('Y/m/d');
		$emergency->save();		
		
		Toastr::success("Emergency Contact Added Successfully !!");
		return redirect('physician/'.$request['pros_id']);	
    }
	
	public function add_physician(Request $request){
		
		$j = DB::table('physician')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$physician = new Physician();
		$physician->pros_id = $request['pros_id'];
		$physician->primary_physician = $request['primary_physician'];
		$physician->pry_phone = $request['pry_phone'];
		$physician->pry_add_1 = $request['pry_add_1'];
		$physician->pry_add_2 = $request['pry_add_2'];
		$physician->pry_city = $request['pry_city'];
		$physician->spc_physician = $request['spc_physician'];
		$physician->spc_type = $request['spc_type'];
		$physician->spc_phone = $request['spc_phone'];
		$physician->user_id = Auth::user()->user_id;
		$physician->status = 1;				
		$physician->phy_date = date('Y/m/d');
		$physician->save();		
		
		Toastr::success("Physician Record Added Successfully !!");
		return redirect('dentist/'.$request['pros_id']);		
    }
	
	public function add_dentist(Request $request){
		
		$j = DB::table('dentist')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$dentisit = new Dentisit();
		$dentisit->pros_id = $request['pros_id'];
		$dentisit->dentist_name = $request['dentist_name'];
		$dentisit->dentist_phone = $request['dentist_phone'];
		$dentisit->dentist_address_1 = $request['dentist_address_1'];
		$dentisit->dentist_address = $request['dentist_address'];
		$dentisit->dentist_city = $request['dentist_city'];
		$dentisit->user_id = Auth::user()->user_id;
		$dentisit->status = 1;				
		$dentisit->dentist_date = date('Y/m/d');
		$dentisit->save();		
		
		Toastr::success("Dentist Record Added Successfully !!");
		return redirect('funeral/'.$request['pros_id']);	
    }
	
	public function add_others(Request $request){
		
		$j = DB::table('other_medical_info')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		
		$othermedicalinfo = new OtherMedicalInfo();
		$othermedicalinfo->pros_id = $request['pros_id'];
		$othermedicalinfo->funeral_home = $request['funeral_home'];
		$othermedicalinfo->funeral_phone = $request['funeral_phone'];
		$othermedicalinfo->hospital = $request['hospital'];
		$othermedicalinfo->hospital_phone = $request['hospital_phone'];
		$othermedicalinfo->pharmacy = $request['pharmacy'];
		$othermedicalinfo->pharmacy_phone = $request['pharmacy_phone'];
		$othermedicalinfo->allergies = $request['allergies'];
		$othermedicalinfo->diagnosis = $request['diagnosis'];
		$othermedicalinfo->cpr_status = $request['cpr_status'];
		$othermedicalinfo->user_id = Auth::user()->user_id;
		$othermedicalinfo->status = 1;				
		$othermedicalinfo->medical_date = date('Y/m/d');
		$othermedicalinfo->save();		
		
		$name = DB::table('sales_pipeline')->where('id', $request['pros_id'])->first();
		
		$data = [
			'pharmacy_name' => $request['pharmacy'],
			'pharmacy_phone' => $request['pharmacy_phone'],
			'facility_id' => Auth::user()->facility_id
		];
		
		$add_pharmacy = DB::table('facility_pharmacy')->insert($data);
		
		Toastr::success("Record Added Successfully !!<br/> Book Room for <b>".$name->pros_name."</b>");
		return redirect('book_room/'.$request['pros_id']);		
    }
	
	public function personal_insurance($id){
		return view('crm.personal_profile', compact('id'));
	}
	
	public function contact($id){
		return view('crm.contact', compact('id'));
	}
	
	public function physician($id){
		return view('crm.physician', compact('id'));
	}
	
	public function dentist($id){
		return view('crm.dentist', compact('id'));
	}
	
	public function funeral($id){
		return view('crm.funeral', compact('id'));
	}
	
}
