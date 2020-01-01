<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Urusan;
use Illuminate\Http\Request;

class UrusanController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $data = Periode::where('status', 1)->first();
         return view('data_master/utama/urusan/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $urusan = Urusan::create($request->all());
        $urusan->save();
        return redirect()->route('admin.utama.index', ['tabName' => 'urusan']);
    }

    public function show($id)
    {
        $urusan = Urusan::findOrFail($id);
        return view('data_master/utama/urusan/show', ['urusan' => $urusan]);
    }

    public function edit($id)
    {
        $urusan = Urusan::findOrFail($id);
        return view('data_master/utama/urusan/edit', ['urusan' => $urusan]);
    }

    public function update(Request $request, $id)
    {
        $urusan = Urusan::findOrFail($id);
        $urusan->update($request->all());

        return redirect()->route('admin.utama.index', ['tabName' => 'urusan']);
    }

    public function destroy($id)
    {
        $urusan = Urusan::findOrFail($id);
        $urusan->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'urusan']);
    }
}
