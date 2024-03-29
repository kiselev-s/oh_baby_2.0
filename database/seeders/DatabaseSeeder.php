<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expense;
use Database\Factories\TeamFactory;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'ChildActions User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory(10)->withPersonalTeam()->create();

        $this->call([
            ChildSeeder::class,
            EvolutionSeeder::class,
            DocumentsSeeder::class,
            ImageSeeder::class,
            HealthSeeder::class,
        ]);

//        $this->call([
//            Expense::class,
//        ]);
    }
}
