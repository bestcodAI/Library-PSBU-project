<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function books()
    {
        $books =  DB::table('books')
                ->join('categories', 'books.category_id','=','categories.id')
                ->join('category_langs', 'books.category_lang_id','=','category_langs.id')
                ->select('books.*','categories.name as category_name','category_langs.name as cate_lang_name')
                ->get();
        return view('reports.books',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = DB::table('users')
        ->get();
        return view('reports.users',['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function borrowers()
    {
        $borrowers = DB::table('book_borrowers')->get();
        return view('reports.borrowers',['borrowers' => $borrowers]);
    }

    
    public function categories()
    {
         $categories = DB::table('categories')
        ->get();
        return view('reports.categories',['categories' => $categories]);
    }

    
    public function category_languages()
    {
        $category_langs = DB::table('category_langs')
        ->get();
        return view('reports.category_languages',['category_langs' => $category_langs]);
    }

}
