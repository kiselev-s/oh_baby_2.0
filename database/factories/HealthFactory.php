<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Health;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Health::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstName(),
            'last_name'=> $this->faker->lastName(),
            'specialization'=>$this->faker->word,
            'meeting' => $this->faker->date(),
            'next_meeting' => $this->faker->date(),
            'medical_opinion' => $this->faker->image,
            'children_id'=>rand(1,Child::count()),
        ];
    }
}
