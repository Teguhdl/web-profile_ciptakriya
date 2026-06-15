<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks if needed, truncate the table
        Experience::truncate();

        $experiences = [
            ['year' => '2026', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Pekerjaan Solo Ring Road & pembuatan silo batu', 'category' => 'Civil', 'tone' => 'brand'],
            ['year' => '2026', 'client' => 'PT Global Dairi Alami', 'scope' => 'Replating Versa (alat berat)', 'category' => 'Fabrikasi', 'tone' => 'green'],
            ['year' => '2026', 'client' => 'PT Lintas Marga Sedaya', 'scope' => 'Perbaikan hydrant MO Kertajati — Astra Infratoll Road', 'category' => 'Mekanikal', 'tone' => 'brand'],
            ['year' => '2026', 'client' => 'PT Prima Top Boga', 'scope' => 'Perbaikan & perluasan gudang sparepart dan ruang engineering', 'category' => 'Pergudangan', 'tone' => 'green'],
            ['year' => '2025', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Pembangunan Batching Plant Cimareme', 'category' => 'Batching Plant', 'tone' => 'brand'],
            ['year' => '2025', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Sediment pit & water treatment (Semarang)', 'category' => 'Civil', 'tone' => 'brand'],
            ['year' => '2025', 'client' => 'Trans Studio Bandung', 'scope' => 'Service perahu', 'category' => 'Maintenance', 'tone' => 'green'],
            ['year' => '2024', 'client' => 'PT SCG Pipe & Precast Indonesia', 'scope' => 'Jasa service berkala silo semen (type 1 & 5) — Plant 1 & 2', 'category' => 'Maintenance', 'tone' => 'green'],
            ['year' => '2024', 'client' => 'PT Indoglas Jaya', 'scope' => 'Bongkar & pasang cone silo', 'category' => 'Mekanikal', 'tone' => 'brand'],
            ['year' => '2024', 'client' => 'PT Pacific Prestress Indonesia', 'scope' => 'Vacuum lifter, NBR rubber pad & jasa services', 'category' => 'Fabrikasi', 'tone' => 'green'],
            ['year' => '2023', 'client' => 'CV Sunardi MJR', 'scope' => 'Rekondisi batching plant — Proyek Bendungan Tiu Suntuk', 'category' => 'Batching Plant', 'tone' => 'brand'],
            ['year' => '2023', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Overhaul, civil & installation — Sumbawa New Batching', 'category' => 'Batching Plant', 'tone' => 'brand'],
            ['year' => '2023', 'client' => 'PT Win Textile', 'scope' => 'Repair drying & heat setting Textino, mesin Bianco', 'category' => 'Mekanikal', 'tone' => 'brand'],
            ['year' => '2022', 'client' => 'PT Universal Agri Bisnisindo', 'scope' => 'Fabrikasi & pemasangan lantai kerja, screw, pintu & sample pallet', 'category' => 'Fabrikasi', 'tone' => 'green'],
            ['year' => '2022', 'client' => 'PT SCG Readymix Indonesia', 'scope' => 'Overhaul MBP-15 ex Pemalang, cleaning & painting fuel tank', 'category' => 'Maintenance', 'tone' => 'green'],
        ];

        foreach ($experiences as $exp) {
            Experience::create($exp);
        }
    }
}
