<?php

namespace App\Http\Controllers;

use App\Sub2Uraian;
use App\Sub3Uraian;
use Illuminate\Http\Request;

class Sub3UraianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        $sub2_uraians = Sub2Uraian::all();
        return view('data_master/desc/sub3_uraian/add', compact('sub2_uraians'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rekening' => 'required',
            'nama' => 'required',
            'sub2_uraian_id' => 'required',
        ]);
        
        try {
            $sub3_uraian = Sub3Uraian::create($request->all()); 
            $sub3_uraian->save();
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub3uraian'])->with('status', 'Data Sub3 Uraian '.$sub3_uraian->nama.' Berhasil Ditambah!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub3_uraian.create')->with('danger', 'Sub3 Uraian dengan rekening '.$request->rekening.' sudah ada!');
        }
    }

    public function show(Sub3Uraian $sub3Uraian)
    {
        return view('data_master/desc/sub3_uraian/show', ['sub3_uraian' => $sub3Uraian]);
    }

    public function edit(Sub3Uraian $sub3Uraian)
    {
        $sub2_uraians = Sub2Uraian::all();
        return view('data_master/desc/sub3_uraian/edit', ['sub3_uraian' => $sub3Uraian, 'sub2_uraians' => $sub2_uraians]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening' => 'required',
            'nama' => 'required',
            'sub2_uraian_id' => 'required',
        ]);

        try {
            $sub3_uraian = Sub3Uraian::findOrFail($id);
            $sub3_uraian->update($request->all());
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub3uraian'])->with('warning', 'Data sub3 uraian '.$sub3_uraian->nama.' Berhasil Diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub3_uraian.edit', ['id' => $id])->with('danger', 'Sub 3 Uraian dengan kode '.$request->rekening.' sudah ada!');
        }
    }

    public function destroy(Sub3Uraian $sub3Uraian)
    {
        $sub3Uraian->delete();
        return redirect()->route('admin.uraian.index', ['tabName' => 'sub3uraian'])->with('danger', 'Data Sub 3 Uraian '.$sub3Uraian->nama.' Berhasil Dihapus!');
    }
}
