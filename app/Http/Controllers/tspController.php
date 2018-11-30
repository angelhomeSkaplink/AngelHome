<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth;

class tspController extends Controller
{
    public function viewResidents(){
        $residents = DB::table('resident_room')->join('sales_pipeline','resident_room.pros_id','=','sales_pipeline.id')
        ->where('sales_pipeline.facility_id','=',Auth::user()->facility_id)
        ->where('resident_room.status','=',1)->select('sales_pipeline.*')
        ->get();
        // dd($residents);
        return view('tsp.allResident',compact('residents'));
    }
    public function all_tsp($id){
        return view('tsp.allTsp');
    }
}
