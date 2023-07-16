<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TempatTugas;

class TempatTugasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TempatTugas::insert([
            ['nama' => 'Jakarta'],
            ['nama' => 'Bogor'],
            ['nama' => 'Bandung'],
        ]);
    }
}
