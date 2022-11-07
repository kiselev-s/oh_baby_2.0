<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class ChartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;
    public $types = ['food', 'shopping', 'entertainment', 'travel', 'other'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description' => $this->faker->name(),
            'amount' => rand(0.1, 100),
            'type' => $this->types[rand(0, count($this->types)-1)],
        ];
    }
}
