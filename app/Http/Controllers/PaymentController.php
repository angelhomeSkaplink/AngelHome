<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, Validator, App;
use App\Payment;
use App\crm;

class PaymentController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    
    public function search_hostory(){
        return view('payment.search_view');
    }
	
	public function search_unique_id(Request $request){
		
		$unique_id = $request['unique_id'];
		
		$check_id = DB::table('sales_pipeline')->where('pros_unique_id', $unique_id)->first();
		
		$check_payment = DB::table('payment_info')->where([['pros_id', $check_id->id], ['payment_status', 1]])->first();		
		
		$reports = DB::table('resident_room')
                    ->Join('care_plan', 'resident_room.pros_id', '=', 'care_plan.assessment_id')
					->where([['resident_room.pros_id',$check_id->id], ['care_plan.assessment_id', $check_id->id]])
					->where([['resident_room.status', 1], ['care_plan.care_plan_status', 1]])
                    ->select('resident_room.*','care_plan.*')->first();					
					
		$service_plan_price = DB::table('service_plan')
							->where([['from_range', '<=', $reports->total_point],['to_range', '>=', $reports->total_point], ['facility_id', $check_id->facility_id]])
							->orderBy('to_range', 'DESC')
							->first();
		if($check_payment==NULL){
			$outstanding = 0;
		}else{
			$outstanding = $check_payment->due_ammount;
		}
		
		$total_payable_ammount = ($reports->price)+($service_plan_price->price)+($outstanding);
		return view('payment.payment_history_view', compact('unique_id', 'check_payment', 'check_id', 'reports', 'service_plan_price', 'total_payable_ammount')); 
    }
	
	public function make_payment(Request $request){
		
		$j = DB::table('payment_info')->where('pros_id', $request['pros_id'])->update(['payment_status' => 0]);
		
		$payment = new Payment();
		$payment->pros_id = $request['pros_id'];
		$payment->due_ammount = $request['ammount_pay'] - $request['ammount_paid'];
		$payment->ammount_pay = $request['ammount_pay'];
		$payment->balance	 = $request['due_ammount'];
		$payment->ammount_paid = $request['ammount_paid'];
		$payment->payment_method = "Online Transaction";
		$payment->month = $request['month'];
		$payment->year = $request['year'];
		$payment->payment_status = 1;
		$payment->payment_date = date('Y/m/d');
		$payment->facility_id = $request['facility_id'];
		$payment->save();		
		
		//return redirect('/sales_stage_pipeline');		
    }
	
	public function resident_payment(Request $request){	
	    $val = $request['language'];
		App::setlocale($val);
		$crms = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->paginate(6);
        return view('payment.pipeline_view', compact('crms'));
    }
	
	public function resident_make_payment($id){
		
		$unique_id = $id;
		
		$check_id = DB::table('sales_pipeline')->where('id', $unique_id)->first();
		
		$check_payment = DB::table('payment_info')->where([['pros_id', $check_id->id], ['payment_status', 1]])->first();		
		
		$reports = DB::table('resident_room')
                    ->Join('care_plan', 'resident_room.pros_id', '=', 'care_plan.assessment_id')
					->where([['resident_room.pros_id',$check_id->id], ['care_plan.assessment_id', $check_id->id]])
					->where([['resident_room.status', 1], ['care_plan.care_plan_status', 1]])
                    ->select('resident_room.*','care_plan.*')->first();
		if($reports!=NULL){
			$service_plan_price = DB::table('service_plan')
							->where([['from_range', '<=', $reports->total_point],['to_range', '>=', $reports->total_point], ['facility_id', $check_id->facility_id]])
							->orderBy('to_range', 'DESC')
							->first();
			if($check_payment==NULL){
				$outstanding = 0;
			}else{
				$outstanding = $check_payment->due_ammount;
			}			
			$total_payable_ammount = ($reports->price)+($service_plan_price->price)+($outstanding);
		}else{
			$service_plan_price = 0;
			$total_payable_ammount = 0;
		}	
		return view('payment.resident_payment_history_view', compact('unique_id', 'check_payment', 'check_id', 'reports', 'service_plan_price', 'total_payable_ammount')); 
    }
	
	public function make_payment_res(Request $request){
		
		$j = DB::table('payment_info')->where('pros_id', $request['pros_id'])->update(['payment_status' => 0]);
		
		$payment = new Payment();
		$payment->pros_id = $request['pros_id'];
		$payment->due_ammount = $request['ammount_pay'] - $request['ammount_paid'];
		$payment->ammount_pay = $request['ammount_pay'];
		$payment->balance = $request['due_ammount'];
		$payment->ammount_paid = $request['ammount_paid'];
		//$payment->payment_method = $request['payment_method'];
		$payment->payment_method = "Cash";
		$payment->cheque_no = $request['cheque_no'];
		$payment->month = $request['month'];
		$payment->year = $request['year'];
		$payment->payment_status = 1;
		$payment->payment_date = date('Y/m/d');
		$payment->facility_id = $request['facility_id'];
		$payment->save();		
		
		return redirect('/resident_payment');		
    }
	
	public function payment_report(Request $request){
	    $val = $request['language'];
		App::setlocale($val);
		$reports = DB::table('resident_room')
                    ->Join('care_plan', 'resident_room.pros_id', '=', 'care_plan.assessment_id')
					->Join('sales_pipeline', 'resident_room.pros_id', '=', 'sales_pipeline.id')
					->where([['resident_room.status', 1], ['care_plan.care_plan_status', 1], ['sales_pipeline.facility_id', Auth::user()->facility_id]])
                    ->select('resident_room.*','care_plan.*', 'sales_pipeline.*')->get();
		return view('payment.resident_payment_report', compact('reports')); 
	}
	
	public function detail_history($id){
		$reports = DB::table('payment_info')
					->Join('sales_pipeline', 'payment_info.pros_id', '=', 'sales_pipeline.id')
					->where('payment_info.pros_id', '=', $id)
                    ->select('payment_info.*', 'sales_pipeline.*')->paginate(8);
		return view('payment.resident_payment_details_report_view', compact('reports')); 
	}
	
	public function payment_pros($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('payment.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function payment_pros_email($pros_id){
	    $crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('payment.pipeline_search_view', compact('crms', 'prospectives'));
    }
	
	public function payment_pros_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('payment.pipeline_search_view', compact('crms', 'prospectives'));
    }
    
    public function service_pros_payment($pros_id){		
		$residents = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		foreach ($residents as $row){
			$reports = DB::table('resident_room')
                    ->Join('care_plan', 'resident_room.pros_id', '=', 'care_plan.assessment_id')
					->Join('sales_pipeline', 'resident_room.pros_id', '=', 'sales_pipeline.id')
					->where([['resident_room.status', 1], ['care_plan.care_plan_status', 1], ['sales_pipeline.facility_id', Auth::user()->facility_id], ['sales_pipeline.id', $row->id]])
                    ->select('resident_room.*','care_plan.*', 'sales_pipeline.*')->get();
					
			return view('payment.service_pros_payment', compact('reports')); 
		}
	}

}
