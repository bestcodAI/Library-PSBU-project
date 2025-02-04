<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')
        ->join('categories as c','books.category_id','=','c.id')
        ->join('category_langs as cl','books.category_lang_id','=','cl.id')
        ->orderBy('id','desc')
        ->select('books.*', 'c.name as category_name', 'cl.name as cate_lang_name')
        ->get();
        return view('books.index',['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =  DB::table('categories')->get();
        $category_languages = DB::table('category_langs')->get();
        return view('books.add',['categories' => $categories, 'category_languages' => $category_languages]);
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
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $reference =  reference_no('book', 8);
        $data =  [
            'code' => $reference,
            'title' => $request->title,
            'slug' => str_replace(' ', '_', $request->title),
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

        return admin_redirect('group_book/books')->with('success', __('admin.book_added'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book =  DB::table('books')->where('id', $id)->first();
       return response()->json($book);
    }

    // get data
    public function get_book_data($term) {

        $b = [];
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
                $b[] = ['id' => sha1($c . $r), 'item_id' => $row->id,'label' => $row->title . ' (' . $row->code . ')', 'row' => $row];
                $r++;
            }
        } 

        if($b) { 
            return response()->json($b);
           }else {
            return response()->json([['id' => 0, 'label' => __('no_match_found')]]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = DB::table('books')
        ->where('id', $id)
        ->select('*')->first();
        // get categories
        $categories = DB::table('categories')->get();
        $category_languages = DB::table('category_langs')->get();

        return view('books.edit',['book' => $book,'categories' => $categories,'category_languages' => $category_languages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        // dd($request->image);
        
        $request->validate([
            'code' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $data =  [
            'code' => strlower(str_replace(' ','_',$request->code)),
            'title' => $request->title,
            'slug' => strlower(str_replace(' ','_',$request->slug)),
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

            $old_img = DB::table('books')->where(['id' => $id])->first()->image;
            if($old_img) {
                unlink(public_path('uploads/books/'. $old_img));
            }
        }

         DB::table('books')
            ->where('id', $id)
            ->update($data);

        return admin_redirect('group_book/books')->with('success', 'Book updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $old_img =  DB::table('books')->where(['id' => $id])->first()->image;

        DB::table('books')->where(['id' => $id])->delete();

        if($old_img) {
            unlink(public_path('uploads/books/'. $old_img));
        }
        return admin_redirect('group_book/books')->with('success', __('admin.book_deleted'));
    }

    public function print_barcodes(Request $request)
    {
        $barcodes = [];
        if($request->form_type) {
          $s = $request->book_id ? sizeof($request->book_id) : 0;

          for($m = 0; $m < $s; $m++) {
            $bid =  $request->input('book_id')[$m];
            $quantity =  $request->input('quantity')[$m];

            $book = DB::table('books')->where('id', $bid)->first();  

            $barcodes[] = [
                'book_id' => $book->id,
                'barcode' =>  $book->code,
                'book_name' => $book->title,
                'quantity' => $quantity,
            ];
          }
        }
        return view('books.barcodes',['barcodes' => $barcodes]);
    }

    public function import()
    {
       $book = DB::table('users')->first();
        return view('books.barcodes', ['book' => $book]);
    }
}
