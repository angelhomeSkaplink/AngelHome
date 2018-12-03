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
        $residents = DB::table('sales_pipeline')
        ->where('id','=',$id)
        ->where('facility_id','=',Auth::user()->facility_id)->select('sales_pipeline.*')
        ->first();
        // dd($residents);
        return view('tsp.allTsp',compact('id','residents'));
    }
    public function fall_tsp() {
        return view('tsp.fallTsp');
    }
    public function decline_tsp() {
        return view('tsp.declineApetiteTsp');
    }
    public function increase_pain(){
        return view('tsp.increasePainTsp');
    }
    public function new_medication(){
        return view('tsp.newMedicationTsp');
    }
    public function skin_problem(){
        return view('tsp.skinProblemTsp');
    }
    public function respiratory_problem(){
        return view('tsp.respiratoryTsp');
    }
}
