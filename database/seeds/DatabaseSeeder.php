<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(OrganisasiSeeder::class);
        $this->call(UrusanSeeder::class);
        $this->call(ProgramSeeder::class);
        $this->call(KegiatanSeeder::class);
        $this->call(UraianSeeder::class);
        $this->call(SubUraianSeeder::class);
        $this->call(Sub2UraianSeeder::class);
        $this->call(Sub3UraianSeeder::class);
        $this->call(Sub4UraianSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(DetailKegiatanSeeder::class);
    }
}
