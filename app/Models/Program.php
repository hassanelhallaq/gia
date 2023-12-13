<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
