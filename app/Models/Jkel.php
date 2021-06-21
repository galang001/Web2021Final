<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jkel extends Model
{
  use HasFactory;
  protected $table = 'jkels';
  protected $primaryKey = "id_jkel";
  protected $fillable =[
      'id_jkel',
      'jkel',
  ];
}
