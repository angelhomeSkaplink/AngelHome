<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PolicyDoc;
use DB,Auth,App;
use Kamaln7\Toastr\Facades\Toastr;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        App::setlocale(session('locale'));
        $policy_doc_name = DB::table('documents')->where([['doc_type','policy_doc'],['facility_id',Auth::user()->facility_id],['status',1]])->get();
        $policy_doc = DB::table('policy_doc')->where([['facility_id',Auth::user()->facility_id],['status',1]])->get();
        return view('policy_doc.form',compact('policy_doc_name','policy_doc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate(request(),[
        //     'doc_name'=>'unique:policy_doc'
        // ]);
       $policy_doc = new PolicyDoc();
       
       $file = $request->file('doc_file');
       $fileName = $file->getClientOriginalName();
       $fileName = uniqid().$fileName;
       $fileType = substr($fileName, -4);
       $fileType = strtolower($fileType);
       if($fileType ==".jpg" || $fileType =="jpeg" || $fileType ==".png" || $fileType ==".gif" || $fileType =="tiff" || $fileType ==".bmp" || $fileType ==".pdf" || $fileType ==".odf" || $fileType ==".doc" || $fileType =="docx"){
        $fileSize = $file->getClientSize();
        if($fileSize>5242880){
            Toastr::warning("You can not upload file more than 5MB!");
            return redirect('policy_doc_form');
        }else{
            $destinationPath = public_path().'/policy_doc/';	

            $file->move($destinationPath,$fileName);
            $policy_doc->doc_name = $request['doc_name'];
            $policy_doc->doc_file = $fileName ;
            $policy_doc->file_type = $fileType ;
            $policy_doc->user_id = Auth::user()->user_id;
            $policy_doc->facility_id = Auth::user()->facility_id;
            $policy_doc->upload_date = date('Y/m/d');
            $policy_doc->save();
            Toastr::success("File Uploaded Successfully !!");
            return redirect('policy_doc_form');
        }	
    }else{
            Toastr::warning("Oops ! unsupported file type.");
            return redirect('policy_doc_form');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($doc_id)
    {
        $update = DB::table('policy_doc')->where('doc_id',$doc_id)->update(['status' => 0]);
        Toastr::success("Document Deleted Successfully");
        return redirect('policy_doc_form');
    }
}
