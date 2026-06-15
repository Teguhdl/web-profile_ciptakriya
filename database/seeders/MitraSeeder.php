<?php

namespace Database\Seeders;

use App\Models\Mitra;
use Illuminate\Database\Seeder;

class MitraSeeder extends Seeder
{
    public function run(): void
    {
        $mitras = [
            ['name' => 'SCG', 'logo' => 'assets/web/clients/scg.png', 'description' => 'Siam Cement Group'],
            ['name' => 'Jayamix by SCG', 'logo' => 'assets/web/clients/jayamix.png', 'description' => 'Ready-mix concrete manufacturer'],
            ['name' => 'Semen Padang', 'logo' => 'assets/web/clients/semen-padang.png', 'description' => 'First cement manufacturer in Indonesia'],
            ['name' => 'Indocement — Tiga Roda', 'logo' => 'assets/web/clients/indocement.png', 'description' => 'One of Indonesia\'s largest cement manufacturers'],
            ['name' => 'Indofood', 'logo' => 'assets/web/clients/indofood.png', 'description' => 'Major food industry company'],
            ['name' => 'Win Textile', 'logo' => 'assets/web/clients/wintex.png', 'description' => 'Textile manufacturing'],
            ['name' => 'De Heus', 'logo' => 'assets/web/clients/de-heus.png', 'description' => 'International animal nutrition company'],
            ['name' => 'Pionirbeton', 'logo' => 'assets/web/clients/pionirbeton.png', 'description' => 'Concrete solution provider'],
        ];

        foreach ($mitras as $mitra) {
            Mitra::updateOrCreate(
                ['name' => $mitra['name']],
                [
                    'logo' => $mitra['logo'],
                    'description' => $mitra['description']
                ]
            );
        }
    }
}
