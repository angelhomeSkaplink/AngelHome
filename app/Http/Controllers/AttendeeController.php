<?php

namespace App\Http\Controllers;

use Request;
use DB, Input, Auth, App;
use App\Attendee;
use App\Tasksheet;
use App\TaskAssignee;
use Kamaln7\Toastr\Facades\Toastr;

class AttendeeController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	public function attendee(Request $request, $event_id){
		
		App::setlocale(session('locale'));
		$data = DB::table('attendee')->where('event_id',$event_id)->get();
		if($data->isEmpty()){
			$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id],['stage',"MoveIn"]])->get();
			// dd($crms);
			return view('admin.attendee_form', compact('event_id', 'crms'));
		}
		else{
			Toastr::success("Attendee details are already updated !!");
			return redirect('/activity_calendar');
		}
	}
    public function add_attendee(Request $request){
		$pros_id = Input::get('pros_id');
		$event_id = Input::get('event_id');
		$rsvp = Input::get('rsvp');
		$attenedee_status = Input::get('attenedee_status');
		$note = Input::get('note');
		foreach($pros_id as $key => $n ){
			$data = array('pros_id'=>$pros_id[$key],'event_id'=>$event_id[$key],'rsvp'=>$rsvp[$key],'attenedee_status'=>$attenedee_status[$key],'note'=>$note[$key],'facility_id'=>Auth::user()->facility_id);
			Attendee::insert($data);
		}
				
		Toastr::success("Record Saved Successfully !!");
		return redirect('/activity_report');
    }
	
	public function store_tasklist(Request $request){		

		$count_row = Input::get('count_row');
		$pros_id = Input::get('pros_id');
		$title = Input::get('title');
		$frequency = Input::get('frequency');
		$person_required = Input::get('person_required');
		$s_time = Input::get('s_time');		
		$e_time = Input::get('e_time');
		$s_date = Input::get('s_date');		
		$e_date = Input::get('e_date');
		$special_equipment = Input::get('special_equipment');
		
		foreach($title as $key => $n ){
			if($e_date[$key]==NULL){
				$edate = '2031-12-31';
			}else{
				$edate = $e_date[$key];
			}
			$data = array(				
				'pros_id'=>Input::get('pros_id'),
				'title'=>$title[$key],
				'frequency'=>$frequency[$key],
				'person_required'=>$person_required[$key],
				's_time'=>$s_time[$key],
				'e_time'=>$e_time[$key],				
				's_date'=>$s_date[$key],	
				'e_date'=>$edate,	
				'special_equipment'=>$special_equipment[$key],
				'status'=>1,
				'facility_id'=>Auth::user()->facility_id
			);
			$update_status = DB::table('tasksheet')->where([['pros_id', $pros_id],['title',$title[$key]]])->update(['status'=>0]);
			Tasksheet::insert($data);
		}

		$pros_name = DB::table('sales_pipeline')->where('id', $pros_id)->first();
				
		Toastr::success("Task Sheet Successfully Saved for<br/>".$pros_name->pros_name);
		return redirect('/tasksheet');
    }
	
	public function assign_tasklist(Request $request){
		$user_id = Input::get('user_id');
		$task = Input::get('task');
		foreach($user_id as $key => $n ){
			$data = array('user_id'=>$user_id[$key],'task'=>Input::get('task'),'task_date'=>date("Y-m-d"),'facility_id'=>Auth::user()->facility_id, 'status'=>1);
			TaskAssignee::insert($data);
		}				
		Toastr::success("Record Saved Successfully !!");
		return redirect('main_task');
    }
}
