<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Organisasi;
use App\Kegiatan;
use App\Program;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Periode::where('status', 1)->first();
        $kegiatans = Kegiatan::all();
        $programs = Program::all();
        $periodes = Periode::orderBy('status', 'desc')->get();
        return view('data_master/utama/index', ['data' => $data, 'programs' => $programs, 'kegiatans' => $kegiatans, 'periodes' => $periodes]);
    }

    public function create()
    {
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/organisasi/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
        ]);
        
        try {
            $organisasi = Organisasi::create($request->all());
            $organisasi->save();
            return redirect()->route('admin.utama.index')->with('status', 'Data Organisasi '.$organisasi->nama.' Berhasil Ditambah!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.organisasi.create')->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function show($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('data_master/utama/organisasi/show', ['organisasi' => $organisasi]);
    }

    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        return view('data_master/utama/organisasi/edit', ['organisasi' => $organisasi]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        try {
            $organisasi = Organisasi::findOrFail($id);
            $organisasi->update($request->all());
            return redirect()->route('admin.utama.index')->with('warning', 'Data Organisasi '.$organisasi->nama.' Berhasil Diperbaharui!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.organisasi.edit', ['id' => $id])->with('danger', 'Data dengan kode '.$request->kode.' sudah ada!');
        }
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();
        return redirect()->route('admin.utama.index')->with('danger', 'Data Organisasi '.$organisasi->nama.' Berhasil Dihapus!');
    }
}
