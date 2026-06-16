<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\UploadsWebP;

class SettingController extends Controller
{
    use UploadsWebP;
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token', '_method');

        foreach ($data as $key => $value) {
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                
                $extension = strtolower($file->getClientOriginalExtension());
                
                // Cek apakah ini gambar untuk dikonversi ke WebP (jangan konversi favicon agar kompatibilitas maksimal)
                if ($key !== 'system_favicon' && in_array($extension, ['jpeg', 'jpg', 'png', 'webp'])) {
                    $value = $this->uploadImage($file, 'settings');
                } else {
                    // Untuk favicon atau file non-gambar (seperti .ico, .svg)
                    $filename = time() . '_' . $file->getClientOriginalName();
                    Storage::disk('public')->put('settings/' . $filename, file_get_contents($file->getPathname()));
                    $value = 'storage/settings/' . $filename;
                }
                
                // Get old value to delete if needed
                $oldSetting = Setting::where('key', $key)->first();
                if ($oldSetting && $oldSetting->type == 'image' && $oldSetting->value) {
                    $cleanPath = trim(str_replace('storage/', '', $oldSetting->value));
                    if ($cleanPath !== '') {
                        Storage::disk('public')->delete($cleanPath);
                    }
                }
                
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value, 'type' => 'image']
                );

                // Sinkronisasikan system_favicon langsung ke public/favicon.ico di root
                if ($key === 'system_favicon') {
                    try {
                        $sourcePath = str_replace('storage/', '', $value);
                        if (Storage::disk('public')->exists($sourcePath)) {
                            $fileData = Storage::disk('public')->get($sourcePath);
                            file_put_contents(public_path('favicon.ico'), $fileData);
                        }
                    } catch (\Throwable $e) {
                        // Abaikan jika terjadi masalah permission
                    }
                }
            } else {
                Setting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value, 'type' => 'text']
                );
            }
        }

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}
