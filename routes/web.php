<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::get('/', function () { return view('user.home'); });
Route::get('/dashboard', function () { return view('admin.dashboard'); });
Route::get('/profil', function () { return view('admin.profil'); });
Route::get('/layanan', function () { return view('admin.layanan'); });

// Proyek Admin
Route::get('/proyek', [ProjectController::class, 'index'])->name('proyek.index');
Route::post('/proyek', [ProjectController::class, 'store'])->name('proyek.store');
Route::put('/proyek/{id}', [ProjectController::class, 'update'])->name('proyek.update');
Route::delete('/proyek/{id}', [ProjectController::class, 'destroy'])->name('proyek.destroy');

Route::get('/users', function () { return view('admin.users'); });
Route::get('/pesan', function () { return view('admin.pesan'); });
Route::get('/laporan-pembayaran', function () { return view('admin.laporanpembayaran'); });
Route::get('/keamanan', function () { return view('admin.security'); });



// Rute untuk USER (Landing Page) - Tanpa Prefix
Route::name('user.')->group(function () {
    Route::get('/home', function () {
        return view('user.home');
    })->name('home'); 

    Route::get('/about', function () {
        return view('user.about');
    })->name('about'); 
});


// Rute untuk halaman login
Route::get('/login', function () {
    return view('user.login'); 
})->name('login');

// Rute untuk halaman register
Route::get('/register', function () {
    return view('user.register'); 
})->name('register');

// Rute untuk halaman verification
Route::get('/verification', function () {
    return view('user.verification'); 
})->name('verification');

//Rute untuk Halaman Verifikasi email berhasil
Route::get('/verification-success', function () {
    return view('user.verification-success'); 
})->name('verification-success');

//Rute untuk Halaman Reset Password
Route::get('/reset-password', function () {
    return view('user.reset-password'); 
})->name('reset-password');

//Rute untuk Halaman Reset Password Email
Route::get('/reset-password-email', function () {
    return view('user.reset-password-email'); 
})->name('reset-password-email');

//rute untuk halaman verifikasi password berhasil
Route::get('/verification-password-success', function () {
    return view('user.verification-password-success'); 
})->name('verification-password-success');

