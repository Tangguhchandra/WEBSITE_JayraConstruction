<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user, diurutkan dari yang terbaru
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|unique:users',
            'phone' => 'nullable|string',
            'role' => 'required|in:admin,user',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(), // Anggap dibuat admin langsung terverifikasi
        ]);

        return back()->with('success', 'User berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'username' => 'required|string|unique:users,username,' . $id,
            'phone' => 'nullable|string',
            'role' => 'required|in:admin,user',
            'password' => 'nullable|min:8', // Boleh kosong
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'role' => $request->role,
        ];

        // Jika password diisi, update passwordnya
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Cegah admin menghapus dirinya sendiri
        if (auth()->id() == $user->id) {
            return back()->with('error', 'Anda tidak bisa menghapus akun Anda sendiri!');
        }
        $user->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }

    public function updateProfile(\Illuminate\Http\Request $request)
    {
        // 1. Validasi inputan user
        $request->validate([
            'name' => 'required|string|max:255',
            // Username harus unik, tapi abaikan kalau itu username dia sendiri saat ini
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
        ], [
            'username.unique' => 'Username ini sudah digunakan, silakan pilih yang lain.',
        ]);

        // 2. Update data ke database
        $user = \App\Models\User::find(auth()->id());
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
        ]);

        // 3. Kembalikan ke halaman profil dengan pesan sukses
        return redirect()->back()->with('success', 'Profil Anda berhasil diperbarui!');
    }
}