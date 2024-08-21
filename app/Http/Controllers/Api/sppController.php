<?php
namespace App\Http\Controllers\Api;

use App\Models\Spp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SppResource;
use Illuminate\Support\Facades\Validator;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::latest()->paginate(5);
        return new SppResource(true, 'List Data Kelas', $spp);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $spp = Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return new SppResource(true, 'Data Kelas Berhasil Ditambahkan!', $spp);
    }

    public function show($id)
    {
        $spp = Spp::find($id);
        return new SppResource(true, 'Detail Data spp!', $spp);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $spp = Spp::find($id);
        $spp->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        return new SppResource(true, 'Data Kelas Berhasil Diubah!', $spp);

        
    }

    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();

        return new SppResource(true, 'Data Kelas Berhasil Dihapus!', null);
    }
}
