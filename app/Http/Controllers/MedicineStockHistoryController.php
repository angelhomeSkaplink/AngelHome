<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Auth, App;
use App\MedicineStockHistory;
use App\FacilityPharmacy;
use App\PatientMedicalInfo;
use App\crm;
use DateTime;
use App\Medicine;
use App\Pharmacy;
use Illuminate\Support\Facades\Route;

class MedicineStockHistoryController extends Controller
{
	public function __construct(){
		$this->middleware('auth');	
	}
	
    public function medicine_stocks_list(Request $request)
    {
		$val = $request['language'];
		if(!$val){
			$qry_data = DB::table('medicine_stock_history')
					->where('facility_id', Auth::user()->facility_id)
                    ->select('medi_stock_id', 'stock_alert', 'stock_upto')
                    ->get();

			foreach($qry_data as $stock)
			{
				if($stock->stock_alert == 10 || $stock->stock_upto == '0000-00-00')
				{
					continue;
				}
				else
				{
					$present_date = new DateTime("now");
					$stock_upto = new DateTime($stock->stock_upto);

					$diff = $present_date->diff($stock_upto);
					$diff_d = $diff->days;
					if ($diff_d <= 7)
					{
						DB::table('medicine_stock_history')
							->where('medi_stock_id', $stock->medi_stock_id)
							->update([
								'stock_alert' => 1,
							]);
					}
				}
			}

			$stocks =   DB::table('medicine_stock_history')
						->Join('sales_pipeline', 'sales_pipeline.id', '=', 'medicine_stock_history.pros_id')
						->select('medicine_stock_history.*', 'sales_pipeline.*')
						->orderBy('medicine_stock_history.stock_order_date', 'DESC')
						->get();
			return view('medicine_stocks.medicine_stocks_list', compact('stocks'));	
		}else{
			$route_name = Route::getCurrentRoute()->getPath();
			App::setlocale($val);
			$qry_data = DB::table('medicine_stock_history')
					->where('facility_id', Auth::user()->facility_id)
                    ->select('medi_stock_id', 'stock_alert', 'stock_upto')
                    ->get();

			foreach($qry_data as $stock)
			{
				if($stock->stock_alert == 10 || $stock->stock_upto == '0000-00-00')
				{
					continue;
				}
				else
				{
					$present_date = new DateTime("now");
					$stock_upto = new DateTime($stock->stock_upto);

					$diff = $present_date->diff($stock_upto);
					$diff_d = $diff->days;
					if ($diff_d <= 7)
					{
						DB::table('medicine_stock_history')
							->where('medi_stock_id', $stock->medi_stock_id)
							->update([
								'stock_alert' => 1,
							]);
					}
				}
			}

			$stocks =   DB::table('medicine_stock_history')
						->Join('facility_pharmacy', 'medicine_stock_history.pharmacy_id', '=', 'facility_pharmacy.facility_pharmacy_id')
						->Join('sales_pipeline', 'sales_pipeline.id', '=', 'medicine_stock_history.pros_id')
						->select('medicine_stock_history.*','facility_pharmacy.pharmacy_name', 'sales_pipeline.pros_name')
						->orderBy('medicine_stock_history.stock_order_date', 'DESC')
						->get();

			return view('medicine_stocks.'.$route_name, compact('stocks'));		
		}		
    }

    public function add_recv_date($id)
    {
        return view('medicine_stocks.add_recv_date', compact('id'));
    }

    public function stock_recv(Request $request)
    {
        $recv_date = new DateTime("now");
        $stock_upto = $request['stock_upto'];
        $medi_stock_id = $request['medi_stock_id'];

        DB::table('medicine_stock_history')
            ->where('medi_stock_id', $medi_stock_id)
            ->update([
                'order_status' => 2,
                'recv_date' => new DateTime("now"),
                'stock_upto' => $stock_upto,
            ]);

        return redirect('medicine_stocks_list');
    }

    public function add_stocks(Request $request)
    {
		$val = $request['language'];
		if(!$val){
			$medicines = DB::table('medicine')->where('facility_id', Auth::user()->facility_id)->get();
			return view('medicine_stocks.add_stocks', compact('medicines'));
		}else{
			$route_name = Route::getCurrentRoute()->getPath();
			$medicines = DB::table('medicine')->where('facility_id', Auth::user()->facility_id)->get();
			App::setlocale($val);
			return view('medicine_stocks.'.$route_name, compact('medicines'));
		}
	}

    public function store_stocks(Request $request)
    {

		$check_medicine = DB::table('medicine')->where([['medicine_name', $request['medicine_name']], ['facility_id', Auth::user()->facility_id]])->first();
		$check_pharmacy = DB::table('facility_pharmacy')->where([['pharmacy_name', $request['pharmacy_id']], ['facility_id', Auth::user()->facility_id]])->first();

        $new_data = new MedicineStockHistory();
		if(!$check_pharmacy){
			$new_data->pharmacy_id = $request['pharmacy_id'];	
			
			$new_pharmacy = new Pharmacy();
			$new_pharmacy->pharmacy_name = $request['pharmacy_id'];
			$new_pharmacy->facility_id = Auth::user()->facility_id;
			$new_pharmacy->save();

		}else{
			$new_data->pharmacy_id = $request['pharmacy_id'];
		}
		$new_data->pharmacy_id = $request['pharmacy_id'];
		if(!$check_medicine){
			$new_data->medicine_name = $request['medicine_name'];
			
			$new_medicine = new Medicine();
			$new_medicine->medicine_name = $request['medicine_name'];
			$new_medicine->facility_id = Auth::user()->facility_id;
			$new_medicine->save();
		}else{
			$new_data->medicine_name = $request['medicine_name'];
		}        
        $new_data->stock_order_date = new DateTime("now");
        $new_data->course_end_date = $request['course_end_date'];
        $new_data->stock_upto = '0000-00-00';
        $new_data->order_status = 1;
        $new_data->stock_alert = 0;
        $new_data->user_id = Auth::user()->user_id;
        $new_data->pros_id = $request['pros_id'];
        $new_data->facility_id = Auth::user()->facility_id;
        $new_data->save();

        return redirect('medicine_stocks_list');
    }

    public function edit_stocks($id)
    {
        $stocks = DB::table('medicine_stock_history')
                    ->select('medicine_stock_history.*')
                    ->where('medi_stock_id', $id)
                    ->first();

        return view('medicine_stocks.edit_stocks', compact('stocks'));
    }

    public function update_stocks(Request $request)
    {
        DB::table('medicine_stock_history')
            ->where('medi_stock_id', $request['medi_stock_id'])
            ->update([
                'pharmacy_id' => $request['pharmacy_id'],
                'medicine_name' => $request['medicine_name'],
                'delivery_date' => $request['delivery_date'],
                'medicine_end_date' => $request['medicine_end_date'],
                'medi_stock_status' => $request['medi_stock_status'],
                'pros_id' => $request['pros_id'],
                'stock_alert' => 1,
            ]);

        return redirect('medicine_stocks_list');
    }

    public function renew_list()
    {
        $pending_stocks =   DB::table('medicine_stock_history')
                            ->Join('facility_pharmacy', 'medicine_stock_history.pharmacy_id', '=', 'facility_pharmacy.pharmacy_name')
                            ->Join('sales_pipeline', 'sales_pipeline.id', '=', 'medicine_stock_history.pros_id')
                            ->select('medicine_stock_history.*','facility_pharmacy.*', 'sales_pipeline.pros_name')
                            ->where('medicine_stock_history.stock_alert', 1)
                            ->orderBy('medicine_stock_history.stock_upto', 'ASC')
                            ->get();
        return view('medicine_stocks.renew_list', compact('pending_stocks'));
    }

    public function renewal_complete($id)
    {
        DB::table('medicine_stock_history')
            ->where('medi_stock_id', $id)
            ->update([
                'stock_alert' => 10,
            ]);

        return redirect('renew_list');
    }

    public function view_stock_details($id)
    {
        $stocks =   DB::table('medicine_stock_history')
                    ->Join('sales_pipeline', 'sales_pipeline.id', '=', 'medicine_stock_history.pros_id')
                    ->select('medicine_stock_history.*', 'sales_pipeline.pros_name')
                    ->where([['medicine_stock_history.medicine_name', $id]])
                    ->orderBy('medicine_stock_history.medi_stock_id', 'DESC')
                    ->get();

        return view('medicine_stocks.view_stock_details', compact('stocks'));
    }

    public function get_pres_id($id)
    {
        $pres =   DB::table('patient_medical_info')
                    ->select('prescription_id')
                    ->where([
                        ['pros_id', $id],
                    ])
                    ->get();

        dd($pres);
        // return json_encode($pres);
    }
	
	public function prospect_prescription($pros_id){
		$prescriptions = DB::table('pharmacy_details')->where([['pros_id', $pros_id], ['status', 1]])->first();
		return json_encode($prescriptions);
	}
}
