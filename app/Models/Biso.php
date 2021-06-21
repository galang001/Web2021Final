<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biso extends Model
{
    use HasFactory;
        protected $table = 'bios';
    protected $fillable =[
        'user_id',
        'j_kelamin',
    ];
}
