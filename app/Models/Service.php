<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
    'name', 'category', 'price', 'short_description', 'full_description', 
    'spec_1', 'spec_2', 'spec_3', 'spec_4', 'image_1', 'image_2', 'image_3', 'status'
];
}