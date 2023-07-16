<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Eselon;

class EselonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Eselon::insert([
            ['nama' => 'I'],
            ['nama' => 'II']
        ]);
    }
}
