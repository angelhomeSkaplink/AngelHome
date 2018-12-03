<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\crm;
use App\PatientMedicalInfo;
use App\User;
use App\AdmissionPolicies;
use App\MedicineHistory;
use App\Medicine;
use DB, Auth, App, Carbon;

class DoctorController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function patients_list(Request $request)
    {
        $val = $request['language'];
		App::setlocale($val);
        $patients = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)
					->select('sales_pipeline.id', 'sales_pipeline.pros_name', 'sales_pipeline.contact_person', 'sales_pipeline.phone_p', 'sales_pipeline.city_p','sales_pipeline.service_image')
                    ->get();
        return view('doctor.patients_list', compact('patients'));
    }

    public function add_patient_details(Request $request, $id)
    {
        $val = $request['language'];
		App::setlocale($val);
		$medicines = DB::table('medicine')->where('facility_id', Auth::user()->facility_id)->get();
		$name = DB::table('sales_pipeline')->where('id',$id)->first();
        return view('doctor.add_patient_details', compact('name','id', 'medicines'));
    }

    public function store_patient_medical_info(Request $request)
    {
        $day_data = $request['days'];
        $start_date = $request['date_of_prescription'];
		$start =  new Carbon\Carbon($start_date);
		$start_date = $start->toDateString();
		
		$is_prn = $request['is_prn'];
		$prn_reason = $request['prn_reason'];
		$parameter = $request['parameter'];
		$parameter = implode(", ",$parameter);
		$effect_after = $request['effect'];
		
		if ($request['course_date'] !== '') {
			$end_date = $request['course_date'];
			$end =  new Carbon\Carbon($end_date);
			$end_date = $end->toDateString();
		}
		else {
			$start =  new Carbon\Carbon($start_date);
			$start->addYears(2);
			$end_date = $start->toDateString();
		}
		if($request['medicine_name'] == "add"){


			$new_medicine = new Medicine();
			$new_medicine->medicine_name = $request['med_name'];
			$new_medicine->facility_id = Auth::user()->facility_id;
			$new_medicine->save();



			$new_data = new PatientMedicalInfo();
			$new_data->pros_id = $request['pros_id'];
			$new_data->date_of_prescription = $request['date_of_prescription'];
			$new_data->medicine_name = $request['med_name'];
			$new_data->quantity_of_med = $request['quantity_of_med'];
			$new_data->course_date = $end_date;
			$new_data->frequency_in_a_day = $request['frequency'];
			$new_data->time_to_take_med = $request['time_to_take_med'];
			$new_data->on_monday = $request['on_monday'];
			$new_data->on_tuesday = $request['on_tuesday'];
			$new_data->on_wednesday = $request['on_wednesday'];
			$new_data->on_thursday = $request['on_thursday'];
			$new_data->on_friday = $request['on_friday'];
			$new_data->on_saturday = $request['on_saturday'];
			$new_data->on_sunday = $request['on_sunday'];
			$new_data->other_instructions = $request['other_instructions'];
			$new_data->save();
		}else{
		    $day_data = $request['days'];
		    $day_array = [0,0,0,0,0,0,0];
		        if(in_array(1,$day_data)){
		            $day_array[0]=1;
		        }
		        if(in_array(2,$day_data)){
		            $day_array[1]=1;
		        }
		        if(in_array(3,$day_data)){
		            $day_array[2]=1;
		        }
		        if(in_array(4,$day_data)){
		            $day_array[3]=1;
		        }
		        if(in_array(5,$day_data)){
		            $day_array[4]=1;
		        }
		        if(in_array(6,$day_data)){
		            $day_array[5]=1;
		        }
		        if(in_array(7,$day_data)){
		            $day_array[6]=1;
		        }
			$arr = $request['time_to_take_med'];
			$freq_day = $request['frequency'];
			$pat_id = [];
			for ($i=0; $i<$freq_day; $i++) {
				$new_data = new PatientMedicalInfo();
				$new_data->pros_id = $request['pros_id'];
				$new_data->date_of_prescription = $request['date_of_prescription'];
				$new_data->medicine_name = $request['medicine_name'];
				$new_data->quantity_of_med = $request['quantity_of_med'];
				$new_data->course_date = $end_date;
				$new_data->frequency_in_a_day = $request['frequency'];
				$new_data->time_to_take_med = $arr[$i];
				$new_data->on_monday = $day_array[0];
				$new_data->on_tuesday = $day_array[1];
				$new_data->on_wednesday = $day_array[2];
				$new_data->on_thursday = $day_array[3];
				$new_data->on_friday = $day_array[4];
				$new_data->on_saturday = $day_array[5];
				$new_data->on_sunday = $day_array[6];
				$new_data->apply_on = $request['apply_on'];
				$new_data->doctor_name = $request['doctor_name'];
				$new_data->allergy= $request['allergy'];
				$new_data->diet= $request['diet'];
				$new_data->is_prn = $is_prn;
				if($is_prn==1){
				$new_data->prn_reason = $prn_reason;
				$new_data->parameter = $parameter;
				}
				$new_data->other_instructions = $request['other_instructions'];
				$new_data->save();
				// dd($new_data->pat_medi_id);
				array_push($pat_id,$new_data->pat_medi_id);
			}
			while ($start_date <= $end_date) {
				$start = new Carbon\Carbon($start_date);
				$day_name = $start->format('l');
				$flag=0;
				if ($request['all_day'] == 1) {
					$flag=1;
				}
				elseif( $day_array[0] == 1 && $day_name=="Monday"){
					$flag=1;
				}
				elseif( $day_array[1] == 1 && $day_name=="Tuesday"){
					$flag=1;
				}
				elseif( $day_array[2] == 1 && $day_name=="Wednesday"){
					$flag=1;
				}
				elseif( $day_array[3] == 1 && $day_name=="Thursday"){
					$flag=1;
				}
				elseif( $day_array[4] == 1 && $day_name=="Friday"){
					$flag=1;
				}
				elseif( $day_array[5] == 1 && $day_name=="Saturday"){
					$flag=1;
				}
				elseif( $day_array[6] == 1 && $day_name=="Sunday"){
					$flag=1;
				}
				if($flag==1){
					for ($i=0; $i < $freq_day ; $i++) {
						$medicinehistory = new MedicineHistory();
						$medicinehistory->pros_id = $request['pros_id'];
						$medicinehistory->frequency = $freq_day;
						$medicinehistory->mar_date = $start_date;
						$medicinehistory->time_to_take_med= $arr[$i];
						if($is_prn==1){
						    $due_time = $arr[$i];
					        $effect_check_time = strtotime("+ $effect_after minutes", strtotime($due_time));
					        $medicinehistory->effect_after = date('H:i:s', $effect_check_time);
						}
						$medicinehistory->pat_medi_id = $pat_id[$i];
						$medicinehistory->facility_id = Auth::user()->facility_id;
						$medicinehistory->save();
					}
				}
				$start->addDays(1);
				$start_date = $start->toDateString();
			}
		}
		return redirect('view_patient_details/'.$request['pros_id']);
    }

    public function view_patient_details(Request $request, $id)
    {
        $val = $request['language'];
		App::setlocale($val);
		$qry_data = DB::table('patient_medical_info')
		->Join('sales_pipeline', 'sales_pipeline.id', '=', 'patient_medical_info.pros_id')
		->select('patient_medical_info.*')
		->where('patient_medical_info.pros_id', $id)
		->orderBy('patient_medical_info.pat_medi_id', 'DESC')
		->get();

		return view('doctor.view_patient_details', compact('qry_data', 'id'));
        // $qry_data = DB::table('patient_medical_info')
        //             ->Join('sales_pipeline', 'sales_pipeline.id', '=', 'patient_medical_info.pros_id')
        //             ->select('patient_medical_info.*')
        //             ->where('patient_medical_info.pros_id', $id)
        //             ->orderBy('patient_medical_info.pat_medi_id', 'DESC')
        //             ->get();

        // return view('doctor.view_patient_details', compact('qry_data', 'id'));
    }

    public function delete_records($pat_medi_id, $pros_id)
    {
        DB::table('patient_medical_info')
        ->where('pat_medi_id', '=', $pat_medi_id)
        ->delete();

        return redirect('view_patient_details/'.$pros_id);
    }

    // ***** Controller for admission policies
    public function create_policy()
    {
        return view('admission_policies.create_policy');
    }

    public function store_policy_details(Request $request)
    {
        $all_data = array(
            'policy_title' => $request['policy_title'],
            'policy_desc' => $request['policy_description'],
            'pol_effected_date' => $request['pol_effected_date'],
            'policy_status' => 1,
            'facility_id' => 1,
            'user_id' => Auth::user()->user_id,
            'date_of_add' => date("Y-m-d",time()),
        );

        DB::table('admission_policies')
            ->where('policy_status', 1)
            ->update(['policy_status' => 0]);

        $new_data = new AdmissionPolicies();
        $new_data->policy_title = $all_data['policy_title'];
        $new_data->policy_desc = $all_data['policy_desc'];
        $new_data->pol_effected_date = $all_data['pol_effected_date'];
        $new_data->policy_status = $all_data['policy_status'];
        $new_data->facility_id = $all_data['facility_id'];
        $new_data->user_id = $all_data['user_id'];
        $new_data->date_of_add = $all_data['date_of_add'];
        $new_data->save();

        // return view('admission_policies.view_policy');
        return redirect('view_policy');
        // dd($all_data);
    }

    public function edit_policy()
    {
        $qry_data = DB::table('admission_policies')
                    ->select('admission_policies.*')
                    ->where('admission_policies.policy_status', 1)
                    ->get();

        return view('admission_policies.edit_policy', compact('qry_data'));
    }

    public function update_policy(Request $request)
    {
        DB::table('admission_policies')
            ->where('policy_status', 1)
            ->update([
                'policy_title' => $request['policy_title'],
                'policy_desc' => $request['policy_desc'],
                'pol_effected_date' => $request['pol_effected_date'],
            ]);

        return redirect('view_policy');
    }

    public function view_policy()
    {
        $qry_data = DB::table('admission_policies')
                    ->select('admission_policies.*')
                    ->where('admission_policies.policy_status', 1)
                    ->get();

        return view('admission_policies.view_policy', compact('qry_data'));
        // dd($qry_data);
    }

    // Finished from Nilutpal

// 	public function patient_medicine(Request $request){
//         $val = $request['language'];
// 		App::setlocale($val);
// 		$current_date = date("Y-m-d",time());
// 		$medicines = DB::table('patient_medical_info')
// 						->where('patient_medical_info.date_of_prescription', '<=', $current_date)
// 						->where('patient_medical_info.course_date', '>=', $current_date)
// 						->Join('sales_pipeline', 'patient_medical_info.pros_id', '=', 'sales_pipeline.id')
// 						->where('facility_id', Auth::user()->facility_id)
// 						->select('sales_pipeline.*', 'patient_medical_info.*');
// 		$medicines = $medicines->paginate(6);
// 		return view('doctor.medicin_info_view', compact('medicines', 'current_date'));
// 	}
    public function patient_medicine(){
		$current_date = date("Y-m-d",time());
		$medicines = DB::table('patient_medical_info')
		->where('patient_medical_info.date_of_prescription', '<=', $current_date)
		->where('patient_medical_info.course_date', '>=', $current_date)
		->Join('sales_pipeline', 'patient_medical_info.pros_id', '=', 'sales_pipeline.id')
		->where('facility_id', Auth::user()->facility_id)
		->select('sales_pipeline.*', 'patient_medical_info.*');
		//$medicines = $medicines->paginate(6);
		$medicines = $medicines->get();
		return view('doctor.medicin_info_view', compact('medicines', 'current_date'));
	}
	
	public function add_history(Request $request)
	{
		$today = date("Y-m-d",time());
		$action_time = Carbon\Carbon::now();
		$action_time=date('H:i A', strtotime($action_time));
		$status = $request['status'];
		if($status == 0){   //status 0 means none pnr medicine
		    $status = 1;
		}elseif($status == 1){
		    $status = 4;
		}
		else{
		    $status = $request['status'];
		}
		$reason_title = $request['reason_title'];
		$reason_desc = $request['reason_desc'];
		$query = DB::table('medicine_history')->where('pat_medi_id',$request['pat_medi_id'])
		->where('mar_date',$today)->update(['status'=>$status,'action_performed_on'=>$action_time, 'reason_title'=>$reason_title, 'reason_desc'=>$reason_desc, 'user_id'=>Auth::user()->user_id]);
		return redirect('/patient_medicine');
	}
	public function add_prn_history(Request $request){
	    $today = date("Y-m-d",time());
	    $status = $request['status'];
	    $reason_title = $request['reason_title'];
	    $reason_desc = $request['reason_desc'];
	    $qry = DB::table('medicine_history')->where('pat_medi_id',$request['pat_medi_id'])
	    ->where('mar_date',$today)->update(['status'=>$status,'reason_title'=>$reason_title,'reason_desc'=>$reason_desc]);
	    return redirect('/patient_medicine');
	}
	
// 	public function add_history(Request $request)
// 	{
// 		$today = date("Y-m-d",time());
// 		$action_time = Carbon\Carbon::now();
// 		$action_time->toDateTimeString();
// 		$status = $request['status'];
// 		$reason_title = $request['reason_title'];
// 		$reason_desc = $request['reason_desc'];
// 		$query = DB::table('medicine_history')->where('pat_medi_id',$request['pat_medi_id'])
// 		->where('mar_date',$today)->update(['status'=>$status,'action_performed_on'=>$action_time, 'reason_title'=>$reason_title, 'reason_desc'=>$reason_desc, 'user_id'=>Auth::user()->user_id]);
// 		return redirect('/patient_medicine');
// 	}

    public function search_patient($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('doctor.search_patient', compact('crms', 'prospectives'));
    }
	
	public function search_patient_contact($pros_id){		
		$crms = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['contact_person', 'like', '%' .$pros_id. '%']])->get();
		$prospectives = DB::table('sales_pipeline')->where('facility_id', Auth::user()->facility_id)->get();
        return view('doctor.search_patient', compact('crms', 'prospectives'));
    }


}