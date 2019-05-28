<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, Validator, App, Carbon, DateTime;
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
		
		App::setlocale(session('locale'));
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
        return view('reports.facility_view', compact('facilities'));
	}

	public function facility_reports(Request $request,$id){
	    
		App::setlocale(session('locale'));
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
		
		App::setlocale(session('locale'));
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
	    
	    App::setlocale(session('locale'));
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get(); 
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
        return view('reports.facility_room_view', compact('facilities', 'group'));
	}
	
	public function facility_room_reports(Request $request,$id){
	    
		App::setlocale(session('locale'));
		$reports = DB::table('facility_room')					
					->where('facility_room.facility_id', '=', $id)
                    ->select('facility_room.*')->get();
		
		return view('reports.facility_unit_view', compact('reports','id')); 
	}
	
	public function date_range_room_report(Request $request){
		
		App::setlocale(session('locale'));
		$from = $request['from'];
		$to = $request['to'];
		$id = $request['facility_id'];		
		$reports = DB::table('resident_room')->whereBetween('resident_room.booked_date',[$from,$to])			
					->where('resident_room.facility_id', '=', $id)
                    ->select('resident_room.*')->get();
		$vacants = DB::table('facility_room')->where([['facility_room.facility_id', '=', $id],['room_status', 0]])->get();
					
		return view('reports.date_range_room_report_view', compact('reports', 'id', 'to', 'from', 'vacants')); 
	}
	
	public function facility_graph_reports(Request $request,$id){
	    
		App::setlocale(session('locale'));
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
	
	public function facility_room_graph(Request $request,$id){
		
		App::setlocale(session('locale'));
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
	    
	    App::setlocale(session('locale'));
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
        return view('reports.facility_aging_view', compact('facilities', 'group'));
	}
	
	public function facility_aging_graph_reports(Request $request, $id){
	    
		App::setlocale(session('locale'));
		
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
		
		App::setlocale(session('locale'));
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		$group = DB::table('facility')
		->Join('facility_owner', 'facility.facility_owner_id', '=', 'facility_owner.id')
		->where('facility.id', Auth::user()->facility_id)->first();
		return view('reports.facility_sales_reports', compact('facilities', 'group'));
	}
	
	public function facility_sales_reports_detail(Request $request,$id){
	    
		App::setlocale(session('locale'));
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
	    
	    App::setlocale(session('locale'));
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
		
		App::setlocale(session('locale'));
		$facilities = DB::table('facility')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
        return view('reports.facility_task_view', compact('facilities'));
	}

	public function facility_task_graph_reports(Request $request, $id){	
	    
		App::setlocale(session('locale'));
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
	
	public function activity_graph(Request $request,$id){
	    
		App::setlocale(session('locale'));
		return view('reports.activity_graph', compact('id'));
	}
	
	public function attendee_report_graph(Request $request, $id){
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
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
	    
		App::setlocale(session('locale'));
		$group = $get_facilities = DB::table('facility_owner')->where('id', Auth::user()->facility_owner_id)->first();
		return view('reports.facility_aggregated_room_graph', compact('group'));
	}
	
	public function facility_aggregated_room_graph_data(Request $request){
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
	    
		App::setlocale(session('locale'));
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$vacant = DB::table('facility_room')->select(DB::raw('COUNT(room_status) as vacant_position'), 'room_status', 'facility_id')->where('facility_id', $row->id)->groupBy('room_status')->first();	
			$room = DB::table('facility_room')->select(DB::raw('COUNT(room_id) as room_id'), 'room_status', 'facility_id')->where('facility_id', $row->id)->first();	
			return view('reports.facility_aggregated_room_status', compact('vacant', 'room'));				
		}
	}
	
	public function facility_aggregated_sales_report(Request $request){	
	    
		App::setlocale(session('locale'));
		$get_facilities = DB::table('facility')->select('id')->where('facility_owner_id', Auth::user()->facility_owner_id)->get();
		foreach ($get_facilities as $row){
			$reports = DB::table('sales_pipeline')->where('facility_id', $row->id)->get();
			return view('reports.facility_aggregated_sales_report', compact('reports'));
		}		
    }
	
	public function facility_aggregated_aging_report(Request $request){	
	    
		App::setlocale(session('locale'));
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
	public function mar_report(Request $request){
	    
		App::setlocale(session('locale'));
		$today = Carbon\Carbon::now()->toDateString();
		$join = DB::table('patient_medical_info')
		->join('sales_pipeline','patient_medical_info.pros_id','=','sales_pipeline.id')
		->select('sales_pipeline.id','sales_pipeline.pros_name','sales_pipeline.service_image')
		// ->where('patient_medical_info.date_of_prescription', '<=', $today)
		// ->where('patient_medical_info.course_date', '>=', $today)
		->where('sales_pipeline.facility_id',Auth::user()->facility_id)
		->distinct()
		->get();
		return view('reports.MarReport',compact('join'));
	}
	public function mar_report_details(Request $request,$id){
	    
		App::setlocale(session('locale'));
		$result = DB::table('patient_medical_info')->where('pros_id',$id)
		->join('medicine_frequency','patient_medical_info.pat_medi_id','=','medicine_frequency.pat_med_id')->get();
// 		dd($result);
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
		return view('reports.MarReportDetails',compact('start_month','facility','result','name','days','year','month','query'));
	}
	public function mar_monthly_report(Request $request){
	    
		App::setlocale(session('locale'));
		$month_num = $request['mar_month'];
		$year = $request['mar_year'];
		$result = DB::table('patient_medical_info')->where('pros_id',$request['user_id'])
		->join('medicine_frequency','patient_medical_info.pat_medi_id','=','medicine_frequency.pat_med_id')->get();
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
	
	public function resident_service_plan_graph(Request $request){
	    
		App::setlocale(session('locale'));
        return view('reports.resident_service_plan_report');
    }
	public function resident_service_plan_graph_data(Request $request){
				$data = DB::table('pros_service')
								->where([['pros_service.status',1],['pros_service.facility_id',Auth::user()->facility_id]])
								->join('service_plan','service_plan.service_plan_id','=','pros_service.service_plan_id')
								->join('sales_pipeline','pros_service.pros_id','=','sales_pipeline.id')
								->where('sales_pipeline.stage',"MoveIn")
								->select('pros_service.*','service_plan.*')
								->get();
				// dd($data);
				$arr = array();
                if($data->isEmpty()){
					array_push($arr,0,'None');
                    return json_encode($arr);
                }else{
                    $service_plan = DB::table('service_plan')->where([['service_plan_status', 1], ['facility_id', Auth::user()->facility_id]])->get();
                    foreach($service_plan as $p){
                        $c=0;
                        foreach($data as $d){
                            if($p->service_plan_name === $d->service_plan_name){
                                $c=$c+1;
                            }
                        }
                        array_push($arr,$c,$p->service_plan_name);
                    }
                    return json_encode($arr);
                }
            }

		public function residents_in_each_service_plan(Request $request,$plan){
		    
		App::setlocale(session('locale'));
			$data = DB::table('service_plan')
							->join('pros_service','service_plan.service_plan_id','=','pros_service.service_plan_id')
							->join('sales_pipeline','sales_pipeline.id','=','pros_service.pros_id')
							->where([['service_plan.service_plan_name',$plan],['service_plan.facility_id', Auth::user()->facility_id],['service_plan.service_plan_status',1],['pros_service.status',1],['sales_pipeline.facility_id',Auth::user()->facility_id],['sales_pipeline.stage',"MoveIn"]])
							->get();
			// dd($data);
			return view('reports.res_in_each_service_plan', compact('plan','data'));
		}
		public function assessment_report_graph(Request $request){
		    
		    App::setlocale(session('locale'));
			return view('reports.assessment_report_graph');
		}
		public function assessment_report_graph_data(Request $request){
			$data = DB::table('resident_assessment')->where([['assessment_id',"5c0a218643f78"],['assessment_status',1]])->get();
			$return_arr= array();
            if($data->isEmpty()){
    			array_push($return_arr,0,'None');
            }else{
                $lebel_arr=json_decode($data[0]->result_json);
    			$len = count($lebel_arr);
    			$ans_arr = array_fill(0,$len,0);
    			foreach($data as $d){
    				$data_array = json_decode($d->result_json);
    				for($i=0;$i<count($data_array);$i++){
    					if($data_array[$i]->Ans == "yes"){
    						$ans_arr[$i] = $ans_arr[$i]+1;
    					}
    				}				
    			}
    			for($i=0;$i<$len;$i++){
    				$obj= new \stdClass();
    				$obj->Page = $lebel_arr[$i]->Page;
    				$obj->Count = $ans_arr[$i];
    				array_push($return_arr, $obj);
    			}
            }
			return json_encode($return_arr);
		}
		
		public function residents_in_each_assessment(Request $request,$assessment_index){
		    
		App::setlocale(session('locale'));
		  //$assessment = str_replace('_', '/', $assessment);
		    $data = DB::table('resident_assessment')->where([['assessment_id',"5c0a218643f78"],['assessment_status',1]])->get();
			$pros_arr= array();
			foreach($data as $d){
				$data_array = json_decode($d->result_json);
				if($data_array[$assessment_index]->Ans == "yes"){
				   array_push($pros_arr, $d->pros_id); 
				}
				
				$assessment = $data_array[$assessment_index]->Page;
			}
			$residents = DB::table('sales_pipeline')
			                  ->select('sales_pipeline.*')
			                  ->where('facility_id',Auth::user()->facility_id)
			                  ->wherein('id',$pros_arr)
			                  ->get();
		    return view('reports.res_in_each_assessment', compact('assessment','residents'));
		}
		
		public function individual_page_in_main_assessment(Request $request,$pros_id, $assessment){
		    
		App::setlocale(session('locale'));
		  $assessment_page = str_replace('_', '/', $assessment);
		  
		  $assessment_qs = DB::table('assessment_entry')
            ->where('assessment_entry.assessment_id','5c0a218643f78')
            ->select('assessment_entry.*')
            ->first();
		  $assessment_qs = json_decode($assessment_qs->assessment_json)->pages;
		  
           
		  foreach($assessment_qs as $key=>$qs){
		      if($qs->name == $assessment_page){
		          $question_set = $qs->elements;
		          // dd($qs->element);
		          $page_index = $key;
		      }
		  }
		  
    	  $data = DB::table('resident_assessment')->where([['pros_id',$pros_id],['assessment_id',"5c0a218643f78"],['assessment_status',1]])->first();
    	  $assessment_ans=json_decode($data->assessment_json);
		  $qs_ans_arr = array();
		  foreach($question_set as $q){
    		  foreach($assessment_ans->data as $key=>$value){
    		      if($q->name == $key){
    		          $obj= new \stdClass();
    		          if(property_exists($q,'choices')){
    		             foreach($q->choices as $ch){
    		                 if($ch->value==$value){
    		                   $obj->Answer = $ch->text;  
    		                 }
    		             } 
    		          }else{
    		            $obj->Answer = $value; 
    		          }
        			  $obj->Question = $q->title;
        			  array_push($qs_ans_arr, $obj);
    		      }
    		  }
		  }
		  $pros_details = DB::table('sales_pipeline')->where([['id',$pros_id],['facility_id',Auth::user()->facility_id]])
		                      ->join('resident_details','resident_details.pros_id','=','sales_pipeline.id')->where('resident_details.status',1)
		                      ->first();
		  $dob=$pros_details->dob;
          $age = (date('Y') - date('Y',strtotime($dob)));
          $facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		  return view('assessment.main_assessment_individual_page_qs_ans', compact('pros_details','qs_ans_arr','assessment_page','page_index','age','facility'));  
		}
		public function getUpcoming(Request $request){
			App::setlocale(session('locale'));
			if($request['from_date']==null && $request['to_date']==null){
				$today = new DateTime('now');
				date_add($today,date_interval_create_from_date_string("7 days"));
				$next = date_format($today,"Y-m-d");
				date_sub($today,date_interval_create_from_date_string("14 days"));
				$earlier = date_format($today,"Y-m-d");
			}
			else{
				$next = $request['to_date'];
				$earlier =$request['from_date'];
			}

			$result = DB::table('next_assessment')->whereBetween('next_assessment_date',[$earlier,$next])
			->join('sales_pipeline','next_assessment.pros_id','=','sales_pipeline.id')->paginate(6);
			return view('reports.assessment_dates',compact('result','next','earlier'));
		}
		public function getMedicReport(Request $request){
			App::setlocale(session('locale'));
			if ($request['rep_date']==null && $request['status']==null) {
				$date = new DateTime('now');
				$date = date_format($date,"Y-m-d");
				$status = 0;
			}
			else{
				$date = $request['rep_date'];
				$status = $request['status'];
			}
			if($status==1){
				$result = DB::table('medicine_history')->where([['mar_date',$date],['status',1]])
				->where(DB::raw('TIMEDIFF(action_performed_on,time_to_take_med)'),'>','01:00:00')
				->where('medicine_history.facility_id',Auth::user()->facility_id)
				->join('sales_pipeline','medicine_history.pros_id','=','sales_pipeline.id')
				->paginate(6);
			}
			elseif ($status==4) {
				$result = DB::table('medicine_history')->where([['mar_date',$date],['status',1]])
				->where(DB::raw('TIMEDIFF(time_to_take_med,action_performed_on)'),'>','01:00:00')
				->where('medicine_history.facility_id',Auth::user()->facility_id)
				->join('sales_pipeline','medicine_history.pros_id','=','sales_pipeline.id')
				->paginate(6);
			}
			else{
				$result = DB::table('medicine_history')->where([['mar_date',$date],['status',$status]])
				->where('medicine_history.facility_id',Auth::user()->facility_id)
				->join('sales_pipeline','medicine_history.pros_id','=','sales_pipeline.id')
				->paginate(6);
			}
			return view('reports.medReports',compact('result','date','status'));
		}
		public function fallReport(Request $request){
			App::setlocale(session('locale'));
			$earlier = date("Y-m-01");
			$next = date("Y-m-d");
			$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
			return view('reports.fallReport',compact('earlier','next','facility'));
		}
		public function fallReportData(Request $request){
			App::setlocale(session('locale'));
			if($request['from_date']==null && $request['to_date']==null){
				$earlier = date("Y-m-01");
				$next = date("Y-m-d");
			}
			else{
				$next = $request['to_date'];
				$earlier =$request['from_date'];
			}
			$result = DB::table('resident_injury')->where([['event_code',"Fall"],['resident_injury.facility_id',Auth::user()->facility_id]])
			->whereBetween('resident_injury.injury_date',[$earlier,$next])
			->join('sales_pipeline','resident_injury.pros_id','=','sales_pipeline.id')
			->join('resident_room','resident_injury.pros_id','=','resident_room.pros_id')
			->where('resident_room.status',1)
			->join('facility_room','resident_room.room_id','=','facility_room.room_id')			
			->get();
			return $result;
		}
		public function fallGraphData(Request $request){
			if($request['from_date']==null && $request['to_date']==null){
				$earlier = date("Y-m-01");
				$next = date("Y-m-d");
			}
			else{
				$next = $request['to_date'];
				$earlier =$request['from_date'];
			}
			$final = DB::table('resident_injury')->where([['event_code',"Fall"],['facility_id',Auth::user()->facility_id]])
			->whereBetween('resident_injury.injury_date',[$earlier,$next])
			->get();
			
			$data = array();
			if($final->isEmpty()){
				array_push($data,0,'None');
			}else{
				$inj = 0;
				$restrained = 0;
				foreach ($final as $row) {				
					if ($row->injury_code != "No injury") {
						$inj += 1;
					}
					if($row->use_of_wc == "Yes"){
						$restrained += 1;
					}
				}
				$inj = $inj/count($final);
				$restrained = $restrained/count($final);

				// array_push($data,$inj,"Injured");
				// return $data;
				$LabelArray=array(); 
				$CountArray=array(); 
				array_push($LabelArray, "Falls Resulting in Injury", "Falls with restraint in use");
				array_push($CountArray, $inj, $restrained);
				for($i=0;$i<2;$i++){
    				$obj= new \stdClass();
    				$obj->Label = $LabelArray[$i];
    				$obj->Count = $CountArray[$i];
    				array_push($data, $obj);
    			}					
			}
			return json_encode($data);
				
		}
		public function postEvalFall(Request $request){
			App::setlocale(session('locale'));
			$earlier = date("Y-m-01");
			$next = date("Y-m-d");
			$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
			return view('reports.postEvalFallReport',compact('earlier','next','facility'));
		}
		public function postEvalFallData(Request $request){
			$history_of_fall = 0;
			$acute_problem = 0;
			$chronic_problem = 0;
			$medication = 0;
			$functional = 0;
			$sensory = 0;
			$psycho = 0;
			if($request['from_date']==null && $request['to_date']==null){
				$earlier = date("Y-m-01");
				$next = date("Y-m-d");
			}
			else{
				$next = $request['to_date'];
				$earlier =$request['from_date'];
			}
			$result = DB::table('resident_injury')->where([['event_code',"Fall"],['resident_injury.facility_id',Auth::user()->facility_id]])
			->whereBetween('resident_injury.injury_date',[$earlier,$next])
			->get();
			$data = array();
			if($result->isEmpty()){
				$data = null;
			}
			else{
			$fall_res = array();
			foreach ($result as $item) {
				if(!in_array($item->pros_id,$fall_res)){
					array_push($fall_res, $item->pros_id);
				}
			}
			foreach ($fall_res as $item){
				$fall_history = DB::table('resident_injury')->where([['event_code',"Fall"]])->where('pros_id',$item)->get();
				if ($fall_history->count()>1) {
					$history_of_fall += 1;
				}
			}
			foreach ($result as $item) {
				if($item->acute_medical == "Yes"){
					$acute_problem += 1;
				}
				if($item->chronic_medical == "Yes"){
					$chronic_problem += 1;
				}
				if($item->medication == "Yes"){
					$medication += 1;
				}
				if($item->functional_stat == "Yes"){
					$functional += 1;
				}
				if($item->sensory_stat == "Yes"){
					$sensory += 1;
				}
				if($item->psycho_stat == "Yes"){
					$psycho += 1;
				}
			}
			$history_of_fall_per = ($history_of_fall/count($result))*100;
			$acute_problem_per = ($acute_problem/count($result))*100;
			$chronic_problem_per = ($chronic_problem/count($result))*100;
			$medication_per = ($medication/count($result))*100;
			$functional_per = ($functional/count($result))*100;
			$sensory_per = ($sensory/count($result))*100;
			$psycho_per=($psycho/count($result))*100;

			$PercentageArray = array();
			$LabelArray=array(); 
			$CountArray=array(); 
			array_push($LabelArray, "History Of Falls", "Underlying Acute Medical Problems ", "Underlying Chronic Medical Problems", "Medications","Functional Status","Sensory Status","Psychologocal Status");
			array_push($CountArray, $history_of_fall, $acute_problem, $chronic_problem,$medication,$functional,$sensory,$psycho);
			array_push($PercentageArray, $history_of_fall_per, $acute_problem_per, $chronic_problem_per,$medication_per,$functional_per,$sensory_per,$psycho_per);
			for($i=0;$i<7;$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray[$i];
				$obj->Count = $CountArray[$i];
				$obj->Percentage = $PercentageArray[$i];
				array_push($data, $obj);
			}
		}
			return $data;
	}
	
	public function postEvalFallGraphData(Request $request){
		$history_of_fall = 0;
		$acute_problem = 0;
		$chronic_problem = 0;
		$medication = 0;
		$functional = 0;
		$sensory = 0;
		$psycho = 0;
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("2019-05-02");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}
		$result = DB::table('resident_injury')->where([['event_code',"Fall"],['resident_injury.facility_id',Auth::user()->facility_id]])
		->whereBetween('resident_injury.injury_date',[$earlier,$next])
		->get();
		$data = array();
		if($result->isEmpty()){
			array_push($data,0,'None');
		}else{
		$fall_res = array();
		foreach ($result as $item) {
			if(!in_array($item->pros_id,$fall_res)){
				array_push($fall_res, $item->pros_id);
			}
		}
		foreach ($fall_res as $item){
			$fall_history = DB::table('resident_injury')->where([['event_code',"Fall"]])->where('pros_id',$item)->get();
			if ($fall_history->count()>1) {
				$history_of_fall += 1;
			}
		}
		foreach ($result as $item) {
			if($item->acute_medical == "Yes"){
				$acute_problem += 1;
			}
			if($item->chronic_medical == "Yes"){
				$chronic_problem += 1;
			}
			if($item->medication == "Yes"){
				$medication += 1;
			}
			if($item->functional_stat == "Yes"){
				$functional += 1;
			}
			if($item->sensory_stat == "Yes"){
				$sensory += 1;
			}
			if($item->psycho_stat == "Yes"){
				$psycho += 1;
			}
		}
		$history_of_fall = $history_of_fall/count($result);
		$acute_problem = $acute_problem/count($result);
		$chronic_problem = $chronic_problem/count($result);
		$medication =$medication/count($result);
		$functional = $functional/count($result);
		$sensory = $sensory/count($result);
		$psycho=$psycho/count($result);

		$LabelArray=array(); 
		$CountArray=array(); 
		array_push($LabelArray, "History Of Falls", "Underlying Acute Medical Problems ", "Underlying Chronic Medical Problems", "Medications","Functional Status","Sensory Status","Psychological Status");
		array_push($CountArray, $history_of_fall, $acute_problem, $chronic_problem,$medication,$functional,$sensory,$psycho);
		for($i=0;$i<7;$i++){
			$obj= new \stdClass();
			$obj->Label = $LabelArray[$i];
			$obj->Count = $CountArray[$i];
			array_push($data, $obj);
		}	
		return json_encode($data);
		}
	}
	public function fallDay(Request $request){
		App::setlocale(session('locale'));
		$earlier = date("Y-m-01");
		$next = date("Y-m-d");
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		return view('reports.fallDayReport',compact('earlier','next','facility'));
	}
	public function fallDayData(Request $request){
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("2019-05-02");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}
		$mixData = array();
		$data1 = array();
		$data2 = array();
		$result = DB::table('resident_injury')->where([['event_code',"Fall"],['facility_id',Auth::user()->facility_id]])
		->whereBetween('resident_injury.injury_date',[$earlier,$next])
		->get();
		if(count($result)==0){
			array_push($mixData,0,'None');
		}else{
			$mon = 0;
			$tue = 0;
			$wed = 0;
			$thu = 0;
			$fri = 0;
			$sat = 0;
			$sun = 0;
			foreach ($result as $item) {
				$dateDay = strtotime($item->injury_date);
				$Day = date("l",$dateDay);
				switch ($Day) {
					case 'Monday':
						$mon += 1;
						break;
					case 'Tuesday':
						$tue += 1;
						break;
					case 'Wednesday':
						$wed+=1;
						break;
					case 'Thursday':
						$thu+=1;
						break;
					case 'Friday':
						$fri+=1;
						break;
					case 'Saturday':
						$sat+=1;
						break;
					default:
						$sun+=1;
						break;
				}
			}
			$mon_ = $mon/count($result);
			$tue_ =$tue/count($result);
			$wed_ =$wed/count($result); 
			$thu_ =$thu/count($result);
			$fri_ =$fri/count($result);
			$sat_ =$sat/count($result);
			$sun_ =$sun/count($result);
			
			$LabelArray1=array(); 
			$CountArray1=array();
			$PercentageArray1= array();
			$CountGraph1 = array();

			array_push($LabelArray1, "Monday", "Tuesday ", "Wednesday", "Thursday","Friday","Saturday","Sunday");
			array_push($CountArray1, $mon, $tue, $wed,$thu,$fri,$sat,$sun);
			array_push($CountGraph1,$mon_,$tue_,$wed_,$thu_,$fri_,$sat_,$sun_);
			array_push($PercentageArray1,$mon_*100,$tue_*100,$wed_*100,$thu_*100,$fri_*100,$sat_*100,$sun_*100);
			for($i=0;$i<7;$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray1[$i];
				$obj->Count = $CountArray1[$i];
				$obj->CountGraph = $CountGraph1[$i];
				$obj->Percentage = $PercentageArray1[$i];
				array_push($data1, $obj);
			}
			$shifts = DB::table('shift_master')->where([['facility_id',Auth::user()->facility_id],['status',1]])->get();
			$LabelArray2=array(); 
			$CountArray2=array();

			foreach ($shifts as $item) {
				array_push($LabelArray2,$item->shift_title);
				array_push($CountArray2,0);
			}
			foreach($result as $item){
				$dt = DateTime::createFromFormat("h : i a", $item->fall_time);
				$datetime = date_format($dt,"H:i:s");
				echo $datetime;
				foreach ($shifts as $key => $value) {
					if (($datetime >= $value->shift_start_time && $datetime <= $value->shift_end_time)||($datetime <= $value->shift_start_time && $datetime >= $value->shift_end_time)) {
						$CountArray2[$key] += 1;
					}
				}
			}
			for($i=0;$i<count($shifts);$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray2[$i];
				$obj->Count = $CountArray2[$i];
				$obj->CountGraph = $CountArray2[$i]/count($result);
				$obj->Percentage = ($CountArray2[$i]/count($result))*100;
				array_push($data2, $obj);
			}
			
			array_push($mixData,$data1);
			array_push($mixData,$data2);

		}
		return json_encode($mixData);
	}
	public function timeSlot(){
		App::setlocale(session('locale'));
		$earlier = date("Y-m-01");
		$next = date("Y-m-d");
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		return view('reports.timeSlot',compact('earlier','next','facility'));
	}
	public function timeSlotData(Request $request){
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("2019-05-02");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}
		$data = array();
		$result = DB::table('resident_injury')->where([['event_code',"Fall"],['facility_id',Auth::user()->facility_id]])
		->whereBetween('resident_injury.injury_date',[$earlier,$next])
		->get();
		
		if(count($result)==0){
			array_push($data,0,'None');
		}else{
			$tsc1 = 0;
			$tsc2 = 0;
			$tsc3 = 0;
			$tsc4 = 0;
			$tsc5 = 0;
			$tsc6 = 0;
			$tsc7 = 0;
			$tsc8 = 0;
			$tsc9 = 0;
			$tsc10 = 0;
			foreach ($result as $item) {
				$dt = DateTime::createFromFormat("h : i a", $item->fall_time);
				$datetime = date_format($dt,"H:i");
				if ($datetime>='07:00' && $datetime<='09:59') {
					$tsc1 +=1;
				} else if ($datetime>='10:00' && $datetime<='11:59') {
					$tsc2 += 1;
				}
				else if ($datetime>='12:00' && $datetime<='13:29') {
					$tsc3 += 1;
				}
				else if ($datetime>='13:30' && $datetime<='14:59') {
					$tsc4 += 1;
				}
				else if ($datetime>='15:00' && $datetime<='16:59') {
					$tsc5 += 1;
				}
				else if ($datetime>='17:00' && $datetime<='19:59') {
					$tsc6 += 1;
				}
				else if ($datetime>='20:00' && $datetime<='22:59') {
					$tsc7 += 1;
				}
				else if ($datetime>='23:00' && $datetime>='00:59') {
					$tsc8 += 1;
				}
				else if ($datetime<'01:00' && $datetime>='4:59') {
					$tsc9 += 1;
				}
				else{
					$tsc10 += 1;
				}
				
			}

			$LabelArray=array(); 
			$CountArray=array(); 
			$PercentageArray= array();
			$CountGraph = array();

			array_push($LabelArray, "7 am to 9:59 am", "10 am to 11:59 am ", "12 pm to 1:29 pm", "1:30 pm to 2:59 pm","3 pm to 4:59 pm","5 pm to 7:59 pm","8 pm to 10:59 pm","11 pm to 12:59 am","1 am to 4:59 am","5 am to 6:59 am");
			array_push($CountArray, $tsc1, $tsc2, $tsc3, $tsc4, $tsc5, $tsc6, $tsc7, $tsc8, $tsc9, $tsc10);
			array_push($CountGraph,$tsc1/count($result),$tsc2/count($result),$tsc3/count($result),$tsc4/count($result),$tsc5/count($result),$tsc6/count($result),$tsc7/count($result),$tsc8/count($result),$tsc9/count($result),$tsc10/count($result));
			array_push($PercentageArray,($tsc1/count($result))*100,($tsc2/count($result))*100,($tsc3/count($result))*100,($tsc4/count($result))*100,($tsc5/count($result))*100,($tsc6/count($result))*100,($tsc7/count($result))*100,($tsc8/count($result))*100,($tsc9/count($result))*100,($tsc10/count($result))*100);

			for($i=0;$i<10;$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray[$i];
				$obj->Count = $CountArray[$i];
				$obj->CountGraph = $CountGraph[$i];
				$obj->Percentage = $PercentageArray[$i];
				array_push($data, $obj);
			}
		}	
		return json_encode($data);
	}
	public function locationSummary(){
		App::setlocale(session('locale'));
		$earlier = date("Y-m-01");
		$next = date("Y-m-d");
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		return view('reports.locationSummary',compact('earlier','next','facility'));
	}
	public function locationData(Request $request){
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("2019-05-02");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}

		$data = array();
		$locCodes = DB::table('location_code')->select('location_code')->get();
		$LabelArray = array();
		foreach ($locCodes as $item) {
			array_push($LabelArray,$item->location_code);
		}
		$count = array();
		foreach ($LabelArray as $key => $value) {
			$count[$key] = 0;
		}
		$result = DB::table('resident_injury')->where([['event_code',"Fall"],['facility_id',Auth::user()->facility_id]])->select('location_code')
		->whereBetween('resident_injury.injury_date',[$earlier,$next])
		->get();
		if(count($result)==0){
			array_push($data,0,'None');
		}else{
			foreach ($LabelArray as $key => $value) {
				foreach ($result as $item) {
					if ($item->location_code == $value) {
						$count[$key] += 1;
					}
				}
			}
			for($i=0;$i<count($LabelArray);$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray[$i];
				$obj->Count = $count[$i];
				$obj->CountGraph = $count[$i]/count($result);
				$obj->Percentage = ($count[$i]/count($result))*100;
				array_push($data, $obj);
			}	
		}
		return json_encode($data);
	}
	public function injurySummary(){
		App::setlocale(session('locale'));
		$earlier = date("Y-m-01");
		$next = date("Y-m-d");
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		return view('reports.injurySummary',compact('earlier','next','facility'));
	}
	public function injuryData(Request $request){
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("2019-05-02");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}
		$mixData = array();
		$data = array();
		$data2 = array();
		$LabelArray2 = ["Treatment in Facility","Admission to Hospital"];
		$CountArray2 = [0,0];
		$locCodes = DB::table('injury_code')->select('injury_code')->get();
		$LabelArray = array();
		foreach ($locCodes as $item) {
			array_push($LabelArray,$item->injury_code);
		}
		$count = array();
		foreach ($LabelArray as $key => $value) {
			$count[$key] = 0;
		}
		$result = DB::table('resident_injury')->where([['event_code',"Fall"],['facility_id',Auth::user()->facility_id]])
		->whereBetween('resident_injury.injury_date',[$earlier,$next])
		->get();
		if(count($result)==0){
			array_push($mixData,0,'None');
		}else{
			foreach ($LabelArray as $key => $value) {
				foreach ($result as $item) {
					if ($item->injury_code == $value) {
						$count[$key] += 1;
					}
				}
			}
			for($i=0;$i<count($LabelArray);$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray[$i];
				$obj->Count = $count[$i];
				$obj->CountGraph = $count[$i]/count($result);
				$obj->Percentage = ($count[$i]/count($result))*100;
				array_push($data, $obj);
			}
			foreach ($result as $item) {
				if ($item->check_notice == "on") {
					$CountArray2[1] += 1;
				}
				else{
					$CountArray2[0]+=1;
				}
			}
			for($i=0;$i<2;$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray2[$i];
				$obj->Count = $CountArray2[$i];
				$obj->CountGraph = $CountArray2[$i]/count($result);
				$obj->Percentage = ($CountArray2[$i]/count($result))*100;
				array_push($data2, $obj);
			}
			array_push($mixData,$data);
			array_push($mixData,$data2);
		}
		return json_encode($mixData);
	}
	public function vistaViewReport(){
		App::setlocale(session('locale'));
		$earlier = date("Y-m-01");
		$next = date("Y-m-d");
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		return view('reports.vistaViewReport',compact('earlier','next','facility'));
	}
	public function vistaViewData(Request $request){
		if($request['from_date']==null && $request['to_date']==null){
			$earlier = date("2018-01-01");
			$next = date("Y-m-d");
		}
		else{
			$next = $request['to_date'];
			$earlier =$request['from_date'];
		}
		$data = array();
		$LabelArray = ["Attempt to Contact",
				"Cold",
				"Contact in Future",
				"Hot Lead",
				"Junk Lead",
				"Lost Lead",
				"Not Interested",
				"Warm Lead",
				"Tour",
				"Re-Tour",
				"MoveIn",
				"Appointment",
				"Inquiry",
				"Discovery",
				"Lease-Signing"
			];
		$CountArray = array();
		foreach ($LabelArray as $key => $value) {
			array_push($CountArray,0);
		}
		$result = DB::table('sales_pipeline')->where('facility_id',Auth::user()->facility_id)
		->whereBetween('sales_pipeline.date',[$earlier,$next])
		->get();
		if(count($result)==0){
			array_push($data,0,'None');
		}else{
			foreach ($LabelArray as $key => $value) {
				foreach ($result as $item) {
					if ($item->stage == $value) {
						$CountArray[$key] += 1;
					}
				}
			}
			for($i=0;$i<count($LabelArray);$i++){
				$obj= new \stdClass();
				$obj->Label = $LabelArray[$i];
				$obj->Count = $CountArray[$i];
				array_push($data, $obj);
			}
		}
		return json_encode($data);
	}
	

}