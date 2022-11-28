<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;
    protected $table = 'questions';
    protected $fillable = [
        'id',
        'question_type_id',
        'subject_id',
        'title',
        'content',
        'media',
        'answers',
        'correct_answer',
        'question_level',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
