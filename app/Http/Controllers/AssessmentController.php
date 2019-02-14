<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB, Auth, View, App;
use App\Assessment;
use App\crm;
use App\FileUpload;
use App\AssessmentStore;
use App\CareplanSave;
use App\AssessmentCommonValue;
use App\NextAssessment;
use App\TaskHistory;
use App\ProsService;
use App\ResidentTemporaryAssessment;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;

class AssessmentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	public function saveAssessment(Request $request){
		
		$check = DB::table('assessment_entry')->where('assessment_id', $request['surveyId'])->first();
		if($check){
			
			$data =[
				'assessment_form_name' => $request['assessment_form_name'],
				'assessment_json' => $request['Json']
			];
			$update = DB::table('assessment_entry')->where('assessment_id', $request['surveyId'])->update($data);
		}else{
			$assessment = new Assessment();
			$assessment->assessment_id = $request['surveyId'];
			$assessment->assessment_form_name = $request['assessment_form_name'];
			$assessment->assessment_json = $request['Json'];
			$assessment->save();
		}
    }
	
	public function assessment_preview(Request $request){
		$val = $request['language'];
		App::setlocale($val);
// 		$assessments = Assessment::all();	
        $assessments = Assessment::orderby('sl no','asc')->get();
        return view('assessment.assessment_view', compact('assessments'));
    }
	
	public function assessment_edit_preview(){			
// 		$assessments = DB::table('assessment_entry')->orderby('sl no','asc')->get();
        $assessments = Assessment::orderby('sl no','asc')->get();
        return view('assessment.assessment_edit_preview', compact('assessments'));
    }
	
	public function assessment_edit($assessment_id){		
		$row = DB::table('assessment_entry')->where('assessment_id', $assessment_id)->first();
        return view('assessment.assessment_edit_view', compact('row'));
    }
	
	public function assessment_form_view($assessment_id){
		$assessment = Assessment::all()->where('assessment_id', $assessment_id)->first();
        return view('assessment.assessment_form_admin_view', compact('assessment'));
    }
	
	public function assessment(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->paginate(6);        
        return view('assessment.prospective_view', compact('crms'));
    }
	
	public function upload_file($id){		
		 return view('assessment.assessment_upload_view', compact('id'));
    }
	
	
	
	public function resident_assessment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage',"MoveIn"]])->paginate(6);
		$flag = "resident";
		return view('assessment.resident_assessment', compact('crms','flag'));
		
    }
    public function preadmin_resident_assessment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
// 		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id]])->paginate(6);
		//$crms = crm::all()->where('facility_id', Auth::user()->facility_id);
		return view('assessment.preadmin_resident_assessment', compact('crms'));
		
    }
     public function initial_assessment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage','!=',"MoveIn"]])->orderby('id','DESC')->paginate(6);
		$flag = "prospective";
		return view('assessment.resident_assessment', compact('crms','flag'));
		
    }
	
// 	public function select_assessments(Request $request, $id){
// 	    $val = $request['language'];
// 		App::setlocale($val);
// // 		$assessments = Assessment::all();	
//         $assessments = Assessment::orderby('sl no','asc')->get();
//         return view('assessment.select_assessment_view', compact('assessments', 'id'));
    // }
    public function all_assesment(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
        //$assessments = Assessment::all();	
        // $assessments = Assessment::where('sl no',0)->get();
		$assessments = Assessment::orderby('sl no','asc')->get();	
        return view('assessment.select_assessment_view', compact('assessments', 'id'));
    }
    public function preadmin_select_assessments(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
// 		$assessments = Assessment::all();	
        $assessments = Assessment::where('sl no',0)->get();
// 		$assessments = Assessment::orderby('sl no','asc')->get();	
        return view('assessment.select_assessment_view', compact('assessments', 'id'));
    }
	
// 	public function assessment_choose(Request $request, $assessment_id, $id){
// 	    $val = $request['language'];
// 		App::setlocale($val);
// 		$assessment = Assessment::all()->where('assessment_id', $assessment_id)->first();
// 		$common_point = DB::table('assessment_common_value')->where([['assessment_id', $assessment_id], ['current_status', 1]])->first();
// 		return view('assessment.assessment_form_view', compact('assessment', 'id', 'common_point'));
// 	}

    public function assessment_store(Request $request){	
		$data1 = $request['answer'];
        $answer_arr = array();
        foreach($data1 as $key => $value ){
            foreach($value as $k => $v){
                $obj = new \stdClass();
                $obj->DropDownId =  $k;
                $obj->answer =  $v;
                array_push($answer_arr,$obj);
            }
        } 
		$data = DB::table('assessment_entry')
            ->where('assessment_entry.assessment_id','5c0a218643f78')
            ->select('assessment_entry.*')
            ->first();
		$data1 = json_decode($data->assessment_json);
		$qs_arr = array();
        foreach($data1->pages as $d ){
            $obj = new \stdClass();
            $obj->PageName =  $d->name;
            $obj->DropDownId =  $d->elements[0]->name;
            array_push($qs_arr,$obj);
        }
		$result_arr = array();
        foreach($qs_arr as $q){
            foreach($answer_arr as $a){
                if($q->DropDownId == $a->DropDownId){
                    $obj = new \stdClass();
                    $obj->Page =  $q->PageName;
                    $obj->Ans =  $a->answer;
                    array_push($result_arr,$obj);
                }
            }
		}
	$chk_care = DB::table('care_plan')->where([['pros_id',$request['prosId']],['period',$request['assessment_period']]])->first();
	if(!$chk_care){
		// create new CARE PLAN
		$newCarePlan = new CareplanSave();
		$newCarePlan->pros_id = $request['prosId'];
		$newCarePlan->period = $request['assessment_period'];
		$newCarePlan->care_plan_detail = "not edited";
		$newCarePlan->total_point = $request['score'];
		
		$newCarePlan->user_id = Auth::user()->user_id;
		$newCarePlan->care_plan_status = 1;
		$newCarePlan->save();
		// Insert Assessment Data
		$assessmentstore = new AssessmentStore();
		$assessmentstore->pros_id = $request['prosId'];
		$assessmentstore->assessment_id = $request['surveyId'];
		$assessmentstore->assessment_json = json_encode($request['answer']);
		$assessmentstore->result_json = json_encode($result_arr);
		$assessmentstore->careplan_id = $newCarePlan->care_plan_id;
		$assessmentstore->score = $request['score'];
		$assessmentstore->assessment_date = date('Y/m/d');
		$assessmentstore->facility_id = Auth::user()->facility_id;
		$assessmentstore->assessment_status = 1;
		$assessmentstore->careplan_status = 1;
		$assessmentstore->assessment_period = $request['assessment_period'];
		
		$assessmentstore->save();
	}
	else{
		$chk_care = DB::table('care_plan')->where([['pros_id',$request['prosId']],['period',$request['assessment_period']],['date',null]])->first();
		if($chk_care){
			$assessmentstore = new AssessmentStore();
			$assessmentstore->pros_id = $request['prosId'];
			$assessmentstore->assessment_id = $request['surveyId'];
			$assessmentstore->assessment_json = json_encode($request['answer']);
			$assessmentstore->result_json = json_encode($result_arr);
			$assessmentstore->score = $request['score'];
			$assessmentstore->assessment_date = date('Y/m/d');
			$assessmentstore->facility_id = Auth::user()->facility_id;
			$assessmentstore->assessment_status = 1;
			$assessmentstore->careplan_status = 1;
			$assessmentstore->assessment_period = $request['assessment_period'];
			$assessmentstore->careplan_id = $chk_care->care_plan_id;
			$assessmentstore->save();
		}
		else{
			$newCarePlan = new CareplanSave();
			$newCarePlan->pros_id = $request['prosId'];
			$newCarePlan->period = $request['assessment_period'];
			$newCarePlan->care_plan_detail = "not edited";
			$newCarePlan->total_point = $request['score'];
			
			$newCarePlan->user_id = Auth::user()->user_id;
			$newCarePlan->care_plan_status = 1;
			$newCarePlan->save();

			$assessmentstore = new AssessmentStore();
			$assessmentstore->pros_id = $request['prosId'];
			$assessmentstore->assessment_id = $request['surveyId'];
			$assessmentstore->assessment_json = json_encode($request['answer']);
			$assessmentstore->result_json = json_encode($result_arr);
			$assessmentstore->score = $request['score'];
			$assessmentstore->assessment_date = date('Y/m/d');
			$assessmentstore->facility_id = Auth::user()->facility_id;
			$assessmentstore->assessment_status = 1;
			$assessmentstore->careplan_status = 1;
			$assessmentstore->assessment_period = $request['assessment_period'];
			$assessmentstore->careplan_id = $newCarePlan->care_plan_id;
			$assessmentstore->save();
		}
	}
}
	
// 	Testing
	public function test(Request $request){
		$chk_care = DB::table('care_plan')->where([['pros_id',1],['period',"Initial"]])->first();
		if(!$chk_care){
			dd("done");
		}
		else{
			dd("not done");
		}
	    
	}
	
// Testing end
	public function assessment_history(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
		$resident = DB::table('sales_pipeline')->where('id', $id)->first();
// 		dd($resident);
		return view('assessment.assessment_history_view', compact('reports', 'resident'));
	}
	
// 	public function care_plan(Request $request, $id){
// 	    $val = $request['language'];
// 		App::setlocale($val);
// 		$reports = DB::table('resident_assessment')
//                     ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
// 					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')					
// 					->where('resident_assessment.pros_id', $id)
// 					->where('resident_assessment.assessment_status', 1)
//                     ->select('resident_assessment.*','assessment_entry.*')
//                     ->get();
// 		$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
// 						->where([['pros_id', $id],['assessment_status', 1]])
// 						->first();	
// 		$total_score = 	$initial->score;
		
// 		$resident = DB::table('sales_pipeline')->where('id', $id)->first();
// 		return view('assessment.assessment_care_plan', compact('reports', 'resident', 'total_score'));
// 	}
	
	public function save_care_plan(Request $request){	
		$null_careplan = DB::table('care_plan')->where('date',null)->first();
		$score = DB::table('resident_assessment')->select(DB::raw('SUM(score) as total_score'))->where('careplan_id',$null_careplan->care_plan_id)->first();
		$total_point = $request['total_point'];
		$update_CP = DB::table('care_plan')->where('care_plan_id',$null_careplan->care_plan_id)->update(['total_point' => $total_point,'care_plan_detail' => $request['care_plan_detail'],'date' => date("Y-m-d",time())] );
		$update_RA = DB::table('resident_assessment')->where('careplan_id',$null_careplan->care_plan_id)->update(['care_plan_date' => date("Y-m-d",time())]);
		
		$service_plan_id = DB::table('service_plan')
		->where([['facility_id',Auth::user()->facility_id],['from_range','<=',$total_point],['to_range','>=',$total_point]])
		->where('service_plan_status',1)
		->select('service_plan.service_plan_id')
		->value('service_plan_id');

		$check_service_plan = DB::table('pros_service')->where([['pros_id',$request['pros_id']],['status',1]])->first();
		if($check_service_plan != null){
			$update_service_plan = DB::table('pros_service')->where('ps_id',$check_service_plan->ps_id)->update(['status' => 0]);
		}
		$service_plan = new ProsService();
		$service_plan->pros_id = $request['pros_id'];
		// $service_plan->period = $request['assessment_period'];
		$service_plan->service_plan_id = $service_plan_id;
		$service_plan->facility_id = Auth::user()->facility_id;
		$service_plan->status = 1;
		$service_plan->save();
		return redirect('/service_plan_period/'.$request['pros_id']);
    }
	
	public function assessment_set_point($assessment_id){	
		$assessment_name = DB::table('assessment_entry')->where('assessment_id', $assessment_id)->first();
		return view('assessment.assessment_set_point', compact('assessment_id', 'assessment_name'));
    }
	
	public function set_points(Request $request){		
		
		$j = DB::table('assessment_common_value')->where('assessment_id', $request['assessment_id'])->update(['current_status' => 0]);
		$assessmentcommonvalue = new AssessmentCommonValue();
		$assessmentcommonvalue->assessment_id = $request['assessment_id'];
		$assessmentcommonvalue->facility_id = 1;
		$assessmentcommonvalue->point = $request['point'];
		$assessmentcommonvalue->current_status = 1;
		$assessmentcommonvalue->save();	
		
		return redirect('/assessment_preview');
    }
	
	public function next_assessment_date(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		$name = DB::table('sales_pipeline')->where('id', $id)->first();
		$assessment_check = DB::table('resident_assessment')->where('pros_id', $id)->first();
		$assessments = Assessment::all();
		if(!$assessment_check){
			Toastr::error("NO ASSESSMENT RECORD FOUND<br/> YOU HAVE TO DO ALL ASSESSMENT FIRST");
			//return redirect()->intended('select_assessments/'.$id);
			return back();
			
		}else{
			//return redirect('select_assessments/'.$id)->with([['id'=> $id], ['name'=> $name], ['error_code', 5]]);
			return view('assessment.set_assessment_date', compact('id', 'name'));
			//return back()->with(['name'=> $name, 'error_code', 5]);
			//return View::make('assessment.select_assessment_view')->with(['id'=> $id, 'name'=> $name, 'assessments'=> $assessments, 'error_code', 5]);
		}
	}

	public function set_date(Request $request){		
		
		$j = DB::table('next_assessment')->where('pros_id', $request['pros_id'])->update(['assessment_status' => 0]);
		$nextassessment = new NextAssessment();
		$nextassessment->pros_id = $request['pros_id'];
		$nextassessment->next_assessment_date = $request['next_assessment_date'];
		$nextassessment->assessment_status = 1;
		$nextassessment->user_id = Auth::user()->user_id;
		$nextassessment->save();

		$user = DB::table('users')->where('user_id', Auth::user()->user_id)->first();
		
		$pros = DB::table('sales_pipeline')->where('id', $request['pros_id'])->first();
		
		Toastr::success("<b>Next Assessment Date is ".$request['next_assessment_date']."<br/>for ".$pros->pros_name."<br/> set by ".$user->firstname." ".$user->middlename." ".$user->lastname."</b>");
		
		return redirect('/resident_assessment');
    }
	
	public function tasksheet(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->paginate(6);
		return view('assessment.tasksheet', compact('crms'));
    }
	
	public function set_task(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		$assignees = DB::table('users')
		->join('role', 'users.user_id', '=', 'role.u_id')
		->where('role.id', 8)
		->where('role.status', 1)
		->select('users.*')
		->get();
		return view('assessment.set_tasksheet', compact('id', 'assignees'));
    }
	
	public function main_task(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		return view('assessment.main_task');
    }
	
	public function main_task_list(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		return view('assessment.main_task_list');
    }
	
	public function daily_task(Request $request, $task){
	    $val = $request['language'];
		App::setlocale($val);
		
		$dayOfYear = date("Y-m-d");
		
		$tasks = DB::table('tasksheet')
		->join('sales_pipeline', 'sales_pipeline.id', '=', 'tasksheet.pros_id')
		->where([['tasksheet.title', $task],['tasksheet.e_date', '>=', $dayOfYear],['status', 1],['sales_pipeline.facility_id', Auth::user()->facility_id]])
		->select('sales_pipeline.*', 'tasksheet.*')->get();
		$assignees = DB::table('users')
		->join('role', 'users.user_id', '=', 'role.u_id')
		->where('role.id', 8)
		->where('role.status', 1)
		->select('users.*')
		->get();
		if($tasks->isEmpty()){
			Toastr::error("No resident is there in this task");
			return back();
		}
		else{
		return view('assessment.daily_task', compact('tasks', 'task', 'assignees'));
		}
    }

	
	public function add_task_history($task_id,$task){
		//return $task_id;
		$assignee = DB::table('tasksheet')->where([['task_id', $task_id], ['status', 1]])->first();
		
        $taskhistory = new TaskHistory();
        $taskhistory->task_id = $task_id;
		$taskhistory->assignee = $assignee->assignee;
		$taskhistory->work_done_by = Auth::user()->user_id;
        $taskhistory->facility_id = Auth::user()->facility_id;
        $taskhistory->history_date = date("Y-m-d",time());
        $taskhistory->save();
        return redirect('daily_task/'.$task);
    }
	
	public function task_assignee(Request $request, $task){
	    $val = $request['language'];
		App::setlocale($val);
		
		$dayOfYear = date("Y-m-d");
		
		$tasks = DB::table('tasksheet')
		->join('sales_pipeline', 'sales_pipeline.id', '=', 'tasksheet.pros_id')
		->where([['tasksheet.title', $task],['tasksheet.e_date', '>=', $dayOfYear],['status', 1],['sales_pipeline.facility_id', Auth::user()->facility_id]])
		->select('sales_pipeline.*', 'tasksheet.*')->get();
		if($tasks->isEmpty()){
			Toastr::error("No resident in this task!");
			return back();
		}
		else{
			return view('assessment.task_assignee', compact('tasks', 'task'));
		}
    }
    
    public function score_view($assessment_form_name){
		return view('score_view', compact('assessment_form_name'));
	}
	
	public function assessment_pros($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.assessment_pros', compact('crms', 'prospectives'));
    }
    
    public function select_pros_task($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.task_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_pros_task_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.task_search_view', compact('crms', 'prospectives'));
    }
	
	public function select_pros_task_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.task_search_view', compact('crms', 'prospectives'));
    }
    
    public function select_pros_upload($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.select_pros_upload', compact('crms', 'prospectives'));
    }
	
	public function select_pros_upload_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.select_pros_upload', compact('crms', 'prospectives'));
    }
	
	public function select_pros_upload_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('assessment.select_pros_upload', compact('crms', 'prospectives'));
    }
    
    //CHANGES DONE BY DHRUWA
    
    public function reassessment($assessment_id, $id){
		$assessment = Assessment::all()->where('assessment_id', $assessment_id)->first();
		$status = DB::table('resident_assessment')->where([['assessment_id', $assessment->assessment_id], ['pros_id', $id]])->first();
		if(!$status){
			Toastr::error("NO ASSESSMENT RECORD FOUND<br/> CLICK ADD ASSESSMENT");
			return back();
		}else{
			return view('assessment.reassessment_form_view', compact('assessment_id', 'id'));
		}
	}
	
	public function find_assessment($assessment_id, $pros_id){
		$data = DB::table('resident_assessment')->where([['assessment_id', $assessment_id], ['pros_id', $pros_id], ['assessment_status', 1]])->first();
		$zero_data = DB::table('resident_temporary_assessment')->where([['assessment_id', $assessment_id], ['pros_id', $pros_id], ['assessment_status', 0]])->orderBy('id', 'desc')->first();
		$zero_value = $zero_data->assessment_json;
		if($data && $zero_value=='null'){
			return json_encode($data);
		}elseif(!$data && $zero_value!='null'){
			return json_encode($zero_data);
		}elseif($data && $zero_value!='null'){
			return json_encode($zero_data);
		}
	}
	
	public function save_temporary_json(Request $request){		
		$residenttemporaryassessment = new ResidentTemporaryAssessment();
		$residenttemporaryassessment->pros_id = $request['prosId'];
		$residenttemporaryassessment->assessment_id = $request['surveyId'];
		$residenttemporaryassessment->assessment_json = json_encode($request['answer']);
		$residenttemporaryassessment->score = $request['score'];
		$residenttemporaryassessment->assessment_date = date('Y/m/d');
		$residenttemporaryassessment->facility_id = Auth::user()->facility_id;
		$residenttemporaryassessment->assessment_status = 0;
		$residenttemporaryassessment->save();		
	}
	
// 	public function assessment_period($pros_id){	
// 		$data = DB::table('resident_assessment')->where('pros_id', $pros_id)->first();
// 		if($data){
// 			return view('assessment.assessment_period', compact('pros_id'));
// 		}else{
// 			Toastr::error("NO ASSESSMENT RECORD FOUND");
// 			return back();
// 		}				
//     }
	
	public function Monthly($pros_id){		
		$data = DB::table('next_assessment')->where([['period', 'Monthly'], ['pros_id', $pros_id]])->first();
		if($data){
			$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $pros_id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
			$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
			return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		}else{
			Toastr::error("NO MONTHLY ASSESSMENT RECORD FOUND");
			return back();
		}	
    }
	
	public function Quarterly($pros_id){		
		$data = DB::table('next_assessment')->where([['period', 'Quarterly'], ['pros_id', $pros_id]])->first();
		if($data){
			$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $pros_id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
			$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
			return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		}else{
			Toastr::error("NO QUARTERLY ASSESSMENT RECORD FOUND");
			return back();
		}	
    }
	
	public function HalfYearly($pros_id){		
		$data = DB::table('next_assessment')->where([['period', 'Half-Yearly'], ['pros_id', $pros_id]])->first();
		if($data){
			$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $pros_id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
			$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
			return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		}else{
			Toastr::error("NO HALF-YEARLY ASSESSMENT RECORD FOUND");
			return back();
		}	
    }
	
	public function Annual($pros_id){		
		$data = DB::table('next_assessment')->where([['period', 'Annual'], ['pros_id', $pros_id]])->first();
		if($data){
			$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $pros_id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
			$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
			return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		}else{
			Toastr::error("NO ANNUAL ASSESSMENT RECORD FOUND");
			return back();
		}	
    }
	
	public function Adhoc($pros_id){		
		$data = DB::table('next_assessment')->where([['period', 'Ad-hoc'], ['pros_id', $pros_id]])->first();
		if($data){
			$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
					->where('resident_assessment.pros_id', $pros_id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->paginate(7);
			$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
			return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		}else{
			Toastr::error("NO AD-HOC ASSESSMENT RECORD FOUND");
			return back();
		}	
    }
	
	public function Initial($pros_id){		
		$reports = DB::table('resident_assessment')
            ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
			->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')
			->where('resident_assessment.pros_id', $pros_id)
            ->select('resident_assessment.*','assessment_entry.*')
            ->paginate(7);
		$resident = DB::table('sales_pipeline')->where('id', $pros_id)->first();
		return view('assessment.assessment_history_view', compact('reports', 'resident', 'pros_id'));
		
    }
	
	public function find_reassessment($assessment_id){
		$data = DB::table('assessment_entry')->select('assessment_json')->where('assessment_id', $assessment_id)->first();
		return json_encode($data);
	}
	
	public function find_answer($assessment_id, $pros_id){
		$data1= DB::table('resident_assessment')->select('assessment_json')->where([['assessment_id', $assessment_id], ['pros_id', $pros_id], ['assessment_status', 1]])->first();
		return json_encode($data1);
	}
	
	//END
    public function select_assessments(Request $request,$period,$id){
        $val = $request['language'];
		App::setlocale($val);
		$assessments = Assessment::orderby('sl no','asc')->get();
		$cur_date = date('Y-m-d');
		$status_array = array();
		$status = "Not done";
		$color = "#660000";
		// $assessment_status = DB::table('resident_assessment')->where([['pros_id',$id],['assessment_status',1],['facility_id',Auth::user()->facility_id]])->get();
		$all_assess = DB::table('assessment_entry')->orderby('sl no','asc')->get();
		if($period=='Initial'){
			$period_array = ['Initial'];
		}elseif($period=='Monthly'){
			$period_array = ['Initial', 'Monthly'];
		}elseif($period=='Quarterly'){
			$period_array = ['Initial', 'Monthly', 'Quarterly'];
		}elseif($period=='Half-Yearly'){
			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly'];
		}elseif($period=='Annual'){
			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual'];
		}else{
			$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual', 'Adhoc'];
		}
		foreach($all_assess as $assess){
				$period_qry = DB::table('resident_assessment')->where([['assessment_id',$assess->assessment_id],['pros_id',$id],['assessment_period',$period],['assessment_status',1],['care_plan_date',null]])->first();
				if($period_qry){
					$status = "Done";
					$color = "#003300";
				}
				else{
					$period_qry = DB::table('resident_assessment')->where([['assessment_id',$assess->assessment_id],['pros_id',$id],['assessment_status',1]])->whereIn('assessment_period',$period_array)->first();
					if($period_qry){
						$status = "Work in progress";
						$color = "#ff9900";
					}
					else{
						$status = "Not done";
						$color = "#660000";
					}
				}
			$obj = new \stdClass();
			$obj->assess_id = $assess->assessment_id;
			$obj->status = $status;
			$obj->color = $color;
			array_push($status_array,$obj);
			
		}
        return view('assessment.select_assessment_view', compact('assessments', 'period', 'id', 'cur_date','status_array'));
    }
    public function select_period($flag,$id){
		// dd($id);
		return view('assessment.select_period', compact('id','flag'));
	}
	public function assessment_choose($assessment_id, $period, $id, $cur_date){
		$assessment = Assessment::all()->where('assessment_id', $assessment_id)->first();
		$common_point = DB::table('assessment_common_value')->where([['assessment_id', $assessment_id], ['current_status', 1]])->first();
		return view('assessment.assessment_form_view', compact('assessment', 'id', 'period', 'common_point', 'cur_date'));
	}
	public function care_plan($id, $period){
		$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')					
					->where('resident_assessment.pros_id', $id)
					->where('resident_assessment.assessment_status', 1)
					->where('resident_assessment.assessment_period',$period)
					->where('resident_assessment.care_plan_date',null)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->get();
                    
		$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
						->where([['pros_id', $id],['assessment_status', 1],['assessment_period',$period],['care_plan_date',null]])
						->first();
				
		$resident = DB::table('sales_pipeline')->where('id', $id)->first();
		return view('assessment.assessment_care_plan', compact('reports', 'resident', 'initial', 'period','id'));
	}
	public function care_plan_period($id, $period){		
        return view('assessment.care_plan_period', compact('id', 'period'));
    }
    public function care_plan_periodic($id, $period){
		$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')					
					->where('resident_assessment.pros_id', $period)
					->where('resident_assessment.assessment_status', 1)
					->where('resident_assessment.assessment_period', $id)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->get();
		if($reports->isEmpty()){
			$resident = DB::table('sales_pipeline')->where('id', $period)->first();
			return view('assessment.periodic_assessment_care_plan', compact('reports', 'id', 'resident','period'));			
		}else{
			$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
						->where([['pros_id', $period],['assessment_status', 1]])
						->first();	
			$total_score = 	$initial->score;		
			$resident = DB::table('sales_pipeline')->where('id', $period)->first();
			$periodic_date = DB::table('resident_assessment')->where([['id', $period],['assessment_period', $id]])->first();
			$periodic_date = $periodic_date->care_plan_date;
			$unixTimestamp = strtotime($periodic_date);
			$dayOfWeek = date("l", $unixTimestamp);
			return view('assessment.periodic_assessment_care_plan', compact('reports', 'resident', 'total_score', 'id', 'dayOfWeek', 'periodic_date', 'period'));
		}
	}
	public function assessment_period($flag,$pros_id){	
		$datas = DB::table('care_plan')->where('pros_id', $pros_id)->get();
		return view('assessment.assessment_period', compact('pros_id','datas','flag'));	
    }
    public function assessment_history_detail_view($pros_id, $cp_id){	
		// if($period=='Initial'){
		// 	$period_array = ['Initial'];
		// }elseif($period=='Monthly'){
		// 	$period_array = ['Initial', 'Monthly'];
		// }elseif($period=='Quarterly'){
		// 	$period_array = ['Initial', 'Monthly', 'Quarterly'];
		// }elseif($period=='Half-Yearly'){
		// 	$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly'];
		// }elseif($period=='Annual'){
		// 	$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual'];
		// }else{
		// 	$period_array = ['Initial', 'Monthly', 'Quarterly', 'HalfYearly', 'Annual', 'Adhoc'];
		// }
		
		$datas = DB::table('resident_assessment')
				->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
				->where('resident_assessment.pros_id', $pros_id)
				->where('resident_assessment.careplan_id', $cp_id)
				->orderBy('resident_assessment.id', 'DESC')->get();
		return view('assessment.assessment_history_detail_view', compact('datas', 'pros_id'));					
    }
    
    public function assessment_history_view($pros_id,$id){
		$result = DB::table('resident_assessment')
		->where([['resident_assessment.id',$id],['resident_assessment.pros_id',$pros_id]])
		->first();
		$assessment_json = DB::table('assessment_entry')->where('assessment_id',$result->assessment_id)->first();
		$elements = array();
		$final = array();
		$pages = json_decode($assessment_json->assessment_json)->pages;
// 		dd($pages);
		foreach($pages as $p){
			foreach($p->elements as $e)
			array_push($elements,$e);
		}
		
		$resident = DB::table('sales_pipeline')->where('id',$result->pros_id)->first();
		$ans_elements = json_decode($result->assessment_json);
// 		dd($ans_elements);
// 		foreach($ans_elements->data as $key => $value){
// 			for($i=0;$i<count($elements);$i++){
// 				if($key == $elements[$i]->name){
// 					if(property_exists($elements[$i],'choices')){
// 						foreach($elements[$i]->choices as $e){
// 							if($e->value == $value){
// 								$value = $e->text;
// 							}
// 						}
// 					}
// 					$obj = new \stdClass();
// 					$obj->qs = $elements[$i]->title;
					
// 					$obj->ans = $value;
// 					array_push($final,$obj);
// 				}
// 			}
// 		}
        foreach($ans_elements->data as $key => $value){
			for($i=0;$i<count($elements);$i++){
				if($key == $elements[$i]->name){
				    $obj = new \stdClass();
					if(property_exists($elements[$i],'choices')){
					    $val="";
						foreach($elements[$i]->choices as $e){
    							if($e->value == $value){
    								$val = $e->text;
    							}
						}
					    $obj->ans = $val;
					}else{
					   $obj->ans = $value; 
					}
					$obj->qs = $elements[$i]->title;
					array_push($final,$obj);
				}
			}
		}
		return view('assessment.assessment_history',compact('final','resident'));
	}
}

// 	foreach($ans_elements->data as $key => $value){
// 			for($i=0;$i<count($elements);$i++){
// 				if($key == $elements[$i]->name){
// 					if(property_exists($elements[$i],'choices')){
// 						foreach($elements[$i]->choices as $e){
// 						    for($k=0;$k<count($value);$k++){
//     							if($e->value == $value[$k]){
//     								$value = $value . $e->text;
//     							}
// 						    }
// 						}
// 					}
// 					$obj = new \stdClass();
// 					$obj->qs = $elements[$i]->title;
					
// 					$obj->ans = $value;
// 					array_push($final,$obj);
// 				}
// 			}
// 		}