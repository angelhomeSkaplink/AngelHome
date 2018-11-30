<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kamaln7\Toastr\Facades\Toastr;
use DB, Auth, Carbon, Config, Crypt;
use App\User;
class EmailController extends Controller
{
  public function send(Request $request){
        $subject = $request['subject'];
        $content = $request['msg_body'];
        $to = $request['to'];
        $getEmail_pass = DB::table('facility')->where('id',Auth::user()->facility_id)->select('facility_email','email_pass','facility_name')->first();
        $email = $getEmail_pass->facility_email;
        $password = $getEmail_pass->email_pass;
        $password = Crypt::decrypt($password);
        $facility_name = $getEmail_pass->facility_name;
        $from = Config::set('mail.username', $email );
        $pass = Config::set('mail.password', $password );
        
        try {
          \Mail::send('email.doctor_mail', ['subject' => $subject, 'content' => $content], function ($message) use($to,$subject,$email,$facility_name)
          {
              $message->from($email, $facility_name);
              $message->to($to);
              $message->subject($subject);
          });
          $today = date("Y-m-d",time());
      		$action_time = Carbon\Carbon::now();
      		$action_time->toDateTimeString();
          $query = DB::table('medicine_history')->where('pat_medi_id',$request['pat_medi_id'])
      		->where('mar_date',$today)->update(['action_performed_on'=>$action_time, 'reason_title'=>$subject, 'reason_desc'=>$content, 'status'=>3, 'user_id'=>Auth::user()->user_id]);
          Toastr::success("Mail sent to " .$to. " successfully");
        } catch (\Exception $e) {
          Toastr::error("Mail not sent. Please contact facility admin!");
        }
        return redirect('patient_medicine');
}
// Encryption and decryption of passwords
// $encrypted = Crypt::encrypt('secret');
// $decrypted = Crypt::decrypt($encrypted);
}
