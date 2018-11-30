<?php

namespace App\Http\Controllers;
use Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\post;
use App\department;
use App\servicebook;
use App\promotion;
use App\employee_policy;
use App\logbook;
use App\transfer;
use App\pay_scale;
use App\grade_pay;
use App\expanse;
use App\ex_gratia;
use App\tax;
use App\employee;
use DB, Auth, Input, Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	public function index(){
		return view('post');
	}
	
	public function poststore(Request $request){
	$post = Request::all();
	$post_name = DB::table('posts')->where([['fld_PostName', $post['fld_PostName']], ['fld_Status', 1]])->get();
	if(count($post_name)>0){
		$msg = "Post Already Exists";
	}else{
		$max_value= DB::table('posts')
			->select(DB::raw('MAX(fld_PostID) as fld_PostID'))
			->first();
			$data =[
				'fld_PostID' => $max_value->fld_PostID+1,
				'fld_PostName' => $post['fld_PostName'],
				'fld_TotalPost' => $post['fld_TotalPost'],
				'fld_SanctionNo' => $post['fld_SanctionNo'],
				'fld_SanctionDate' => $post['fld_SanctionDate'],
				'fld_Status' => 1
			];		
			$row = DB::table('posts')->insert($data);	
			return redirect('/post_view');
		}
		return redirect('post')->with('msg', $msg);
    }
	
	public function post_view(){
        $posts = DB::table('posts')->where('fld_Status', '1')->get();
        return view('post_view', compact('posts'));
    }
	
	public function post_redesignation($fld_PostID){
        $row = DB::table('posts')->where([['fld_PostID', $fld_PostID], ['fld_Status', 1]])->first();
		return view('post_redesignate_view')->with('row', $row);;
    }
	
	public function post_update($fld_PostID){
        $row = DB::table('posts')->where([['fld_PostID', $fld_PostID], ['fld_Status', 1]])->first();
		return view('post_update_view')->with('row', $row);;
    }
	
	public function update_post_redesignation(Request $request){
		$post = Request::all();
		$post_name = DB::table('posts')->where([['fld_PostName', $post['fld_PostName']], ['fld_Status', 1]])->get();
		if(count($post_name)>0){
			$msg = "Post Already Exists";
		}else{
			$data =[
				'fld_PostID' => $post['fld_PostID'],
				'fld_PostName' => $post['fld_PostName'],
				'fld_TotalPost' => $post['fld_TotalPost'],
				'fld_SanctionNo' => $post['fld_SanctionNo'],
				'fld_SanctionDate' => $post['fld_SanctionDate'],
				'fld_Status' => $post['fld_Status']
			];	
			$j = DB::table('posts')->where('fld_PostID', $post['fld_PostID'])->update(['fld_Status' => 0]);
			$i = DB::table('posts')->insert($data);
			$id = Auth::user()->id;
			$row = DB::table('users')->where('id', $id)->first();
			$date = date('Y/m/d');		
			$data =[
				'id' => $id,
				'date' => $date,
				'action' => $post['fld_PostOldName'],
				'new_action' => $post['fld_PostName'],
				'role' => $row->role,
				'table_name' => 'posts'
			];
			logbook::insert($data);
			return redirect("/post_view");
		}
		return redirect('post_view')->with('msg', $msg);
	}
	
	public function update_post_update(Request $request){
		$post = Request::all();
		
		$data =[
			'fld_PostID' => $post['fld_PostID'],
			'fld_PostName' => $post['fld_PostName'],
			'fld_TotalPost' => $post['fld_TotalPost'],
			'fld_SanctionNo' => $post['fld_SanctionNo'],
			'fld_SanctionDate' => $post['fld_SanctionDate'],
			'fld_Status' => $post['fld_Status']
		];	
		$j = DB::table('posts')->where('fld_PostID', $post['fld_PostID'])->update(['fld_Status' => 0]);
        $i = DB::table('posts')->insert($data);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$date = date('Y/m/d');		
		$data =[
			'id' => $id,
			'date' => $date,
			'action' => $post['fld_TotalPost_old'],
			'new_action' => $post['fld_TotalPost'],
			'role' => $row->role,
			'table_name' => 'posts'
		];
		logbook::insert($data);
		return redirect("/post_view");
    }
	
	public function department(){
		return view('department');
	}
	
	public function department_store(Request $request){	
		$post = Request::all();
		$max_value= DB::table('departments')
			->select(DB::raw('MAX(fld_DeptID) as fld_DeptID'))
			->first();
		$data =[
				'fld_DeptID' => $max_value->fld_DeptID+1,
				'fld_Department' => $post['fld_Department'],
				'fld_Status' => 1
			];		
			$row = DB::table('departments')->insert($data);
		return redirect('/department_view');
    }
	
	public function department_view(){
		$departments = DB::table('departments')->where('fld_Status', '1')->get();
        //$departments = department::all();
        return view('department_view', compact('departments'));
    }	
	
	public function get_post_name($post_id){
		$posts = DB::table('posts')->where('fld_PostID', $post_id)->first();
		return json_encode($posts);
	}
	
	public function pay_scale($fld_PostID){
		$posts = DB::table('posts')->where('fld_PostID', $fld_PostID)->first();
		return json_encode($posts);
	}
	
	public function new_scale($grade_pay){
		$posts = DB::table('scale')->where([['grade_pay', $grade_pay], ['status', '1']])->orderBy('scale_id', 'DESC')->first();
		return json_encode($posts);
	}
	
	public function transfer(){
		return view('transfer');
	}
	
	public function department_name($fld_DeptID){
		$posts = DB::table('departments')->select('fld_Department')->where('fld_DeptID', $fld_DeptID)->first();
		return json_encode($posts);
	}
	
	public function transfer_store(Request $request){
		$post = Request::all();
		$data =[
			'fld_DeptID' => $post['new_dept_id']
		];
		transfer::create(Request::all());
		$emps = DB::table('employees')->where('emp_id', $post['emp_id'])->update($data);
		$data1 =[
			'dept_id' => $post['new_dept_id']
		];
		$posts = DB::table('servicebooks')->where([['emp_id', $post['emp_id']], ['status', 1]])->update($data1);
		return redirect('/transfer_view');
    }
	
	public function transfer_view(){
        $promotions = transfer::all();
        return view('transfer_view', compact('promotions'));
    }
	
	public function increment(){
        return view('increment');
	}
	
	public function increment_update1(){
		$sl_no = Input::get('sl_no');
		$emp_id = Input::get('emp_id');
		$basic_pay = Input::get('basic_pay');
		foreach($emp_id as $key => $n ){
			$data = array(
				'emp_id'=>$emp_id[$key],
				'basic_pay'=>((103/100)*$basic_pay[$key])			
			);
			servicebook::update($data);
			return redirect('/increment');
		}
	}
	
	public function increment_update(Request $request){
		$inc_value = DB::table('parameter_values')->where([['parameter_id', 2],['status', 1]])->first();
		$i_value = $inc_value->value;
		$da_value = DB::table('parameter_values')->where([['parameter_id', 1],['status', 1]])->first();
		$d_value = $da_value->value;
		$emp_id = Input::get('check');	
		$date = Input::get('doi');
		$doi = Input::get('doi');
		$mothyear   = explode('/', $doi);
		$year = $mothyear[0];
		$month = $mothyear[1];
		$date = $mothyear[2];
		foreach($emp_id as $key => $n ){
			$check = DB::table('increament')->where([['emp_id', $emp_id[$key]],['type', 'Salary'], ['year', $year]])->count();
			if($check){
				$msg = 'Salary increment for this Year already Done';
				return redirect('increment')->with('msg', $msg);
			}else{
				$basic = DB::table('servicebooks')->where([['emp_id', $emp_id[$key]],['status', 1]])->first();
				$new = ($i_value/100)*$basic->basic_pay;
				$round = ceil($new / 10) * 10;
				$new_basic = $round + $basic->basic_pay;
				$new_initial = $round + $basic->initialpay;
				$da = round(($d_value/100) * $new_basic);
				$data = [
					'emp_id' => $basic->emp_id,
					'dept_id' => $basic->dept_id,
					'post_id' => $basic->post_id,
					'emp_type' => $basic->emp_type,
					'application_id' => $basic->application_id,
					'glsi' => $basic->glsi,
					'initialpay' => $new_initial,
					'city_allowance' =>$basic->city_allowance,
					'da' => $da,
					'basic_pay' => $new_basic,
					'hra' => $basic->hra,
					'scaleId' => $basic->scaleId,
					'emp_pf_category' => $basic->emp_pf_category,
					'gpf_persentage' => $basic->gpf_persentage,
					'nps_persentage' => $basic->nps_persentage,
					'action' => 'Yearly Increament',
					'doa' => $basic->doa,
					'doj' => $basic->doj,
					'service_image' => $basic->service_image,
					'dop' => $basic->dop,
					'dol' => $basic->dol,
					'doi' => Input::get('doi'),
					'dor' => $basic->dor,
					'remarks' => $basic->remarks,
					'status' => 1,
					'casual_pay' => $basic->casual_pay
				];
				$data1 = [
						'emp_id'=>$basic->emp_id,
						'doi' => Input::get('doi'),
						'type' => 'Salary',
						'month' => $month,
						'year'=> $year
					];
				$status_update = DB::table('servicebooks')->where([['emp_id', $emp_id[$key]],['status', 1]])->update(['status'=>0]);
				$new_insert = DB::table('servicebooks')->insert($data);
				$j = DB::table('increament')->insert($data1);
				$msg = 'Salary increment for this Year has Successfully Done';
			}
		}
		return redirect('/increment')->with('msg', $msg);		
	}
	
	public function hra_increment(){
		return view('hra_increment');
	}
	
	public function update_hra_increment(Request $request){
		$hra_inc_value = DB::table('parameter_values')->where([['parameter_id', 14],['status', 1]])->first();
		$i_value = $hra_inc_value->value;		
		$emp_id = Input::get('check');
		$doi = Input::get('doi');
		$mothyear   = explode('/', $doi);
		$year = $mothyear[0];
		$month = $mothyear[1];
		$date = $mothyear[2];		
		foreach($emp_id as $key => $n ){
			$check = DB::table('increament')->where([['emp_id', $emp_id[$key]],['type', 'HRA'], ['year', $year]])->count();
			if($check){
				$msg = 'HRA increment for this Year already Done';
				return redirect('hra_increment')->with('msg', $msg);
			}else{
				$basic = DB::table('servicebooks')->where([['emp_id', $emp_id[$key]],['status', 1]])->first();
				$new = ($i_value/100)*$basic->hra;
				$round = ceil($new / 10) * 10;
				$new_hra = $round + $basic->hra;			
				$data = [
					'emp_id' => $basic->emp_id,
					'dept_id' => $basic->dept_id,
					'post_id' => $basic->post_id,
					'emp_type' => $basic->emp_type,
					'application_id' => $basic->application_id,
					'glsi' => $basic->glsi,
					'initialpay' => $basic->initialpay,
					'city_allowance' =>$basic->city_allowance,
					'da' => $basic->da,
					'basic_pay' => $basic->basic_pay,
					'hra' => $new_hra,
					'scaleId' => $basic->scaleId,
					'emp_pf_category' => $basic->emp_pf_category,
					'gpf_persentage' => $basic->gpf_persentage,
					'nps_persentage' => $basic->nps_persentage,
					'action' => 'HRA Increament',
					'doa' => $basic->doa,
					'doj' => $basic->doj,
					'service_image' => $basic->service_image,
					'dop' => $basic->dop,
					'dol' => $basic->dol,
					'doi' => Input::get('doi'),
					'dor' => $basic->dor,
					'remarks' => $basic->remarks,
					'status' => 1,
					'casual_pay' => $basic->casual_pay
				];
				$data1 = [
					'emp_id'=>$basic->emp_id,
					'doi' => Input::get('doi'),
					'type' => 'HRA',
					'month' => $month,
					'year'=> $year
				];
				$status_update = DB::table('servicebooks')->where([['emp_id', $emp_id[$key]],['status', 1]])->update(['status'=>0]);
				$new_insert = DB::table('servicebooks')->insert($data);
				$j = DB::table('increament')->insert($data1);
				$msg = 'HRA increment for this Year Successfully Done';				
			}				
		}
		return redirect('/hra_increment')->with('msg', $msg);
	}
	
	public function scale_revision(){
        return view('scale_revision');
	}
	
	public function scale_revision_update(Request $request){
		$post = Request::all();
		$data =[		
			'payScale_lower_limit' => $post['fld_PayScale_lower_limit'],
			'payScale_uper_limit' => $post['fld_PayScale_uper_limit']
		];
        $i = DB::table('scale')->where([['payScale_lower_limit', $post['pay_lower_limit']], ['payScale_uper_limit', $post['pay_uper_limit']]])->update($data);		
		return redirect("/scale_view");
    }
	
	public function revision_update(Request $request){
		$post = Request::all();
		$j = DB::table('posts')->where('fld_PostID', $post['fld_PostID'])->update(['fld_Status' => 0]);
		post::create(Request::all());		
	}
	
	
	public function get_PayScale_upper_limit($payScale_lower_limit){
		$posts = DB::table('scale')->where('payScale_lower_limit', $payScale_lower_limit)->first();
		return json_encode($posts);
	}
	
	public function get_grade_pay($PayScale_lower_limit){
		$posts = DB::table('grade_pay')->where('pay_scale', $PayScale_lower_limit)->get();
		return json_encode($posts);
	}
	
	public function grade_pay_revision(){
		return view('grade_pay_revision');
	}
	
	public function grade_pay_revision_update(Request $request){
		$post = Request::all();		
		$data = ['grade_pay' => $post['fld_GradePay']];
		$j = DB::table('scale')->where('grade_pay', $post['GradePay'])->update($data);		
		return redirect("/scale_view");
    }
	
	public function new_scale_grade_pay(){
		return view('new_scale');
	}
	
	public function new_grade_pay(){
		return view('new_grade_pay');
	}
	
	public function new_grade_pay_add(Request $request){
		grade_pay::create(Request::all());		
		return redirect('/scale_view');	
	}
	
	public function new_scale_add(Request $request){
		pay_scale::create(Request::all());		
		return redirect('/scale_view');	
	}
	
	public function audit_trail(){
        $rows = DB::table('log_books')->get();
		return view('audit_trail', compact('rows'));
    }
	
	public function audit(){
		$post = Request::all();
        $rows = DB::table('log_books')
				->whereBetween('date', [Input::get('effective_from'), Input::get('effective_to')])
				->where('id', Input::get('emp_id'))
				->get();
		return view('audit', compact('rows'));
    }
	
	public function change_password(){
		return view('change_password');
	}
	
	public function password_change(Request $request){
		$post = Request::all();
		$data = ['password' => Bcrypt($post['confirm_password'])];
		$id = Auth::user()->id;
		$i = DB::table('users')->where('id', $id)->update($data);
		Toastr::success("Your Password has Successfully Changed");
		return redirect("/dashboard");
		
	}
	
	public function update_profile(){
        $row = DB::table('employees')->where('emp_id', Auth::user()->id)->first();
		return view('update_profile')->with('row', $row);
    }
	
	public function profile_update(Request $request){
		$post = Request::all();
		$row = DB::table('parameter_values')->select('value')->where([['parameter_id', '12'], ['status', '1']])->first();
		$age = $row->value;		
		$dob = Input::get('emp_dob');
		$mothyear   = explode('/', $dob);
		$year = $mothyear[0];
		$month = $mothyear[1];
		$date = $mothyear[2];
		
		$emp_date_of_retirement = Carbon::create($year, $month, $date);
		$emp_date_of_retirement->addYears($age);
		$emp_date_of_retirement->toDateString();
		$emp_date_of_retirement->modify('last day of this month');
		
		$data =[			
			'emp_contact_no' => $post['emp_contact_no'],
			'emp_alt_contact_no' => $post['emp_alt_contact_no'],			
			'emp_present_house_no' => $post['emp_present_house_no'],
			'emp_present_locality' => $post['emp_present_locality'],
			'emp_present_city' => $post['emp_present_city'],
			'emp_present_district' => $post['emp_present_district'],
			'emp_permanent_house_no' => $post['emp_permanent_house_no'],
			'emp_permanent_locality' => $post['emp_permanent_locality'],
			'emp_permanent_city' => $post['emp_permanent_city'],
			'emp_permanent_district' => $post['emp_permanent_district']			
		];		
        $i = DB::table('employees')->where('emp_id', $post['emp_id'])->update($data);
		
		Toastr::success("Your Profile has Successfully Updated");
		return redirect("/dashboard");
    }
	
	public function active($fld_PostID){
		$row = DB::table('posts')->where('fld_PostID', $fld_PostID)->update(['fld_Status' => 0]);
		return redirect('/post_view');
	}
	
	public function inactive($fld_PostID){
		$row = DB::table('posts')->where('fld_PostID', $fld_PostID)->update(['fld_Status' => 1]);
		return redirect('/post_view');
	}
	
	public function expanse(){
		return view('expanse');
	}
	
	public function m_expanse(Request $request){
		$post = Request::all();
		expanse::create(Request::all());		
		return redirect('/get_expanse');
	}
	
	public function get_expanse(){
		return view('get_expanse');
	}
	
	public function expa(){
		$post = Request::all();
        $rows = DB::table('expanse_mis')
				->whereBetween('date', [Input::get('effective_from'), Input::get('effective_to')])
				->where('expance', Input::get('expance'))
				->get();
		return view('view_expanse', compact('rows'));
    }
	
	public function all_expanse(){
        return view('exapnce_update');
	}
	
	public function ex_update(Request $request){
		$emp_id = Input::get('emp_id');
		foreach($emp_id as $key => $n ){
			$data = array(
				'emp_id'=>$emp_id[$key],
				'expance'=>Input::get('expance'),
				'amount' =>Input::get('amount'),
				'remarks'=>Input::get('remarks'),
				'date'=>Input::get('date')
			);
			expanse::insert($data);			
		}
		return redirect('/get_expanse');
	}	
	
	public function common_view($data){
		$data = $data;
        return view('common_view', compact('data'));
	}
	
	public function link($data){
		$data = $data;
        return view('expanse', compact('data'));
	}
	
	public function link1($data){
		$data = $data;
        return view('exapnce_update', compact('data'));
	}
	
	public function ex_gratia(){
		$views = DB::table('servicebooks')->where('status', '1')->get();		
        return view('ex_gratia', compact('views'));
	}
	
	public function insert_ex_gratia(){
		$emp_id = Input::get('emp_id');
		$amount = Input::get('amount');
		foreach($emp_id as $key => $n ){
			$data = array(
				'emp_id' => $emp_id[$key],
				'amount' => $amount[$key],
				'month' => Input::get('month'),
				'year' => Input::get('year')
			);
			ex_gratia::insert($data);
			//return insert('/increment');
		}
		return redirect('/ex_gratia_rtgs');
	}
	
	public function ex_gratia_rtgs(){
		return view('ex_gratia_rtgs');
	}
	
	public function ex_gratia_rtgs_generate(){
		$month = Input::get('month');
		$year = Input::get('year');
		$loans = DB::table('ex_gratia')          
			->where([['month', $month], ['year', $year]])
            ->get();
		return view('ex_gratia_rtgs_view', compact('loans', 'month', 'year'));
	}
	
	public function post_delete($post_ID){
        $del = DB::table('posts')->where('post_ID', $post_ID)->delete();		
		return redirect('/post_view');
    }
	
	public function post_edit($post_ID){
        $row = DB::table('posts')->where('post_ID', $post_ID)->first();
		return view('post_edit_view')->with('row', $row);
    }
	
	public function update_post(Request $request){
		$post = Request::all();
		$post_name = DB::table('posts')->where([['fld_PostName', $post['fld_PostName']], ['fld_Status', 1]])->get();
		if(count($post_name)>0){
			$msg = "Post Already Exists";
		}else{
			$data =[
				'post_ID' => $post['post_ID'],
				'fld_PostName' => $post['fld_PostName']
			];		
			$i = DB::table('posts')->where('post_ID', $post['post_ID'])->update($data);		
			return redirect("/post_view");
		}
		return redirect('post_view')->with('msg', $msg);
    }
	
	public function department_delete($fld_DeptID){
        $del = DB::table('departments')->where('fld_DeptID', $fld_DeptID)->delete();		
		return redirect('/department_view');
    }
	
	public function department_edit($fld_DeptID){
        $row = DB::table('departments')->where([['fld_DeptID', $fld_DeptID], ['fld_Status', 1]])->first();
		return view('department_edit_view')->with('row', $row);
    }
	
	public function dept_update($fld_DeptID){
        $row = DB::table('departments')->where('fld_DeptID', $fld_DeptID)->first();
		return view('dept_update_view')->with('row', $row);
    }
	
	public function update_dept(Request $request){
		$post = Request::all();
		$data =[
			'fld_DeptID' => $post['fld_DeptID'],
			'fld_Department' => $post['fld_Department']
		];
		$h = DB::table('departments')->where('fld_DeptID', $post['fld_DeptID'])->update(['fld_Status' => 0]);
        $i = DB::table('departments')->insert($data);		
		return redirect("/department_view");
    }
	
	public function update_department(Request $request){
		$post = Request::all();
		$data =[
			'fld_DeptID' => $post['fld_DeptID'],
			'fld_Department' => $post['fld_Department']
		];		
        $i = DB::table('departments')->where('fld_DeptID', $post['fld_DeptID'])->update($data);		
		return redirect("/department_view");
    }
	
	public function tax_update_store(Request $request){
		$post = Request::all();
		$i = DB::table('tax')->where('emp_id', $post['emp_id'])->update(['status' => 0]);
		tax::create(Request::all());
		return redirect('/tax_view');
	}
	
	public function promotion(){
		return view('promotion');
	}
	
	public function promotion_store(Request $request){	
		$post = Request::all();
		$i = DB::table('servicebooks')->select('initialpay', 'basic_pay')->where([['emp_id', $post['emp_id']], ['status', '1']])->first();	
		$amount = ($i->basic_pay)*(3/100);
		$fix_amount = $i->initialpay+$amount;
		$fix_amount = ceil($fix_amount);
		$data = [
			'emp_id' =>$post['emp_id'],
			'current_post_id' =>$post['current_post_id'],
			'new_post_id' =>$post['new_post_id'],
			'amount' =>$fix_amount,
			'promotion_date' =>$post['promotion_date'],
			'submission_date' =>$post['submission_date'],
		];
		$j = DB::table('promotions')->insert($data);
		$data2 =[
			'post_id' => $post['new_post_id']
		];
		$emps = DB::table('employees')->where('emp_id', $post['emp_id'])->update($data2);		
		return redirect('/promotion_view');
    }
	
	public function promotion_view(){
        $promotions = promotion::all();
        return view('promotion_view', compact('promotions'));
    }
	
	public function time_scale_promotion(){
		return view('time_scale_promotion');
	}
	
	public function time_promotion_store(Request $request){	
		$post = Request::all();
		$i = DB::table('servicebooks')->select('initialpay', 'basic_pay')->where([['emp_id', $post['emp_id']], ['status', '1']])->first();	
		$amount = ($i->basic_pay)*(3/100);
		$fix_amount = $i->initialpay+$amount;
		$fix_amount = ceil($fix_amount);
		$data = [
			'emp_id' =>$post['emp_id'],
			'current_post_id' =>$post['current_post_id'],
			'new_post_id' =>$post['current_post_id'],
			'amount' =>$fix_amount,
			'promotion_date' =>$post['promotion_date'],
			'submission_date' =>$post['submission_date'],
		];
		$j = DB::table('promotions')->insert($data);
		return redirect('/promotion_view');
    }
	
	public function suspend(){
		$post = Request::all();
		$emp_id = Input::get('emp_id');
		$data = [
			'emp_id' => $post['emp_id'],
			'sus_date' => $post['sus_date']
		];
		$row = DB::table('employees')->where('emp_id', $emp_id)->update(['status' => 0]);
		$row = DB::table('suspension')->insert($data);
		return redirect('/suspension_view');
	}
	
	public function rejoin($sus_id){
        $row = DB::table('suspension')->where('sus_id', $sus_id)->first();
		return view('rejoin_view')->with('row', $row);
    }
	
	public function update_rejoin(Request $request){
		$post = Request::all();
		$emp_id = Input::get('emp_id');
		$data =[
			'sus_id' => $post['sus_id'],
			'rejoin_date' => $post['rejoin_date']
		];
		$row = DB::table('employees')->where('emp_id', $emp_id)->update(['status' => 1]);	
        $i = DB::table('suspension')->where('sus_id', $post['sus_id'])->update($data);		
		return redirect("/suspension_view");
    }
	
	public function stop_salary(){
        return view('stop_salary');
	}
	
	public function stop_salary_view(){
		$employees = DB::table('stop_salary')->where('status', '1')->get();
        return view('stop_salary_view', compact('employees'));
	}
	
	public function stop_salary_insert(Request $request){
		$post = Request::all();
		$emp_id = Input::get('emp_id');	
		$s_s_date = Input::get('s_s_date');
		$data = [
			'emp_id' => $emp_id,
			's_s_date' => $s_s_date
		];
		$row = DB::table('employees')->where('emp_id', $emp_id)->update(['status' => 5]);
		$r = DB::table('stop_salary')->insert($data);
		return redirect("/stop_salary_view");
    }
	
	public function active_s($emp_id){
		$row = DB::table('stop_salary')->where('emp_id', $emp_id)->first();	
		return redirect("/salary_active_view");
    }
	
	public function active_salary($emp_id){
		$post = Request::all();			
		$row = DB::table('employees')->where('emp_id', $emp_id)->update(['status' => 1]);
		$row = DB::table('stop_salary')->where('emp_id', $emp_id)->update(['status' => 2]);
		return redirect("/stop_salary_view");
    }
	
	public function deputation(){
        return view('deputation');
	}
	
	public function deputation_insert(Request $request){
		$post = Request::all();	
		$data =[
			'emp_id' => $post['emp_id'],
			'deputation' => $post['deputation'],
			'date' => $post['date']
		];
		$h = DB::table('deputation')->insert($data);
		$i = DB::table('employees')->where('emp_id', $post['emp_id'])->update(['status' => 3]);
		return redirect("/deputation_view");
	}
	
	public function deputation_view(){
        $promotions = DB::table('deputation')->get();
        return view('deputation_view', compact('promotions'));
    }
	
	public function update_policy(Request $request){
		$post = Request::all();
		$data =[
			'asset_id' => $post['asset_id'],
			'ammount' => $post['ammount'],
			'policy_date' => $post['policy_date']
		];		
        $i = DB::table('assets')->where('asset_id', $post['asset_id'])->update($data);
		return redirect("/employee_lic");
    }
	
	public function update_qualification(Request $request){
        $post = Request::all();
		$data = ['qualification' => $post['qualification']];
        $row  = DB::table('qualifications')->where('qualification_id', $post['qualification_id'])->update($data);
        return redirect('qualification_view');
    }
	
	public function update_employee(Request $request){
		$post 		= Request::all();		
		$row 		= DB::table('parameter_values')->select('value')->where([['parameter_id', '12'], ['status', '1']])->first();
		$age		= $row->value;		
		$dob 		= $post['emp_dob'];
		$mothyear   = explode('-', $dob);
		$year 		= $mothyear[0];
		$month 		= $mothyear[1];
		$date 		= $mothyear[2];		
		$emp_date_of_retirement = Carbon::create($year, $month, $date);
		$emp_date_of_retirement->addYears($age);
		$emp_date_of_retirement->toDateString();		
		$emp_date_of_retirement->modify('last day of this month');		
		$data =[
			'emp_qualification_id' 		=> $post['emp_qualification_id'],
			'emp_f_name' 				=> $post['emp_f_name'],
			'emp_m_name' 				=> $post['emp_m_name'],
			'emp_l_name' 				=> $post['emp_l_name'],
			'post_id' 					=> $post['post_id'],
			'fld_DeptID' 				=> $post['fld_DeptID'],
			'emp_dob' 					=> $post['emp_dob'],
			'emp_date_of_joining' 		=> $post['emp_date_of_joining'],
			'emp_gender' 				=> $post['emp_gender'],
			'emp_type' 					=> $post['emp_type'],
			'emp_blood_group' 			=> $post['emp_blood_group'],
			'emp_contact_no' 			=> $post['emp_contact_no'],
			'emp_alt_contact_no' 		=> $post['emp_alt_contact_no'],
			'bank_account_number' 		=> $post['bank_account_number'],			
			'bank_name' 				=> $post['bank_name'],
			'ifsc' 						=> $post['ifsc'],			
			'emp_present_house_no' 		=> $post['emp_present_house_no'],
			'emp_present_locality' 		=> $post['emp_present_locality'],
			'emp_present_city' 			=> $post['emp_present_city'],
			'emp_present_district' 		=> $post['emp_present_district'],
			'emp_permanent_house_no' 	=> $post['emp_permanent_house_no'],
			'emp_permanent_locality' 	=> $post['emp_permanent_locality'],
			'emp_permanent_city' 		=> $post['emp_permanent_city'],
			'emp_permanent_district' 	=> $post['emp_permanent_district'],
			'emp_cast' 					=> $post['emp_cast'],
			'emp_religion' 				=> $post['emp_religion'],
			'emp_date_of_retirement' 	=> $emp_date_of_retirement,
			'submission_date' 			=> $post['submission_date']
		];
        $i = DB::table('employees')->where('emp_id', $post['emp_id'])->update($data);		
		return redirect("/employee_view");
    }
	
	public function employee_policy_insert(Request $request){
		employee_policy::create(Request::all());		
		return redirect('/employee_policy_view');
	}
	
	public function scale_view(){
		$employees = DB::table('scale')->get();
        return view('scale_view', compact('employees'));
	}
	
	public function scale_edit($scale_id){
		$row = DB::table('scale')->where('scale_id', $scale_id)->first();
        return view('scale_edit_view', compact('row'));
	}
	
	public function update_scale(Request $request){
		$post = Request::all();
		$data =[
			'scale_id' 				=> $post['scale_id'],
			'payScale_lower_limit' 	=> $post['payScale_lower_limit'],
			'payScale_uper_limit' 	=> $post['payScale_uper_limit'],
			'grade_pay' 			=> $post['grade_pay'],
			'grade' 				=> $post['grade']
		];		
        $i = DB::table('scale')->where('scale_id', $post['scale_id'])->update($data);
		return redirect("/scale_view");
    }
	
	public function scale_delete($scale_id){
		$del = DB::table('scale')->where('scale_id', $scale_id)->delete();
        return redirect("/scale_view");
	}
	
	public function charge_view(){
		$employees = DB::table('charge_allo')->get();
        return view('charge_view', compact('employees'));
	}
	
	public function charge_allowance(){
        return view('charge_allowance');
	}
	
	public function charge_insert(Request $request){
		$post = Request::all();
		$data =[
			'emp_id' => $post['emp_id'],
			'amount' => $post['amount']
		];		
        $i = DB::table('charge_allo')->insert($data);
		return redirect("/charge_view");
    }
	
	public function charge_edit($charge_allo_id){
		$row = DB::table('charge_allo')->where('charge_allo_id', $charge_allo_id)->first();
        return view('charge_edit_view', compact('row'));
	}
	
	public function update_charge(Request $request){
		$post = Request::all();
		$data =[
			'emp_id' => $post['emp_id'],
			'amount' => $post['amount']
		];		
        $i = DB::table('charge_allo')->where('charge_allo_id', $post['charge_allo_id'])->update($data);
		return redirect("/charge_view");
	}
	
	public function charge_update($charge_allo_id){
		$row = DB::table('charge_allo')->where('charge_allo_id', $charge_allo_id)->first();
        return view('charge_update', compact('row'));
	}
	
	public function update_charge_allow(Request $request){
		$post = Request::all();
		$data =[
			'emp_id' => $post['emp_id'],
			'amount' => $post['amount']
		];		
		$h = DB::table('charge_allo')->where('emp_id', $post['emp_id'])->update(['status' => 0]);
        $i = DB::table('charge_allo')->insert($data);
		return redirect("/charge_view");
	}
	
	public function charge_delete($charge_allo_id){
		$del = DB::table('charge_allo')->where('charge_allo_id', $charge_allo_id)->delete();
        return redirect("/charge_view");
	}
	
	public function employee_servicebook(){
        $employees = servicebook::all();
        return view('employee_servicebook_view', compact('employees'));
    }
	
	public function emp_inc($emp_id){
        $employees = DB::table('increament')->where('emp_id', $emp_id)->get();
        return view('emp_inc', compact('employees'));
    }
	
	public function emp_leave_servicebook($emp_id){
        $employees = DB::table('leave_transaction')->where([['emp_id', $emp_id], ['leave_type_id', '!=', '1'], ['status', '4']])->get();
        return view('emp_leave_servicebook', compact('employees'));
    }
	
	public function policy_close($asset_id){
		$row = DB::table('assets')->where('asset_id', $asset_id)->first();
		return view('policy_close', compact('row'));
	}
	
	public function close_policy(Request $request){
		$post = Request::all();
		$data =[
			'policy_date' => $post['policy_date'],
			'remarks' => $post['remarks']
		];		
		$h = DB::table('assets')->where('asset_id', $post['asset_id'])->update($data);
		return redirect("/view_policy");
	}
	
	public function change_password_other(){
		return view('change_password_other');
	}
	
	public function password_change_other(Request $request){
		$post = Request::all();
		$data = ['password' => Bcrypt($post['password'])];
		$i = DB::table('users')->where('id', $post['emp_id'])->update($data);
		Toastr::success("Employee Password has Successfully Changed");
		return redirect("/dashboard");		
	}
	
	public function emp_service_record($emp_id){
		return view('emp_service_record', compact('emp_id'));
	}
	
	public function emp_promo($emp_id){
		$employees = DB::table('promotions')->where('emp_id', $emp_id)->get();
        return view('emp_promo_servicebook', compact('employees'));
	}
	
	public function emp_sus($emp_id){
		$employees = DB::table('suspension')->where('emp_id', $emp_id)->get();
        return view('emp_sus_servicebook', compact('employees'));
	}
	
	public function emp_depu($emp_id){
		$employees = DB::table('deputation')->where([['emp_id', $emp_id], ['deputation', 'Deputation']])->get();
        return view('emp_depu_servicebook', compact('employees'));
	}
	
	public function emp_lie($emp_id){
		$employees = DB::table('deputation')->where([['emp_id', $emp_id], ['deputation', 'Lien']])->get();
        return view('emp_lie_servicebook', compact('employees'));
	}
	
	public function emp_transfer($emp_id){
		$employees = DB::table('transfer')->where('emp_id', $emp_id)->get();
        return view('emp_transfer_servicebook', compact('employees'));
	}
	
	public function emp_scale_change($emp_id){
		$employees = DB::table('servicebooks')->where('emp_id', $emp_id)->get();
        return view('emp_scale_change_servicebook', compact('employees'));
	}
	
	public function by_claim(){
		return view('by_claim');
	}
	
	public function by_deduction(){
		return view('by_deduction');
	}
	
	public function mis_by_claim(Request $request){
		$post = Request::all();
		$month = $post['month'];
		$year = $post['year'];
		if($post['emp_id']==''){
			$loans = DB::table('salary_claims')->where([['month', $post['month']], ['year', $post['year']]])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_claims', compact('loans', 'month', 'year', 'status'));
		}else{
			$loans = DB::table('salary_claims')->where([['emp_id', $post['emp_id']], ['month', $post['month']], ['year', $post['year']]])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_claims', compact('loans', 'month', 'year', 'status'));
		}		
	}
	
	public function mis_by_deduction(Request $request){
		$post = Request::all();
		$month = $post['month'];
		$year = $post['year'];
		if($post['emp_id']==''){
			$loans = DB::table('salary_deductions')->where([['month', $post['month']], ['year', $post['year']]])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_deductions', compact('loans', 'month', 'year', 'status'));
		}else{
			$loans = DB::table('salary_deductions')->where([['emp_id', $post['emp_id']], ['month', $post['month']], ['year', $post['year']]])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_deductions', compact('loans', 'month', 'year', 'status'));
		}		
	}
	
	public function by_loan(){
		return view('by_loan');
	}
	
	public function by_recovery(){
		return view('by_recovery');
	}
	
	public function mis_by_loan(Request $request){
		$post = Request::all();
		
		if($post['emp_id']=='' && $post['loan_type_id']==''){
			$loans = DB::table('loan_trasection')->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_loan', compact('loans','status'));
		}elseif($post['emp_id']==''){
			$loans = DB::table('loan_trasection')->where('loan_type_id', $post['loan_type_id'])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_loan', compact('loans', 'status'));
		}elseif($post['loan_type_id']==''){
			$loans = DB::table('loan_trasection')->where('emp_id', $post['emp_id'])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_loan', compact('loans', 'status'));
		}else{
			$loans = DB::table('loan_trasection')->where([['emp_id', $post['emp_id']], ['loan_type_id', $post['loan_type_id']]])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_loan', compact('loans', 'status'));
		}		
	}
	
	public function mis_by_recovery(Request $request){
		$post = Request::all();
		$month = $post['month'];
		$year = $post['year'];
		if($post['emp_id']==''){
			$loans = DB::table('loan_trasection')->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_recovery', compact('loans', 'month', 'year', 'status'));
		}else{
			$loans = DB::table('loan_trasection')->where('emp_id', $post['emp_id'])->get();
			foreach($loans as $l){
				$status = $l->status;
			}
			return view('mis_by_recovery', compact('loans', 'month', 'year', 'status'));
		}		
	}
	
	public function lic_mis(){
		return view('lic_mis');
	}
	
	public function policy_mis(){
		$post = Request::all();
		$from = Input::get('effective_from');
		$to = Input::get('effective_to');
		if($post['emp_id']==''){
			$loans = DB::table('assets')->whereBetween('policy_date', [Input::get('effective_from'), Input::get('effective_to')])->get();
			return view('mis_by_lic', compact('loans', 'from', 'to'));
		}else{
			$loans = DB::table('assets')
			->whereBetween('policy_date', [Input::get('effective_from'), Input::get('effective_to')])
			->where('emp_id', $post['emp_id'])
			->get();
			return view('mis_by_lic', compact('loans', 'from', 'to'));
		}
    }
	
	public function scale_rev(){
		$employees = DB::table('scale')->get();
        return view('scale_rev', compact('employees'));
	}
	
	public function revision($scale_id){
		$row = DB::table('scale')->where('scale_id', $scale_id)->first();
        return view('revision_view', compact('row'));
	}
	
	public function new_scale_rev(Request $request){
		$post = Request::all();
		$row = DB::table('scale')->where('scale_id', $post['scale_id'])->update(['status' => 0]);
		pay_scale::create(Request::all());		
		return redirect('/scale_rev');	
	}
	
	public function employee_gpf(){
        $rows = DB::table('servicebooks')->where([['emp_pf_category', 'GPF'],['status', 1]])->get();
		return view('employee_gpf', compact('rows'));
    }
	
	public function gpf_update($service_id){
        $row = DB::table('servicebooks')->where([['service_id', $service_id],['status', 1]])->first();
		return view('gpf_update', compact('row'));
    }	
	
	public function gpf_update_store(Request $request){
		$post = Request::all();
		$row = DB::table('servicebooks')->where('service_id', $post['service_id'])->update(['status' => 0]);
		servicebook::create(Request::all());
		return redirect('/employee_gpf');	
	}
	
	public function retire(){
		return view('retire');
    }
	
	public function emp_retire(){
		$post = Request::all();
        $rows = DB::table('employees')
				->whereBetween('emp_date_of_retirement', [Input::get('effective_from'), Input::get('effective_to')])
				->get();
		return view('emp_retire', compact('rows'));
    }
	
	public function emp_list(){
        $employees = DB::table('employees')->orderBy('emp_id', 'desc')->get();	
        return view('emp_list', compact('employees'));
    }
	
	public function miscellaneous_mis(){
        $employees = DB::table('mis_arrear')->where('arrear_type', 1)->get();	
        return view('miscellaneous_mis', compact('employees'));
    }
	
	public function da_arrear(){
        $employees = DB::table('mis_arrear')->where('arrear_type', 2)->get();	
        return view('da_arrear', compact('employees'));
    }
	
	public function retired_employee(){
		$current_date = date('Y-m-d');
		$employees = DB::table('employees')->where('emp_date_of_retirement', '<', $current_date)->get();
		return view('retired_employee', compact('employees'));
	}
	
	public function add_pension_bank($emp_id){
		return view('add_pension_bank', compact('emp_id'));
	}
	
	public function pension_bank_detail(Request $request){
		$post = Request::all();
		$data =[
			'emp_id' => $post['emp_id'],
			'bank_details' => $post['bank_details'],
			'account_no' => $post['account_no'],
			'ifsc_code' => $post['ifsc_code']
		];		
        $i = DB::table('employee_pension_details')->insert($data);		
		return redirect("retired_employee");
    }
	
	public function pension_fixation(){
		$current_date = date('Y-m-d');
		$employees = DB::table('employees')->where('emp_date_of_retirement', '<', $current_date)->get();
		return view('pension_fixation', compact('employees'));
	}
	
	public function fixation($emp_id){
		$basic = DB::table('salary_claims')->where('emp_id', $emp_id)->orderBy('salary_claim_id', 'desc')->first();
		$dallow = DB::table('parameter_values')->where([['parameter_id', 1], ['status', 1]])->first();
		$medical = DB::table('parameter_values')->where([['parameter_id', 8], ['status', 1]])->first();
		$basic_pay = $basic->basic_pay/2;
		$da = $dallow->value;
		$ma = $medical->value;
		return view('fixation', compact('basic_pay', 'da', 'ma', 'emp_id'));
	}
	
	public function sataled_employee(){
		$pensions = DB::table('pensions')->get();
		return view('sataled_employee', compact('pensions'));
	}
	
	public function calculate_pension(Request $request){
		$post = Request::all();
		$dr = ceil(($post['dr']/100)*$post['basic']);
		if($post['length']<25){
			$new_basic = ($post['basic']*$post['length'])/25;
			$total_pension = $new_basic+$post['medical']+$dr;
		}else{
			$total_pension = $post['basic']+$post['medical']+$dr;
		}
		$data =[
			'employee_id' => $post['employee_id'],
			'pension_order_number' => $post['pension_order_number'],
			'pension_order_date' => $post['pension_order_date'],
			'pension_type' => $post['pension_type'],
			'dr' => $dr,
			'medical' => $post['medical'],
			'basic' => $post['basic'],
			'total_pension' => $total_pension,
			'remark' => $post['remark']
		];		
        $i = DB::table('pensions')->insert($data);	
		$pensions = DB::table('pensions')->get();
		return view('sataled_employee', compact('pensions'));
    }
}