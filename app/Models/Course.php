<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start',
        'duration',
        'trainer',
        'seat_count',
        'is_exam',
        'is_certificate',
        'language',
        'percentage_certificate',
        'coordinator',
        'attendance_questionnaire',
        'image',
        'study',
        'category_id',
        'category_id',
        'program_id',
    ];
    public function attendances()
    {
        return $this->belongsToMany(Attendance::class, AttendanceCourse::class)->withPivot('certficate');
    }
    public function attendancesEmail()
    {
        return $this->belongsToMany(Attendance::class, AttendanceCourse::class)->where('email','!=',null);
    }
    public function candidat()
    {
        return $this->belongsToMany(Candidat::class, CandidateCourse::class);
    }
    public function candidatAttend()
    {
        return $this->belongsToMany(Candidat::class, CandidateCourse::class)->withPivot('is_attend','is_accept')->where('is_attend',1);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id');
    }
    public function quiz()
    {
        return $this->belongsTo(Quiz::class,'course_id');
    }
    public function quizes()
    {
        return $this->belongsToMany(Quiz::class,QuizCourse::class);
    }
}
