<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Periode;
use App\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
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
        if(\Auth::user()->role != 0){
            if(\Auth::user()->organisasi->program->isEmpty()){
                $programs = [];
            }else{
                $programs = \Auth::user()->organisasi->program;
            }
        }else{
            $programs = Program::all();
        }

        return view('data_master.utama.kegiatan.create', ['data' => $data, 'programs' => $programs]);
    }

    public function store(Request $request)
    {   
        $request->validate([
            'kode' => 'required',
            'program_id' => 'required',
            'nama' => 'required'
        ]);

        try {
            $kegiatan = Kegiatan::create($request->all());
            $kegiatan->save();
            return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan'])->with('status', 'Data Kegiatan '.$kegiatan->nama.' Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.kegiatan.create')->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
        
    }

    public function show(Kegiatan $kegiatan)
    {
        return view('data_master.utama.kegiatan.show', compact('kegiatan'));
    }

    public function edit(Kegiatan $kegiatan)
    {   
        $data = Periode::where('status', 1)->first();
        $programs = Program::all();
        return view('data_master.utama.kegiatan.edit', ['data' => $data, 'programs' => $programs, 'kegiatan' => $kegiatan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'program_id' => 'required',
            'nama' => 'required'
        ]);

        try {
            $kegiatan = Kegiatan::findOrFail($id);
            Kegiatan::findOrFail($id)->update($request->except('_token', '_method'));
            return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan'])->with('warning', 'Data Kegiatan '.$kegiatan->nama.' Berhasil Diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.kegiatan.edit', ['kegiatan' => $kegiatan])->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan'])->with('danger', 'Data Kegiatan '.$kegiatan->nama.' Berhasil Dihapus!');
    }
}
