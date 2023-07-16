<?php

namespace App\Http\Controllers\Api;

use App\Exports\PegawaiExport;
use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = Pegawai::with('eselon', 'golongan', 'tempat_tugas', 'unit_kerja', 'jabatan')
            ->search('unit_kerja_id',  $request->unit_kerja_id)
            ->searchLike('nama', $request->nama)
            ->with('eselon', 'golongan', 'tempat_tugas', 'unit_kerja', 'jabatan')
            ->orderBy('created_at', 'DESC')->paginate(10);
        
        return $this->responseSuccess(null, [
            'pegawai' => $pegawai,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [ 
            'nip' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'no_hp' => 'required|unique:pegawais',
            'agama' => 'required',
            'npwp' => 'required',
            'gol_id' => 'required',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'tempat_tugas_id' => 'required',
            'unit_kerja_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $data = $request->except('avatar');
        Pegawai::create($data);

        return $this->responseSuccess('Data Pegawai Berhasil Disimpan');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [ 
            'nip' => 'required',
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'gender' => 'required',
            'no_hp' => 'required',
            'agama' => 'required',
            'npwp' => 'required',
            'gol_id' => 'required',
            'eselon_id' => 'required',
            'jabatan_id' => 'required',
            'tempat_tugas_id' => 'required',
            'unit_kerja_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        
        $pegawai = Pegawai::find($id);
        $data = $pegawai->update($request->all());
        return $this->responseSuccess('Data Pegawai Berhasil Diupdate', $data);
    }

    public function show($id)
    {
        $pegawai = Pegawai::find($id);
        return $this->responseSuccess('Data Pegawai', $pegawai);
    }

    public function destroy($id)
    {
        Pegawai::destroy($id);
        return $this->responseSuccess('Data Pegawai Berhasil Dihapus');
    }

    public function updateAvatar(Request $request, $id)
    {
        $pegawai = Pegawai::find($id);

        $image = Validator::make($request->all(), [
            'avatar' => 'mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($image->fails()) {
            return $this->errorValidation($image);
        }

        $image = $request->avatar;
        $input['avatar'] = 'storage/' . $image->store('asset/profile', ['disk' => 'public']);
        if ($pegawai->avatar) {
            file_exists($pegawai->avatar) ?  unlink($pegawai->avatar) : '';
        }

        $pegawai->update($input);

        return $this->responseSuccess('Data Profile Image Berhasil Diupdate', $pegawai);
    }

    public function exportPegawai()
    {
        return Excel::download(new PegawaiExport(), "List Pegawai.xlsx");
    }
}
