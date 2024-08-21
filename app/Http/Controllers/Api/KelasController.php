<?php

namespace App\Http\Controllers\Api;

//import model Post
use App\Models\Kelas;

use Illuminate\Http\Request;

//import resource PostResource
use App\Http\Controllers\Controller;

//import Http request
use App\Http\Resources\KelasResource;

//import facade Validator
use Illuminate\Support\Facades\Validator;

//import facade Storage
use Illuminate\Support\Facades\Storage;

class KelasController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $Kelas = Kelas::latest()->paginate(5);

        //return collection of posts as a resource
        return new KelasResource(true, 'List Data Kelas', $Kelas);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelas'     => 'required',
            'Kompetensi_keahlian'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $Kelas = Kelas::create([
            'nama_kelas'     => $request->nama_kelas,
            'Kompetensi_keahlian'   => $request->Kompetensi_keahlian,
        ]);

        //return response
        return new KelasResource(true, 'Data Kelas Berhasil Ditambahkan!', $Kelas);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $Kelas = Kelas::find($id);

        //return single post as a resource
        return new KelasResource(true, 'Detail Data Post!', $Kelas);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'nama_kelas'     => 'required',
            'kompetensi_keahlian'   => 'required',
        ]);

        
    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {

        //find post by ID
        $Kelas = Kelas::find($id);

        //delete image
        Storage::delete('public/posts/'.basename($Kelas->image));

        //delete post
        $Kelas->delete();

        //return response
        return new KelasResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}