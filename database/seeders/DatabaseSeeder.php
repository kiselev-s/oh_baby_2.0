<?php

namespace Database\Seeders;

use App\Models\Child;
use App\Models\Evolution;
use App\Models\Health;
use App\Models\Image;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ChildSeeder::class,
            EvolutionSeeder::class,
            ImageSeeder::class,
            HealthSeeder::class,
        ]);
    }
}
