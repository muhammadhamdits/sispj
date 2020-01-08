<?php

use Illuminate\Database\Seeder;
use App\DetailItem;

class DetailItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detailItem = DetailItem::create([
            'detail_kegiatan_id' => 1,
            'item_id' => 1,
            'harga_satuan' => 5000,
            'volume' => 7,
        ]);

        $detailItem->save();
    }
}
