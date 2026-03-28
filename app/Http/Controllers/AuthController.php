<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\OtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // ================= LOGIKA REGISTER & OTP =================
    public function register(Request $request)
    {
        // 1. Cek dulu apakah email ini udah ada di database tapi BELUM diverifikasi
        $unverifiedUser = User::where('email', $request->email)
                              ->whereNull('email_verified_at')
                              ->first();

        // JIKA AKUN ADA TAPI BELUM VERIFIKASI (KASUS USER GA SENGAJA KELUAR TAB)
        if ($unverifiedUser) {
            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users,username,' . $unverifiedUser->id,
                'phone' => 'required|string|max:20',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $otp = rand(10000, 99999);

            // Timpa data lama dengan data baru yang dia ketik
            $unverifiedUser->update([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'otp' => $otp,
                'otp_expires_at' => now()->addMinutes(10),
            ]);

            // Kirim ulang email OTP
            Mail::to($unverifiedUser->email)->send(new OtpMail($otp));
            
            // Simpan ID untuk verifikasi
            session(['verify_user_id' => $unverifiedUser->id]);
            
            return redirect()->route('verification');
        }

        // ==========================================================
        // 2. JIKA EMAIL BENAR-BENAR BARU, ATAU SUDAH DIVERIFIKASI
        // ==========================================================
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $otp = rand(10000, 99999); // Generate 5 digit

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'otp' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Kirim OTP via Mailtrap
        Mail::to($user->email)->send(new OtpMail($otp));

        // Simpan ID sementara untuk diverifikasi di halaman OTP
        session(['verify_user_id' => $user->id]);

        return redirect()->route('verification');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp_code' => 'required|numeric|digits:5']);

        $user = User::find(session('verify_user_id'));

        if (!$user) {
            return redirect()->route('register')->withErrors(['error' => 'Sesi habis, silakan daftar ulang.']);
        }

        // Cek OTP & Kadaluarsa
        if ($user->otp == $request->otp_code && now()->lessThanOrEqualTo($user->otp_expires_at)) {
            $user->update([
                'email_verified_at' => now(),
                'otp' => null,
                'otp_expires_at' => null
            ]);

            session()->forget('verify_user_id');
            Auth::login($user); // Login otomatis setelah berhasil

            return redirect()->route('verification-success');
        }

        return back()->withErrors(['otp_code' => 'Kode OTP salah atau kedaluwarsa.']);
    }

    public function resendOtp(Request $request)
    {
        // 1. Cari user berdasarkan ID yang disimpen di session pas register/login
        $userId = session('verify_user_id');
        $user = User::find($userId);

        // 2. Jika usernya ketemu, jalankan pengiriman ulang OTP
        if ($user) {
            $newOtp = rand(10000, 99999);
            
            $user->update([
                'otp' => $newOtp,
                'otp_expires_at' => now()->addMinutes(10)
            ]);

            Mail::to($user->email)->send(new OtpMail($newOtp));

            return back()->with('success', 'Mantap! Kode OTP baru sudah meluncur ke email Anda.');
        }

        // 3. Kalau ID nggak ada di session
        return back()->withErrors(['Sesi telah habis. Silakan kembali ke halaman pendaftaran.']);
    }

    // ================= LOGIKA LOGIN & LOGOUT =================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required', 
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Coba cocokin email dan password
        if (Auth::attempt([$fieldType => $request->email, 'password' => $request->password])) {
            
            $user = Auth::user();

            // --- SATPAM VERIFIKASI ---
            // Cek apakah akun sudah di-verifikasi (email_verified_at ada isinya)
            if (is_null($user->email_verified_at)) {
                // Kalau belum, logout paksa
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                // Simpan ID-nya ke session biar dia bisa verifikasi / kirim ulang kode
                session(['verify_user_id' => $user->id]);
                
                // Lempar ke halaman OTP bawa pesan error
                return redirect()->route('verification')->withErrors(['Akun belum diverifikasi! Silakan cek email Anda untuk kode OTP.']);
            }
            // --------------------------

            // Kalau lolos, jalanin sesi normal
            $request->session()->regenerate();

            // --- INI LOGIKA ROLE-NYA ---
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard'); // Arahkan Admin ke Dashboard
            }
            
            return redirect()->intended('/'); // Arahkan User biasa ke Beranda (Home)
        }

        return back()->withErrors(['email' => 'Email/Username atau password salah.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}