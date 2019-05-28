<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Facility;
use DB, Auth, App;
use Kamaln7\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
   public function show($id){
   	$profile = DB::table('users')->where('user_id',$id)->first();
   	return view('profile.index',compact('profile'));
   }
   public function edit($id){
   	$profile = DB::table('users')->where('user_id',$id)->first();
   	return view('update_password',compact('profile'));
   }
   public function change_password(Request $request){
     
	 App::setlocale(session('locale'));
     return view('password_change');
  }
  public function update_password(Request $request)
  {
    $user=DB::table('users')->where('user_id',$request['user_id'])->update(['password'=>password_hash($request['password'],PASSWORD_BCRYPT)]);
	Toastr::success("Password Successfully Changed !!");
    return redirect('/dashboard');
  }
}
