<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EselonTableSeeder::class);
        $this->call(GolonganTableSeeder::class);
        $this->call(JabatanTableSeeder::class);
        $this->call(TempatTugasTableSeeder::class);
        $this->call(UnitKerjaTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
