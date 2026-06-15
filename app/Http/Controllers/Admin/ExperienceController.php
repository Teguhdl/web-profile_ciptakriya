<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.permission:experience.view')->only(['index', 'show']);
        $this->middleware('check.permission:experience.create')->only(['create', 'store']);
        $this->middleware('check.permission:experience.edit')->only(['edit', 'update']);
        $this->middleware('check.permission:experience.delete')->only(['destroy']);
    }

    public function index()
    {
        $experiences = Experience::orderBy('year', 'desc')->latest()->paginate(10);
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|string|max:4',
            'client' => 'required|string|max:255',
            'scope' => 'required|string',
            'category' => 'required|string|max:255',
            'tone' => 'required|in:brand,green',
        ]);

        $experience = Experience::create($request->all());

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'create',
            'description' => 'Menambahkan rekam jejak: ' . $experience->client . ' (' . $experience->year . ')',
            'subject_type' => Experience::class,
            'subject_id' => $experience->id,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', 'Rekam jejak berhasil ditambahkan');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'year' => 'required|string|max:4',
            'client' => 'required|string|max:255',
            'scope' => 'required|string',
            'category' => 'required|string|max:255',
            'tone' => 'required|in:brand,green',
        ]);

        $experience->update($request->all());

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'update',
            'description' => 'Memperbarui rekam jejak: ' . $experience->client . ' (' . $experience->year . ')',
            'subject_type' => Experience::class,
            'subject_id' => $experience->id,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', 'Rekam jejak berhasil diperbarui');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'delete',
            'description' => 'Menghapus rekam jejak: ' . $experience->client . ' (' . $experience->year . ')',
            'subject_type' => Experience::class,
            'subject_id' => $experience->id,
        ]);

        return redirect()->route('admin.experiences.index')->with('success', 'Rekam jejak berhasil dihapus');
    }
}
