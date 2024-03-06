<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcements extends Model
{
    use HasFactory;
    public $table="announcements";
    protected $fillable = [
        'title',
        'content',
        'attachment',
        'created_at',
        'updated_at'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
