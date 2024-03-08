<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonQuestions extends Model
{
    use HasFactory;
    public $table="commonquestions";
    protected $fillable = [
        'question',
        'answer',
        'created_at',
        'updated_at'
    ];
}
