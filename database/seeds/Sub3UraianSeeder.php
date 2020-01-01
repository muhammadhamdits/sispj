<?php

use Illuminate\Database\Seeder;
use App\Sub3Uraian;

class Sub3UraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub3Uraian = Sub3Uraian::create([
            'rekening' => '01',
            'nama' => 'Belanja Barang Pakai Habis',
            'sub2_uraian_id' => 1,
        ]);

        $sub3Uraian->save();
    }
}
