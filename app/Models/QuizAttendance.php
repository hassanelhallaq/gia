<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAttendance extends Model
{
    use HasFactory;
    public function quiz()
    {
        return $this->BelongsTo(Quiz::class);
    }
}
