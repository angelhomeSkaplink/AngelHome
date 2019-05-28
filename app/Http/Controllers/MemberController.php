<?php

namespace App\Http\Controllers;
use Request;
use App\member;
use Carbon\Carbon;
use DB, Auth;
use App\logbook;
use Kamaln7\Toastr\Facades\Toastr;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{    
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
        return view("member");
    }

    public function memberview(Request $request){
        
		App::setlocale(session('locale'));
        $members = member::all();		
        return view('memberview', compact('members'));
    }
	
	public function insert(Request $request){		
		$inputs = Request::all();
		$roles = $inputs['role'];
		$data = [];
		foreach ($roles as $role) {
			$data = [
				'id'    => $inputs['emp_id'],
				'firstname'    => $inputs['firstname'],
				'middlename'   => $inputs['middlename'],
				'lastname'  => $inputs['lastname'],
				'email' => $inputs['email'],
				'password'  => Bcrypt($inputs['password']),
				'role' => $role,
				'status' => $inputs['status'],
				'created_at' => Carbon::now()->toDateTimeString(),
				'updated_at' => Carbon::now()->toDateTimeString(),
			];
			member::insert($data);
		}		
		return redirect("/admin");
    }
    
    public function insert1(Request $request){		
		$member = new member;
		$member->id = Input::get('emp_id');
		$member->firstname = Input::get('firstname');
		$member->middlename = Input::get('middlename');
		$member->lastname = Input::get('lastname');
		$member->email = Input::get('email');
		$member->password = Bcrypt(Input::get('password'));
		$member->role = Input::get('role');
		$member->status = Input::get('status');
		$member->save();	

		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$date = date('Y/m/d');
		$data =[
			'id' => $id,
			'date' => $date,
			'action' => 'User Insert',
			'role' => $row->role,
			'table_name' => 'users'
		];
		logbook::insert($data);		
		return redirect("/admin");
    }
	
	public function update_user(Request $request){		
		$post = Request::all();
		$data = [
			'firstname' => $post['firstname'],
			'middlename' => $post['middlename'],
			'lastname' => $post['lastname'],
			'email' => $post['email'],
			'role' => $post['role'],
			'status' => $post['status']
			//'submission_date'=> $post['submission_date']
		];		
		$i = DB::table('users')->where('user_id', $post['user_id'])->update($data);
			
		return redirect("/admin");
    }
	
	public function member_edit(Request $request,$user_id){
	    
		App::setlocale(session('locale'));
        $row = DB::table('users')->where('id', $user_id)->first();
		return view('member_edit_view')->with('row', $row);
    }
	
	public function member_delete($user_id){
        $del = DB::table('users')->where('id', $user_id)->delete();
		return redirect('/admin');
    }
	
	public function getname($emp_id){
		$employees = DB::table('employees')->where('emp_id', $emp_id)->first();
		return json_encode($employees);
	}
	
	public function loan_details($emp_id){
		$employees = DB::table('loan_trasection')->where([['emp_id', $emp_id], ['status', '3'], ['loan_type_id', '1']])->first();
		return json_encode($employees);
	}
	
    public function show($id){
        //
    }    

    public function update(Request $request, $id){
        //
    }
    
}
