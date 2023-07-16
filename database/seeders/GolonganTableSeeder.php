<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Golongan;

class GolonganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::insert([
            ['nama' => 'IV/e'],
            ['nama' => 'IV/a'],
            ['nama' => 'IV/c'],
        ]);
    }
}
