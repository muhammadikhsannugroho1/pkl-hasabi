<?php

namespace App\Http\Controllers;

use App\Http\Requests\SppReq;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    // Menampilkan daftar semua entri SPP
    public function index()
    {
        $spp = Spp::all();
        return view('spp.index', compact('spp'));
    }

    // Menampilkan form untuk membuat entri SPP baru
    public function create()
    {
        return view('spp.create');
    }

    // Menyimpan entri SPP baru ke database
    public function store(SppReq $request)
    {
        Spp::create($request->validated());
        return redirect()->route('spp.index')->with('success', 'SPP created successfully');
    }

    // Menampilkan detail entri SPP berdasarkan ID
    public function show($id_spp)
{
    $spp = Spp::find($id_spp);
    if (!$spp) {
        return redirect()->route('spp.index')->with('error', 'Data SPP tidak ditemukan.');
    }
    return view('spp.show', compact('spp'));
}


    // Menampilkan form untuk mengedit entri SPP
    public function edit($id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        return view('spp.edit', compact('spp'));
    }

    // Memperbarui entri SPP yang ada di database
    public function update(SppReq $request, $id_spp)
    {
        $spp = Spp::findOrFail($id_spp);
        $spp->update($request->validated());
        return redirect()->route('spp.index')->with('success', 'SPP updated successfully');
    }

    public function destroy($id_spp)
    {
        $kelas = spp::withTrashed()->findOrFail($id_spp);
        $kelas->delete();
        return redirect()->route('spp.index')->with('success', 'Kelas deleted successfully');
    }
    
    public function restore($id_spp)
    {
        $kelas = spp::onlyTrashed()->findOrFail($id_spp);
        $kelas->restore();
        return redirect()->route('spp.index')->with('success', 'Kelas restored successfully');
    }
}
