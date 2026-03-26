<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TeamController;

// ==========================================
// RUTE UNTUK USER (LANDING PAGE & PUBLIK)
// ==========================================
Route::get('/', function () { 
    // Ambil 4 proyek terbaru untuk ditampilkan di Home (Awal buka web)
    $projects = \App\Models\Project::latest()->take(4)->get();
    return view('user.home', compact('projects')); 
});

Route::name('user.')->group(function () {
    
    // PERBAIKAN 1: Kirim data proyek ke rute /home
    Route::get('/home', function () { 
        $projects = \App\Models\Project::latest()->take(4)->get();
        return view('user.home', compact('projects')); 
    })->name('home'); 

    Route::get('/about', function () { return view('user.about'); })->name('about'); 
    Route::get('/service', function () { return view('user.service'); })->name('service');
    
    // PERBAIKAN 2: Kirim semua data proyek ke rute /project
    Route::get('/project', function () { 
        // Ubah dari get() menjadi paginate(6)
        $projects = \App\Models\Project::latest()->paginate(6);
        return view('user.project', compact('projects')); 
    })->name('project');
    
    Route::get('/contact', function () { 
        $teams = \App\Models\Team::latest()->get();
        return view('user.contact-person', compact('teams')); 
    })->name('contact');

    // Rute detail proyek (sudah benar)
    Route::get('/project/detail/{id}', function ($id) {
        $project = \App\Models\Project::findOrFail($id);
        $relatedProjects = \App\Models\Project::where('id', '!=', $id)
                            ->latest()
                            ->take(3)
                            ->get();

        return view('user.detail-project', compact('project', 'relatedProjects'));
    })->name('detail-project');
    
    // Rute tambahan dari temanmu
    Route::get('/service/detail', function () { return view('user.detail-service'); })->name('detail-service');
    Route::get('/profil', function () { return view('user.profil'); })->name('profil');
    Route::get('/pembayaran', function () { return view('user.pembayaran'); })->name('pembayaran');
    Route::get('/detail-pembayaran', function () { return view('user.detail-pembayaran'); })->name('detail-pembayaran');
    Route::get('/notifikasi-pembayaran', function () { return view('user.notifikasi-pembayaran'); })->name('notifikasi-pembayaran');
});


// ==========================================
// AREA KHUSUS ADMIN (DILINDUNGI MIDDLEWARE)
// ==========================================
Route::middleware(['auth', IsAdmin::class])->group(function () {
    
    // Rute Halaman Admin
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');
    Route::get('/profiladmin', function () { return view('admin.profiladmin'); });
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

    // Manajemen Kontak Tim
    Route::get('/kontak-tim', [\App\Http\Controllers\TeamController::class, 'index'])->name('tim.index');
    Route::post('/kontak-tim', [\App\Http\Controllers\TeamController::class, 'store'])->name('tim.store');
    Route::put('/kontak-tim/{id}', [\App\Http\Controllers\TeamController::class, 'update'])->name('tim.update');
    Route::delete('/kontak-tim/{id}', [\App\Http\Controllers\TeamController::class, 'destroy'])->name('tim.destroy');

    // Manajemen Proyek
    Route::get('/proyek', [ProjectController::class, 'index'])->name('proyek.index');
    Route::post('/proyek', [ProjectController::class, 'store'])->name('proyek.store');
    Route::put('/proyek/{id}', [ProjectController::class, 'update'])->name('proyek.update');
    Route::delete('/proyek/{id}', [ProjectController::class, 'destroy'])->name('proyek.destroy');

    // ==========================================
    // RUTE GLOBAL SEARCH (NAVBAR)
    // ==========================================
    Route::get('/api/global-search', function (\Illuminate\Http\Request $request) {
        $query = $request->get('q');
        if (!$query || strlen($query) < 2) return response()->json([]); // Minimal ketik 2 huruf

        $results = [];

        // 1. Cari di tabel User
        $users = \App\Models\User::where('name', 'like', "%{$query}%")
                    ->orWhere('email', 'like', "%{$query}%")
                    ->take(3)->get();
        foreach ($users as $user) {
            $results[] = [
                'title' => $user->name,
                'type' => 'Data User (' . $user->email . ')',
                'url' => route('users.index'), // Arahkan ke halaman user
                'icon' => 'bi-person-badge text-primary'
            ];
        }

        // 2. Cari di tabel Tim
        $teams = \App\Models\Team::where('name', 'like', "%{$query}%")
                    ->orWhere('role', 'like', "%{$query}%")
                    ->take(3)->get();
        foreach ($teams as $team) {
            $results[] = [
                'title' => $team->name,
                'type' => 'Kontak Tim (' . $team->role . ')',
                'url' => route('tim.index'), // Arahkan ke halaman tim
                'icon' => 'bi-people text-success'
            ];
        }

        // 3. Cari di tabel Proyek
        $projects = \App\Models\Project::where('name', 'like', "%{$query}%")->take(3)->get();
        foreach ($projects as $project) {
            $results[] = [
                'title' => $project->name,
                'type' => 'Data Proyek',
                'url' => route('proyek.index'), // Arahkan ke halaman proyek
                'icon' => 'bi-building text-warning'
            ];
        }

        return response()->json($results);
    })->name('global.search');
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