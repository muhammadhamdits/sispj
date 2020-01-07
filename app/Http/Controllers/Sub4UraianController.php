<?php

namespace App\Http\Controllers;

use App\Sub3Uraian;
use App\Sub4Uraian;
use Illuminate\Http\Request;

class Sub4UraianController extends Controller
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
      $sub3uraians=Sub3Uraian::all();
       return view('data_master/desc/sub4uraian/add', ['sub3uraians' => $sub3uraians]);

    }

    public function store(Request $request)
    {
        $request->validate([
            
            'rekening' => 'required',
            'nama' => 'required',
            'sub3_uraian_id' => 'required',
        ]);

        try {
            $sub4uraian = Sub4Uraian::create($request->all());
            $sub4uraian->save();
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub4uraian'])->with('status', 'Data Sub 4 Uraian '.$sub4uraian->nama.' Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub4uraian.create')->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function show($id)
    {
        $sub4uraian = Sub4Uraian::findOrFail($id);
        return view('data_master/desc/sub4uraian/show', ['sub4uraian' => $sub4uraian]);
    }

    public function edit($id)
    {
        $sub4uraian = Sub4Uraian::findOrFail($id);
        $sub3uraians =Sub3Uraian::all();
        return view('data_master/desc/sub4uraian/edit', ['sub4uraian' => $sub4uraian,'sub3uraians'=>$sub3uraians]);
    }

    public function update(Request $request, $id)
    {
           $request->validate([
            'sub3_uraian_id' => 'required',
            'rekening' => 'required',
            'nama' => 'required',
        ]);
        
        try {
            $sub4uraian = Sub4Uraian::findOrFail($id);
            $sub4uraian->update($request->all());
            return redirect()->route('admin.uraian.index', ['tabName' => 'sub4uraian'])->with('warning', 'Data sub4uraian '.$sub4uraian->nama.' Berhasil diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub4uraian.edit', ['id' => $id])->with('danger', 'Data dengan kode '.$request->rekening.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $sub4uraian = Sub4Uraian::findOrFail($id);
        $sub4uraian->delete();
        return redirect()->route('admin.uraian.index',['tabName' => 'sub4uraian'])->with('danger', 'Data Sub4 Uraian '.$sub4uraian->nama.' Berhasil Dihapus!');
    }
}
