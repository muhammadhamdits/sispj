<?php

namespace App\Http\Controllers;

use App\SubUraian;
use App\Uraian;
use App\Periode;

use Illuminate\Http\Request;

class SubUraianController extends Controller
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
        $uraians = Uraian::all();
         return view('data_master/desc/sub_uraian/add',['uraians' => $uraians]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'rekening' => 'required',
            'sub_uraian' => 'required',
            'uraian_id' => 'required',
        ]);

        try {
            $sub_uraian = SubUraian::create([
                'rekening' => $request->rekening,
                'nama' => $request->sub_uraian,
                'uraian_id' => $request->uraian_id,
            ]);
            $sub_uraian->save();
            return redirect()->route('admin.uraian.index', ['tabName' => 'suburaian'])->with('status', 'Data sub uraian '.$sub_uraian->nama.' Berhasil Ditambah!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub_uraian.create')->with('danger', 'Sub Uraian dengan rekening '.$request->rekening.' sudah ada!');
        }
    }

    public function show($id)
    {
        $sub_uraian = SubUraian::findOrFail($id);
        return view('data_master/desc/Sub_uraian/show', ['sub_uraian' => $sub_uraian]);
    }

    public function edit($id)
    {
        $uraians = Uraian::all();
        $sub_uraian = SubUraian::findOrFail($id);
        return view('data_master/desc/sub_uraian/edit', ['sub_uraian' => $sub_uraian, 'uraians' => $uraians]);
        
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rekening' => 'required',
            'nama' => 'required',
            'uraian_id' => 'required',
        ]);

        try {
            $sub_uraian = SubUraian::findOrFail($id);
            $sub_uraian->update($request->all());
            return redirect()->route('admin.uraian.index', ['tabName' => 'suburaian'])->with('warning', 'Data Sub Uraian '.$request->nama.' berhasil diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.sub_uraian.edit', ['id' => $id])->with('danger', 'Sub Uraian dengan rekening '.$request->rekening.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $sub_uraian = SubUraian::findOrFail($id);
        $sub_uraian->delete();
        return redirect()->route('admin.uraian.index', ['tabName' => 'sub_uraian'])->with('danger', 'Data sub uraian '.$sub_uraian->nama.' Berhasil dihapus');;
    }
}
