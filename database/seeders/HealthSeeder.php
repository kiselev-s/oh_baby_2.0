<?php

namespace Database\Seeders;

use App\Models\Health;
use Illuminate\Database\Seeder;

class HealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Health::factory(30)->create();
    }
}
