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
		//$serviceplans = ServicePlan::all()->where('service_plan_status', 1);
		$val = $request['language'];
		App::setlocale($val);
		$serviceplans = DB::table('service_plan')->where([['service_plan_status', 1],['facility_id', Auth::user()->facility_id]])->paginate(8);
        return view('admin.plan_view', compact('serviceplans'));
    }
	
	public function new_plan_add_form(Request $request){
		$val = $request['language'];
		App::setlocale($val);
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
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage',"MoveIn"]])->paginate(6);
		return view('admin.res_plan_view', compact('crms'));
    }
	
// 	public function view_plan_details(Request $request, $id){
// 	    $val = $request['language'];
// 		App::setlocale($val);
// 		$reports = DB::table('care_plan')->where([['care_plan.assessment_id', $id], ['care_plan.care_plan_status', 1]])
//                     ->Join('resident_assessment', 'care_plan.assessment_id', '=', 'resident_assessment.pros_id')
// 					->where([['resident_assessment.pros_id', $id], ['resident_assessment.assessment_status', 1]])
// 					->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
//                     ->select('care_plan.*','resident_assessment.*', 'assessment_entry.assessment_form_name')
// 					->get();
// 		//return $reports;			
// 		$totalpointcount = DB::table('care_plan')
// 						->where([['care_plan.assessment_id', $id], ['care_plan.care_plan_status', 1]])
// 						->select('care_plan.care_plan_detail', 'care_plan.total_point')
// 						->first();
						
// 		$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
// 						->where([['pros_id', $id],['assessment_status', 1]])
// 						->first();	
// 		$total_score = 	$initial->score;
// 		if(!$reports){
// 			$plan = DB::table('service_plan')->where('to_range', '>=', $totalpointcount->total_point)->orderBy('to_range', 'ASC')->first();
		
// 			if($plan){
// 				$j = DB::table('pros_service')->where('pros_id', $id)->update(['status' => 0]);
				
// 				$data = [
// 					'pros_id' => $id,
// 					'service_plan_id' => $plan->service_plan_id,
// 					'status' => 1
// 				];
				
// 				$i = DB::table('pros_service')->insert($data);
// 			}
// 		}
		
		
// 		//dd($total_score);
// 		return view('admin.resident_service_plan_details', compact('reports', 'totalpointcount', 'total_score'));
// 	}
	
	// Bikram changes
	
	public function plan_edit($plan_id){
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
    
//     public function view_plan_details($id, $period){
// 		if($period=='Initial'){
// 			$period_array = ['Initial'];
// 		}elseif($period=='Monthly'){
// 			$period_array = ['Initial', 'Monthly'];
// 		}elseif($period=='Quarterly'){
// 			$period_array = ['Initial', 'Monthly', 'Quarterly'];
// 		}elseif($period=='Half-Yearly'){
// 			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly'];
// 		}elseif($period=='Annual'){
// 			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual'];
// 		}else{
// 			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual', 'Adhoc'];
// 		}		
		
// 		$reports = DB::table('care_plan')->where([['care_plan.assessment_id', $id], ['care_plan.care_plan_status', 1]])
//                     ->Join('resident_assessment', 'care_plan.assessment_id', '=', 'resident_assessment.pros_id')
// 					->where([['resident_assessment.pros_id', $id], ['resident_assessment.assessment_status', 1]])
// 					->whereIn('assessment_period', $period_array)
// 					->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
// 					->select('care_plan.*','resident_assessment.*', 'assessment_entry.assessment_form_name')
// 					->get();
// 					dd($reports);
// 		$totalpointcount = DB::table('care_plan')
// 						->where([['care_plan.assessment_id', $id], ['care_plan.care_plan_status', 1],['care_plan.period',$period]])
// 						->select('care_plan.care_plan_detail', 'care_plan.total_point')
// 						->first();
// 		$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
// 						->where([['pros_id', $id],['assessment_status', 1]])
// 						->whereIn('assessment_period', $period_array)
// 						->first();
// 				// 		dd($initial);
// 		$total_score = 	$initial->score;
// 		if(!$reports){
// 			$plan = DB::table('service_plan')->where('to_range', '>=', $totalpointcount->total_point)->orderBy('to_range', 'ASC')->first();		
// 			if($plan){
// 				$j = DB::table('pros_service')->where('pros_id', $id)->update(['status' => 0]);
				
// 				$data = [
// 					'pros_id' => $id,
// 					'service_plan_id' => $plan->service_plan_id,
// 					'status' => 1
// 				];				
// 				$i = DB::table('pros_service')->insert($data);
// 			}
// 		}
// 		return view('admin.resident_service_plan_details', compact('reports', 'totalpointcount', 'total_score', 'id', 'period'));
// 	}
    
   
    public function view_plan_details($id, $cp_id){

		$reports= DB::table('resident_assessment')->where([['assessment_status',1],['resident_assessment.careplan_id','=',$cp_id]])
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

	
	public function service_plan_period($id){
		$query = DB::table('pros_service')->where([['pros_id',$id],['status',1]])
				->join('service_plan','pros_service.service_plan_id','service_plan.service_plan_id')
				->first();
		$all_care = DB::table('care_plan')->where([['pros_id',$id],['date','!=',null]])->orderby('care_plan_id','desc')->get();
		return view('admin.service_plan_period', compact('all_care', 'id','query'));
	}

}
