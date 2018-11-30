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
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);        
        return view('assessment.prospective_view', compact('crms'));
    }
	
	public function upload_file($id){		
		 return view('assessment.assessment_upload_view', compact('id'));
    }
	
	
	
	public function resident_assessment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
		//$crms = crm::all()->where('facility_id', Auth::user()->facility_id);
		return view('assessment.resident_assessment', compact('crms'));
		
    }
    public function preadmin_resident_assessment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
		//$crms = crm::all()->where('facility_id', Auth::user()->facility_id);
		return view('assessment.preadmin_resident_assessment', compact('crms'));
		
    }
	
	public function select_assessments(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
// 		$assessments = Assessment::all();	
        $assessments = Assessment::where('sl no','!=',0)->orderby('sl no','asc')->get();
        return view('assessment.select_assessment_view', compact('assessments', 'id'));
    }
    
    public function preadmin_select_assessments(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
// 		$assessments = Assessment::all();	
        $assessments = Assessment::where('sl no',0)->get();
        return view('assessment.select_assessment_view', compact('assessments', 'id'));
    }
	
	public function assessment_choose(Request $request, $assessment_id, $id){
	    $val = $request['language'];
		App::setlocale($val);
		$assessment = Assessment::all()->where('assessment_id', $assessment_id)->first();
		$common_point = DB::table('assessment_common_value')->where([['assessment_id', $assessment_id], ['current_status', 1]])->first();
		return view('assessment.assessment_form_view', compact('assessment', 'id', 'common_point'));
	}

	public function assessment_store(Request $request){		
	
		$update_status = DB::table('resident_assessment')->where([['assessment_id', $request['surveyId']], ['pros_id', $request['prosId']]])->update(['assessment_status' => 0]);
		//if($request['point'] == ''){
		//	$point = 0;
		//}else{
		//	$point = $request['point'];
		//}		
		$assessmentstore = new AssessmentStore();
		$assessmentstore->pros_id = $request['prosId'];
		$assessmentstore->assessment_id = $request['surveyId'];
		$assessmentstore->assessment_json = json_encode($request['answer']);
		$assessmentstore->score = $request['score'];
		$assessmentstore->assessment_date = date('Y/m/d');
		$assessmentstore->facility_id = 1;
		$assessmentstore->assessment_status = 1;
		$assessmentstore->save();		
    }
	
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
		return view('assessment.assessment_history_view', compact('reports', 'resident'));
	}
	
	public function care_plan(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		$reports = DB::table('resident_assessment')
                    ->Join('assessment_entry', 'resident_assessment.assessment_id', '=', 'assessment_entry.assessment_id')
					->Join('sales_pipeline', 'resident_assessment.pros_id', '=', 'sales_pipeline.id')					
					->where('resident_assessment.pros_id', $id)
					->where('resident_assessment.assessment_status', 1)
                    ->select('resident_assessment.*','assessment_entry.*')
                    ->get();
		$initial = DB::table('resident_assessment')->select(DB::raw("SUM(score) as score"))
						->where([['pros_id', $id],['assessment_status', 1]])
						->first();	
		$total_score = 	$initial->score;
		
		$resident = DB::table('sales_pipeline')->where('id', $id)->first();
		return view('assessment.assessment_care_plan', compact('reports', 'resident', 'total_score'));
	}
	
	public function save_care_plan(Request $request){		
		
		$j = DB::table('care_plan')->where('assessment_id', $request['assessment_id'])->update(['care_plan_status' => 0]);
		
		$careplansave = new CareplanSave();
		$careplansave->assessment_id = $request['assessment_id'];
		$careplansave->care_plan_detail = $request['care_plan_detail'];
		$careplansave->total_point = $request['total_point'];
		$careplansave->user_id = Auth::user()->user_id;
		$careplansave->care_plan_status = 1;
		$careplansave->save();	
		return redirect('/resident_assessment');
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
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
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
		return view('assessment.daily_task', compact('tasks', 'task', 'assignees'));
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
		$user_id = Auth::user()->user_id;
		return view('assessment.task_assignee', compact('tasks', 'task', 'user_id'));
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

}
