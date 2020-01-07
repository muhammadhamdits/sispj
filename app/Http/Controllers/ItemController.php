<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        return view('data_master/desc/item/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
        ]);
        
        $item = Item::create($request->all()); 
        $item->save();
        return redirect()->route('admin.uraian.index', ['tabName' => 'item'])->with('status', 'Data item '.$item->nama.' Berhasil Ditambah!');
    }

    public function show(Item $item)
    {
        return view('data_master/desc/item/show', ['item' => $item]);
    }

    public function edit(Item $item)
    {
        return view('data_master/desc/item/edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'nama' => 'required',
            'satuan' => 'required',
        ]);

        $item->update($request->all());
        return redirect()->route('admin.uraian.index', ['tabName' => 'item'])->with('warning', 'Data item '.$item->nama.' Berhasil Diperbaharui!');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.uraian.index', ['tabName' => 'item'])->with('danger', 'Data item '.$item->nama.' Berhasil Dihapus!');
    }
}
