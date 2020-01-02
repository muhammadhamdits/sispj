<?php

namespace App\Http\Controllers;

use App\Periode;
use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/program/add', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $program = Program::create($request->all());
        $program->save();
        return redirect()->route('admin.utama.index', ['tabName' => 'program']);
    }

    public function show($id)
    {
        $program = Program::findOrFail($id);
        return view('data_master/utama/program/show', ['program' => $program]);
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $data = Periode::where('status', 1)->first();
        return view('data_master/utama/program/edit', ['program' => $program, 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);
        $program->update($request->all());
        return redirect()->route('admin.utama.index', ['tabName' => 'program']);
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        $program->delete();
        return redirect()->route('admin.utama.index', ['tabName' => 'program']);
    }
}
