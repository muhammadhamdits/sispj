<?php

namespace App\Http\Controllers;

use App\DetailItem;
use App\DetailKegiatan;
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

    public function get()
    {
        $id = $_GET['id'];
        $data = DetailKegiatan::findOrFail($id);
        $output = "";
        foreach($data->detailItem as $d){ 
            $max = $d->volume;
            foreach($d->detailKuitansi as $k){
                $max = $max-$k->volume;
            }
            if($max > 0){
                $output .= "
                    <tr>
                        <div class='form-group form-inline'>
                            <td style='padding: 5px;'>
                                <input type='checkbox' name='detail_item_id[$d->id]' id='item-$d->id' onchange=\"".
                                "
                                var jumlah = $(this).parent().parent().children().eq(2).children().first();
                                var hargaSatuan = $(this).parent().parent().children().last().children().first();
                                if(typeof jumlah.attr('disabled') !== typeof undefined && jumlah.attr('disabled') !== false){
                                    jumlah.removeAttr('disabled');
                                    hargaSatuan.removeAttr('disabled');
                                } else{
                                    jumlah.attr('disabled', 'true')
                                    hargaSatuan.attr('disabled', 'true')
                                }"
                                ."\">
                            </td>
                            <td style='padding: 5px;'>
                                <label for='item-$d->id'>".$d->item->nama."</label>
                            </td>
                            <td style='padding: 5px;'>
                                <input type='number' name='volume[$d->id]' class='form-control' min='0' max='$max' disabled='true' placeholder='Jumlah'>
                            </td>
                            <td style='padding: 5px;'>".
                                $d->item->satuan
                            ."</td>
                            <td style='padding: 5px;'>
                                <input type='number' name='harga_satuan[$d->id]' class='form-control' min='0' disabled='true' placeholder='Harga Satuan'>
                            </td>
                        </div>
                    </tr>
                ";
            }
        }
        echo($output);
    }
}
