<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Auth;

class AzaxController extends Controller
{
    //get the residents list
    public function getResidents(){
        $residents = DB::table('sales_pipeline')->groupBy('pros_name')->where('facility_id', Auth::user()->facility_id)->where('stage',"MoveIn")->get();
        // dd($residents);
        $res_array = array();
		foreach($residents as $row) {
            if ($row->service_image == null) {
                $image = "538642-user_512x512.png";
            }
            else {
                $image = $row->service_image;
            }
			$name = explode(",",$row->pros_name);
			$name = $name[0]." ".$name[1]." ".$name[2];
			$obj = new \stdClass();
			$obj->id =  $row->id;
            $obj->name =  $name;
            $obj->image = $image;
			$res_array[] = $obj;
		}			
		return $res_array;
    }
}
