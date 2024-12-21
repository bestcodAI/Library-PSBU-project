<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

if(!function_exists('settings')) {
    function settings() {
        $setting = DB::table('settings')->first();
        return $setting;
    }
}

if(!function_exists('current_local')) {
    function current_local() {
        $locale_current = request()->cookie("language");
        Session::put("locale",$locale_current);
        return '';
    }
}

