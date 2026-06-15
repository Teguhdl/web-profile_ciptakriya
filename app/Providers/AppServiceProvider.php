<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Setting;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Auto-check and create/repair storage symlink for Hostinger/cPanel environment
        try {
            $link = public_path('storage');
            $target = env('PUBLIC_STORAGE_PATH', storage_path('app/public'));
            
            // If it's a symlink, check if it points to the correct target or is broken
            if (is_link($link)) {
                $currentTarget = function_exists('readlink') ? @readlink($link) : null;
                if ($currentTarget !== $target || !file_exists($link)) {
                    if (function_exists('unlink')) {
                        @unlink($link);
                    }
                }
            }
            
            // Create symlink if it does not exist and symlink function is available
            if (!file_exists($link) && function_exists('symlink')) {
                @symlink($target, $link);
            }
        } catch (\Throwable $e) {
            // Silence any filesystem permission errors or disabled functions during local migrations or cli runs
        }

        try {
            $settings = Setting::all()->pluck('value', 'key');
            View::share('settings', $settings);

            // Global services (untuk footer, sitemap, schema). Decode JSON dari settings.dashboard_services
            $globalServices = [];
            $servicesRaw = json_decode($settings['dashboard_services'] ?? '', true);
            if (is_array($servicesRaw)) {
                foreach ($servicesRaw as &$s) {
                    if (isset($s['title'])) $s['title'] = html_entity_decode($s['title'], ENT_QUOTES, 'UTF-8');
                    if (isset($s['desc']))  $s['desc']  = html_entity_decode($s['desc'],  ENT_QUOTES, 'UTF-8');
                }
                $globalServices = $servicesRaw;
            } else {
                $globalServices = [
                    ['icon' => 'cog',       'title' => 'Konstruksi Mekanikal',  'desc' => 'Fabrikasi & erection struktur mekanikal berat, conveyor, screw, dan bucket elevator.'],
                    ['icon' => 'zap',       'title' => 'Konstruksi Elektrikal', 'desc' => 'Panel listrik, instalasi daya, penarikan kabel, terminasi dan commissioning.'],
                    ['icon' => 'wrench',    'title' => 'Instalasi & Maintenance','desc' => 'Perbaikan dan perawatan alat berat, silo, mixer dan unit produksi.'],
                    ['icon' => 'factory',   'title' => 'Batching Plant',        'desc' => 'Pembangunan, mobilisasi, dismantle dan improvement batching plant.'],
                    ['icon' => 'warehouse', 'title' => 'Pergudangan',           'desc' => 'Pembangunan gudang, racking, lantai kerja dan ruang engineering.'],
                    ['icon' => 'hammer',    'title' => 'Modifikasi & Fabrikasi','desc' => 'Pabrikasi baru, replating, modifikasi unit dan penggantian komponen.'],
                ];
            }
            View::share('global_services', $globalServices);

            // Global stats (untuk schema & section stats). Hardcoded fallback bisa di-override via settings.
            View::share('global_stats', [
                'projects'    => $settings['stats_projects']    ?? '100',
                'clients'     => $settings['stats_clients']     ?? '14',
                'services'    => $settings['stats_services']    ?? (string) count($globalServices),
                'k3_commit'   => $settings['stats_k3']          ?? '100',
                'founding'    => $settings['company_founding']  ?? '2021',
            ]);
        } catch (\Exception $e) {
            // Handle case where table might not exist yet (e.g. during migration)
        }
    }
}
