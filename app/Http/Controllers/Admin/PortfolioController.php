<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\Traits\UploadsWebP;

class PortfolioController extends Controller
{
    use UploadsWebP;
    public function __construct()
    {
        $this->middleware('check.permission:portfolio.view')->only(['index', 'show']);
        $this->middleware('check.permission:portfolio.create')->only(['create', 'store']);
        $this->middleware('check.permission:portfolio.edit')->only(['edit', 'update']);
        $this->middleware('check.permission:portfolio.delete')->only(['destroy']);
    }
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'status' => 'required|in:Publish,Draft',
            'description' => 'required',
            'tag' => 'nullable|string|max:255',
            'tone' => 'nullable|string|in:brand,green',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'), 'portfolios');
        }

        $portfolio = Portfolio::create([
            'title' => $request->title,
            'image' => $imagePath,
            'client' => $request->client,
            'year' => $request->year,
            'status' => $request->status,
            'description' => $request->description,
            'tag' => $request->tag,
            'tone' => $request->tone,
        ]);

        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                 if ($file && $file->isValid()) {
                     $path = $this->uploadImage($file, 'portfolios/gallery');
                     if (!empty($path)) {
                         \App\Models\PortfolioImage::create([
                             'portfolio_id' => $portfolio->id,
                             'image_path' => $path
                         ]);
                     }
                 }
            }
        }

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'create',
            'description' => 'Menambahkan portofolio: ' . $portfolio->title,
            'subject_type' => Portfolio::class,
            'subject_id' => $portfolio->id,
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan');
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'client' => 'nullable|string|max:255',
            'year' => 'nullable|integer',
            'status' => 'required|in:Publish,Draft',
            'description' => 'required',
            'tag' => 'nullable|string|max:255',
            'tone' => 'nullable|string|in:brand,green',
        ]);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                $oldPath = str_replace('storage/', '', $portfolio->image);
                if (Storage::exists($oldPath)) {
                    Storage::delete($oldPath);
                }
            }

            $portfolio->image = $this->uploadImage($request->file('image'), 'portfolios');
        }

        // Handle new gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                 if ($file && $file->isValid()) {
                     $path = $this->uploadImage($file, 'portfolios/gallery');
                     if (!empty($path)) {
                         \App\Models\PortfolioImage::create([
                             'portfolio_id' => $portfolio->id,
                             'image_path' => $path
                         ]);
                     }
                 }
            }
        }
        
        // Handle deleted gallery images
        if ($request->has('delete_images')) {
            foreach ($request->delete_images as $imageId) {
                $image = \App\Models\PortfolioImage::find($imageId);
                if ($image && $image->portfolio_id == $portfolio->id) {
                    $oldPath = str_replace('storage/', '', $image->image_path);
                    if (Storage::exists($oldPath)) {
                        Storage::delete($oldPath);
                    }
                    $image->delete();
                }
            }
        }

        $portfolio->title = $request->title;
        $portfolio->client = $request->client;
        $portfolio->year = $request->year;
        $portfolio->status = $request->status;
        $portfolio->description = $request->description;
        $portfolio->tag = $request->tag;
        $portfolio->tone = $request->tone;
        $portfolio->save();

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'update',
            'description' => 'Memperbarui portofolio: ' . $portfolio->title,
            'subject_type' => Portfolio::class,
            'subject_id' => $portfolio->id,
        ]);

        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil diperbarui');
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            $oldPath = str_replace('storage/', '', $portfolio->image);
            if (Storage::exists($oldPath)) {
                Storage::delete($oldPath);
            }
        }
        
        $portfolio->delete();

        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'delete',
            'description' => 'Menghapus portofolio: ' . $portfolio->title,
            'subject_type' => Portfolio::class,
            'subject_id' => $portfolio->id,
        ]);
        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus');
    }
}
