<?php

use Illuminate\Database\Seeder;
use App\Organisasi;

class OrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisasi = Organisasi::create([
            'kode' => '1.02.10.01',
            'nama' => 'Dinas Komunikasi dan Informatika',
            'periode_id' => 1,
        ]);

        $organisasi->save();
    }
}
