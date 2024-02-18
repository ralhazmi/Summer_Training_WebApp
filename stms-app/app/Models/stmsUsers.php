<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stmsUsers extends Model
{
    use HasFactory;
    protected $fillable =[
        'username',
        'email',
        'major',
        'password',
        'role',
        'activation',
        'company_id',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
