<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SettingsController extends Controller
{

    public function index() 
    {
        $settings = DB::table('settings')->where('setting_id', 1)->first();
        // $currencies = DB::table('currencies')->get();
        // $warehouses = DB::table('warehouses')->get();
        return view('settings.index', ['setting' => $settings
    ]);
    }

    public function store(Request $request)
    {

        $validation = $request->validate([
            'site_name' => 'required',
            'language' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'site_name' => $request->input('site_name'),
            'language' => $request->input('language'),
            // 'default_warehouse' => $request->input('warehouse'),
            // 'accounting_method' => $request->input('account'),
            // 'default_currency' => $request->input('currency'),
            // 'default_tax_rate' => $request->input('default_tax_rat'),
        ];
        
        if (!empty($request->image)) {
            $old_img = DB::table('settings')->first()->logo;
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/settings/'), $filename);
            $data['logo']= $filename;
            if($old_img) {
                unlink(public_path('uploads/settings/'. $old_img));
            }
        }
       
        if($validation) {
            $updated = DB::table('settings')
            ->where('setting_id', 1)
            ->update($data);
    
            if ($updated) {
                return admin_redirect('settings')->with('success','setting has been update success');
            } else {
                return admin_redirect('settings')->with('info','setting has been update exist');
            }

        } else {
            return admin_redirect('settings')->with('error','setting has been update error');
        }
    }


}
