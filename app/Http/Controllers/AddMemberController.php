<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\StaffPosition;
use DB, Auth, App, Input;
use Kamaln7\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;

class AddMemberController extends Controller
{

	public function __construct(){
        $this->middleware('auth');
    }

    public function all_member_list(Request $request)
    {
		App::setlocale(session('language'));
        $all_records =  DB::table('users')
						->where('role', '!=', 1)
						->where('facility_id', Auth::user()->facility_id)
                        ->orderBy('id', 'desc')
                        ->select('users.*')
                        ->paginate(8);
        return view('all_member_list')->with('all_records', $all_records);
    }

    // This is the form
    public function add_new_member(Request $request)
    {
		
		App::setlocale(session('locale'));
        $last_id =  DB::table('users')->orderBy('id', 'desc')->select('users.id')->first();

        if ($last_id == NULL) {
            $new_id = 1000;
        }
        else {
            $new_id = $last_id->id + 1;
        }
        $facility_desig = DB::table('staff_position')->where('facility_id', Auth::user()->facility_id)->get();
        return view('add_new_member', compact('new_id','facility_desig'));
    }

    // For storing the details
    public function store_member_details(Request $request){
		
		$package_id = DB::table('facility')->where('id', Auth::user()->facility_id)->first();		
		$no_of_user = DB::table('package_master')->where('pkg_id', $package_id->package_id)->first();
		$count_user = DB::table('users')->where('facility_id', Auth::user()->facility_id)->count('facility_id');
		
		if($count_user>=$no_of_user->no_of_user){
			Toastr::error("YOUR MAXIMUM USER LIMIT IS EXCEEDED");
			return back();
		}else{
			$u_name = DB::table('users')->where('email', $request['user_name'])->first();
			
			if($u_name){
				Toastr::error("USER NAME ALREADY EXIST !!<br/>CHOOSE DIFFRENT USER NAME");
				return back();
			}else{
				$this->validate(request(),[
					'role'=>'required'
				]);

				$new_member = new User();
				$new_member->id = $request['new_id'];
				$new_member->firstname = $request['first_name'];
				$new_member->middlename = $request['middle_name'];
				$new_member->lastname = $request['last_name'];
				$new_member->status = $request['status'];
				$new_member->email = $request['user_name'];
				$temp = password_hash($request['_password'], PASSWORD_BCRYPT);
				$new_member->password = $temp;				
                $new_member->staff_position_id = $request['designation'];
				$new_member->facility_id = Auth::user()->facility_id;
				$new_member->facility_owner_id = Auth::user()->facility_owner_id;
				$new_member->save();


				$user_id = $new_member->id;
				$roles = $request->input('role');

				foreach ($roles as $role) {
					$new_role = new Role();
					$new_role->id=$role;
					$new_role->u_id=$user_id;
					$new_role->status=1;
					$new_role->save();
				}

				Toastr::success("Record Successfully Added !!");
				return redirect('all_member_list');	
			}
		}
	}

	
		public function edit_member_role(Request $request, $user_id){
	    
		App::setlocale(session('locale'));
		$role = DB::table('users')->where('user_id', $user_id)
						->join('staff_position','staff_position.staff_position_id','=','users.staff_position_id')
						->first();
		$facility_desig = DB::table('staff_position')->where('facility_id', Auth::user()->facility_id)->get();
		return view('admin.member_edit',compact('role','facility_desig'));
	}

	public function update_member_role(Request $request){
		$rules = [
			'role' => 'required',
			'password'=>'required|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).+$/|min:6'
		];
			$customMessages = [
				'required' => 'The :attribute field is required',
				'password.regex' => 'The password should have an Uppercase letter, a Number and one special character'
		];
		$this->validate($request,$rules,$customMessages);

		$user_id = $request['user_id'];
		$role_status = DB::table('role')->where('u_id',$user_id)->where('status',1)->update(['status'=>0]);

		$roles = $request->input('role');

		//$u_name = DB::table('users')->where([['email', $request['user_name']],['facility_id', Auth::user()->facility_id]])->first();

			//if($u_name){
				//Toastr::error("USER NAME ALREADY EXIST !!<br/>CHOOSE DIFFRENT USER NAME");
				//return back();
			//}

		foreach ($roles as $r) {
			$new_role = new Role();
			$new_role->id=$r;
			$new_role->u_id=$user_id;
			$new_role->status=1;
			$new_role->save();
		}

		$last_pass = DB::table('users')->where('user_id',$user_id)->pluck('users.password')->first();

		if ($last_pass != $request['password']) {
			$password = DB::table('users')->where('user_id',$user_id)->update(['password'=>password_hash($request['password'],PASSWORD_BCRYPT)]);
		}
		else {

		}

		$update_user = DB::table('users')->where('user_id',$user_id)->update(['email' => $request['user_name'], 'staff_position_id' => $request['designation']]);

		Toastr::success("Record Successfully Updated !!");
		return redirect('all_member_list');

	}
	
	public function staff_position_master(Request $request){
	    
		App::setlocale(session('locale'));
		return view('admin.staff_position_master');
	}

	public function add_staff_position(Request $request){
		$new_staff = new StaffPosition();
		$new_staff->dept = $request['dept'];
		$new_staff->pos_title = $request['pos'];
		$new_staff->shorthand = $request['shorthand'];
		$new_staff->reports_to = $request['reports_to'];
		$new_staff->staffing_guidance = $request['staffing_guidance'];
		$new_staff->notes = $request['notes'];
		$new_staff->pc = $request['pc'];
		$new_staff->printer = $request['printer'];
		$new_staff->cellphone = $request['cellphone'];
		$new_staff->uniform = $request['uniform'];
		$new_staff->facility_id = Auth::user()->facility_id;
		$new_staff->save();
		Toastr::success("New Staff Position Added Successfully !!");
		return redirect('staff_position_master');
	}
}
