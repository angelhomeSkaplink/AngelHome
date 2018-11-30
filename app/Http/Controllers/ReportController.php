<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, Validator, App, Carbon;
use App\Facility;
use App\Payment;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

class ReportController extends Controller
{	
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function total_revenue(Request $request){
		$val = $request['language'];
		App::setlocale($val);
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
        return view('reports.facility_view', compact('facilities'));
	}

	public function facility_reports($id){
		$reports = DB::table('payment_info')
					->Join('sales_pipeline', 'payment_info.pros_id', '=', 'sales_pipeline.id')
					->where('payment_info.facility_id', '=', $id)
                    ->select('payment_info.*', 'sales_pipeline.*')->get();
					
		$payable_sum = DB::table('payment_info')->where('facility_id', $id)->sum('ammount_pay');
		$paied_sum = DB::table('payment_info')->where('facility_id', $id)->sum('ammount_paid');
		$outstanding_sum = DB::table('payment_info')->where('facility_id', $id)->sum('balance');
		$to_be_paid_sum = DB::table('payment_info')->where('facility_id', $id)->sum('due_ammount');
		
		return view('reports.resident_payment_details_report_view', compact('reports', 'payable_sum', 'paied_sum', 'outstanding_sum', 'to_be_paid_sum', 'id')); 
	}
	
	public function date_range_report(Request $request){
		
		$from = $request['from'];
		$to = $request['to'];
		$id = $request['facility_id'];		
		$reports = DB::table('payment_info')->whereBetween('payment_info.payment_date',[$from,$to])
					->Join('sales_pipeline', 'payment_info.pros_id', '=', 'sales_pipeline.id')
					->where('payment_info.facility_id', '=', $id)
                    ->select('payment_info.*', 'sales_pipeline.*')->get();
					
		$payable_sum = DB::table('payment_info')->whereBetween('payment_info.payment_date',[$from,$to])->where('facility_id', $id)->sum('ammount_pay');
		$paied_sum = DB::table('payment_info')->whereBetween('payment_info.payment_date',[$from,$to])->where('facility_id', $id)->sum('ammount_paid');
		$outstanding_sum = DB::table('payment_info')->whereBetween('payment_info.payment_date',[$from,$to])->where('facility_id', $id)->sum('balance');
		$to_be_paid_sum = DB::table('payment_info')->whereBetween('payment_info.payment_date',[$from,$to])->where('facility_id', $id)->sum('due_ammount');
		
		return view('reports.date_range_report_view', compact('reports', 'payable_sum', 'paied_sum', 'outstanding_sum', 'to_be_paid_sum', 'id', 'to', 'from')); 
	}
	
	public function room_reports(Request $request){
	    $val = $request['language'];
	    App::setlocale($val);
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get(); 
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
        return view('reports.facility_room_view', compact('facilities', 'group'));
	}
	
	public function facility_room_reports($id){
		$reports = DB::table('facility_room')					
					->where('facility_room.facility_id', '=', $id)
                    ->select('facility_room.*')->get();
		
		return view('reports.facility_unit_view', compact('reports','id')); 
	}
	
	public function date_range_room_report(Request $request){
		
		$from = $request['from'];
		$to = $request['to'];
		$id = $request['facility_id'];		
		$reports = DB::table('resident_room')->whereBetween('resident_room.booked_date',[$from,$to])			
					->where('resident_room.facility_id', '=', $id)
                    ->select('resident_room.*')->get();
		$vacants = DB::table('facility_room')->where([['facility_room.facility_id', '=', $id],['room_status', 0]])->get();
					
		return view('reports.date_range_room_report_view', compact('reports', 'id', 'to', 'from', 'vacants')); 
	}
	
	public function facility_graph_reports($id){		
		return view('reports.facility_graph_view', compact('id'));
	}
	
	public function get_graph_data($id){
		
		$payable_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'), 'month')->where('facility_id', $id)->groupBy('month')->orderBy('payment_id', 'DESC')->take(12)->get();	
		
		$data = array();
		foreach ($payable_sum as $row) {
			$data[] = $row;
		}		
		return json_encode($data);	
	}
	
	public function facility_room_graph($id){
		
		return view('reports.facility_room_graph', compact('id'));
	}
	
	public function facility_room_graph_data($id){
		
		$vacant = DB::table('facility_room')->select(DB::raw('COUNT(room_status) as vacant_position'), 'room_status')->where('facility_id', $id)->groupBy('room_status')->get();	
		
		$data = array();
		foreach ($vacant as $row) {
			$data[] = $row;
		}		
		return json_encode($data);		
	}
	
	public function aging_report(Request $request){
	    $val = $request['language'];
	    App::setlocale($val);
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
        return view('reports.facility_aging_view', compact('facilities', 'group'));
	}
	
	public function facility_aging_graph_reports(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		
		return view('reports.facility_aging_graph_report', compact('id'));	
	}	
	
	public function facility_aging_graph_data($id){
		
		$payable_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'))->where('facility_id', $id)->groupBy('month')->orderBy('payment_id', 'ASC')->take(3)->get();	
		$total_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'))->where('facility_id', $id)->groupBy('month')->orderBy('payment_id', 'ASC')->take(3)->get();	
		$all_total_sum = DB::table('payment_info')->where('facility_id', $id)->sum('ammount_pay');
		
		$sum_array = array();
		foreach ($total_sum as $sum) {
			$sum_array[] = $sum->ammount_pay;
		}
		
		$total_sum = array_sum($sum_array);
		
		$balance = $all_total_sum - $total_sum;
		$balance_arr  = (object) array( 'ammount_pay' => "".$balance."" );
		$data = array();
		foreach ($payable_sum as $row) {
			$data[] = $row;
		}
		
		array_push($data,$balance_arr);
		return json_encode($data);	
	}
	
	public function facility_sales_reports(Request $request){
		$val = $request['language'];
		App::setlocale($val);
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
		return view('reports.facility_sales_reports', compact('facilities', 'group'));
	}
	
	public function facility_sales_reports_detail($id){		
		$reports = DB::table('sales_pipeline')->where([['stage', 'Inquiery'], ['marketing_id', '!=', NULL], ['facility_id', $id]])->paginate(5);
        return view('reports.inquery_reports', compact('reports'));
    }
	
	public function get_medicine(){
		$medicines = DB::table('medicine')->select('medicine_name')->where('facility_id', Auth::user()->facility_id)->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->medicine_name;
		}	
		
		return $countries;
	}
	
	public function get_room_type(){
		$medicines = DB::table('facility_room')->select('room_type')->groupby('room_type')->where('facility_id', Auth::user()->facility_id)->get();
		$countries = array();
		foreach($medicines as $row) {
			$countries[] = $row->room_type;
		}	
		
		return $countries;
	}

	public function get_pharmacy(){
		$medicines = DB::table('facility_pharmacy')->select('pharmacy_name')->where('facility_id', Auth::user()->facility_id)->get();
		$pharmacies = array();
		foreach($medicines as $row) {
			$pharmacies[] = $row->pharmacy_name;
		}	
		
		return $pharmacies;
	}
	
	public function activity_report(Request $request){
	    $val = $request['language'];
	    App::setlocale($val);
		$events = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->paginate(8);
		return view('admin.activity_report', compact('events'));
	}
	
	public function view_activity($id){
		
		$reports = DB::table('attendee')
                    ->Join('sales_pipeline', 'attendee.pros_id', '=', 'sales_pipeline.id')
                    ->Join('activity_calendar', 'attendee.event_id', '=', 'activity_calendar.event_id')
					->where('attendee.event_id', $id)
					->select('sales_pipeline.pros_name', 'attendee.attenedee_status')
					->get();  
		
        return json_encode($reports); 
    }

	public function tasksheet_report(Request $request){
		$val = $request['language'];
		App::setlocale($val);
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
        return view('reports.facility_task_view', compact('facilities'));
	}

	public function facility_task_graph_reports(Request $request, $id){	
	    $val = $request['language'];
		App::setlocale($val);
		return view('reports.facility_task_graph_view', compact('id'));
	}

	public function facility_task_graph_data($id){
		
		$vacant = DB::table('tasksheet')->select(DB::raw('SUM(person_required) as person_required'), 'title')->where([['facility_id', $id], ['status', 1]])->groupBy('title')->get();	
		
		$data = array();
		foreach ($vacant as $row) {
			$data[] = $row;
		}		
		return json_encode($data);		
	}
	
	public function activity_graph($id){		
		return view('reports.activity_graph', compact('id'));
	}
	
	public function attendee_report_graph(Request $request, $id){
	    $val = $request['language'];
		App::setlocale($val);
		return view('reports.attendee_details_graph', compact('id'));
	}

	public function attendee_report_graph_data($id){
		$vacant = DB::table('attendee')->select(DB::raw('COUNT(attenedee_status) as attenedee_number'), 'attenedee_status')
		->where('event_id', $id)
		->groupBy('attenedee_status')
		->get();

		$data = array();
		foreach ($vacant as $row) {
			$data[] = $row;		
		}			
		return json_encode($data);
	}
	
	public function facility_aggregated_revenue_graph(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$group = $get_facilities = DB::table('facility_owner')->where('id', Auth::user()->facility_owner_id)->first();
		return view('reports.facility_aggregated_revenue_graph_view', compact('group'));
	}
	
	public function facility_aggregated_revenue_graph_data(){		
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$payable_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'), 'month')->where('facility_id', $row->id)->groupBy('month')->orderBy('payment_id', 'DESC')->take(12)->get();		
			$data = array();
			foreach ($payable_sum as $row) {
				$data[] = $row;
			}		
			return json_encode($data);			
		}
	}
	
	public function facility_aggregated_revenue_details(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$payable_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'), 'facility_id')->where('facility_id', $row->id)->groupBy('facility_id')->get();		
			return view('reports.facility_aggregated_revenue_details', compact('payable_sum'));				
		}
	}
	
	public function monthly_revenue($facility_id){		
		$monthly = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'), 'month')->where('facility_id', $facility_id)->groupBy('month')->orderBy('payment_id', 'DESC')->get();		
		return view('reports.monthly_revenue', compact('monthly'));	
	}
	
	public function facility_aggregated_room_graph(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$group = $get_facilities = DB::table('facility_owner')->where('id', Auth::user()->facility_owner_id)->first();
		return view('reports.facility_aggregated_room_graph', compact('group'));
	}
	
	public function facility_aggregated_room_graph_data(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			
			$vacant = DB::table('facility_room')->select(DB::raw('COUNT(room_status) as vacant_position'), 'room_status')->where('facility_id', $row->id)->groupBy('room_status')->get();	
			$data = array();
			foreach ($vacant as $row) {
				$data[] = $row;
			}		
			return json_encode($data);		
		}		
	}
	
	public function facility_aggregated_room_status(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$vacant = DB::table('facility_room')->select(DB::raw('COUNT(room_status) as vacant_position'), 'room_status', 'facility_id')->where('facility_id', $row->id)->groupBy('room_status')->first();	
			$room = DB::table('facility_room')->select(DB::raw('COUNT(room_id) as room_id'), 'room_status', 'facility_id')->where('facility_id', $row->id)->first();	
			return view('reports.facility_aggregated_room_status', compact('vacant', 'room'));				
		}
	}
	
	public function facility_aggregated_sales_report(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$reports = DB::table('sales_pipeline')->where('facility_id', $row->id)->get();
			return view('reports.facility_aggregated_sales_report', compact('reports'));
		}		
    }
	
	public function facility_aggregated_aging_report(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		return view('reports.facility_aggregated_aging_report');	
	}	
	
	public function facility_aggregated_aging_graph_data(){
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$payable_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'))->where('facility_id', $row->id)->groupBy('month')->orderBy('payment_id', 'ASC')->take(3)->get();	
			$total_sum = DB::table('payment_info')->select(DB::raw('SUM(ammount_pay) as ammount_pay'))->where('facility_id', $row->id)->groupBy('month')->orderBy('payment_id', 'ASC')->take(3)->get();	
			$all_total_sum = DB::table('payment_info')->where('facility_id', $row->id)->sum('ammount_pay');
			
			$sum_array = array();
			foreach ($total_sum as $sum) {
				$sum_array[] = $sum->ammount_pay;
			}
			
			$total_sum = array_sum($sum_array);
			
			$balance = $all_total_sum - $total_sum;
			$balance_arr  = (object) array( 'ammount_pay' => "".$balance."" );
			$data = array();
			foreach ($payable_sum as $row) {
				$data[] = $row;
			}
			
			array_push($data,$balance_arr);
			return json_encode($data);
		}
			
	}
	public function mar_report(){
		// $today = date('Y-m-d H:i:s');
		// $today = Carbon\Carbon::now(get_local_time());
		// $ip = file_get_contents("http://ipecho.net/plain");
		//
		// $url = 'http://ip-api.com/json/'.$ip;
		//
		// $tz = file_get_contents($url);
		//
		// $tz = json_decode($tz,true)['timezone'];
		// $today = Carbon\Carbon::now($tz)->toDateString();
		$today = Carbon\Carbon::now()->toDateString();
		$join = DB::table('patient_medical_info')
		->join('sales_pipeline','patient_medical_info.pros_id','=','sales_pipeline.id')
		->select('sales_pipeline.id','sales_pipeline.pros_name','sales_pipeline.service_image')
		->where('patient_medical_info.date_of_prescription', '<=', $today)
		->where('patient_medical_info.course_date', '>=', $today)
		->where('sales_pipeline.facility_id',Auth::user()->facility_id)
		->distinct()
		->get();
		return view('reports.MarReport',compact('join'));
	}
	public function mar_report_details($id){
		$result = DB::table('patient_medical_info')->where('pros_id',$id)->get();
		$name = DB::table('sales_pipeline')->where('id',$id)->first();
		$facility = DB::table('facility')->where('id',$name->facility_id)->first();

		// $ip = file_get_contents("http://ipecho.net/plain");
		// $url = 'http://ip-api.com/json/'.$ip;
		// $tz = file_get_contents($url);
		// $tz = json_decode($tz,true)['timezone'];
		// date_default_timezone_set($tz);
		$year = date("Y");
		$month = date("F");
		$days = date("t");
		$start_month = Carbon\Carbon::now()->startOfMonth();
		$start_month = $start_month->toDateString();
		$end_month = Carbon\Carbon::now()->endOfMonth();
		$end_month = $end_month->toDateString();
		$query = DB::table('medicine_history')
			->select('time_to_take_med','mar_date','status','action_performed_on','reason_title','reason_desc','user_id','effect_after')
			->whereBetween('mar_date',[$start_month,$end_month])
			->get();
// 			dd($query);
		return view('reports.MarReportDetails',compact('start_month','facility','result','name','days','year','month','query'));
	}
	public function mar_monthly_report(Request $request){
		$month_num = $request['mar_month'];
		$year = $request['mar_year'];
		$result = DB::table('patient_medical_info')->where('pros_id',$request['user_id'])->get();
		$name = DB::table('sales_pipeline')->where('id',$request['user_id'])->first();
		$facility = DB::table('facility')->where('id',$name->facility_id)->first();

		// $ip = file_get_contents("http://ipecho.net/plain");
		// $url = 'http://ip-api.com/json/'.$ip;
		// $tz = file_get_contents($url);
		// $tz = json_decode($tz,true)['timezone'];
		// date_default_timezone_set($tz);
		$days = cal_days_in_month(CAL_GREGORIAN, $month_num, $year);
		$start_month = strtotime("01-".$month_num."-".$year);
		$end_month = strtotime($days."-".$month_num."-".$year);
		$start_month = date('Y-m-d',$start_month);
		$end_month = date('Y-m-d',$end_month);
		$month = date("F", strtotime($start_month));
		$query = DB::table('medicine_history')
			->select('time_to_take_med','mar_date','status','action_performed_on','reason_title','reason_desc','user_id')
			->whereBetween('mar_date',[$start_month,$end_month])
			->get();
		return view('reports.MarReportDetails',compact('start_month','facility','result','name','days','year','month','query'));
	}
	
	//public function get_medicine(){		
		//$medicines = DB::table('medicine')->select('medicine_name')->where('facility_id', Auth::user()->facility_id)->get();
		//return($medicines);		
		//$countries = array()		
		//foreach($medicines as $row) {
			//$countries[] = $row;
		//}		
		//return json_encode($countries);
		//return view('reports.facility_sales_reports', compact('facilities'));
	//}
}
