<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
{
    $projects = Project::latest()->get();

    $totalProjects = Project::count();
    $planningProjects = Project::where('status', 'Perencanaan')->count(); // Tambahkan ini
    $ongoingProjects = Project::where('status', 'Proses')->count();
    $completedProjects = Project::where('status', 'Selesai')->count();

    return view('admin.proyek', compact(
        'projects', 
        'totalProjects', 
        'planningProjects', 
        'ongoingProjects', 
        'completedProjects'
    ));
}

    // Menyimpan proyek baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'client_name' => 'required',
            'budget' => 'required',
            'location' => 'required',
        ]);

        // Membuat ID Proyek otomatis (Contoh: PJ-123)
        $projectCode = 'PJ-' . rand(100, 999);

        Project::create([
            'project_code' => $projectCode,
            'name' => $request->name,
            'client_name' => $request->client_name,
            'budget' => $request->budget,
            'location' => $request->location,
            'progress' => 0,
            'status' => 'Perencanaan',
        ]);

        return redirect()->back()->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'progress' => 'required|integer|min:0|max:100',
        'status' => 'required'
    ]);

    $project = Project::findOrFail($id);
    $project->update([
        'name' => $request->name,
        'client_name' => $request->client_name,
        'budget' => $request->budget,
        'location' => $request->location,
        'progress' => $request->progress,
        'status' => $request->status,
    ]);

    return redirect()->back()->with('success', 'Data proyek berhasil diperbarui!');
}

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->back()->with('success', 'Proyek berhasil dihapus!');
    }


    
}

