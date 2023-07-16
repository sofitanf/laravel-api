<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTugas extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'tempat_tugas_id');
    }
}
