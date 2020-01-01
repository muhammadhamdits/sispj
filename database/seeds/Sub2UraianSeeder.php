<?php

use Illuminate\Database\Seeder;
use App\Sub2Uraian;

class Sub2UraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub2Uraian = Sub2Uraian::create([
            'rekening' => '2',
            'nama' => 'Belanja Barang dan Jasa',
            'sub_uraian_id' => 1,
        ]);

        $sub2Uraian->save();
    }
}
