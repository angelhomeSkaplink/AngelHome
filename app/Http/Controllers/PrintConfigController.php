<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB, Auth, App, Input;
use App\PrintConfig;
use App\PrintOrder;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
class PrintConfigController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function print_configuration(Request $request){
      
		App::setlocale(session('locale'));
    $config = DB::table('print_config')->where([['facility_id',Auth::user()->facility_id],['status',1]])->first();
    // dd($config);
    if($config == null){
      $config = new PrintConfig();
      $config->print_config_id = 0;
      $config->facility_id = 0;
      $config->initial_assess = 0;
      $config->screening = 0;
      $config->policy_doc = 0;
      $config->legal_doc = 0;
      $config->lease_signing_doc = 0;
      $config->status = 0;
    }
    return view('print_configuration.print_configuration',compact('config'));
  }

  public function save_print_configuration(Request $request){
    $data = $request->request;
    $initial_assess = 0;
    $screening_arr = array();
    $policy_doc_arr = array();
    $legal_doc_arr = array();
    $lease_signing_arr = array();
    foreach($data as $key=>$value){
      if($value == "main_assessment"){
        $initial_assess = 1;
      }
      if($value == "resp_per" || $value == "sign_per" || $value == "res_details" || $value == "doctor" || $value == "pharmacy" || $value == "med_equip" || $value == "insurance" || $value == "funeral"){
        array_push($screening_arr, $value);
      }
      if($value == "policy_doc"){
        array_push($policy_doc_arr, $key);
      }
      if($value == "legal_doc"){
        array_push($legal_doc_arr, $key);
      }
      if($value == "lease_signing"){
        array_push($lease_signing_arr, $key);
      }
    }
    if(count($screening_arr)>0){
      $screening = implode(",", $screening_arr);
    }else{
      $screening = 0;
    }
    if(count($policy_doc_arr)>0){
      $policy_doc = implode(",", $policy_doc_arr);
    }else{
      $policy_doc = 0;
    }
    if(count($legal_doc_arr)>0){
      $legal_doc = implode(",", $legal_doc_arr);
    }else{
      $legal_doc = 0;
    }
    if(count($lease_signing_arr)>0){
      $lease_signing_doc = implode(",", $lease_signing_arr);
    }else{
      $lease_signing_doc = 0;
    }
    $check_plan = DB::table('print_config')->where([['facility_id',Auth::user()->facility_id],['status',1]])->first();
    if($check_plan){
      $update = DB::table('print_config')
      ->where([['print_config_id',$check_plan->print_config_id]])
      ->update(['initial_assess'=>$initial_assess,'screening'=>$screening,'policy_doc'=>$policy_doc,'legal_doc'=>$legal_doc,'lease_signing_doc'=>$lease_signing_doc]);
    }
    else{
      $new_config = new PrintConfig();
      $new_config->facility_id = Auth::user()->facility_id;
      $new_config->initial_assess = $initial_assess;
      $new_config->screening = $screening;
      $new_config->policy_doc = $policy_doc;
      $new_config->legal_doc = $legal_doc;
      $new_config->lease_signing_doc = $lease_signing_doc;
      $new_config->save();

      $new_order = new PrintOrder();
      $new_order->print_order_id = $new_config->print_config_id;
      $new_order->facility_id = Auth::user()->facility_id;
      $new_order->elm_order = "initial,screening,policy_doc,legal_doc,lease_signing_doc";
      $new_order->save();
    }
    Toastr::success('Print configuration settings saved successfully !');
    return redirect('print_configuration');
  }

  public function reset_print_configuration(Request $request){
    // dd($request);
    $update_config = DB::table('print_config')->where([['print_config_id',$request['print_config_id']],['status',1]])->update(['status'=>0]);
    $update_order = DB::table('print_order')->where([['print_order_id',$request['print_config_id']],['status',1]])->update(['status'=>0]);
    Toastr::success('Print configuration reset done successfully !');
    return redirect('print_configuration');
  }
  public function print_order(Request $request){
    
	App::setlocale(session('locale'));
    $print_order = DB::table('print_order')->where([['facility_id',Auth::user()->facility_id],['status',1]])->select('print_order.elm_order')->first();
    $elm_order = $print_order->elm_order;
    $elm_order = explode(",",$elm_order);
    // dd($elm_order);
    return view('print_configuration.print_order',compact('elm_order'));
  }

  public function save_print_order(Request $request){
    $data = $request->request;
    $elm_arr =array();
    foreach($data as $d){
      if($d == "initial"){
        array_push($elm_arr,$d);
      }elseif($d == "screening"){
        array_push($elm_arr,$d);
      }elseif($d == "policy_doc"){
        array_push($elm_arr,$d);
      }elseif($d == "legal_doc"){
        array_push($elm_arr,$d);
      }elseif($d == "lease_signing_doc"){
        array_push($elm_arr,$d);
      }
    }
    $elm_arr = implode(",",$elm_arr);
    $update_order = DB::table('print_order')->where([['facility_id',Auth::user()->facility_id],['status',1]])->update(['elm_order'=>$elm_arr]);
    Toastr::success('Print order set successfully !');
    return redirect('print_order');
  }
  public function bundle_print(Request $request,$pros_id){
    
	App::setlocale(session('locale'));
    $print_conf=DB::table('print_config')
                ->join('print_order','print_order.print_order_id','=','print_config.print_config_id')
                ->where([['print_config.facility_id',Auth::user()->facility_id],['print_config.status',1],['print_order.facility_id',Auth::user()->facility_id],['print_order.status',1]])->first();
    
    // dd($print_conf);
    $result = DB::table('resident_assessment')
		->where([['resident_assessment.assessment_id','5c0a218643f78'],['resident_assessment.pros_id',$pros_id],['care_plan_date','!=',null]])->orderby('care_plan_date')
    ->first();
    $assessment_json = DB::table('assessment_entry')->where('assessment_id','5c0a218643f78')->first();
		$elements = array();
		$final = array();
		$pages = json_decode($assessment_json->assessment_json)->pages;
		foreach($pages as $p){
			foreach($p->elements as $e)
			array_push($elements,$e);
		}
		
		// $resident = DB::table('sales_pipeline')->where('id',$result->pros_id)->first();
		$ans_elements = json_decode($result->assessment_json);
      foreach($ans_elements->data as $key => $value){
			for($i=0;$i<count($elements);$i++){
				if($key == $elements[$i]->name){
				    $obj = new \stdClass();
					if(property_exists($elements[$i],'choices')){
						$val="";
						$val_arr = array();
						foreach($elements[$i]->choices as $e){
							if(is_array($value)){
								foreach($value as $v){
									if($e->value == $v){
										array_push($val_arr,$e->text);
									}
								}
								$val = implode(",",$val_arr);
							}
							else{
    						if($e->value == $value){
    								$val = $e->text;
    							}
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
    // dd($final);
    $facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
    return view('print_configuration.bundle_print',compact('pros_id','print_conf','final','facility'));
  }

}
