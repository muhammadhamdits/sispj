<?php

namespace App\Http\Controllers;

use App\Kuitansi;
use App\DetailKuitansi;
use Illuminate\Http\Request;
use PDF;

class KuitansiController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $kuitansi = Kuitansi::create([
            'tanggal' => $request->tanggal,
            'terima_dari' => $request->terima_dari,
            'sebab' => $request->sebab,
            'dibukukan_tanggal' => $request->dibukukan_tanggal,
            'detail_kegiatan_id' => $request->detail_kegiatan_id,
        ]);
        $kuitansi->save();
        
        for($i=0; $i<=max(array_keys($request->detail_item_id)); $i++){
            if(isset($request->detail_item_id[$i])){
                $detailKuitansi = DetailKuitansi::create([
                    'harga_satuan' => $request->harga_satuan[$i],
                    'kuitansi_id' => $kuitansi->id,
                    'volume' => $request->volume[$i],
                    'detail_item_id' => $i,
                ]);
                $detailKuitansi->save();
            }
        }

        $pdf = PDF::loadview('anggaran/kuitansi', ['kuitansi' => $kuitansi]);
    	return view('anggaran/kuitansi', ['kuitansi' => $kuitansi]);
    }

    public function show(Kuitansi $kuitansi)
    {
        //
    }

    public function edit(Kuitansi $kuitansi)
    {
        //
    }

    public function update(Request $request, Kuitansi $kuitansi)
    {
        //
    }

    public function destroy(Kuitansi $kuitansi)
    {
        //
    }
}
