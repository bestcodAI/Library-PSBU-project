<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('book_borrowers')
        ->join('books', 'book_borrowers.book_id','=','books.id')
        ->join('students', 'book_borrowers.student_id', '=','students.id')
        ->orderBy('book_borrowers.id','desc')
        ->select('book_borrowers.*','books.title as book_name', DB::raw("CONCAT('students.first_name', '', 'students.last_name') as student_name"))
        ->get();
        return view('borrow.index', ['borrowings' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books =  DB::table('books')->get();
        $students = DB::table('students')->get();
        return view('borrow.add', ['books' => $books, 'students' => $students]);
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
            'book_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data =  [
            'code' => $request->code,
            'title' => $request->title,
            'slug' => $request->slug,
            'author' => $request->author_name,
            'author_date' => $request->author_date,
            'category_lang_id' => $request->category_lang_id,
            'category_id' => $request->category,
            'details' => clear_tag($request->description),
        ];

        if (!empty($request->image)) {
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = hash('gost',(time().'.' . $extension));
            $file->move(public_path('uploads/books/'), $filename);
            $data['image']= $filename;
        }


        DB::table('books')->insert($data);

        return admin_redirect('books')->with('success', 'book added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show(Borrower $borrower)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrower $borrower)
    {
        return view('borrow.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrower $borrower)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrower $borrower)
    {
        
    }
}
