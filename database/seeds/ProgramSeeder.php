<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $program = Program::create([
            'kode' => '09',
            'nama' => 'Pengembangan Aplikasi',
            'urusan_id' => 1,
            'organisasi_id' => 1,
        ]);

        $program->save();
    }
}
