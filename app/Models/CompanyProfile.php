<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class CompanyProfile extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'name', 'tagline', 'description', 'vision', 'mission', 
        'whatsapp', 'email', 'address', 'google_maps', 'logo'
    ];
}