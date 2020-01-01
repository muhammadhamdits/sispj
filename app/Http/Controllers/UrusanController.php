<?php

namespace App\Http\Controllers;

use App\Urusan;
use App\Organisasi;
use Illuminate\Http\Request;

class UrusanController extends Controller
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
                           ->select('organisasis.nama as organisasi','urusans.nama','organisasi_id')
                                ->where('periodes.status', 1)
                                ->get();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/organisasi/index', ['urusan' => $urusan, 'periode' => $periode, 'organisasis' => $organisasis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organisasis = Organisasi::join('periodes', 'organisasis.periode_id', '=', 'periodes.id')
                                ->where('periodes.status', 1)
                                ->get();
         return view('data_master/organisasi/urusan/add',['organisasis' => $organisasis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $urusans = Urusan::create([
            'kode' => $request->rekening,
            'nama' => $request->urusan,
            'organisasi_id' => $request->organisasi,
        ]);
        $urusans->save();
        return redirect()->route('admin.organisasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function show(Urusan $urusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $urusan = Urusan::findOrFail($id);
        return view('data_master/organisasi/urusan/edit', ['urusan' => $urusan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $urusan = Urusan::findOrFail($id);
       
            $urusan->update([
                 'kode' => $request->rekening,
            'nama' => $request->urusan,
            'organisasi_id' => $request->organisasi
            ]);
      
            $urusan->update($request->all());
        
        return redirect()->route('admin.organisasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Urusan  $urusan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $urusan = Urusan::findOrFail($id);
        $urusan->delete();
        return redirect()->route('admin.organisasi.index');
    }
}
