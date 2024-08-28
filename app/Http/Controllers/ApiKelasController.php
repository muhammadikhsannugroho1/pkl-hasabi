<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiKelasController extends Controller
{
    // public function fetchInsert(){
    //     $response=Http::get('localhost:8001/api/kelas');
    //     $kelas=json_decode($response->body());dd($kelas);

    //     foreach($kelas as $q)
    //     $kelas=new kelas();
    //     $kelas->nama_kelas=$q->question;
    //     $kelas->kompetensi_keahlian=$q->question;
    //     $kelas-> save();
    //     return "data fetched from external api and seved into data base";
    // }
    public function index()
    {
        $response=Http::get('localhost:8001/api/kelas');
        $kelas=json_decode($response->body());
        $data['kelas']=$kelas->data->data;
      
        return view('index.kelas',$data);

    }

    public function create(){

        try{
            $response=Http::post('localhost:8001/api/kelas/store');
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas->data->data;
            dd($kelas);
            return view('create.kelas',$data);
    
        }catch(\Exception $e){
            return $e;
        }
    }

    public function update(){
        $response=Http::put('localhost:8001/api/kelas/update');
        $kelas=json_decode($response->body());
        $data['kelas']=$kelas->data->data;
        return view('update.kelas',$data);
    }

   


    

}