<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    use HasFactory;
    protected $table = 'schools';
    protected $fillable = [
        'id',
        'name',
        'school_year_id',
    ];
    public $timestamp = true;
}
