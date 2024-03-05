<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Attendance extends Authenticatable
{

    protected $fillable = [
        'phone_number', 'code',
    ];

    // Specify the field used as the "username" for authentication


    // Specify how the authentication system retrieves the user's password (or code in this case)


    // Your other model code...

    public function attendance_logins(){
        return $this->hasMany(AttendanceLogin::class);
    }
    public function courses(){
        return $this->belongsToMany(Course::class , AttendanceCourse::class );
    }
}
