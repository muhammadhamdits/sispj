<?php

namespace App\Http\Controllers;

use App\Uraian;
use App\SubUraian;
use App\Sub4Uraian;
use Illuminate\Http\Request;

use App\Periode;

class UraianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
         $uraians = Uraian::all();
         $sub_uraians = SubUraian::all();
         $sub4uraians =Sub4Uraian::all();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/uraianutama/index', ['uraians' => $uraians, 'periode' => $periode, 'sub_uraians' => $sub_uraians,'sub4uraians' => $sub4uraians]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_master/uraianutama/uraian/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'rekening' => 'required',
            'nama' => 'required',
        ]);
        
        try {
            $uraian = Uraian::create($request->all()); 
             $uraian->save();
            return redirect()->route('admin.uraian.index')->with('status', 'Data Uraian '.$uraian->nama.' Berhasil Ditambah!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.uraian.create')->with('danger', 'Data dengan kode rekening '.$request->rekening.' sudah ada!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $uraian = Uraian::findOrFail($id);
        return view('data_master/uraianutama/uraian/show', ['uraian' => $uraian]);
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
        return view('data_master/uraianutama/uraian/edit', ['uraian' => $uraian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Uraian  $uraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening' => 'required',
            'nama' => 'required'
        ]);

        try {
            $uraian = Uraian::findOrFail($id);
            $uraian->update($request->all());
            return redirect()->route('admin.uraian.index')->with('warning', 'Data uraian '.$uraian->nama.' Berhasil Diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.uraian.edit', ['id' => $id])->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
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
        return redirect()->route('admin.uraian.index')->with('danger', 'Data Uraian '.$uraian->nama.' Berhasil Dihapus!');
    }
}
