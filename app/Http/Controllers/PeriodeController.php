<?php

namespace App\Http\Controllers;

use App\Periode;
use DB;
use Illuminate\Http\Request;

class PeriodeController extends Controller
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
        return view('data_master/utama/periode/create');
    }

    public function store(Request $request)
    {
        try {
            Periode::create([
                'tahun'  => $request->tahun,
                'jenis'  => 0,
                'status' => 0
            ])->save();
            return redirect()->route('admin.utama.index', ['tabName' => 'periode'])->with('status', 'Periode '.$request->tahun.' Berhasil ditambahkan!');
        } catch (\Throwable $th) {
            return redirect()->route('admin.periode.create')->with('danger', 'Periode dengan tahun '.$request->tahun.' sudah ada!');
        }
    }

    public function show(Periode $periode)
    {
        //
    }

    public function edit(Periode $periode)
    {
        //
    }

    public function update(Request $request, $id)
    {
        DB::table('periodes')->update(['status' => 0]);
        $periode = Periode::findOrFail($id);
        $periode->jenis = $request->jenis;
        $periode->status = 1;
        $periode->save();
        return redirect()->route('admin.utama.index', ['tabName' => 'periode'])->with('status', 'Periode '.$periode->tahun.' Berhasil diaktifkan!');
    }

    public function destroy(Periode $periode)
    {
        $periode->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'periode'])->with('danger', 'Data periode '.$periode->tahun.' Berhasil Dihapus!');
    }
}
