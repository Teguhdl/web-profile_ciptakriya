<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pages')->insert([
            [
                'id' => 1,
                'label' => 'Beranda',
                'slug' => '/',
                'parent_id' => 0,
                'view_name' => 'pages.dashboard',
                'meta_title' => 'PT. Cipta Kriya Engineering – We Solve Your Problem',
                'meta_description' => 'PT Cipta Kriya Engineering adalah perusahaan engineering multi-disiplin yang melayani konstruksi mekanikal, elektrikal, instalasi, batching plant, pergudangan, dan fabrikasi sejak 2021.',
                'meta_keywords' => 'cipta kriya engineering, konstruksi mekanikal, konstruksi elektrikal, batching plant, fabrikasi, pergudangan, jasa engineering, subang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'label' => 'Tentang',
                'slug' => null,
                'parent_id' => 0,
                'view_name' => "-",
                'meta_title' => 'Tentang Kami – PT Cipta Kriya Engineering',
                'meta_description' => 'Informasi mengenai sejarah, profil, dan perkembangan PT Cipta Kriya Engineering sebagai perusahaan engineering multi-disiplin di Indonesia.',
                'meta_keywords' => 'tentang cipta kriya engineering, company profile, sejarah perusahaan, engineering indonesia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'label' => 'Profil Perusahaan',
                'slug' => 'profil-perusahaan',
                'parent_id' => 2,
                'view_name' => 'pages.company-profile',
                'meta_title' => 'Profil Perusahaan – PT Cipta Kriya Engineering',
                'meta_description' => 'Profil lengkap PT Cipta Kriya Engineering, perusahaan engineering multi-disiplin yang melayani industri semen, ready-mix, pertambangan, FMCG, dan peternakan.',
                'meta_keywords' => 'profil perusahaan, tentang kami, company profile, cipta kriya engineering, engineering subang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'label' => 'Visi & Misi',
                'slug' => 'visi-misi',
                'parent_id' => 2,
                'view_name' => 'pages.visi-misi',
                'meta_title' => 'Visi & Misi – PT Cipta Kriya Engineering',
                'meta_description' => 'Visi dan misi PT Cipta Kriya Engineering dalam menyediakan solusi engineering yang aman, berkualitas, dan tepat waktu.',
                'meta_keywords' => 'visi perusahaan, misi perusahaan, tujuan perusahaan, cipta kriya engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'label' => 'Tim Kami',
                'slug' => 'tim-kami',
                'parent_id' => 2,
                'view_name' => 'pages.tim-kami',
                'meta_title' => 'Tim Kami – Profesional & Tenaga Ahli PT Cipta Kriya Engineering',
                'meta_description' => 'Kenali tim profesional dan tenaga ahli PT Cipta Kriya Engineering yang berpengalaman di bidang mekanikal, elektrikal, dan fabrikasi.',
                'meta_keywords' => 'tim cipta kriya engineering, tenaga ahli, manajemen perusahaan, company team, engineering team',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'label' => 'Layanan',
                'slug' => 'layanan',
                'parent_id' => 0,
                'view_name' => 'pages.produk',
                'meta_title' => 'Layanan – Mekanikal, Elektrikal, Fabrikasi PT Cipta Kriya Engineering',
                'meta_description' => 'Daftar layanan PT Cipta Kriya Engineering: konstruksi mekanikal, elektrikal, instalasi & maintenance, batching plant, pergudangan, modifikasi & fabrikasi.',
                'meta_keywords' => 'layanan cipta kriya engineering, konstruksi mekanikal, konstruksi elektrikal, batching plant, fabrikasi, jasa engineering',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'label' => 'Mitra',
                'slug' => 'mitra',
                'parent_id' => 0,
                'view_name' => 'pages.mitra',
                'meta_title' => 'Mitra – Klien yang Mempercayai PT Cipta Kriya Engineering',
                'meta_description' => 'Daftar mitra dan klien yang mempercayakan kebutuhan engineering, fabrikasi, dan instalasi kepada PT Cipta Kriya Engineering.',
                'meta_keywords' => 'mitra perusahaan, partners, company partners, klien engineering, mitra cipta kriya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
