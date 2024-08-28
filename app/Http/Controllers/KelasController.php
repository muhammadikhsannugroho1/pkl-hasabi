<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasReq;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Services\HttpClientService;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::all();
        return view('kelas.index', compact('data'));
    }

    public function create()
    {
        return view('kelas.create');
    }

    public function store(KelasReq $request)
    {
        Kelas::create($request->validated());
        return redirect()->route('kelas.index')->with('success', 'Kelas created successfully');
    }

    public function show($id_kelas)
    {
        $kelas = Kelas::withTrashed()->findOrFail($id_kelas);
        return view('kelas.show', compact('kelas'));
    }

    public function edit($id_kelas)
    {
        $kelas = Kelas::withTrashed()->findOrFail($id_kelas);
        return view('kelas.edit', compact('kelas'));
    }

    public function update(KelasReq $request, $id_kelas)
    {
        $kelas = Kelas::withTrashed()->findOrFail($id_kelas);
        $kelas->update($request->validated());
        return redirect()->route('kelas.index')->with('success', 'Kelas updated successfully');
    }

    public function destroy($id_kelas)
    {
        $kelas = Kelas::withTrashed()->findOrFail($id_kelas);
        $kelas->delete();
        return redirect()->route('kelas.index')->with('success', 'Kelas deleted successfully');
    }

    public function restore($id_kelas)
    {
        $kelas = Kelas::onlyTrashed()->findOrFail($id_kelas);
        $kelas->restore();
        return redirect()->route('kelas.index')->with('success', 'Kelas restored successfully');
    }
}
