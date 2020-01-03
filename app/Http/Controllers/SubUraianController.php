<?php

namespace App\Http\Controllers;

use App\SubUraian;
use App\Uraian;
use Illuminate\Http\Request;

class SubUraianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
       $uraian = uraian::join('uraian', 'sub_uraians.uraian_id', '=', 'uraian.id')
                                ->where('periodes.status', 1)
                                ->get();
        $sub_uraian = sub_uraian::join('uraians','sub_uraians.uraian_id','=','uraians.id')
                           ->select('uraians.id as uraian','sub_uraians.nama','uraian_id')
                                ->get();
        $periode = Periode::where('status', 1)->first();
        return view('data_master/uraian/index', ['sub_uraians' => $sub_uraian,'uraians' => $uraian]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uraians = Uraian::all();
         return view('data_master/uraian/sub_uraian/add',['uraians' => $uraians]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $sub_uraian = SubUraian::create([
            'rekening' => $request->rekening,
            'nama' => $request->sub_uraian,
            'uraian_id' => $request->uraian_id,
        ]);
        $sub_uraian->save();
        return redirect()->route('admin.uraian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubUraian  $subUraian
     * @return \Illuminate\Http\Response
     */
    public function show(SubUraian $subUraian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubUraian  $subUraian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uraian = SubUraian::findOrFail($id);
        return view('data_master/uraian/sub_uraian/edit', ['uraian' => $uraian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubUraian  $subUraian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubUraian $subUraian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubUraian  $subUraian
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubUraian $subUraian)
    {
        //
    }
}
