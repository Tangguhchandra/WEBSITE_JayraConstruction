<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // 🔥 TAMBAHAN untuk kelola file

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $totalProjects = Project::count();
        $planningProjects = Project::where('status', 'Perencanaan')->count();
        $ongoingProjects = Project::where('status', 'Proses')->count();
        $completedProjects = Project::where('status', 'Selesai')->count();

        return view('admin.proyek', compact(
            'projects', 'totalProjects', 'planningProjects', 'ongoingProjects', 'completedProjects'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client_name' => 'required',
            'category' => 'required',
            'budget' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 🔥 Maks 2MB
            'completion_date' => 'nullable|date',
            'background' => 'nullable|string',
            'challenge_solution' => 'nullable|string',
        ]);

        $projectCode = 'PJ-' . rand(100, 999);
        $imagePath = null;

        // 🔥 LOGIKA UPLOAD GAMBAR
        if ($request->hasFile('image')) {
            // Simpan gambar ke folder storage/app/public/projects
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        Project::create([
            'project_code' => $projectCode,
            'name' => $request->name,
            'client_name' => $request->client_name,
            'image' => $imagePath, // 🔥 Simpan path gambarnya
            'category' => $request->category,
            'budget' => $request->budget,
            'location' => $request->location,
            'completion_date' => $request->completion_date,
            'progress' => $request->progress ?? 0,
            'status' => $request->status ?? 'Perencanaan',
            'background' => $request->background,
            'challenge_solution' => $request->challenge_solution,
        ]);

        return redirect()->back()->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'client_name' => 'required',
            'category' => 'required',
            'budget' => 'required|numeric',
            'location' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // 🔥 Validasi Gambar
            'progress' => 'required|integer|min:0|max:100',
            'status' => 'required',
        ]);

        $project = Project::findOrFail($id);
        $data = $request->except(['_token', '_method', 'image']);

        // 🔥 JIKA ADMIN UPLOAD GAMBAR BARU SAAT EDIT
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari folder (jika ada) biar gak menuhin memori
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->back()->with('success', 'Data proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        
        // 🔥 HAPUS GAMBAR DARI FOLDER SAAT PROYEK DIHAPUS
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        
        $project->delete();

        return redirect()->back()->with('success', 'Proyek berhasil dihapus!');
    }
}