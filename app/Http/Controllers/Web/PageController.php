<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Mitra;
use App\Models\Page;
use App\Models\Setting;

class PageController extends Controller
{
    // Home (slug '/')
    public function home()
    {
        $page = Page::where('slug', '/')->first();

        if (!$page) {
            abort(404, 'Halaman tidak ditemukan');
        }

        return $this->renderPage($page);
    }

    // Halaman berdasarkan slug (profil-perusahaan, visi-misi, dll)
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        // Check if page is published
        if (method_exists($page, 'getAttributes') && array_key_exists('is_published', $page->getAttributes())) {
            if (!$page->is_published) {
                abort(404);
            }
        }

        return $this->renderPage($page);
    }

    // Render dynamically
    public function renderPage(Page $page)
    {
        // ---------- META (SEO) ----------
        $defaultDescription = 'PT. Cipta Kriya Engineering adalah perusahaan engineering multi-disiplin yang melayani konstruksi mekanikal, elektrikal, fabrikasi, dan batching plant di Indonesia.';
        $rawDescription = $page->meta_description ?: ($page->content ? strip_tags($page->content) : $defaultDescription);
        $cleanDescription = trim(preg_replace('/\s+/', ' ', $rawDescription));

        $meta = [
            'title'       => $page->meta_title ?: ($page->label ? $page->label . ' - PT. Cipta Kriya Engineering' : 'PT. Cipta Kriya Engineering - We Solve Your Problem'),
            'description' => Str::limit($cleanDescription, 160),
            'keywords'    => $page->meta_keywords ?: 'cipta kriya engineering, konstruksi mekanikal, elektrikal, fabrikasi, batching plant',
            'canonical'   => $page->slug === '/' ? url('/') : url('/' . ltrim($page->slug ?? '', '/')),
            'og_image'    => $page->og_image ? asset($page->og_image) : asset('assets/web/logo/cke-logomark.png'),
            'og_type'     => $page->slug === '/' ? 'website' : 'article',
            'robots'      => ($page->is_published ?? true) ? 'index, follow' : 'noindex, nofollow',
        ];

        // Ambil menu utama + sub menu (hanya page yang published & show_in_menu)
        $menus = Page::where('parent_id', 0)
            ->where(function ($q) {
                $q->where('show_in_menu', true)->orWhereNull('show_in_menu');
            })
            ->with(['children' => function ($q) {
                $q->where(function ($qq) {
                    $qq->where('show_in_menu', true)->orWhereNull('show_in_menu');
                })->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => url('/')]
        ];
        if ($page->slug !== '/' && !empty($page->slug)) {
            $breadcrumbs[] = [
                'name' => $page->label ?: ucwords(str_replace('-', ' ', $page->slug)),
                'url' => url($page->slug)
            ];
        }

        $data = [
            'page'        => $page,
            'meta'        => $meta,
            'menus'       => $menus,
            'breadcrumbs' => $breadcrumbs,
        ];

        // ---------- CUSTOM PAGE: rich content from rich editor ----------
        if ($page->type === 'custom') {
            $data = array_merge($data, $this->getGlobalSettings());
            return view('web.pages.custom', $data);
        }

        // Logic khusus untuk halaman produk
        if ($page->view_name === 'pages.produk') {
            $query = Product::query();

            // Search Logic
            if (request()->has('search')) {
                $search = request('search');
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            }

            $data['products'] = $query->paginate(6);
            
            // AJAX Response for Search/Pagination
            if (request()->ajax()) {
                return view('web.pages.partials.product-list', ['products' => $data['products']])->render();
            }
        }

        // Logic khusus untuk halaman portofolio
        if ($page->view_name === 'pages.portofolio') {
            $query = Portfolio::query();

            // Filter Search (Title)
            if (request()->has('search') && request('search') != '') {
                $query->where('title', 'like', '%' . request('search') . '%');
            }

            // Filter Year
            if (request()->has('year') && request('year') != '') {
                $query->where('year', request('year'));
            }

            // Filter Client
            if (request()->has('client') && request('client') != '') {
                $query->where('client', 'like', '%' . request('client') . '%');
            }

            $data['portfolios'] = $query->orderBy('year', 'desc')->paginate(6);
            $data['years'] = Portfolio::select('year')->distinct()->orderBy('year', 'desc')->pluck('year'); // For dropdown

            // AJAX Response for Filter/Pagination
            if (request()->ajax()) {
                return view('web.pages.partials.portfolio-list', ['portfolios' => $data['portfolios']])->render();
            }
        }

        // Logic khusus untuk halaman rekam-jejak
        if ($page->view_name === 'pages.rekam-jejak') {
            $query = \App\Models\Experience::query();

            // Filter Search (Client or Scope)
            if (request()->has('search') && request('search') != '') {
                $search = request('search');
                $query->where(function($q) use ($search) {
                    $q->where('client', 'like', "%{$search}%")
                      ->orWhere('scope', 'like', "%{$search}%")
                      ->orWhere('category', 'like', "%{$search}%");
                });
            }

            // Filter Year
            if (request()->has('year') && request('year') != '') {
                $query->where('year', request('year'));
            }

            $data['experiences'] = $query->orderBy('year', 'desc')->latest()->paginate(15);
            $data['years'] = \App\Models\Experience::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
            
            // Add fallback year list in case table is empty or for filter tab
            if ($data['years']->isEmpty()) {
                $data['years'] = collect(['2026', '2025', '2024', '2023', '2022']);
            } else {
                $data['years'] = collect(['Semua'])->merge($data['years']);
            }

            // AJAX Response for Filter/Pagination
            if (request()->ajax()) {
                return view('web.pages.partials.experience-list', ['experiences' => $data['experiences']])->render();
            }
        }

        if (in_array($page->view_name, ['pages.dashboard', 'pages.mitra'])) {
             $data['mitras'] = Mitra::all();
        }

        // Fetch Dynamic Content Settings from 'settings' table (General Settings)
        $data = array_merge($data, $this->getGlobalSettings());
        
        // Page specific content
        if ($page->view_name === 'pages.dashboard') {
             $settings = Setting::whereIn('key', [
                'page_about_content',
                'dashboard_hero_title',
                'dashboard_hero_subtitle',
                'dashboard_hero_image',
                'dashboard_about_image_1',
                'dashboard_about_image_2',
                'dashboard_video_title',
                'dashboard_video_desc',
                'dashboard_video_url',
                'dashboard_about_title',
                'dashboard_about_tags',
                'dashboard_about_title_color',
                'dashboard_about_title_highlight_color',
                // toggles
                'dashboard_show_hero',
                'dashboard_show_about',
                'dashboard_show_video',
                'dashboard_show_products',
                'dashboard_show_mitra',
                'dashboard_services',
             ])->pluck('value', 'key');

             $data['page_about_content'] = $settings['page_about_content'] ?? null;
             
             // Dashboard Vars with Defaults
             $data['dashboard_hero_title'] = $settings['dashboard_hero_title'] ?? 'We Solve Your Problem';
             $data['dashboard_hero_subtitle'] = $settings['dashboard_hero_subtitle'] ?? 'PT. Cipta Kriya Engineering — mitra engineering multi-disiplin untuk konstruksi mekanikal, elektrikal, fabrikasi, dan batching plant.';
             $data['dashboard_hero_image'] = isset($settings['dashboard_hero_image']) && !empty($settings['dashboard_hero_image']) ? asset($settings['dashboard_hero_image']) : asset('assets/web/dashboard/dashboard.webp');
             $data['dashboard_about_image_1'] = $settings['dashboard_about_image_1'] ?? 'assets/web/dashboard/about2.png';
             $data['dashboard_about_image_2'] = $settings['dashboard_about_image_2'] ?? 'assets/web/dashboard/about1.png';
             
             $data['dashboard_video_title'] = $settings['dashboard_video_title'] ?? 'Video Kami';
             $data['dashboard_video_desc'] = $settings['dashboard_video_desc'] ?? 'Sekilas mengenai proses kerja dan komitmen PT. Cipta Kriya Engineering.';
             $data['dashboard_video_url'] = $settings['dashboard_video_url'] ?? 'assets/web/video/video-promote.mp4';

             $data['dashboard_about_title'] = $settings['dashboard_about_title'] ?? 'Mitra teknik andalan untuk [solusi engineering] industri Anda';
             $data['dashboard_about_tags'] = $settings['dashboard_about_tags'] ?? 'Engineering Service, Fabrication, Maintenance, Industrial Project, Standar K3';
             $data['dashboard_about_title_color'] = $settings['dashboard_about_title_color'] ?? '#122b3f';
             $data['dashboard_about_title_highlight_color'] = $settings['dashboard_about_title_highlight_color'] ?? '#167ea7';
             
             // Dashboard Toggles
             $data['dashboard_show_hero']     = ($settings['dashboard_show_hero']     ?? '1') == '1';
             $data['dashboard_show_about']    = ($settings['dashboard_show_about']    ?? '1') == '1';
             $data['dashboard_show_video']    = ($settings['dashboard_show_video']    ?? '1') == '1';
             $data['dashboard_show_products'] = ($settings['dashboard_show_products'] ?? '1') == '1';
             $data['dashboard_show_mitra']    = ($settings['dashboard_show_mitra']    ?? '1') == '1';
             
             $servicesRaw = json_decode($settings['dashboard_services'] ?? '', true);
             if (is_array($servicesRaw)) {
                 foreach ($servicesRaw as &$s) {
                     if (isset($s['title'])) {
                         $s['title'] = html_entity_decode($s['title'], ENT_QUOTES, 'UTF-8');
                     }
                     if (isset($s['desc'])) {
                         $s['desc'] = html_entity_decode($s['desc'], ENT_QUOTES, 'UTF-8');
                     }
                 }
                 $data['dashboard_services'] = $servicesRaw;
             } else {
                 $data['dashboard_services'] = [
                     ['icon' => 'cog', 'title' => 'Konstruksi Mekanikal', 'desc' => 'Fabrikasi & erection struktur mekanikal berat, conveyor, screw, dan bucket elevator.'],
                     ['icon' => 'zap', 'title' => 'Konstruksi Elektrikal', 'desc' => 'Panel listrik, instalasi daya, penarikan kabel, terminasi dan commissioning.'],
                     ['icon' => 'wrench', 'title' => 'Instalasi & Maintenance', 'desc' => 'Perbaikan dan perawatan alat berat, silo, mixer dan unit produksi.'],
                     ['icon' => 'factory', 'title' => 'Batching Plant', 'desc' => 'Pembangunan, mobilisasi, dismantle dan improvement batching plant.'],
                     ['icon' => 'warehouse', 'title' => 'Pergudangan', 'desc' => 'Pembangunan gudang, racking, lantai kerja dan ruang engineering.'],
                     ['icon' => 'hammer', 'title' => 'Modifikasi & Fabrikasi', 'desc' => 'Pabrikasi baru, replating, modifikasi unit dan penggantian komponen.'],
                 ];
             }

             $data['products'] = \App\Models\Product::latest()->take(6)->get();
             $data['portfolios'] = \App\Models\Portfolio::latest()->take(5)->get();
             $data['experiences'] = \App\Models\Experience::orderBy('year', 'desc')->latest()->get();
             $data['experience_years'] = collect(['Semua'])->merge(\App\Models\Experience::select('year')->distinct()->orderBy('year', 'desc')->pluck('year'))->toArray();
        }

        if ($page->slug === 'profil-perusahaan' || $page->view_name === 'pages.company-profile') {
             $settings = Setting::whereIn('key', [
                'page_company_profile_content', 
                'page_profile_cert_content',
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
             ])->pluck('value', 'key');
             $data['page_company_profile_content'] = $settings['page_company_profile_content'] ?? null;
             $data['page_profile_cert_content'] = $settings['page_profile_cert_content'] ?? null;
             $data['profile_image_main']           = $settings['profile_image_main']           ?? null;
             $data['profile_image_1']              = $settings['profile_image_1']              ?? null;
             $data['profile_image_2']              = $settings['profile_image_2']              ?? null;
             $data['profile_image_3']              = $settings['profile_image_3']              ?? null;
             $data['profile_cert_image']           = $settings['profile_cert_image']           ?? null;
             $data['profile_show_gallery']         = ($settings['profile_show_gallery'] ?? '1') == '1';
             $data['profile_badge_number']         = $settings['profile_badge_number']         ?? date('Y');
             $data['profile_badge_label']          = $settings['profile_badge_label']          ?? 'Tahun Berdiri';
             $data['profile_badge_bg_color']       = $settings['profile_badge_bg_color']       ?? '#122b3f';
             $data['profile_badge_text_color']     = $settings['profile_badge_text_color']     ?? '#ffffff';
        }

        if ($page->slug === 'tim-kami' || $page->view_name === 'pages.tim-kami') {
            $data['page_team_pdf'] = Setting::where('key', 'page_team_pdf')->value('value');
        }

        if ($page->slug === 'visi-misi' || $page->view_name === 'pages.visi-misi') {
             $settings = Setting::whereIn('key', ['page_visi_content', 'page_misi_content'])->pluck('value', 'key');
             $data['page_visi_content'] = $settings['page_visi_content'] ?? null;
             $data['page_misi_content'] = $settings['page_misi_content'] ?? null;
        }

        // Fallback ke view custom kalau view_name tidak ada
        $viewName = 'web.' . ($page->view_name ?: 'pages.custom');
        if (!view()->exists($viewName)) {
            $viewName = 'web.pages.custom';
        }

        return view($viewName, $data);
    }

    private function getGlobalSettings(): array
    {
        $globalSettings = Setting::whereIn('key', [
            'contact_phone',
            'contact_email',
            'contact_email_2',
            'contact_address',
            'system_description',
            'social_facebook',
            'social_instagram',
            'social_twitter',
            'contact_hours_mon_fri',
            'contact_hours_sat'
        ])->pluck('value', 'key')->toArray();

        $merged = array_merge([
            'contact_phone'         => '+62 812-3456-7890',
            'contact_email'         => 'info@ciptakriyaengineering.com',
            'contact_email_2'       => null,
            'contact_address'       => 'Kabupaten Subang, Jawa Barat, Indonesia',
            'contact_hours_mon_fri' => '08:00 – 17:00 WIB',
            'contact_hours_sat'     => '08:00 – 14:00 WIB',
        ], $globalSettings);

        // Backward compat: if view uses singular or plural
        $merged['contact_email_1'] = $merged['contact_email'] ?? null;

        return $merged;
    }

    public function productDetail($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $menus = Page::where('parent_id', 0)
            ->where(function ($q) {
                $q->where('show_in_menu', true)->orWhereNull('show_in_menu');
            })
            ->with(['children' => function ($q) {
                $q->where(function ($qq) {
                    $qq->where('show_in_menu', true)->orWhereNull('show_in_menu');
                })->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
            
        $cleanContent = trim(preg_replace('/\s+/', ' ', strip_tags($product->content ?? '')));

        $meta = [
            'title' => $product->title . ' - PT. Cipta Kriya Engineering',
            'description' => Str::limit($cleanContent ?: 'Produk berkualitas dari PT. Cipta Kriya Engineering', 150),
            'keywords' => 'produk, ' . $product->title . ', engineering',
            'canonical'   => route('product.detail', $product->slug),
            'og_image'    => $product->image ? asset($product->image) : asset('assets/web/logo/cke-logomark.png'),
            'og_type'     => 'product',
            'robots'      => 'index, follow',
        ];

        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => url('/')],
            ['name' => 'Produk', 'url' => url('/produk')],
            ['name' => $product->title, 'url' => route('product.detail', $product->slug)]
        ];

        return view('web.pages.product-detail', [
            'product' => $product,
            'menus' => $menus,
            'meta' => $meta,
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    public function portfolioDetail($slug)
    {
        $id = (int) explode('-', $slug)[0];
        if (!$id) {
            $id = (int) $slug;
        }

        $portfolio = Portfolio::with('images')->findOrFail($id);

        // SEO Redirect 301 to canonical slug if needed
        $canonicalSlug = $portfolio->getRouteKey();
        if ($slug !== $canonicalSlug && (string) $slug !== (string) $portfolio->id) {
            return redirect()->route('portfolio.detail', $canonicalSlug, 301);
        }

        $menus = Page::where('parent_id', 0)
            ->where(function ($q) {
                $q->where('show_in_menu', true)->orWhereNull('show_in_menu');
            })
            ->with(['children' => function ($q) {
                $q->where(function ($qq) {
                    $qq->where('show_in_menu', true)->orWhereNull('show_in_menu');
                })->orderBy('sort_order');
            }])
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $cleanDesc = trim(preg_replace('/\s+/', ' ', strip_tags($portfolio->description ?? '')));

        $meta = [
            'title' => $portfolio->title . ' - PT. Cipta Kriya Engineering',
            'description' => Str::limit($cleanDesc ?: 'Portofolio proyek PT. Cipta Kriya Engineering', 150),
            'keywords' => 'portofolio, ' . $portfolio->title . ', ' . ($portfolio->client ?? ''),
            'canonical'   => route('portfolio.detail', $portfolio),
            'og_image'    => $portfolio->image ? asset($portfolio->image) : asset('assets/web/logo/cke-logomark.png'),
            'og_type'     => 'article',
            'robots'      => 'index, follow',
        ];

        $breadcrumbs = [
            ['name' => 'Beranda', 'url' => url('/')],
            ['name' => 'Portofolio', 'url' => url('/portofolio')],
            ['name' => $portfolio->title, 'url' => route('portfolio.detail', $portfolio)]
        ];

        return view('web.pages.portfolio-detail', [
            'portfolio' => $portfolio,
            'menus' => $menus,
            'meta' => $meta,
            'breadcrumbs' => $breadcrumbs
        ]);
    }
}
