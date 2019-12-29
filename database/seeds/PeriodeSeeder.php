<?php

use Illuminate\Database\Seeder;
use App\Periode;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periode = Periode::create([
            'tahun' => 2019,
            'jenis' => 0,
            'status' => 1,
        ]);

        $periode->save();
    }
}
