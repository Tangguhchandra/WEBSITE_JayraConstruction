<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompanyProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name', 'about_description', 'experience_years', 'projects_completed',
        'vision', 'mission', 'email', 'phone', 'address', 'about_image'
    ];
}