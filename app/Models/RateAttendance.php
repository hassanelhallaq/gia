<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'rate_id',
        'rate','attendance_id'
         // ... add other fields accordingly
    ];

    public function rate(){
        return $this->belongsTo(Rate::class);
    }
}
