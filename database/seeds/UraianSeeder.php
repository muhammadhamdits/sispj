<?php

use Illuminate\Database\Seeder;
use App\Uraian;

class UraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uraian = Uraian::create([
            'rekening' => '5',
            'nama' => 'Belanja Daerah',
        ]);

        $uraian->save();
    }
}
