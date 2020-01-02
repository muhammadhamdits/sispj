<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\Periode;
use App\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $data = Periode::where('status', 1)->first();
        $programs = Program::all();

        return view('data_master.utama.kegiatan.create', ['data' => $data, 'programs' => $programs]);
    }

    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'kode' => 'required',
            'program_id' => 'required',
            'nama' => 'required'
        ]);

        $kegiatan = Kegiatan::create($request->all());
        $kegiatan->save();
        return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan'])->with('status', 'Data Kegiatan Berhasil Ditambahkan!');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Kegiatan::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan']);
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'kegiatan']);
    }
}
