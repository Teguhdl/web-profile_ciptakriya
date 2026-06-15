<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            AdminSeeder::class,
            RoleSeeder::class,
            PagesSeeder::class,
            ProductSeeder::class,
            PortfolioSeeder::class,
            ExperienceSeeder::class,
            MitraSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
