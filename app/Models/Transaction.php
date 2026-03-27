<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Daftarkan kolom apa saja yang BOLEH diisi secara massal (Mass Assignment)
    protected $fillable = [
        'user_id',
        'order_id',
        'service_name',
        'gross_amount',
        'phone',               
        'address',
        'payment_type',
        'transaction_status',
    ];

    // (Opsional) Relasi ke tabel User, supaya nanti gampang panggil data pelanggannya
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}