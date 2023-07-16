<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::insert([
            ['nama' => 'Kepala Sekretariat Utama'],
            ['nama' => 'Penyusun Laporan Keuangan'],
            ['nama' => 'Widyaiswara Utama'],
        ]);
    }
}
