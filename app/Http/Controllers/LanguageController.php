<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function change_language(Request $request){
		$uniq_code = uniqid();
        $val = $request['myselect'];
        App::setlocale($val);
        return view('dashboard', compact('uniq_code'));
    }
}
