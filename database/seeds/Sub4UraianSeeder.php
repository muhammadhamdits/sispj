<?php

use Illuminate\Database\Seeder;
use App\Sub4Uraian;

class Sub4UraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub4Uraian = Sub4Uraian::create([
            'rekening' => '01',
            'nama' => 'Belanja Alat Tulis Kantor',
            'sub3_uraian_id' => 1,
        ]);

        $sub4Uraian->save();
    }
}
