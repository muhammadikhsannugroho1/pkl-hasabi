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
      
        return view('KelasApi.index',$data);

    }

    public function create(){

        try{
            $response=Http::get('localhost:8001/api/kelas');
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas?->data?->data;
           
            return view('KelasApi.create',$data);

    
        }catch(\Exception $e){
            return $e;
        }
    }

    public function store(Request $request){
        $input = $request->input();
        try{
            $response=Http::get('localhost:8001/api/kelas',$input);
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas?->data;
            return redirect(route('index'));;
        }catch(\Exception $a){
            return $a;
            // dd($e);

        }       
    }
    public function edit($id_kelas){
        try{
            $response=Http::get('localhost:8001/api/kelas/',$id_kelas);
            $kelas=json_decode($response->body());
            $data['kelas']=$kelas?->data->data; 
            return view('KelasApi.edit',$data);
            //dd($e);
        }catch(\Exception $u){
            return $u;
            // dd($e);
        }
    }
}

   


    