<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'phone_number',
        'work_place',
        'id_number',
        'job',
    ];

    public function courses(){
        return $this->belongsToMany(Course::class , AttendanceCourse::class );
    }
}
