<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryLanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate_lang =  DB::table('category_langs')->orderBy('id', 'desc')->get();
        return view('category-language.index', ['cate_lang' => $cate_lang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('category-language.add');
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
            'description' => clear_tag($request->description),
        ];

        if (!empty($request->image)) {
        
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/category_lang/'), $filename);
            $data['image']= $filename;
           
        }
        
        DB::table('category_langs')->insert($data);

        return admin_redirect('settings/category_langauges')->with('success', __('category_language_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate_lang =  DB::table('category_langs')->where('id' , $id)->first();
        return response()->json($cate_lang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('category_langs')->where(['id' => $id])->first();
        return view('category-language.edit', ['category_lang' => $data]);
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
            'code' => 'required',
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $data =  [
            'code' => $request->code,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => clear_tag($request->description),
        ];

        // dd($id);

        if (!empty($request->image)) {
            $old_img = DB::table('category_langs')->first()->image;
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension(); 
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/category_lang/'), $filename);
            $data['image']= $filename;
            if($old_img) {
                unlink(public_path('uploads/category_lang/'. $old_img));
            }
        }
        
        DB::table('category_langs')->where(['id' => $id])->update($data);

        return admin_redirect('settings/category_langauges')->with('success', 'category language updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_image = DB::table('category_langs')->where(['id' => $id])->first();

        if($delete_image->image != null ) {
            unlink(public_path('uploads/category_lang/'.$delete_image->image));
        }

        DB::table('category_langs')->where(['id' => $id])->delete();
        return admin_redirect('settings/category_langauges')->with('success', 'category language deleted');
    }
}
