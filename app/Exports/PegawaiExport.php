<?php

namespace App\Exports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PegawaiExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Pegawai::with('eselon', 'golongan', 'tempat_tugas', 'unit_kerja', 'jabatan')->get();
    }
    public function map($pegawai): array
    {
        return [
            $pegawai->nip,
            $pegawai->nama,
            $pegawai->tempat_lahir,
            $pegawai->alamat,
            $pegawai->tgl_lahir,
            $pegawai->gender,
            $pegawai->golongan->nama,
            $pegawai->eselon->nama,
            $pegawai->jabatan->nama,
            $pegawai->tempat_tugas->nama,
            $pegawai->agama,
            $pegawai->unit_kerja->nama,
            $pegawai->no_hp,
            $pegawai->npwp,
        ];
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Nama',
            'Tempat Lahir',
            'Alamat',
            'Tgl Lahir',
            'L/P',
            'Gol',
            'Eselon',
            'Jabatan',
            'Tempat Tugas',
            'Agama',
            'Unit Kerja',
            'No. HP',
            'NPWP',
        ];
    }
}
