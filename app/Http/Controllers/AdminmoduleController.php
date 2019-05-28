<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, App;
use App\ServicePlan;
use App\crm;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;

class AdminmoduleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function service_plan(Request $request){		
		
		App::setlocale(session('locale'));
		$serviceplans = DB::table('service_plan')->where([['service_plan_status', 1],['facility_id', Auth::user()->facility_id]])->paginate(8);
        return view('admin.plan_view', compact('serviceplans'));
    }
	
	public function new_plan_add_form(Request $request){
		
		App::setlocale(session('locale'));
        return view('admin.add_new_service_form');
    }
	
	public function add_new_service_plan(Request $request){        
		
		$service_plan = DB::table('service_plan')->where([['service_plan_name', $request['service_plan_name']], ['facility_id', Auth::user()->facility_id]])->first();
		if(count($service_plan)>0){
			$msg = "Service Plan Already Exists";
			Toastr::error("Service Plan Already Exists<br/> Choose a different name");
			return back();
		}else{
			$serviceplan = new ServicePlan();
			$serviceplan->service_plan_name = $request['service_plan_name'];
			$serviceplan->from_range = $request['from_range'];
			if($request['to_range'] == NULL){
				$serviceplan->to_range = 200000;
			}else{
				$serviceplan->to_range = $request['to_range'];
			}			
			$serviceplan->price = $request['price'];
			$serviceplan->facility_id = Auth::user()->facility_id;
			$serviceplan->service_plan_status = 1;
			$serviceplan->save();
			
			Toastr::success("Service Plan Added Successfully !!");
			return redirect('/service_plan');
		}
		//return redirect('new_plan_add_form')->with('msg', $msg);
    }
	
	public function resident_service_plan(Request $request){		
	    
		App::setlocale(session('locale'));
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage',"MoveIn"]])->paginate(6);
		return view('admin.res_plan_view', compact('crms'));
    }
	
	
	// Bikram changes
	
	public function plan_edit(Request $request,$plan_id){
	    
		App::setlocale(session('locale'));
		$plan = DB::table('service_plan')->where('service_plan_id', $plan_id)->first();
		return view('admin.plan_edit_form',compact('plan'));
	}
	
	public function update_plan(Request $request){
		if($request['to_range'] == NULL){
			$to_range = 200000;
		}
		else{
			$to_range = $request['to_range'];
		}
		$price = $request['price'];
		$from_range = $request['from_range'];
		$u = DB::table('service_plan')->where('service_plan_id', $request['plan_id'])
		->update(['from_range' => $from_range, 'to_range' => $to_range, 'price' => $price]);
		Toastr::success("Service Plan Updated Successfully !!");
		return redirect('/service_plan');
	}

	public function plan_delete($id){
		$u = DB::table('pros_service')->where('service_plan_id', $id)->first();
		
		if(count($u)>0){
			Toastr::error("Can not Delete.<br/>Service Plan is Used by Resident");	
		}else{
			$h = DB::table('service_plan')->where('service_plan_id', $id)->delete();
			Toastr::success("Service Plan Deleted Successfully");					
		}
		return redirect('/service_plan');
	}
	
	public function service_pros($pros_id){
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('admin.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function service_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('admin.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function service_pros_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('admin.pipeline_search_view', compact('crms', 'prospectives'));
    }
    public function view_plan_details(Request $request,$id, $cp_id){
        
		App::setlocale(session('locale'));
		$reports= DB::table('resident_assessment')->where([['assessment_status',1],['careplan_status',1],['resident_assessment.careplan_id','=',$cp_id]])
		->join('assessment_entry','resident_assessment.assessment_id','=','assessment_entry.assessment_id')
		->orderby('resident_assessment.assessment_date','dsc')
		->get();
		$total_score = 0;
		foreach($reports as $r){
			$total_score += $r->score;
		}
		$cp_data = DB::table('care_plan')->where('care_plan_id',$cp_id)->first();	
        $service_plan_id = DB::table('service_plan')
		->where([['facility_id',Auth::user()->facility_id],['from_range','<=',$cp_data->total_point],['to_range','>=',$cp_data->total_point]])
		->select('service_plan.service_plan_id')
		->value('service_plan_id');
		$service_plan = DB::table('service_plan')->where('service_plan_id',$service_plan_id)->first();
		return view('admin.resident_service_plan_details', compact('reports', 'total_score', 'cp_data', 'service_plan','id','period','total_score'));
	}

	
	public function service_plan_period(Request $request,$id){
	    
		App::setlocale(session('locale'));
		$query = DB::table('pros_service')->where([['pros_id',$id],['status',1]])
				->join('service_plan','pros_service.service_plan_id','service_plan.service_plan_id')
				->first();
		$all_care = DB::table('care_plan')->where([['pros_id',$id],['date','!=',null]])->orderby('care_plan_id','desc')->get();
		return view('admin.service_plan_period', compact('all_care', 'id','query'));
	}

}
