<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.kontak', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('teams', 'public');
        }

        Team::create([
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Anggota tim berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $team = Team::findOrFail($id);
        $data = $request->except(['_token', '_method', 'image']);

        if ($request->hasFile('image')) {
            if ($team->image) {
                Storage::disk('public')->delete($team->image);
            }
            $data['image'] = $request->file('image')->store('teams', 'public');
        }

        $team->update($data);
        return redirect()->back()->with('success', 'Data tim berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        if ($team->image) {
            Storage::disk('public')->delete($team->image);
        }
        $team->delete();
        
        return redirect()->back()->with('success', 'Anggota tim berhasil dihapus!');
    }
}