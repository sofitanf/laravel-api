<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eselon;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\TempatTugas;
use App\Models\UnitKerja;
use Illuminate\Http\Request;    

class SourceDataController extends Controller
{
    public function index()
    {
        $eselon = Eselon::all();
        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $tempat_tugas = TempatTugas::all();
        $unit_kerja = UnitKerja::all();
        return $this->responseSuccess(null, [
            'eselon' => $eselon,
            'golongan' => $golongan,
            'jabatan' => $jabatan,
            'tempat_tugas' => $tempat_tugas,
            'unit_kerja' => $unit_kerja
        ]);
    }
}
