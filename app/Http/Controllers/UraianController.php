<?php

namespace App\Http\Controllers;

use App\Uraian;
use App\SubUraian;
use App\Sub2Uraian;
use Illuminate\Http\Request;

use App\Periode;

class UraianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uraians = Uraian::all();
        $sub_uraians = SubUraian::all();
        $sub2_uraians = Sub2Uraian::all();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/uraian/index', ['uraians' => $uraians, 'periode' => $periode, 'sub_uraians' => $sub_uraians, 'sub2_uraians' => $sub2_uraians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function show(Uraian $uraian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function edit(Uraian $uraian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Uraian $uraian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Uraian $uraian)
    {
        //
    }
}
