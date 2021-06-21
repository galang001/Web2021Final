<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
     protected $primaryKey = "id_mapel";
    protected $fillable =[
        'id_mapel',
        'user_id',
        'nama_mapel',
        'semester',
        'kd_kelas',
    ];
}
