<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return view('admin.dashboard'); });
Route::get('/profil', function () { return view('admin.profil'); });
Route::get('/layanan', function () { return view('admin.layanan'); });
Route::get('/proyek', function () { return view('admin.proyek'); });
Route::get('/users', function () { return view('admin.users'); });
Route::get('/pesan', function () { return view('admin.pesan'); });
Route::get('/laporan-pembayaran', function () { return view('admin.laporanpembayaran'); });
Route::get('/keamanan', function () { return view('admin.security'); });



// Rute untuk USER (Landing Page)
Route::name('user.')->prefix('user')->group(function () {
    Route::get('/home', function () {
        return view('user.home');
    })->name('home'); 

    Route::get('/about', function () {
        return view('user.about');
    })->name('about'); 
});



// Rute untuk halaman login
Route::get('/login', function () {
    return view('login'); // Ini akan memanggil resources/views/login.blade.php
})->name('login');