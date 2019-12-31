<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Organisasi;
use App\Urusan;
use Illuminate\Http\Request;

class OrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisasis = Organisasi::join('periodes', 'organisasis.periode_id', '=', 'periodes.id')
                                ->where('periodes.status', 1)
                                ->get();
        $urusan = Urusan::join('organisasis','urusans.organisasi_id','=','organisasis.id')
                           ->join('periodes', 'organisasis.periode_id', '=', 'periodes.id')
                                ->where('periodes.status', 1)
                                ->select('urusans.id', 'urusans.kode', 'urusans.nama', 'organisasis.nama as organisasi','organisasi_id')
                                ->get();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/organisasi/index', ['organisasis' => $organisasis, 'periode' => $periode, 'urusan' => $urusan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data_master/organisasi/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organisasi = Organisasi::create([
           
            'id' => $request->no,
            'kode' => $request->kode,
            'nama' => $request->name,
            
        ]);
        $organisasi->save();
        return redirect()->route('admin.organisasi.index');
    }

    public function show($organisasi)
    {
         $user = Organisasi::findOrFail($organisasi);

       return view('data_master/organisasi/show', ['organisasi' => $organisasi]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organisasi = Organisasi::findOrFail($id);

        return view('data_master/organisasi/edit', ['organisasi' => $organisasi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $organisasi = Organisasi::findOrFail($id);
        //if($request->password == null){
            $organisasi->update([
            
                //'id'        => $request ->no,
                'kode'      => $request->kode,
                'nama'      => $request->name,

                
            ]);
        
        $organisasi->update($request->all());
        
        return redirect()->route('admin.organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi = Organisasi::findOrFail($id);
        $organisasi->delete();
        return redirect()->route('admin.organisasi.index');
    }
}
