<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = Item::create([
            'nama' => 'Kertas HVS A4',
            'satuan' => 'rim',
        ]);

        $item->save();
    }
}
