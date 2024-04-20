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
        'userTo',
        'report_title',
        'date',
        'attachment',

    ];

    // Define the relationship with the User model for the user who created the request
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'userTo');
    }
}
