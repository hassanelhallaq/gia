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

    public function category(){
            return $this->belongsTo(Category::class);
    }
}
