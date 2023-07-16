<?php

namespace App\Models;

use App\Traits\searchTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, searchTraits;
    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'gender',
        'no_hp',
        'npwp',
        'alamat',
        'agama',
        'tgl_lahir',
        'avatar',
        'gol_id',
        'eselon_id',
        'jabatan_id',
        'tempat_tugas_id',
        'unit_kerja_id'
    ];

    public function eselon()
    {
        return $this->belongsTo(Eselon::class, 'eselon_id');
    }
    public function golongan()
    {
        return $this->belongsTo(Golongan::class, 'gol_id');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
    public function tempat_tugas()
    {
        return $this->belongsTo(TempatTugas::class, 'tempat_tugas_id');
    }
    public function unit_kerja()
    {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
