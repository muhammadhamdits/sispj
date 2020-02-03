<?php

use Illuminate\Database\Seeder;
use App\Kegiatan;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kegiatan = Kegiatan::create([
            'kode' => '37',
            'nama' => 'Workshop',
            'program_id' => 1,
            'lokasi' => 'Kota Padang',
        ]);

        $kegiatan->save();
    }
}
