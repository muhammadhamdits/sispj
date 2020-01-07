<?php

namespace App\Http\Controllers;

use App\Uraian;
use App\SubUraian;
use App\Sub2Uraian;
use App\Sub3Uraian;
use App\Sub4Uraian;
use App\Item;
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
        $sub2_uraians = Sub2Uraian::all();
        $sub3_uraians = Sub3Uraian::all();
        $sub4_uraians = Sub4Uraian::all();
        $items = Item::all();
        return view('data_master/desc/index', ['uraians' => $uraians, 'sub_uraians' => $sub_uraians, 'sub2_uraians' => $sub2_uraians, 'sub3_uraians' => $sub3_uraians, 'sub4uraians' => $sub4_uraians, 'items' => $items]);
    }

    public function create()
    {
        return view('data_master/desc/uraian/add');
    }

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
            return redirect()->route('admin.uraian.create')->with('danger', 'Uraian dengan rekening '.$request->rekening.' sudah ada!');
        }
    }

    public function show($id)
    {
      $uraian = Uraian::findOrFail($id);
        return view('data_master/desc/uraian/show', ['uraian' => $uraian]);
    }

    public function edit($id)
    {
        $uraian = Uraian::findOrFail($id);
        return view('data_master/desc/uraian/edit', ['uraian' => $uraian]);
    }

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
            return redirect()->route('admin.uraian.edit', ['id' => $id])->with('danger', 'Uraian dengan kode '.$request->rekening.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $uraian = Uraian::findOrFail($id);
        $uraian->delete();
        return redirect()->route('admin.uraian.index')->with('danger', 'Data Uraian '.$uraian->nama.' Berhasil Dihapus!');
    }
}
