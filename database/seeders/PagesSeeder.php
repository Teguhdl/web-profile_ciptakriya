<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'id' => 1,
                'label' => 'Beranda',
                'slug' => '/',
                'parent_id' => 0,
                'view_name' => 'pages.dashboard',
                'type' => 'system',
                'meta_title' => 'PT. Cipta Kriya Engineering – We Solve Your Problem',
                'meta_description' => 'PT Cipta Kriya Engineering adalah perusahaan engineering multi-disiplin yang melayani konstruksi mekanikal, elektrikal, instalasi, batching plant, pergudangan, dan fabrikasi sejak 2021.',
                'meta_keywords' => 'cipta kriya engineering, konstruksi mekanikal, konstruksi elektrikal, batching plant, fabrikasi, pergudangan, jasa engineering, subang',
            ],
            [
                'id' => 2,
                'label' => 'Tentang',
                'slug' => null,
                'parent_id' => 0,
                'view_name' => "-",
                'type' => 'system',
                'meta_title' => 'Tentang Kami – PT Cipta Kriya Engineering',
                'meta_description' => 'Informasi mengenai sejarah, profil, dan perkembangan PT Cipta Kriya Engineering sebagai perusahaan engineering multi-disiplin di Indonesia.',
                'meta_keywords' => 'tentang cipta kriya engineering, company profile, sejarah perusahaan, engineering indonesia',
            ],
            [
                'id' => 3,
                'label' => 'Profil Perusahaan',
                'slug' => 'profil-perusahaan',
                'parent_id' => 2,
                'view_name' => 'pages.company-profile',
                'type' => 'system',
                'meta_title' => 'Profil Perusahaan – PT Cipta Kriya Engineering',
                'meta_description' => 'Profil lengkap PT Cipta Kriya Engineering, perusahaan engineering multi-disiplin yang melayani industri semen, ready-mix, pertambangan, FMCG, dan peternakan.',
                'meta_keywords' => 'profil perusahaan, tentang kami, company profile, cipta kriya engineering, engineering subang',
            ],
            [
                'id' => 4,
                'label' => 'Visi & Misi',
                'slug' => 'visi-misi',
                'parent_id' => 2,
                'view_name' => 'pages.visi-misi',
                'type' => 'system',
                'meta_title' => 'Visi & Misi – PT Cipta Kriya Engineering',
                'meta_description' => 'Visi dan misi PT Cipta Kriya Engineering dalam menyediakan solusi engineering yang aman, berkualitas, dan tepat waktu.',
                'meta_keywords' => 'visi perusahaan, misi perusahaan, tujuan perusahaan, cipta kriya engineering',
            ],
            [
                'id' => 5,
                'label' => 'Tim Kami',
                'slug' => 'tim-kami',
                'parent_id' => 2,
                'view_name' => 'pages.tim-kami',
                'type' => 'system',
                'meta_title' => 'Tim Kami – Profesional & Tenaga Ahli PT Cipta Kriya Engineering',
                'meta_description' => 'Kenali tim profesional dan tenaga ahli PT Cipta Kriya Engineering yang berpengalaman di bidang mekanikal, elektrikal, dan fabrikasi.',
                'meta_keywords' => 'tim cipta kriya engineering, tenaga ahli, manajemen perusahaan, company team, engineering team',
            ],

            [
                'id' => 7,
                'label' => 'Mitra',
                'slug' => 'mitra',
                'parent_id' => 0,
                'view_name' => 'pages.mitra',
                'type' => 'system',
                'meta_title' => 'Mitra – Klien yang Mempercayai PT Cipta Kriya Engineering',
                'meta_description' => 'Daftar mitra dan klien yang mempercayakan kebutuhan engineering, fabrikasi, dan instalasi kepada PT Cipta Kriya Engineering.',
                'meta_keywords' => 'mitra perusahaan, partners, company partners, klien engineering, mitra cipta kriya',
            ],
            [
                'id' => 8,
                'label' => 'Portofolio',
                'slug' => 'portofolio',
                'parent_id' => 0,
                'view_name' => 'pages.portofolio',
                'type' => 'system',
                'meta_title' => 'Portofolio – Proyek Kerja PT Cipta Kriya Engineering',
                'meta_description' => 'Daftar portofolio pekerjaan dan proyek yang telah diselesaikan oleh PT Cipta Kriya Engineering.',
                'meta_keywords' => 'portofolio cipta kriya, proyek mekanikal, elektrikal project, batching plant',
            ],
            [
                'id' => 9,
                'label' => 'Rekam Jejak',
                'slug' => 'rekam-jejak',
                'parent_id' => 0,
                'view_name' => 'pages.rekam-jejak',
                'type' => 'system',
                'meta_title' => 'Rekam Jejak – Pengalaman Kerja PT Cipta Kriya Engineering',
                'meta_description' => 'Daftar rekam jejak pekerjaan dan riwayat proyek yang telah diselesaikan bersama mitra industri kami.',
                'meta_keywords' => 'rekam jejak, pengalaman kerja, proyek klien, history project cipta kriya',
            ],
        ];

        foreach ($pages as $pageData) {
            DB::table('pages')->updateOrInsert(
                ['id' => $pageData['id']],
                array_merge($pageData, [
                    'created_at' => now(),
                    'updated_at' => now()
                ])
            );
        }
    }
}
