<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
      protected $fillable = [
        'name','phone_number','program_id','email','job','department','scound_department'
    ];
}
