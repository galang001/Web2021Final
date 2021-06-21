<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bio extends Model
{
    use HasFactory;
    protected $table = 'bios';
     protected $primaryKey = "id_user";
    protected $fillable =[
        'id_user',
        'user_id',
        'nama',
        'nis',
        'j_kelamin',
        'kd_kelas',
        'alamat',
        'tanggal_lahir',
    ];
}
