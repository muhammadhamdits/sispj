<?php

namespace App\Http\Controllers;

use App\Sub2Uraian;
use Illuminate\Http\Request;

class Sub2UraianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
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
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function show(Sub2Uraian $sub2Uraian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub2Uraian $sub2Uraian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sub2Uraian $sub2Uraian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub2Uraian $sub2Uraian)
    {
        //
    }
}
