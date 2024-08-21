<?php
namespace App\Http\Controllers\Api;

use App\Models\siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\siswaResource;
use Illuminate\Support\Facades\Validator;

class siswaController extends Controller
{
    public function index()
    {
        $siswa = siswa::latest()->paginate(5);
        return new siswaResource(true, 'List Data siswa', $siswa);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'id_spp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = siswa::create([
           'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'id_spp' => $request->id_spp,
        ]);

        return new siswaResource(true, 'Data Kelas Berhasil Ditambahkan!', $siswa);
    }

    public function show($id_siswa)
    {
        $siswa = siswa::find($id_siswa);
        return new siswaResource(true, 'Detail Data Kelas!', $siswa);
    }

    public function update(Request $request, $id_siswa)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'no_telpon' => 'required',
            'alamat' => 'required',
            'kelas_id' => 'required',
            'id_spp' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $siswa = siswa::find($id_siswa);
        $siswa->update([
            'nisn' => $request->nisn,
            'nis' => $request->nis,
            'nama' => $request->nama,
            'no_telpon' => $request->no_telpon,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'id_spp' => $request->id_spp,
        ]);

        return new siswaResource(true, 'Data Kelas Berhasil Diubah!', $siswa);

        
    }

    public function destroy($id_siswa)
    {
        $siswa = siswa::find($id_siswa);
        $siswa->delete();

        return new siswaResource(true, 'Data Kelas Berhasil Dihapus!', null);
    }
}
