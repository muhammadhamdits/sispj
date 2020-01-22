<?php

namespace App\Http\Controllers;

use App\DetailKegiatan;
use App\Periode;
use App\Kegiatan;
use App\Uraian;
use App\SubUraian;
use App\Sub2Uraian;
use App\Sub3Uraian;
use App\Sub4Uraian;
use App\Item;
use Illuminate\Http\Request;

class DetailKegiatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data = Periode::where('status', 1)->first();
        $kegiatans = Kegiatan::all();
        return view('anggaran/index', ['data' => $data, 'kegiatans' => $kegiatans]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $detailKegiatan = DetailKegiatan::create($request->all());
        $detailKegiatan->save();
        return redirect()->route('anggaran.show', ['id' => $request->kegiatan_id]);
    }

    public function show($id)
    {
        $uraians = Uraian::all();
        $kegiatan = Kegiatan::findOrFail($id);
        $items = Item::all();
        $data = [];
        // $max = count($kegiatan->sub4_uraian);
        // for($n=0; $n < $max; $n++){
        foreach($kegiatan->sub4Uraian as $d){
            $detail = DetailKegiatan::where([['kegiatan_id', '=', $id], ['sub4_uraian_id', '=', $d->id]])->first();
            // dd($detail);
            
            $data[$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->subUraian->uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->subUraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'.'.$d->sub3Uraian->rekening.'-'.$d->sub3Uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'.'.$d->sub3Uraian->rekening.'.'.$d->rekening.'-'.$detail->id.'-'.$d->nama][] = '';

            foreach($detail->detailItem as $detailItem){
                if($detailItem->status == $detailItem->detailKegiatan->kegiatan->program->urusan->periode->jenis){
                    $data[$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->subUraian->uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->subUraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'-'.$d->sub3Uraian->sub2Uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'.'.$d->sub3Uraian->rekening.'-'.$d->sub3Uraian->nama][$d->sub3Uraian->sub2Uraian->subUraian->uraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->subUraian->rekening.'.'.$d->sub3Uraian->sub2Uraian->rekening.'.'.$d->sub3Uraian->rekening.'.'.$d->rekening.'-'.$detail->id.'-'.$d->nama][] = $detailItem->item->nama.'-'.$detailItem->volume.'-'.$detailItem->item->satuan.'-'.$detailItem->harga_satuan.'-'.$detailItem->id;
                }
            }
        }
        
        return view('anggaran/show', ['kegiatan' => $kegiatan, 'uraians' => $uraians, 'data' => $data, 'items' => $items]);
    }

    public function rekap()
    {
        return view('anggaran/rekap');
    }

    public function print()
    {
        return view('anggaran/print');
    }

    public function edit(DetailKegiatan $detailKegiatan)
    {
        //
    }

    public function update(Request $request, DetailKegiatan $detailKegiatan)
    {
        //
    }

    public function destroy($id)
    {
        $detailKegiatan = DetailKegiatan::findOrFail($id);
        $idKegiatan = $detailKegiatan->kegiatan->id;
        $detailKegiatan->delete();
        return redirect()->route('anggaran.show', ['id' => $idKegiatan])->with('danger', 'Data Berhasil Dihapus!');
    }

    public function fetch(Request $request)
    {
        $value = $request->value;
        $dependent = $request->dependent;

        if ($dependent == "suburaian"){
            $data = Uraian::where('id', $value)->first()->subUraian;
        } elseif ($dependent == "sub2uraian") {
            $data = SubUraian::where('id', $value)->first()->sub2Uraian;
        } elseif ($dependent == "sub3uraian") {
            $data = Sub2Uraian::where('id', $value)->first()->sub3Uraian;
        } elseif ($dependent == "sub4uraian") {
            $data = Sub3Uraian::where('id', $value)->first()->sub4Uraian;
        }
        $output = "<option value='null'>Pilih ".ucfirst($dependent)."</option>";
        foreach ($data as $d) {
            $output .= "<option value='$d->id'>$d->nama</option>";
        }
        echo($output);
    }
}
