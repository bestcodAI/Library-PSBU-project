<?php

namespace App\Http\Controllers;

use App\Models\Attandent;
use Illuminate\Http\Request;

class AttandentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendance = ['1','2','3','4'];

        return view('attendance.index', ['categories' => $attendance]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Attandent $attandent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attandent $attandent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attandent  $attandent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attandent $attandent)
    {
        //
    }
}
