<?php

use Illuminate\Database\Seeder;
use App\DetailKegiatan;

class DetailKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detailKegiatan = DetailKegiatan::create([
            'kegiatan_id' => 1,
            'sub4_uraian_id' => 1,
        ]);

        $detailKegiatan->save();
    }
}
