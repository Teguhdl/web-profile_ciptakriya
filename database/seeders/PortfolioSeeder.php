<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Portfolio::truncate();

        $data = [
            [
                'title' => 'Pembangunan Batching Plant Cimareme',
                'image' => 'assets/web/photos/batching-plant.png',
                'client' => 'PT SCG Readymix Indonesia',
                'year' => 2025,
                'status' => 'Publish',
                'tag' => 'Batching Plant',
                'tone' => 'brand',
                'description' => 'Pekerjaan konstruksi terpadu untuk pembangunan Batching Plant baru, mulai dari sipil (pondasi), instalasi mekanikal silo, conveyor system, mixer, hingga instalasi panel elektrikal daya dan control system.',
            ],
            [
                'title' => 'Pabrikasi & Pemasangan Silo',
                'image' => 'assets/web/photos/silo-fabrication.png',
                'client' => 'Storage Tank',
                'year' => 2024,
                'status' => 'Publish',
                'tag' => 'Fabrikasi',
                'tone' => 'green',
                'description' => 'Fabrikasi tangki silo berkapasitas besar menggunakan plat baja pilihan dengan pengerjaan pengelasan bersertifikat, lengkap dengan instalasi di lokasi site konsumen termasuk support leg, catwalk, dan piping line.',
            ],
            [
                'title' => 'Bongkar Pasang Bearing Roller Crusher',
                'image' => 'assets/web/photos/mechanical-work.png',
                'client' => 'Industri Semen',
                'year' => 2023,
                'status' => 'Publish',
                'tag' => 'Mekanikal',
                'tone' => 'brand',
                'description' => 'Pekerjaan bongkar pasang bearing roller crusher pada unit coal mill industri semen. Menggunakan alat angkat berat hidrolik presisi untuk memastikan kelurusan poros crusher dan meminimalkan getaran operasional.',
            ],
            [
                'title' => 'Penggantian Grate Plate Cooler',
                'image' => 'assets/web/photos/cooler-grate.png',
                'client' => 'Industri Semen',
                'year' => 2023,
                'status' => 'Publish',
                'tag' => 'Maintenance',
                'tone' => 'green',
                'description' => 'Pekerjaan shutdown maintenance untuk penggantian grate plate tahan panas pada clinker cooler area pabrik semen guna memulihkan efisiensi pendinginan material hasil pembakaran tanur putar.',
            ],
            [
                'title' => 'Mobilisasi & Instalasi Batching Plant',
                'image' => 'assets/web/photos/site-loader.png',
                'client' => 'PT SCG Readymix — Sumbawa',
                'year' => 2023,
                'status' => 'Publish',
                'tag' => 'Civil & Install',
                'tone' => 'brand',
                'description' => 'Pekerjaan overhaul relokasi (dismantle) unit batching plant exs-proyek lain, mobilisasi antar pulau, dan pembangunan pondasi baru serta re-instalasi mekanikal elektrikal hingga unit siap berproduksi kembali.',
            ]
        ];

        foreach ($data as $item) {
            Portfolio::create($item);
        }
    }
}
