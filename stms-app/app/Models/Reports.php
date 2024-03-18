<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    public $table ="reports";
    protected $fillable = [
        'user_id',
        'report_title',
        'date',
        'attachment',
        'degree',
        
    ];
}
