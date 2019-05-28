<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function change_language(Request $request){
		$uniq_code = uniqid();
        $val = $request['myselect'];
        App::setlocale(session('locale'));
        return view('dashboard', compact('uniq_code'));
    }
    public function languageStore(Request $request){
        session(['locale' =>$request['language']]);
        return redirect()->back();
    }
}
