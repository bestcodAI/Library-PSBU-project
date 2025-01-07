<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = DB::table('provinces')->get();
        return view('province.index', ['provinces' => $provinces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('province.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'zip_code' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data =  [
            'zip_code' => $request->zip_code,
            'name' => $request->name,
            'details' => clear_tag($request->description),
            'created_by' => Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/province/'), $filename);
            $data['image']= $filename;
        }

        DB::table('provinces')->insert($data);

        return admin_redirect('settings/provinces')->with('success', __('admin.province_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $province =  DB::table('provinces')->where('id' , $id)->first();
        return response()->json($province);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = DB::table('provinces')->where('id', $id)->first();
        return view('province.edit',['province' => $province]);
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
        $valid = $request->validate([
            'zip_code' => 'required',
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $data =  [
            'zip_code' => $request->zip_code,
            'name' => $request->name,
            'details' => clear_tag($request->description),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if (!empty($request->image)) {
            $old_img = DB::table('provinces')->where(['id' => $id])->first()->image;
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/province/'), $filename);
            $data['image']= $filename;
            if($old_img) {
                unlink(public_path('uploads/prorvince/'. $old_img));
            }
        }
        
        DB::table('privinces')->insert($data);

        return admin_redirect('settings/provinces')->with('success', __('province_added'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_image = DB::table('provinces')->where(['id' => $id])->first();

        if($delete_image->image) {
            unlink(public_path('uploads/province/'.$delete_image->image));
        }
        DB::table('provinces')->where(['id' => $id])->delete();
        return admin_redirect('settings/provinces')->with('success', __('province_deleted!'));
    }
}
