<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    public $table ="messages";
    protected $fillable = [
        'sender',
        'receiver',
        'message'
    ];
}
