<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function index()
    {
        // Ambil data pertama, jika tidak ada buat object kosong
        $profile = CompanyProfile::first() ?? new CompanyProfile();
        return view('admin.profil', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Cari data ID 1 atau buat jika belum ada
        $profile = CompanyProfile::firstOrCreate(['id' => 1]);

        $data = $request->all();

        // Logika Upload Logo
        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::disk('public')->delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('uploads/logo', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil perusahaan berhasil diperbarui!');
    }
}