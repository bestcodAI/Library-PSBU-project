<?php

namespace App\Http\Controllers;

use App\Models\Attandent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttandentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = DB::table('attendances')
        ->join('students','attendances.student_id','=','students.id')
        ->select('attendances.*',DB::Raw("CONCAT(nan_students.first_name, ' ',nan_students.last_name) AS name"))
        ->orderBy('id','desc')
        ->get();

        return view('attendance.index', ['attendances' => $attendances]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendance.add');
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
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function show(Attandent $attandent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function edit(Attandent $attandent, $id)
    {
        $attendance = DB::table('attendances')->where('id',$id)->first();
        return view('attendance.edit', ['attendance' => $attandence]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attandent $attandent, $id)
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attandent $attandent, $id)
    {
        
        DB::table('attendances')->where(['id' => $id])->delete();
        return admin_redirect('attendances')->with('success', __('attendance_deleted!'));
    }
}
