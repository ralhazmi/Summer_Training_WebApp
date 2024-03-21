<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    public $table ="requests";
    protected $fillable = [
        'user_id',
        'userTo',
        'request_title',
        'content',
        'attachment',
        'date',
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

    public function replies()
    {
        return $this->hasMany(Reply::class, 'request_id');
    }

}
