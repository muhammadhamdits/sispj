<?php

namespace App\Http\Controllers;

use App\Uraian;
use App\Sub4Uraian;
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
         $sub4uraians =Sub4Uraian::all();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/uraian/index', ['uraians' => $uraians, 'periode' => $periode,'sub4uraians' => $sub4uraians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_master/uraian/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uraian = Uraian::create([
            'rekening' => $request->kode_rekening,
            'nama' => $request->uraian,
                ]);
        $uraian->save();
        return redirect()->route('admin.uraian.index');

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
    public function edit($id)
    {
         $uraian = Uraian::findOrFail($id);
        return view('data_master/uraian/edit', ['uraian' => $uraian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $uraian = Uraian::findOrFail($id);
       
            $uraian->update([
            'rekening' => $request->rekening,
            'nama' => $request->uraian,
            ]);
      
            $uraian->update($request->all());
        
        return redirect()->route('admin.uraian.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uraian = Uraian::findOrFail($id);
        $uraian->delete();
        return redirect()->route('admin.uraian.index');
    }
}
