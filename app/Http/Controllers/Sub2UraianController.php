<?php

namespace App\Http\Controllers;

use App\SubUraian;
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
        
    }

    public function create()
    {
        $subUraians = SubUraian::all();
        return view('data_master.uraian.sub2_uraian.create', ['subUraians' => $subUraians]);
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
            'sub_uraian_id' => 'required',
            'nama' => 'required'
        ]);

        try {
            $sub2uraian = Sub2Uraian::create($request->all());
            $sub2uraian->save();
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub2uraian'])->with('status', 'Data Kegiatan '.$sub2uraian->nama.' Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub2_uraian.create')->with('danger', 'Data dengan Rekening '.$request->rekening.' sudah ada!');
        }
    }

    public function show(Sub2Uraian $sub2Uraian)
    {   
        return view('data_master.uraian.sub2_uraian.show', compact('sub2Uraian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function edit(Sub2Uraian $sub2Uraian)
    {
        $subUraians = SubUraian::all();
        return view('data_master.uraian.sub2_uraian.edit', ['sub2Uraian' => $sub2Uraian, 'subUraians' => $subUraians]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening' => 'required',
            'sub_uraian_id' => 'required',
            'nama' => 'required'
        ]);

        try {
            $sub2uraian = Sub2Uraian::findOrFail($id);
            Sub2Uraian::findOrFail($id)->update($request->except('_token', '_method'));
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub2uraian'])->with('warning', 'Data Sub2 Uraian '.$sub2uraian->nama.' Berhasil Diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub2_uraian.edit', ['sub2Uraian' => $sub2Uraian])->with('danger', 'Data dengan rekening '.$request->rekening.' sudah ada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sub2Uraian  $sub2Uraian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sub2Uraian $sub2Uraian)
    {
        $sub2Uraian->delete();
        return redirect()->route('admin.uraian.index', ['tabName' => 'sub2uraian'])->with('danger', 'Data Sub2 Uraian '.$sub2Uraian->nama.' Berhasil Dihapus!');
    }
}
