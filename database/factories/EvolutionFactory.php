<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evolution>
 */
class EvolutionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'age_month'=>rand(0,300),
            'growth'=>rand(50,100),
            'weight'=>rand(3,60),
            'children_id'=>rand(1,Child::count()),
        ];
    }
}
