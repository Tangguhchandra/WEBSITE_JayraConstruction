<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index() {
        $services = Service::latest()->get();
        $totalServices = Service::count();
        $activeServices = Service::where('status', 'Aktif')->count();
        $categoryCount = Service::distinct('category')->count();

        return view('admin.layanan', compact('services', 'totalServices', 'activeServices', 'categoryCount'));
    }

    public function store(Request $request) {
        // Validasi disesuaikan dengan struktur tabel yang baru
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric', // Sekarang pakai integer/numeric
            'short_description' => 'nullable',
            'full_description' => 'nullable',
            'spec_1' => 'nullable',
            'spec_2' => 'nullable',
            'spec_3' => 'nullable',
            'spec_4' => 'nullable',
            'status' => 'required',
            // Validasi 3 gambar sekaligus
            'image_1' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image_1')) {
            $data['image_1'] = $request->file('image_1')->store('services', 'public');
        }
        if ($request->hasFile('image_2')) {
            $data['image_2'] = $request->file('image_2')->store('services', 'public');
        }
        if ($request->hasFile('image_3')) {
            $data['image_3'] = $request->file('image_3')->store('services', 'public');
        }

        Service::create($data);
        return back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, $id) {
        $service = Service::findOrFail($id);
        
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'short_description' => 'nullable',
            'full_description' => 'nullable',
            'spec_1' => 'nullable',
            'spec_2' => 'nullable',
            'spec_3' => 'nullable',
            'spec_4' => 'nullable',
            'status' => 'required',
            'image_1' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        // Update gambar: Cek apakah ada file baru, lalu hapus yang lama
        if ($request->hasFile('image_1')) {
            if ($service->image_1) Storage::disk('public')->delete($service->image_1);
            $data['image_1'] = $request->file('image_1')->store('services', 'public');
        }
        if ($request->hasFile('image_2')) {
            if ($service->image_2) Storage::disk('public')->delete($service->image_2);
            $data['image_2'] = $request->file('image_2')->store('services', 'public');
        }
        if ($request->hasFile('image_3')) {
            if ($service->image_3) Storage::disk('public')->delete($service->image_3);
            $data['image_3'] = $request->file('image_3')->store('services', 'public');
        }

        $service->update($data);
        return back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id) {
        $service = Service::findOrFail($id);
        
        // Hapus ketiga gambar dari folder public saat data dihapus
        if ($service->image_1) Storage::disk('public')->delete($service->image_1);
        if ($service->image_2) Storage::disk('public')->delete($service->image_2);
        if ($service->image_3) Storage::disk('public')->delete($service->image_3);
        
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}