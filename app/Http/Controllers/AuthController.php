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
            return redirect()->route('register')->withErrors(['error' => 'Sesi habis, daftar ulang.']);
        }

        // Cek OTP & Kadaluarsa
        if ($user->otp === $request->otp_code && now()->lessThanOrEqualTo($user->otp_expires_at)) {
            $user->update([
                'email_verified_at' => now(),
                'otp' => null,
                'otp_expires_at' => null
            ]);

            session()->forget('verify_user_id');
            Auth::login($user); // Login otomatis

            return redirect()->route('verification-success'); // Arahkan ke halaman sukses kamu
        }

        return back()->withErrors(['otp_code' => 'Kode OTP salah atau kedaluwarsa.']);
    }

    // ================= LOGIKA LOGIN & LOGOUT =================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required', 
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$fieldType => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            // --- INI LOGIKA ROLE-NYA ---
            if (Auth::user()->role === 'admin') {
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