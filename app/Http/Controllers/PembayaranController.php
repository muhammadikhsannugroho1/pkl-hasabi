<?php

namespace App\Http\Controllers;
use App\Http\Requests\PembayaranReq;
use App\Models\Pembayaran;
use App\Models\Spp;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran =Pembayaran::all();
        return view('pembayaran.index', compact('pembayaran'));
    }  
    
    public function create()
    {
        $pembayaran = Pembayaran::all();
        $spp = Spp::all();
        return view('pembayaran.create',compact('pembayaran','spp')); 
    }

    public function store(PembayaranReq $request)
    {
            // dd($request->input());
        Pembayaran::create($request->input());
        return redirect()->route('pembayaran.index')->with('success', 'data created successfully');
 
   }

   public function show($id_pembayaran)
   {
       $pembayaran = Pembayaran::find($id_pembayaran);
       if (!$pembayaran) {
           return redirect()->route('pembayaran.index')->with('error', 'pembayaran tidak ditemukan.');
       }
       return view('pembayaran.show', compact('pembayaran'));
   }
   public function edit($id_pembayaran)
    {
        $pembayaran =pembayaran::withTrashed()->findOrFail($id_pembayaran);
        $spp = Spp::all();
        return view('pembayaran.edit', compact('pembayaran', 'spp'));
    }

    public function update(PembayaranReq $request, $id_kelas)
    {
        $pembayaran = pembayaran::withTrashed()->findOrFail($id_kelas);
        $pembayaran->update($request->validated());
        return redirect()->route('pembayaran.index')->with('success', 'pembayaran updated successfully');
    }
    public function destroy($id_pembayaran)
    {
        $pembayaran = pembayaran::withTrashed()->findOrFail($id_pembayaran);
        $pembayaran->delete();
        return redirect()->route('pembayaran.index')->with('success', 'Siswa deleted successfully');
    }     
    
    public function restore($id_pembayaran)
    {
        $pembayaran = pembayaran::onlyTrashed()->findOrFail($id_pembayaran);
        $pembayaran->restore();
        return redirect()->route('pembayaran.index')->with('success', 'siswa restored successfully');
    }


}