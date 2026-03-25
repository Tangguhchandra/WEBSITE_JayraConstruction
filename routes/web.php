<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\UserController;

// ==========================================
// RUTE UNTUK USER (LANDING PAGE & PUBLIK)
// ==========================================
Route::get('/', function () { return view('user.home'); });

Route::name('user.')->group(function () {
    Route::get('/home', function () { return view('user.home'); })->name('home'); 
    Route::get('/about', function () { return view('user.about'); })->name('about'); 
    Route::get('/service', function () { return view('user.service'); })->name('service');
    Route::get('/project', function () { return view('user.project'); })->name('project');
    Route::get('/contact', function () { return view('user.contact-person'); })->name('contact');
});


// ==========================================
// AREA KHUSUS ADMIN (DILINDUNGI MIDDLEWARE)
// ==========================================
Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    // Rute Halaman Admin
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/profil', function () { return view('admin.profil'); });
    Route::get('/users', function () { return view('admin.users'); });
    Route::get('/pesan', function () { return view('admin.pesan'); });
    Route::get('/laporan-pembayaran', function () { return view('admin.laporanpembayaran'); });
    Route::get('/keamanan', function () { return view('admin.security'); });

    // Manajemen Layanan
    Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [ServiceController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [ServiceController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [ServiceController::class, 'destroy'])->name('layanan.destroy');

    // Manajemen User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Manajemen Proyek
    Route::get('/proyek', [ProjectController::class, 'index'])->name('proyek.index');
    Route::post('/proyek', [ProjectController::class, 'store'])->name('proyek.store');
    Route::put('/proyek/{id}', [ProjectController::class, 'update'])->name('proyek.update');
    Route::delete('/proyek/{id}', [ProjectController::class, 'destroy'])->name('proyek.destroy');
});


// ==========================================
// RUTE AUTHENTIKASI (VIEW & PROSES)
// ==========================================

// 1. Rute GET untuk menampilkan halaman (View)
Route::get('/login', function () { return view('user.login'); })->name('login');
Route::get('/register', function () { return view('user.register'); })->name('register');
Route::get('/verification', function () { return view('user.verification'); })->name('verification');
Route::get('/verification-success', function () { return view('user.verification-success'); })->name('verification-success');

// 2. Rute POST untuk memproses form ke AuthController
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/verification', [AuthController::class, 'verifyOtp'])->name('verification.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// RUTE LUPA PASSWORD
// ==========================================
Route::get('/reset-password', function () { 
    return view('user.reset-password'); 
})->name('reset-password');

Route::get('/reset-password-email', function () { 
    return view('user.reset-password-email'); 
})->name('reset-password-email');

Route::get('/verification-password-success', function () { 
    return view('user.verification-password-success'); 
})->name('verification-password-success');