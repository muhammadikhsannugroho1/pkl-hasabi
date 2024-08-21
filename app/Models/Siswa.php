<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class siswa extends Model
{
    use SoftDeletes;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'id_siswa','nisn','nis','nama','kelas_id','alamat','no_telpon','id_spp',
    ];

    // Add a constructor if necessary
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
//merelasikan siswa ke id_kelas
    public function SiswaKelas()
    {
    	return $this->hasOne(Kelas::class,'id_kelas','kelas_id');
    }
//merelasikan siswa ke spp
    public function SiswaSpp()
    {
    	return $this->hasOne(Spp::class,'id','id_spp');
    }


}

