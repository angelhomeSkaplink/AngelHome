<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Translation\Facades\Translation;
use App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
   
    public function index(Request $request){		
		$uniq_code = uniqid();
        $route_name = Route::getCurrentRoute()->getPath();
        App::setlocale(session('locale'));
        return view($route_name, compact('uniq_code'));
    }
}
