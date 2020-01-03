<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
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
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/program/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'urusan_id' => 'required',
            'organisasi_id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
        ]);
        try {
            $program = Program::create($request->all());
            $program->save();
            return redirect()->route('admin.utama.index', ['tabName' => 'program'])->with('status', 'Data Kegiatan '.$program->nama.' Berhasil Ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.program.create')->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('data_master/utama/program/show', ['program' => $program]);
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/program/edit', ['program' => $program, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'urusan_id' => 'required',
            'organisasi_id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
        ]);
        
        try {
            $program = Program::findOrFail($id);
            $program->update($request->all());
            return redirect()->route('admin.utama.index', ['tabName' => 'program'])->with('warning', 'Data program '.$program->nama.' Berhasil diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.program.edit', ['id' => $id])->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'program'])->with('danger', 'Data program '.$program->nama.' Berhasil dihapus');;
    }
}
