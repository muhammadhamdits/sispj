<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Urusan;
use Illuminate\Http\Request;

class UrusanController extends Controller
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
        $data = Periode::where('status', 1)->first();
         return view('data_master/utama/urusan/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        try {
            $urusan = Urusan::create($request->all());
            $urusan->save();
            return redirect()->route('admin.utama.index', ['tabName' => 'urusan'])->with('status', 'Data urusan '.$request->nama.' berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.urusan.create')->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function show($id)
    {
        $urusan = Urusan::findOrFail($id);
        return view('data_master/utama/urusan/show', ['urusan' => $urusan]);
    }

    public function edit($id)
    {
        $urusan = Urusan::findOrFail($id);
        return view('data_master/utama/urusan/edit', ['urusan' => $urusan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        try {
            $urusan = Urusan::findOrFail($id);
            $urusan->update($request->all());
            return redirect()->route('admin.utama.index', ['tabName' => 'urusan'])->with('warning', 'Data urusan '.$request->nama.' berhasil diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.urusan.edit', ['id' => $id])->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $urusan = Urusan::findOrFail($id);
        $urusan->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'urusan'])>with('danger', 'Data urusan  '.$urusan->nama.' berhasil dihapus!');
    }
}
