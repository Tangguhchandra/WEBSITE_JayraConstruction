<?php

namespace App\Http\Controllers;

use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyProfileController extends Controller
{
    public function index()
    {
        // Selalu ambil data pertama. Kalau kosong, otomatis buat satu data baru.
        $profile = CompanyProfile::firstOrCreate(['id' => 1]);
        return view('admin.profiladmin', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::firstOrCreate(['id' => 1]);
        $data = $request->except(['_token', 'about_image']);

        // Handle upload gambar jika ada
        if ($request->hasFile('about_image')) {
            if ($profile->about_image) {
                Storage::disk('public')->delete($profile->about_image);
            }
            $data['about_image'] = $request->file('about_image')->store('company', 'public');
        }

        $profile->update($data);

        return redirect()->back()->with('success', 'Profil Perusahaan berhasil diperbarui!');
    }
}