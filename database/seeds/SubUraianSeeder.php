<?php

use Illuminate\Database\Seeder;
use App\SubUraian;

class SubUraianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subUraian = SubUraian::create([
            'rekening' => '2',
            'nama' => 'Belanja Langsung',
            'uraian_id' => 1,
        ]);

        $subUraian->save();
    }
}
