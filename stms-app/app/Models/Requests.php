<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    public $table ="requests";
    protected $fillable = [
        'email',
        'request_title',
        'date',
        'content',
        'attachment',
    ];
}
