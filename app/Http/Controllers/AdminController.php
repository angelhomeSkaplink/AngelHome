<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\DocumentType;
use App\ServiceRequest;
use DB,Auth,App;
use Kamaln7\Toastr\Facades\Toastr;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    public function edit_user(User $profile){
        return view('admin.index', compact('users'));
    }
    public function document_form(Request $request){
        
		App::setlocale(session('locale'));
        $all_docs = DB::table('documents')->where([['facility_id',Auth::user()->facility_id]])->get();
        return view('admin.add_document_form',compact('all_docs'));
    }
    public function save_document(Request $request){
        $new_document = new DocumentType();
        $new_document->doc_type = $request['doc_type'];
        $new_document->doc_name = $request['doc_name'];
        $new_document->facility_id = Auth::user()->facility_id;
        $new_document->save();
        return redirect('/document_form');
    }
    public function serviceRequest(){
        $residents = DB::table('sales_pipeline')
        ->where([['facility_id',Auth::user()->facility_id],['stage','MoveIn']])
        ->get();
        $requestData = DB::table('service_request')
                    ->join('sales_pipeline','service_request.res_id','=','sales_pipeline.id')
                    ->where(['facility_id',Auth::user()->facility_id])
                    ->orderBy('service_request.req_id','desc')
                    ->paginate(5);
                    // dd($requestData);
        return view('admin.serviceRequest',compact('residents','requestData'));
    }
    public function storeServiceRequest(Request $request){
        $data = new ServiceRequest();
        $data->res_id = $request['res_id'];
        $data->title = $request['title'];
        $data->description = $request['description'];
        $data->notes = $request['notes'];
        $data->req_date = date('Y-m-d');
        $data->facility_id = Auth::user()->facility_id;
        $data->user = Auth::user()->user_id;
        $data->save();
        Toastr::success("Service Request Initiated !!");
        return redirect('/service_request');
    }
    public function getDetails($id){
        $result = DB::table('service_request')->where('req_id',$id)->get();
        return json_encode($result);
    }
}
