<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NoteTaker;
use App\User;
use DB, Auth, App, Carbon;

class WellnessController extends Controller
{
    public function note_view(Request $request){
         

        App::setlocale(session('locale'));
        $residents = DB::table('sales_pipeline')->where([['stage',"MoveIn"],['facility_id', Auth::user()->facility_id]])->get();
		return view('wellness.allResident',compact('residents'));
	}
	public function take_note(Request $request,$id){
	    

        App::setlocale(session('locale'));
		$notes = DB::table('note_taker')->where('res_id',$id)->orderby('id','desc')->get();
		$facility = DB::table('facility')->where('id',Auth::user()->facility_id)->first();
		$name = DB::table('sales_pipeline')->where('id',$id)->first();
		return view('wellness.noteTaker',compact('id','name','notes','facility'));
	}
	public function storeNote(Request $request){
		$rules = [
			'notes' => 'required'
		];
		$customMessages = [
			'required' => 'The :attribute field is required'
		];
		$this->validate($request,$rules,$customMessages);
		$id = $request['res_id'];
		$date = date("Y-m-d",time());
		$time = date("H:i:s",time());
		$new_note = new NoteTaker();
		$new_note->res_id = $id;
		$new_note->notes = $request['notes'];
		$new_note->date = $date;
		$new_note->time = $time;
		$new_note->recorder = Auth::user()->user_id;
		$new_note->save();
		return redirect('take_note/'.$id);
	}
}
