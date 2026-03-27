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

// KARENA ADA NAME('user.'), SEMUA RUTE DI BAWAH INI OTOMATIS BERAWALAN user.
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

    // Halaman Katalog Layanan
    Route::get('/service', function (\Illuminate\Http\Request $request) { 
        $query = \App\Models\Service::where('status', 'Aktif')->latest();
        
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('category', 'like', '%' . $request->search . '%');
        }

        $services = $query->paginate(4)->withQueryString(); 
        return view('user.service', compact('services')); 
    })->name('service');

    // Halaman Detail Layanan
    Route::get('/service/detail/{id}', function ($id) { 
        $service = \App\Models\Service::findOrFail($id);
        return view('user.detail-service', compact('service')); 
    })->name('detail-service');

    // Halaman Kontak / Tim
    Route::get('/contact', function () { 
        $teams = \App\Models\Team::latest()->get();
        return view('user.contact-person', compact('teams')); 
    })->name('contact');

    // Profil (Menampilkan Riwayat Transaksi)
    Route::get('/profil', function () { 
        $transactions = \App\Models\Transaction::where('user_id', auth()->id())
                            ->where('is_hidden', false)
                            ->latest()->get();
        return view('user.profil', compact('transactions')); 
    })->name('profil')->middleware('auth');

    // ==========================================
    // ALUR PEMBAYARAN (CHECKOUT -> QRIS -> SUKSES)
    // ==========================================

    // 1. Proses Pembayaran (Checkout)
    Route::get('/pembayaran/checkout/{id}', function ($id) {
        $service = \App\Models\Service::findOrFail($id);
        return view('user.pembayaran', compact('service'));
    })->name('pembayaran')->middleware('auth');

    // 2. Rute untuk memproses data dari form Checkout ke Midtrans
    Route::post('/pembayaran/proses', [\App\Http\Controllers\TransactionController::class, 'proses'])
        ->name('pembayaran.proses')
        ->middleware('auth');

    // 3. Halaman Pembayaran Berhasil (Invoice & Update Database)
    Route::get('/pembayaran/sukses', function (\Illuminate\Http\Request $request) {
        $order_id = $request->order_id;
        $status = $request->transaction_status ?? 'settlement';

        if ($order_id) {
            $transaction = \App\Models\Transaction::where('order_id', $order_id)->first();
            if ($transaction) {
                $transaction->update([
                    'transaction_status' => $status
                ]);
            }
        }

        return view('user.notifikasi-pembayaran', [ // Pastikan nama view ini sesuai ya
            'order_id' => $order_id ?? 'INV-JC-SUCCESS',
            'status' => $status
        ]); 
    })->name('pembayaran-berhasil');

    // 4. Batalkan Pembayaran (Hapus Permanen dari Database)
    Route::get('/pembayaran/batal/{order_id}', function ($order_id) {
        $transaction = \App\Models\Transaction::where('order_id', $order_id)
                            ->where('user_id', auth()->id())
                            ->first();
        
        if ($transaction) {
            $transaction->delete();
        }
        return redirect()->route('user.service');
    })->name('pembayaran.batal')->middleware('auth');

    // 5. Sembunyikan riwayat transaksi dari profil user (Soft Delete)
    Route::post('/pembayaran/sembunyikan/{id}', function ($id) {
        $transaction = \App\Models\Transaction::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->first();

        if ($transaction) {
            $transaction->update(['is_hidden' => true]);
        }
        return redirect()->back()->with('success', 'Riwayat berhasil disembunyikan.');
    })->name('pembayaran.sembunyikan')->middleware('auth');

    // 6. Lanjutkan Pembayaran yang Pending (Generate Token Baru)
    Route::get('/pembayaran/lanjutkan/{id}', [\App\Http\Controllers\TransactionController::class, 'lanjutkan'])
        ->name('pembayaran.lanjutkan')
        ->middleware('auth');

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
    Route::get('/dashboard', function () { 
        // Hitung total data untuk ditampilkan di Dashboard
        $totalProyek = \App\Models\Project::count();
        $totalLayanan = \App\Models\Service::count();
        $totalUser = \App\Models\User::count(); // Bisa ditambahin ->where('role', 'user') kalau ada sistem role
        $pendingTrx = \App\Models\Transaction::where('transaction_status', 'pending')->count();

        return view('admin.dashboard', compact('totalProyek', 'totalLayanan', 'totalUser', 'pendingTrx')); 
    })->name('dashboard');
    
    // Halaman Laporan Pembayaran Admin
        Route::get('/laporan-pembayaran', function () {
            // Ambil semua transaksi (termasuk yang disembunyikan user) dari yang terbaru
            $transactions = \App\Models\Transaction::with('user')->latest()->get();

            // Hitung statistik otomatis
            $totalPendapatan = $transactions->whereIn('transaction_status', ['settlement', 'success'])->sum('gross_amount');
            $totalPending = $transactions->where('transaction_status', 'pending')->count();
            $totalBerhasil = $transactions->whereIn('transaction_status', ['settlement', 'success'])->count();
            $totalGagal = $transactions->whereIn('transaction_status', ['expire', 'cancel', 'deny'])->count();

            return view('admin.laporanpembayaran', compact(
                'transactions', 'totalPendapatan', 'totalPending', 'totalBerhasil', 'totalGagal'
            ));
        })->name('laporan-pembayaran');

        // Fitur Hapus Transaksi oleh Admin
        Route::delete('/laporan-pembayaran/{id}', function ($id) {
            $transaction = \App\Models\Transaction::findOrFail($id);
            $transaction->delete(); // Hapus permanen dari database
            return redirect()->back()->with('success', 'Data transaksi berhasil dihapus!');
        })->name('laporan-pembayaran.destroy');

    // Fitur Export ke Excel (CSV)
        Route::get('/laporan-pembayaran/export', function () {
            $transactions = \App\Models\Transaction::with('user')->latest()->get();
            $filename = "Laporan_Pembayaran_Jayra_" . date('Y-m-d') . ".csv";

            $headers = [
                "Content-type"        => "text/csv",
                "Content-Disposition" => "attachment; filename=$filename",
                "Pragma"              => "no-cache",
                "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
                "Expires"             => "0"
            ];

            // Judul Kolom di Excel nanti
            $columns = ['Order ID', 'Tanggal Transaksi', 'Nama Pelanggan', 'No. HP', 'Alamat', 'Layanan', 'Nominal Tagihan (Rp)', 'Status'];

            $callback = function() use($transactions, $columns) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $columns); // Tulis Baris Pertama (Judul)

                foreach ($transactions as $trx) {
                    fputcsv($file, [
                        $trx->order_id,
                        $trx->created_at->format('Y-m-d H:i'),
                        $trx->user->name ?? 'User Terhapus',
                        $trx->phone ?? 'Tidak ada',
                        $trx->address ?? 'Tidak ada',
                        $trx->service_name,
                        $trx->gross_amount,
                        strtoupper($trx->transaction_status)
                    ]);
                }
                fclose($file);
            };

            return response()->stream($callback, 200, $headers);
        })->name('laporan-pembayaran.export');

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