<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use DB, Auth, Carbon;
use App\User;
class EmailController extends Controller
{
  public function send(Request $request){
        $subject = $request['subject'];
        $content = $request['msg_body'];
        $to = $request['to'];

        \Mail::send('email.doctor_mail', ['subject' => $subject, 'content' => $content], function ($message) use($to,$subject)
        {

            $message->from('bikram.skaplink@gmail.com', 'SeniorSafeTech');

            $message->to($to);
            $message->subject($subject);
        });
        if(count(\Mail::failures()) > 0){
          Toastr::error("Mail failed. Please try again!");
          return redirect('patient_medicine');
        }
        $today = date("Y-m-d",time());
    		$action_time = Carbon\Carbon::now();
    		$action_time->toDateTimeString();
        $query = DB::table('medicine_history')->where('pat_medi_id',$request['pat_medi_id'])
    		->where('mar_date',$today)->update(['action_performed_on'=>$action_time, 'reason_title'=>$subject, 'reason_desc'=>$content, 'status'=>3, 'user_id'=>Auth::user()->user_id]);
        return redirect('patient_medicine');
}
}
