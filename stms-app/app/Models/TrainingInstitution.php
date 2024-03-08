<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingInstitution extends Model
{
    use HasFactory;
    
    public $table ="traininginstitutions";
    protected $fillable = [
        'company_name',
        'address',
        'company_number',
        'company_website',
    ];
}
