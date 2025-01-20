<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students =  DB::table('students')->get();
        return view('students.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces =  DB::table('provinces')->get();

        return view('students.add', ['provinces' => $provinces]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'pob' => 'required',
        ]);

        $reference_code = Str::random(10);
        $slug =  Str::random(40);

        $data =  [
            'code'          => $reference_code,
            'slug'          => $slug,
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'nick_name'     => $request->nick_name,
            'dob'           => $request->dob,
            'pob'           => $request->pob,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'father_phone'  => $request->father_phone,
            'mother_phone'  => $request->mother_phone,
            'province_id'   => $request->province_id,
            'description' => clear_tag($request->description),
        ];

        // dd($data);

        if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/student/'), $filename);
            $data['image']= $filename;
        }


        DB::table('students')->insert($data);

        return admin_redirect('students')->with('success', 'student_added');
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
        return view('students.edit');
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
    public function destroy($id)
    {
        //
    }
}
