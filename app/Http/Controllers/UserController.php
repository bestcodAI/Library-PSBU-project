<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')->get();
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
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
            'code' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $data =  [
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent,
            'description' => $request->description,
        ];

        if (!empty($request->image)) {
            $old_img = DB::table('users')->first()->image;
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/profile/'), $filename);
            $data['image']= $filename;
            if($old_img) {
                unlink(public_path('uploads/profile/'. $old_img));
            }
        }
        
       $success=  DB::table('users')->insert($data);
       
       if($success) {
            return admin_redirect('users')->with('success', 'users added');
       }else {
         return admin_redirect('users')->with('errorr', 'add user has been error!');
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
        $user =  DB::table('users')->where(['id' => $id])->first();
        return view('user.edit', ['user' => $user]);
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
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $data =  [
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $request->slug,
            'parent_id' => $request->parent,
            'description' => clear_tag($request->description),
        ];

        if (!empty($request->image)) {
            $old_img = DB::table('users')->first()->image;
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/profile/'), $filename);
            $data['image']= $filename;
            if($old_img) {
                unlink(public_path('uploads/profile/'. $old_img));
            }
        }

         DB::table('users')
            ->where('id', $id)
            ->update($data);

        return admin_redirect('users')->with('success', 'user updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete_image = DB::table('users')->where(['id' => $id])->first();

        if($delete_image->image != null ) {
            unlink(public_path('uploads/profile/'.$delete_image->image));
        }

        DB::table('users')->where(['id' => $id])->delete();
        return admin_redirect('users')->with('success', 'user deleted!');
    }
}
