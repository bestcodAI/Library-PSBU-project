<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function __construct() 
    {
        $locale_current = request()->cookie("language");

        Session::put("locale",$locale_current);
    
    }
    public function dashboard()
    {
        // $locale_current = request()->cookie("language");
        // Session::put("locale",$locale_current);

        return view('dashboard');
    }
}
