<?php

namespace App\Http\Controllers;

use App\DetailItem;
use Illuminate\Http\Request;

class DetailItemController extends Controller
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
        $detailItem = DetailItem::create($request->all());
        $detailItem->save();
        return redirect()->route('anggaran.show', ['id' => $detailItem->detailKegiatan->kegiatan_id]);
    }

    public function show(DetailItem $detailItem)
    {
        //
    }

    public function edit(DetailItem $detailItem)
    {
        //
    }

    public function update(Request $request, DetailItem $detailItem)
    {
        //
    }

    public function destroy(DetailItem $detailItem)
    {
        //
    }
}
