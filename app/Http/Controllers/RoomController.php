<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, Calendar, App;
use App\User;
use App\crm;
use App\FacilityRoom;
use App\RoomBook;
use App\ActivityCalendar;
use Validator;
use App\Attendee;
use Illuminate\Support\Facades\Route;
use Kamaln7\Toastr\Facades\Toastr;

class RoomController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
	public function room_details(Request $request){	
		
		App::setlocale(session('locale'));
		$rooms = DB::table('facility_room')->where([['current_status', 1],['facility_id', Auth::user()->facility_id]])->paginate(8);
        return view('admin.room_view', compact('rooms'));
    }
	
	public function new_room_add(Request $request){	
		
		App::setlocale(session('locale'));
        return view('admin.new_room_add');
    }
	
	public function new_room(Request $request){
		
		$room_name = DB::table('facility_room')->where([['room_no', $request['room_no']], ['facility_id', Auth::user()->facility_id]])->first();
		if(count($room_name)>0){
			$msg = "Room Already Exists";
		}else{
			$facilityroom = new FacilityRoom();
			$facilityroom->room_no = $request['room_no'];
			$facilityroom->room_type = $request['room_type'];
			$facilityroom->special_feature = $request['special_feature'];
			$facilityroom->price = $request['price'];
			$facilityroom->facility_id = Auth::user()->facility_id;
			$facilityroom->room_status = 0;
			$facilityroom->current_status = 1;
			$facilityroom->save();
			
			return redirect('/room_details');
		}
        return redirect('new_room_add')->with('msg', $msg);		
    }
	
	public function room_edit(Request $request,$room_id){
	    
		App::setlocale(session('locale'));
        $row = DB::table('facility_room')->where('room_id', $room_id)->first();
		return view('admin.room_edit', compact('row'));
    }
	
	public function new_room_edit(Request $request){
		
		$j = DB::table('facility_room')->where('room_no', $request['room_no'])->update(['current_status' => 0]);
        
		$facilityroom = new FacilityRoom();
		$facilityroom->room_no = $request['room_no'];
		$facilityroom->room_type = $request['room_type'];
		$facilityroom->special_feature = $request['special_feature'];
		$facilityroom->price = $request['price'];
		$facilityroom->facility_id = Auth::user()->facility_id;
		$facilityroom->room_status = 0;
		$facilityroom->current_status = 1;
		$facilityroom->save();
		
		return redirect('/room_details');
    }
	
	public function room_delete($room_id){
		
		$u = DB::table('resident_room')->where('room_id', $room_id)->first();
		
		if(count($u)>0){
			Toastr::error("Can not Delete.<br/>This Room is Used by Resident");	
		}else{
			$del = DB::table('facility_room')->where('room_id', $room_id)->delete();
			Toastr::success("Room Deleted Successfully");					
		}
		return redirect('/room_details');
	}
	
	public function booking(Request $request){	
	    
	    App::setlocale(session('locale'));
		$crms = DB::table('sales_pipeline')->where([['facility_id',Auth::user()->facility_id],['stage',"!=","MoveIn"]])->paginate(6);
		$reports = DB::table('sales_pipeline')->where([['facility_id',Auth::user()->facility_id],['stage',"!=","MoveIn"]])->get();
        return view('room.booking', compact('crms', 'reports'));
    }
	
	public function booking_res(Request $request){
		App::setlocale(session('locale'));
		$crms = DB::table('sales_pipeline')->where([['facility_id',Auth::user()->facility_id],['stage',"MoveIn"]])->paginate(6);
		$reports = DB::table('sales_pipeline')->where([['facility_id',Auth::user()->facility_id],['stage',"MoveIn"]])->get();
		return view('room.booking', compact('crms','reports'));
    }

	
	public function book_room(Request $request,$id){
		
		App::setlocale(session('locale'));
        $rooms = DB::table('facility_room')->where('facility_id', Auth::user()->facility_id)->paginate(5);		
		$reports = DB::table('facility_room')->where('room_status', 5)->first();
		return view('room.room_view', compact('rooms', 'reports', 'id'));
    }
	
	public function room_book(Request $request){
		
		$j = DB::table('facility_room')->where('room_id', $request['room_id'])->update(['room_status' => 1]);
		$i = DB::table('resident_room')->where('pros_id', $request['pros_id'])->update(['status' => 0]);
		$k = DB::table('resident_room')->where('pros_id', $request['pros_id'])->get();
		foreach($k as $K){
			$j = DB::table('facility_room')->where('room_id', $K->room_id)->update(['room_status' => 0]);
		}
		
        $roombook = new RoomBook();
		$roombook->pros_id = $request['pros_id'];
		$roombook->room_id = $request['room_id'];
		$roombook->price = $request['price'];
		$roombook->orgnl_price = $request['orgnl_price'];
		$roombook->facility_id = Auth::user()->facility_id;
		$roombook->status = 1;
		$roombook->booked_date = date('Y/m/d');
		$roombook->save();
		
		$pros = DB::table('sales_pipeline')->where('pros_id', $request['pros_id'])->first();
		Toastr::error("<b>ROOM SUCCESSFULLY BOOKED FOR<br/>".$pros->pros_name."</b>");
		return redirect('/booking');
    }
	
	public function room_change(Request $request){
		$check_room = DB::table('resident_room')
		->where([['pros_id', $request['pros_id']],['release_date',null]])
		->first();
		if($check_room == null){
			$check_room = DB::table('resident_room')
		->where([['pros_id', $request['pros_id']],['release_date','>=',date('Y-m-d')]])
		->orderby('release_date','dsc')
		->first();
		}
		if($check_room != null){
			$release_date = date('Y-m-d');
			$update_resident_room = DB::table('resident_room')->where([['pros_id', $request['pros_id']],['resident_room_id',$check_room->resident_room_id]])->update(['release_date'=> $release_date]);
			$update_facility_room = DB::table('facility_room')->where('room_id',$check_room->room_id)->update(['release_date'=> $release_date]);
		}
		
		$j = DB::table('facility_room')->where('room_id', $request['room_id'])->update(['book_date' => date('Y-m-d'),'release_date' => null]);
        $roombook = new RoomBook();
		$roombook->pros_id = $request['pros_id'];
		$roombook->room_id = $request['room_id'];
		$roombook->price = $request['price'];
		$roombook->orgnl_price = $request['orgnl_price'];
		$roombook->facility_id = Auth::user()->facility_id;
		$roombook->booked_date = date('Y/m/d');
		$roombook->save();
		
		$pros = DB::table('sales_pipeline')->where('id', $request['pros_id'])->first();
		Toastr::success("<b>ROOM SUCCESSFULLY BOOKED FOR<br/>".$pros->pros_name."</b>");
		return redirect('/booking');
    }
	
	public function change_own_room(Request $request, $id){
	    
		App::setlocale(session('locale'));
		// $room_count = DB::table('facility_room')->where([['facility_id', Auth::user()->facility_id], ['room_status', 0]])->count();
        $room_count = DB::table('facility_room')
        ->where('facility_id',Auth::user()->facility_id)
        ->where(function($query){
			$query->where('book_date',null);
        })
        ->orWhere(function($query){
			$query->where('book_date','!=',null)
				->where('release_date','<=',date('Y-m-d'));
		})
        ->count();
		$res = DB::table('sales_pipeline')->where('id', $id)->first();
		$flag = $res->stage;
		
		if($room_count==0){
			Toastr::error("ALL ROOMS ARE BOOKED..<br/>NO AVAILABLE ROOM FOUND !!");
			return redirect('booking');
		}else{
			$rooms = DB::table('facility_room')
					->where('facility_id',Auth::user()->facility_id)
					->where(function($query){
						$query->where('book_date',null);
					})
					->orWhere(function($query){
						$query->where('book_date','!=',null)
							->where('release_date','<=',date('Y-m-d'));
					})
					->paginate(5);	
			return view('room.change_room_view', compact('rooms', 'reports', 'id','flag'));
		}		
	}
	
	public function leave_own_room($id){
		$check_room = DB::table('resident_room')
		->where([['pros_id', $id],['release_date',null]])
		->first();
		if($check_room == null){
			$check_room = DB::table('resident_room')
		->where([['pros_id', $id],['release_date','>=',date('Y-m-d')]])
		->orderby('release_date','dsc')
		->first();
		}
		if($check_room != null){
			$release_date = date('Y-m-d');
			$update_resident_room = DB::table('resident_room')->where('resident_room_id',$check_room->resident_room_id)->update(['release_date'=> $release_date]);
			$update_facility_room = DB::table('facility_room')->where('room_id',$check_room->room_id)->update(['release_date'=> $release_date]);
			Toastr::success("THIS ROOM IS AVAILABLE FOR BOOKING !!");
			return redirect('booking');
		}else{
			Toastr::success("Currently there is no room booked");
			return redirect('booking');
		}
	}
	
	public function room_details_view(Request $request, $id){
	    
		App::setlocale(session('locale'));
		
		$report = DB::table('resident_room')->where([['room_id', $id], ['status', 1]])->first();
		//dd($report);
		$reports = DB::table('sales_pipeline')->where('id', $report->pros_id)->first();
        return json_encode($reports); 
    }
	
	public function select_room(Request $request){
	    
		App::setlocale(session('locale'));
		$price_from = $request['price_from'];
		$price_to = $request['price_to'];
		$room_type = $request['room_type'];
		$id = $request['id'];
		
		if($room_type==NULL){
			$reports = DB::table('facility_room')->whereBetween('facility_room.price',[$price_from,$price_to])->get();
		}elseif($room_type!=NULL){
			$reports = DB::table('facility_room')->whereBetween('facility_room.price',[$price_from,$price_to])
						->where('facility_room.room_type', $room_type)
						->get();
		}elseif($room_type != NULL && $price_from == NULL){
			$reports = DB::table('facility_room')->where('facility_room.room_type', $room_type)->get();
		}
		
		$rooms = DB::table('facility_room')->where('room_status', 5)->first();;
		return view('room.room_view', compact('reports', 'rooms', 'id'));
    }
	

	
	public function activity_calendar(Request $request){ 
		$route_name = 'events_view';
		App::setlocale(session('locale'));	
		$venues = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->get();
		$events = [];  
		$data = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->get();
		if($data->count()){  
			foreach ($data as $key => $value){  
				$events[] = Calendar::event( 
				$value->event_name,  
				true,
				new \DateTime($value->event_date),  
				new \DateTime($value->event_end_date.' +1 day'));  
			}	  
		}	  
		$calendar = Calendar::addEvents($events);  
		
		$dateValue = date("Y-m-d");
		$time=strtotime($dateValue);
		$month=date("F",$time);
		$year=date("Y",$time);
		

		$side_events = DB::table('activity_calendar')->where([['month', $month],['year', $year],['facility_id', Auth::user()->facility_id]])->paginate(6);			
		return view('admin.events_view', compact('calendar', 'venues', 'side_events'));  
    } 

	//public function get_event_json(){
		//$records = DB::table('activity_calendar')->where('facility_id', Auth::user()->facility_id)->get();
		//$events = array();
		//foreach($records as $row) {
			//$events[] = $row;
		//}	
		
		//return json_encode($events);
	//}

	public function search_event(Request $request){ 
	
		$event_name = $request['event_name'];
		$event_place = $request['event_place'];
		if($event_name != NULL && $event_place == NULL){
			$events = [];
			$data = DB::table('activity_calendar')->where([['event_name', $event_name], ['facility_id', Auth::user()->facility_id]])->get(); 
			//dd($data);
			if($data->count()){  
				foreach ($data as $key => $value){  
					$events[] = Calendar::event( 
					$value->event_name,  
					true,  
					new \DateTime($value->event_date),  
					new \DateTime($value->event_end_date.' +1 day'));  
				}	  
			}	  
			$calendar = Calendar::addEvents($events);   
			return view('admin.event_search', compact('calendar'));  
		}elseif($event_name == NULL && $event_place != NULL){
			$events = [];  
			//$data = ActivityCalendar::all()->where([['event_place', $event_place]]);  
			$data = DB::table('activity_calendar')->where([['event_place', $event_place], ['facility_id', Auth::user()->facility_id]])->get();  
			if($data->count()){  
				foreach ($data as $key => $value){  
					$events[] = Calendar::event( 
					$value->event_name,  
					true,  
					new \DateTime($value->event_date),  
					new \DateTime($value->event_end_date.' +1 day'));  
				}	  
			}	  
			$calendar = Calendar::addEvents($events);   
			return view('admin.event_search', compact('calendar'));
		}elseif($event_name != NULL && $event_place != NULL){
			$events = [];  
			$data = DB::table('activity_calendar')->where([['event_name', $event_name], ['event_place', $event_place], ['facility_id', Auth::user()->facility_id]])->get();  
			if($data->count()){  
				foreach ($data as $key => $value){  
					$events[] = Calendar::event( 
					$value->event_name,  
					true,  
					new \DateTime($value->event_date),  
					new \DateTime($value->event_end_date.' +1 day'));  
				}	  
			}	  
			$calendar = Calendar::addEvents($events);   
			return view('admin.event_search', compact('calendar'));
		}elseif($event_name == NULL && $event_place == NULL){
			
			$events = [];  
			$data = DB::table('activity_calendar')->where([['event_name', 0], ['event_place', 1]])->get();  
			if($data->count()){  
				foreach ($data as $key => $value){  
					$events[] = Calendar::event( 
					$value->event_name,  
					true,  
					new \DateTime($value->event_date),  
					new \DateTime($value->event_end_date.' +1 day'));  
				}	  
			}	  
			$calendar = Calendar::addEvents($events);
			$msg = "NO RECORD FOUND";
			return view('admin.event_search', compact('msg', 'calendar'));
		}
        
    } 	
	
	public function new_event_add_form(Request $request){
			App::setlocale(session('locale'));
			return view('admin.new_event_add_form');
    }
	
	public function new_event_add(Request $request){
		$time=strtotime($request['event_date']);
		$month=date("F",$time);
		$year=date("Y",$time);

        $activitycalendar = new ActivityCalendar();
		$activitycalendar->event_name = $request['event_name'];
		$activitycalendar->emoji_code = $request['emoji_code'];
		$activitycalendar->event_description = $request['event_description'];
		$activitycalendar->open_to = $request['open_to'];
		$activitycalendar->event_place = $request['event_place'];
		$activitycalendar->event_date = $request['event_date'];
		$activitycalendar->event_end_date = $request['event_end_date'];
		$activitycalendar->event_time = $request['event_time'];
		$activitycalendar->duration = $request['duration'];
		$activitycalendar->end_time = $request['end_time'];
		$activitycalendar->month = $month;
		$activitycalendar->year = $year;
		$activitycalendar->facility_id = Auth::user()->facility_id;
		$activitycalendar->save();
		
		Toastr::success("Event Added Successfully !!");
		return redirect('/activity_calendar');
    }
	
	public function booking_pros(Request $request,$pros_id){
	    
		App::setlocale(session('locale'));
		$reports_all = DB::table('sales_pipeline')->where('facility_id',Auth::user()->facility_id)->get();
		$reports = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['pros_name', 'like', '%' .$pros_id. '%']])->get();
		return view('room.booking_pros', compact('reports','reports_all'));
    }
	
	public function booking_pros_email(Request $request,$pros_id){
	    
		App::setlocale(session('locale'));
		$reports_all = DB::table('sales_pipeline')->where('facility_id',Auth::user()->facility_id)->get();
		$reports = DB::table('sales_pipeline')->where([['facility_id', Auth::user()->facility_id], ['email_p', 'like', '%' .$pros_id. '%']])->get();
		return view('room.booking_pros', compact('reports','reports_all'));
    }
    public function editEvent($event_id){
		App::setlocale(session('locale'));
		$details = DB::table('activity_calendar')->where('event_id',$event_id)->first();
		// dd($details);
		return view('admin.event_edit',compact('details'));
	}
	public function updateEvent(Request $request){
		$updateEvent = DB::table('activity_calendar')->where('event_id',$request['event_id'])->
			update(['event_name' => $request['event_name'], 'emoji_code' => $request['emoji_code'], 'event_description' => $request['event_description'],
			'open_to'=>$request['open_to'],'event_place' => $request['event_place'],'event_date' => $request['event_date'],'event_end_date' => $request['event_end_date']
			,'event_time' => $request['event_time'],'duration' => $request['duration'],'end_time' => $request['end_time']]);
		Toastr::success("Event Edited Successfully !!");
		return redirect('/activity_calendar');
	}

}
