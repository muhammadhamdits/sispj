<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Organisasi;
use App\Kegiatan;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    public function index()
    {
        $data = Periode::where('status', 1)->first();
        $kegiatans = Kegiatan::all();
        return view('data_master/utama/index', ['data' => $data, 'kegiatans' => $kegiatans]);
    }

    public function create()
    {
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/organisasi/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $organisasi = Organisasi::create($request->all());
        $organisasi->save();
        return redirect()->route('admin.utama.index');
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
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->update($request->all());
        
        return redirect()->route('admin.utama.index');
    }

    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();
        return redirect()->route('admin.utama.index');
    }
}
