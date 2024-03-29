<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type','course_id','how_attend','link','status'
         // ... add other fields accordingly
    ];
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,QuizCourse::class);
    }
}
