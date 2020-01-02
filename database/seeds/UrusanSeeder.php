<?php

use Illuminate\Database\Seeder;
use App\Urusan;

class UrusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $urusan = Urusan::create([
            'kode' => '1.02.10',
            'nama' => 'Komunikasi dan Informatika',
            'periode_id' => 1,
        ]);

        $urusan->save();
    }
}
