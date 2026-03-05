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
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price_estimate' => 'required',
            'description' => 'nullable',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        Service::create($data);
        return back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function update(Request $request, $id) {
        $service = Service::findOrFail($id);
        $data = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price_estimate' => 'required',
            'description' => 'nullable',
            'status' => 'required'
        ]);

        if ($request->hasFile('image')) {
            if ($service->image) Storage::disk('public')->delete($service->image);
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);
        return back()->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy($id) {
        $service = Service::findOrFail($id);
        if ($service->image) Storage::disk('public')->delete($service->image);
        $service->delete();
        return back()->with('success', 'Layanan berhasil dihapus!');
    }
}