<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadsWebP;

class PageSettingController extends Controller
{
    use UploadsWebP;

    public function index()
    {
        $settingsArray = Setting::whereIn('key', [
            'page_company_profile_content',
            'page_profile_cert_content',
            'page_visi_content',
            'page_misi_content',
            'page_about_content',
            // Dashboard Specific
            'dashboard_hero_title',
            'dashboard_hero_subtitle',
            'dashboard_hero_image',
            'dashboard_about_image_1',
            'dashboard_about_image_2',
            'dashboard_video_title',
            'dashboard_video_desc',
            'dashboard_video_url', // or file
            // Contact Settings
            'contact_phone',
            'contact_email_1',
            'contact_email_2',
            'contact_address',
            'contact_maps_link',
            'contact_hours_mon_fri',
            'contact_hours_sat',
            // Dashboard Section Toggle
            'dashboard_show_hero',
            'dashboard_show_about',
            'dashboard_show_video',
            'dashboard_show_products',
            'dashboard_show_mitra',
            // Profile Page Images
            'profile_image_main',
            'profile_image_1',
            'profile_image_2',
            'profile_image_3',
            'profile_cert_image',
            'profile_show_gallery',
            'profile_badge_number',
            'profile_badge_label',
            'profile_badge_bg_color',
            'profile_badge_text_color',
            'dashboard_about_title',
            'dashboard_about_tags',
            'dashboard_about_title_color',
            'dashboard_about_title_highlight_color',
            'dashboard_services'
        ])->pluck('value', 'key')->toArray();

        $defaultSettings = [
            'dashboard_hero_title' => 'PT. CIPTA KRIYA ENGINEERING',
            'dashboard_hero_subtitle' => 'Engineering, Fabrication & Industrial Solutions',
            'dashboard_video_title' => 'Video Kami',
            'dashboard_video_desc' => 'Sekilas mengenai proses dan komitmen PT. Cipta Kriya Engineering.',
            'dashboard_about_title' => 'Mitra terpercaya untuk [solusi teknik & konstruksi] Anda',
            'dashboard_about_tags' => 'Mechanical, Electrical, Maintenance, Batching Plant, Warehouse, Fabrication',
            'dashboard_about_title_color' => '#0f172a',
            'dashboard_about_title_highlight_color' => '#167ea7',
            'profile_badge_number' => '2016',
            'profile_badge_label' => 'Tahun Berdiri',
            'profile_badge_bg_color' => '#0f172a',
            'profile_badge_text_color' => '#167ea7',
            
            'page_about_content' => '<p><strong>PT. Cipta Kriya Engineering</strong> adalah perusahaan yang bergerak di bidang engineering, fabrikasi, dan jasa industri terpadu.</p><p>Kami berkomitmen memberikan solusi teknik berkualitas dengan mengedepankan profesionalisme, integritas, efisiensi, dan keamanan kerja (K3).</p>',
            'page_company_profile_content' => '<p>PT. Cipta Kriya Engineering bergerak di bidang engineering, fabrikasi metal, dan jasa industri.</p><p>Perusahaan berkomitmen untuk senantiasa memberi prioritas pada klien, bekerja secara profesional, berintegritas, efektif, dan efisien serta memperhatikan standar K3 di setiap pekerjaan.</p>',
            
            'page_visi_content' => '<p>Menjadi <span style="color: rgb(22, 126, 167);"><strong>one stop engineering solution</strong></span> bagi industri yang kompetitif, berkualitas, handal, inovatif, dan berkelanjutan.</p>',
            'page_misi_content' => '<ul><li>Memberikan layanan engineering & fabrikasi dengan <strong>kualitas terbaik</strong>.</li><li>Menjadi mitra industri dengan <strong>harga kompetitif</strong> dan delivery <strong>tepat waktu</strong>.</li><li>Mengutamakan mutu, keselamatan kerja, dan keandalan untuk <strong>kepuasan pelanggan</strong>.</li><li>Membangun <strong>SDM unggul</strong> dan budaya kerja yang inovatif.</li></ul>',
            
            'contact_phone' => '0812-3456-7890',
            'contact_email_1' => 'info@ciptakriya.co.id',
            'contact_address' => 'Kawasan Industri Cipta Kriya, Blok A No. 5, Jawa Barat',
            'contact_hours_mon_fri' => '8:00 AM – 5:00 PM',
            'contact_hours_sat' => '8:00 AM – 1:00 PM',
        ];

        $settings = [];
        foreach ($defaultSettings as $key => $val) {
            $dbVal = $settingsArray[$key] ?? null;
            $settings[$key] = (!empty($dbVal)) ? $dbVal : $val;
        }
        foreach ($settingsArray as $key => $val) {
            if (!isset($settings[$key])) {
                $settings[$key] = $val;
            }
        }

        return view('admin.page_settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $toggleKeys = [
            'dashboard_show_hero',
            'dashboard_show_about',
            'dashboard_show_video',
            'dashboard_show_products',
            'dashboard_show_mitra',
            'profile_show_gallery',
        ];

        // ============== PARTIAL SAVE (AJAX toggle on/off) ==============
        if ($request->boolean('_partial')) {
            foreach ($toggleKeys as $tk) {
                Setting::updateOrCreate(
                    ['key' => $tk],
                    ['value' => $request->has($tk) ? '1' : '0', 'type' => 'text']
                );
            }

            return response()->json([
                'success' => true,
                'message' => 'Pengaturan layout diperbarui',
                'toggles' => collect($toggleKeys)->mapWithKeys(fn($k) => [$k => $request->has($k) ? '1' : '0'])
            ]);
        }

        // ============== FULL SAVE ==============
        $data = $request->except([
            '_token', 
            '_method', 
            '_partial',
            'page_team_pdf',
            'dashboard_hero_image',
            'dashboard_about_image_1',
            'dashboard_about_image_2',
            'dashboard_video_url',
            'profile_image_main',
            'profile_image_1',
            'profile_image_2',
            'profile_image_3',
            'profile_cert_image',
        ]);

        // Handle Dashboard Section Toggles (checkbox)
        foreach ($toggleKeys as $tk) {
            $data[$tk] = $request->has($tk) ? '1' : '0';
        }

        // Decode HTML entities on dashboard_services if present to avoid double escaping (&amp;)
        if (isset($data['dashboard_services'])) {
            $data['dashboard_services'] = html_entity_decode($data['dashboard_services'], ENT_QUOTES, 'UTF-8');
        }

        // Handle Text Settings
        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => 'text']
            );
        }

        // Handle PDF Upload
        if ($request->hasFile('page_team_pdf')) {
            $file = $request->file('page_team_pdf');
            $filename = 'struktur_organisasi_' . time() . '.' . $file->getClientOriginalExtension();
            
            $realPath = $file->getRealPath() ?: $file->getPathname();
            Storage::disk('public')->put('uploads/pdf/' . $filename, file_get_contents($realPath));
            
            // Delete old PDF if exists
            $oldPdf = Setting::where('key', 'page_team_pdf')->value('value');
            if ($oldPdf) {
                $cleanPath = trim(str_replace('storage/', '', $oldPdf));
                if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                    Storage::disk('public')->delete($cleanPath);
                }
            }

            Setting::updateOrCreate(
                ['key' => 'page_team_pdf'],
                ['value' => 'storage/uploads/pdf/' . $filename, 'type' => 'file']
            );
        }

        // Handle Dashboard Hero Image
        if ($request->hasFile('dashboard_hero_image')) {
            $file = $request->file('dashboard_hero_image');
            $filename = 'hero_' . time() . '.webp';
            $this->uploadAndOptimizeToWebp($file, 'uploads/dashboard/' . $filename);
            
            $oldParams = Setting::where('key', 'dashboard_hero_image')->value('value');
            if ($oldParams) {
                $cleanPath = trim(str_replace('storage/', '', $oldParams));
                if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                     Storage::disk('public')->delete($cleanPath);
                }
            }

            Setting::updateOrCreate(
                ['key' => 'dashboard_hero_image'],
                ['value' => 'storage/uploads/dashboard/' . $filename, 'type' => 'image']
            );
        }

        // Handle Dashboard About Image 1
        if ($request->hasFile('dashboard_about_image_1')) {
            $file = $request->file('dashboard_about_image_1');
            $filename = 'about1_' . time() . '.webp';
            $this->uploadAndOptimizeToWebp($file, 'uploads/dashboard/' . $filename);
            
            $oldParams = Setting::where('key', 'dashboard_about_image_1')->value('value');
            if ($oldParams) {
                $cleanPath = trim(str_replace('storage/', '', $oldParams));
                if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                     Storage::disk('public')->delete($cleanPath);
                }
            }

            Setting::updateOrCreate(
                ['key' => 'dashboard_about_image_1'],
                ['value' => 'storage/uploads/dashboard/' . $filename, 'type' => 'image']
            );
        }

        // Handle Dashboard About Image 2
        if ($request->hasFile('dashboard_about_image_2')) {
            $file = $request->file('dashboard_about_image_2');
            $filename = 'about2_' . time() . '.webp';
            $this->uploadAndOptimizeToWebp($file, 'uploads/dashboard/' . $filename);
             
            $oldParams = Setting::where('key', 'dashboard_about_image_2')->value('value');
            if ($oldParams) {
                $cleanPath = trim(str_replace('storage/', '', $oldParams));
                if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                     Storage::disk('public')->delete($cleanPath);
                }
            }

            Setting::updateOrCreate(
                ['key' => 'dashboard_about_image_2'],
                ['value' => 'storage/uploads/dashboard/' . $filename, 'type' => 'image']
            );
        }

        // Handle Video Upload
        if ($request->hasFile('dashboard_video_url')) {
            $file = $request->file('dashboard_video_url');
            $filename = 'video_' . time() . '.' . $file->getClientOriginalExtension();
            
            $realPath = $file->getRealPath() ?: $file->getPathname();
            Storage::disk('public')->put('uploads/video/' . $filename, file_get_contents($realPath));
             
            $oldParams = Setting::where('key', 'dashboard_video_url')->value('value');
            if ($oldParams) {
                $cleanPath = trim(str_replace('storage/', '', $oldParams));
                if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                     Storage::disk('public')->delete($cleanPath);
                }
            }

            Setting::updateOrCreate(
                ['key' => 'dashboard_video_url'],
                ['value' => 'storage/uploads/video/' . $filename, 'type' => 'file']
            );
        }

        // Handle Profile Page Images (5 slot)
        $profileImageKeys = ['profile_image_main', 'profile_image_1', 'profile_image_2', 'profile_image_3', 'profile_cert_image'];
        foreach ($profileImageKeys as $pk) {
            if ($request->hasFile($pk)) {
                $file = $request->file($pk);
                $filename = $pk . '_' . time() . '.webp';
                $this->uploadAndOptimizeToWebp($file, 'uploads/profile/' . $filename);
                
                $old = Setting::where('key', $pk)->value('value');
                if ($old) {
                    $cleanPath = trim(str_replace('storage/', '', $old));
                    if ($cleanPath !== '' && Storage::disk('public')->exists($cleanPath)) {
                        Storage::disk('public')->delete($cleanPath);
                    }
                }
                
                Setting::updateOrCreate(
                    ['key' => $pk],
                    ['value' => 'storage/uploads/profile/' . $filename, 'type' => 'image']
                );
            }
        }

        // Identify updated sections for logging
        $updatedSections = [];
        $keyMap = [
            'page_company_profile_content' => 'Profil Perusahaan',
            'page_profile_cert_content' => 'Sertifikasi & Lokasi',
            'page_visi_content' => 'Visi',
            'page_misi_content' => 'Misi',
            'dashboard_hero_title' => 'Judul Hero Dashboard',
            'dashboard_hero_subtitle' => 'Subjudul Hero',
            'dashboard_hero_image' => 'Gambar Hero Banner',
            'page_about_content' => 'Tentang Kami (Dashboard)',
            'dashboard_about_image_1' => 'Gambar About 1',
            'dashboard_about_image_2' => 'Gambar About 2',
            'dashboard_video_title' => 'Judul Video',
            'dashboard_video_desc' => 'Deskripsi Video',
            'dashboard_video_url' => 'File Video',
            'page_team_pdf' => 'PDF Struktur Organisasi',
            'contact_phone' => 'No. Telepon',
            'contact_email_1' => 'Email 1',
            'contact_email_2' => 'Email 2',
            'contact_address' => 'Alamat',
            'contact_maps_link' => 'Link Maps',
            'contact_hours_mon_fri' => 'Jam Kerja (Senin-Jumat)',
            'contact_hours_sat' => 'Jam Kerja (Sabtu)'
        ];

        foreach ($data as $key => $value) {
            if (isset($keyMap[$key])) {
                $updatedSections[] = $keyMap[$key];
            }
        }

        if ($request->hasFile('page_team_pdf')) {
            $updatedSections[] = $keyMap['page_team_pdf'];
        }

        if ($request->hasFile('dashboard_hero_image')) {
            $updatedSections[] = $keyMap['dashboard_hero_image'];
        }

        $description = 'Memperbarui konten: ' . implode(', ', array_unique($updatedSections));
        if (strlen($description) > 255) {
            $description = substr($description, 0, 252) . '...';
        }

        // Log Activity
        ActivityLog::create([
            'admin_id' => Auth::guard('admin')->id(),
            'action' => 'update',
            'description' => $description,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
        ]);

        return redirect()->back()->with('success', 'Konten halaman berhasil diperbarui');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . '.webp';
            $this->uploadAndOptimizeToWebp($file, 'uploads/pages/' . $filename);
            return response()->json(['location' => asset('storage/uploads/pages/' . $filename)]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
