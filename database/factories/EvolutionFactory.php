<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Evolution;
use Illuminate\Database\Eloquent\Factories\Factory;

class EvolutionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Evolution::class;

    /**
     * Define the model's default state.
     *
     * @return array
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
