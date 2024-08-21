<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spp extends Model
{
    use SoftDeletes;

    protected $table = 'spp'; // Pastikan ini sesuai dengan nama tabel yang baru

    protected $fillable = [
        'tahun',
        'nominal',
    ];
    
}
