<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
         // ... add other fields accordingly
    ];

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
    public function optionTrue()
    {
        return $this->hasOne(QuestionOption::class)->where('is_corect',1);
    }
    public function userAswes()
    {
        return $this->hasOne(UserAnswer::class);
    }

      public function quiz()
    {
        return $this->BelongsTo(Quiz::class);
    }
 }
