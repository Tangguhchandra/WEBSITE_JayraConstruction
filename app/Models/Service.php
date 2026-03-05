<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Service extends Model
{
    use HasFactory;

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     * Sesuaikan dengan kolom yang ada di file migration kamu.
     */
    protected $fillable = [
        'name',
        'category',
        'price_estimate',
        'description',
        'image',
        'status',
    ];

    /**
     * Accessor untuk mendapatkan URL Gambar secara otomatis.
     * Jadi di Blade, kamu tinggal panggil: {{ $item->image_url }}
     */
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return Storage::url($this->image);
        }

        // Jika tidak ada gambar, tampilkan gambar default (placeholder)
        return asset('assets/images/no-image.jpg'); 
    }

    /**
     * Scope untuk mempermudah mengambil data yang statusnya 'Aktif' saja.
     * Cara pakainya di Controller: Service::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'Aktif');
    }
}