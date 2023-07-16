<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UnitKerja;

class UnitKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UnitKerja::insert([
            ['nama' => 'Badan Kepegawaian Daerah'],
            ['nama' => 'Badan Pengelola Keuangan Daerah'],
        ]);
    }
}
