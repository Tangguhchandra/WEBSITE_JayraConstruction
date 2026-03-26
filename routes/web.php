<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Http\Request;

// ==========================================
// RUTE UNTUK PENGUNJUNG (PUBLIK)
// ==========================================

// Rute Home (Root)
Route::get('/', function () { 
    $projects = \App\Models\Project::latest()->take(4)->get();
    return view('user.home', compact('projects')); 
});

Route::name('user.')->group(function () {
    
    // Halaman Utama
    Route::get('/home', function () { 
        $projects = \App\Models\Project::latest()->take(4)->get();
        return view('user.home', compact('projects')); 
    })->name('home'); 

    // Halaman Tentang Kami
    Route::get('/about', function () { 
        $profile = \App\Models\CompanyProfile::first();
        $projects = \App\Models\Project::latest()->take(5)->get(); 
        return view('user.about', compact('profile', 'projects')); 
    })->name('about');
    
    // Halaman Proyek
    Route::get('/project', function () { 
        $projects = \App\Models\Project::latest()->paginate(6);
        return view('user.project', compact('projects')); 
    })->name('project');

    // Detail Proyek
    Route::get('/project/detail/{id}', function ($id) {
        $project = \App\Models\Project::findOrFail($id);
        $relatedProjects = \App\Models\Project::where('id', '!=', $id)->latest()->take(3)->get();
        return view('user.detail-project', compact('project', 'relatedProjects'));
    })->name('detail-project');

    // Halaman Layanan & Detailnya
    Route::get('/service', function () { 
        return view('user.service'); 
    })->name('service');
    Route::get('/service/detail', function () { 
        return view('user.detail-service'); 
    })->name('detail-service');

    // Halaman Kontak / Tim
    Route::get('/contact', function () { 
        $teams = \App\Models\Team::latest()->get();
        return view('user.contact-person', compact('teams')); 
    })->name('contact');

    // Profil Pengguna (Mungkin butuh middleware auth nantinya)
    Route::get('/profil', function () { 
        return view('user.profil'); 
    })->name('profil');

    // Proses Pembayaran
    Route::get('/pembayaran', function () { return view('user.pembayaran'); })->name('pembayaran');
    Route::get('/detail-pembayaran', function () { return view('user.detail-pembayaran'); })->name('detail-pembayaran');
    Route::get('/notifikasi-pembayaran', function () { return view('user.notifikasi-pembayaran'); })->name('notifikasi-pembayaran');
});


// ==========================================
// RUTE AUTHENTIKASI
// ==========================================

Route::get('/login', function () { return view('user.login'); })->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () { return view('user.register'); })->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Verifikasi OTP
Route::get('/verification', function () { return view('user.verification'); })->name('verification');
Route::post('/verification', [AuthController::class, 'verifyOtp'])->name('verification.post');
Route::get('/verification-success', function () { return view('user.verification-success'); })->name('verification-success');

// Lupa Password
Route::get('/reset-password', function () { return view('user.reset-password'); })->name('reset-password');
Route::get('/reset-password-email', function () { return view('user.reset-password-email'); })->name('reset-password-email');
Route::get('/verification-password-success', function () { return view('user.verification-password-success'); })->name('verification-password-success');


// ==========================================
// AREA KHUSUS ADMIN (DILINDUNGI MIDDLEWARE)
// ==========================================

Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    
    // Laporan
    Route::get('/laporan-pembayaran', function () { return view('admin.laporanpembayaran'); })->name('laporan-pembayaran');

    // Profil Perusahaan
    Route::get('/profiladmin', [CompanyProfileController::class, 'index'])->name('profilperusahaan.index');
    Route::post('/profiladmin', [CompanyProfileController::class, 'update'])->name('profilperusahaan.update');

    // CRUD Layanan
    Route::get('/layanan', [ServiceController::class, 'index'])->name('layanan.index');
    Route::post('/layanan', [ServiceController::class, 'store'])->name('layanan.store');
    Route::put('/layanan/{id}', [ServiceController::class, 'update'])->name('layanan.update');
    Route::delete('/layanan/{id}', [ServiceController::class, 'destroy'])->name('layanan.destroy');

    // CRUD User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // CRUD Kontak Tim
    Route::get('/kontak-tim', [TeamController::class, 'index'])->name('tim.index');
    Route::post('/kontak-tim', [TeamController::class, 'store'])->name('tim.store');
    Route::put('/kontak-tim/{id}', [TeamController::class, 'update'])->name('tim.update');
    Route::delete('/kontak-tim/{id}', [TeamController::class, 'destroy'])->name('tim.destroy');

    // CRUD Proyek
    Route::get('/proyek', [ProjectController::class, 'index'])->name('proyek.index');
    Route::post('/proyek', [ProjectController::class, 'store'])->name('proyek.store');
    Route::put('/proyek/{id}', [ProjectController::class, 'update'])->name('proyek.update');
    Route::delete('/proyek/{id}', [ProjectController::class, 'destroy'])->name('proyek.destroy');

    // ==========================================
    // RUTE GLOBAL SEARCH (NAVBAR)
    // ==========================================
    Route::get('/api/global-search', function (Request $request) {
        $query = $request->get('q');
        if (!$query || strlen($query) < 2) return response()->json([]);

        $results = [];

        // 1. Cari User
        $users = \App\Models\User::where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->take(3)->get();
        foreach ($users as $user) {
            $results[] = [
                'title' => $user->name,
                'type' => 'Data User (' . $user->email . ')',
                'url' => route('users.index'),
                'icon' => 'bi-person-badge text-primary'
            ];
        }

        // 2. Cari Tim
        $teams = \App\Models\Team::where('name', 'like', "%{$query}%")
                    ->orWhere('role', 'like', "%{$query}%")
                    ->take(3)->get();
        foreach ($teams as $team) {
            $results[] = [
                'title' => $team->name,
                'type' => 'Kontak Tim (' . $team->role . ')',
                'url' => route('tim.index'),
                'icon' => 'bi-people text-success'
            ];
        }

        // 3. Cari Proyek
        $projects = \App\Models\Project::where('name', 'like', "%{$query}%")->take(3)->get();
        foreach ($projects as $project) {
            $results[] = [
                'title' => $project->name,
                'type' => 'Data Proyek',
                'url' => route('proyek.index'),
                'icon' => 'bi-building text-warning'
            ];
        }

        return response()->json($results);
    })->name('global.search');
});