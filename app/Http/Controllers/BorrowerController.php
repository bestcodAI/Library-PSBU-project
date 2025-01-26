<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon; 

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('borrowers')
        ->orderBy('id','desc')
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
        return view('borrow.add', ['students' => $students]);
    }

    public function get_data($term) 
    {

        $pr = [];
        $rows = DB::table('books')
        ->where('code', 'LIKE', "%{$term}%") 
        ->orWhere('title', 'LIKE', "%{$term}%")
        ->get();

        if(!empty($rows)) {
            $r = 0;
            foreach($rows as $row) {
                unset($row->created_by, $row->created_at, $row->updated_at, $row->details, $row->slug, $row->views, $row->author, $row->author_date,$row->category_lang_id,$row->category_id);
                $c = uniqid(mt_rand(), true);
                $row->qty = 1; 
                $pr[] = ['mt_rand' => mt_rand(), 'id' => sha1($c . $r), 'item_id' => $row->id,'label' => $row->title . ' (' . $row->code . ')', 'row' => $row];
                $r++;
            }
        } 

        if($pr) { 
            return response()->json($pr);
           }else {
            return response()->json([['id' => 0, 'label' => __('no_match_found')]]);
        }

        
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
            'student_id' => 'required',
        ]);

        $data =  [
            'reference_no' => reference_no('borrow', 10),
            'start_date' => $request->date,
            'student_id' => $request->student_id,
            'created_by' => Auth::user()->id,
            'status'  => 'pending',
            'created_at' => Carbon::now(),
            'note' => clear_tag($request->description),
        ];

        $id = DB::table('borrowers')->insertGetId($data);
        $book_borrow =  [];

        for($i = 0; $i < count($request->book_id); $i++) {
            $book_borrow['borrower_id'] = $id;
            $book_borrow['book_id'] = $request->book_id[$i];
            $book_borrow['book_code'] = $request->book_code[$i];
            $book_borrow['book_name'] = $request->book_name[$i];
            $book_borrow['quantity'] = $request->quantity[$i];
            DB::table('book_borrowers')->insert($book_borrow);
        }

        session(['remove_br' => 1]);
        return admin_redirect('borrowers')->with('success', 'book_borrower_added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $borrower =  DB::table('borrowers')->where('id',$id)->first();
        $book_borrow = DB::table('book_borrowers')->where('id', $id)->first();

        return response()->json(['borrow' => $borrower, 'book_borrow'=> $book_borrow]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Borrower  $borrower
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $borrow = DB::table('book_borrowers')->where(['id' => $id])->first();

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
    public function destroy($id)
    {
        DB::table('borrowers')->where('id', $id)->delete();
        return admin_redirect('borrowers')->with('success', 'book_borrower_deleted');
    }
}
