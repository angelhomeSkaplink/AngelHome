<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Excel;
use Input;

class ExcelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	
	public function prospect_date_btween_excel(Request $request) {
    	$data = json_decode($request->data);

    	\Excel::create('Prospects List', function( $excel) use ($data) {
	        $excel->sheet('posopects-data', function($sheet) use ($data){
				$sheet->setTitle('Prospects List');
				$sheet->cells('A1:E1', function($cells) {
					$cells->setFontWeight('bold');
				});
				$carray = [];	          
				foreach( $data as $k => $v ) {
					
					$carray[$k]['Sl No'] 					= $k+1;
					$carray[$k]['Prospective'] 				= $v->pros_name ;
					$carray[$k]['Phone No']					= $v->phone_p;
					$carray[$k]['Date']						= $v->date;
					$carray[$k]['Sales Stage']				= $v->sales_stage;
					$carray[$k]['Note'] 					= $v->notes;
					$carray[$k]['Method of Communication'] 	= $v->moc;
				}
				$sheet->fromArray($carray, null, 'A1', false, true);
	        });
	    })->download('xlsx');
    }
}
