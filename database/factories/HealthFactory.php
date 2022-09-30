<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Health>
 */
class HealthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name'=> $this->faker->firstName(),
            'last_name'=> $this->faker->lastName(),
            'specialization'=>$this->faker->word,
            'meeting' => $this->faker->date(),
           // 'next_meeting' => $this->faker->date(),
//            'medical_opinion' => $this->faker->image,
            'medical_opinion_path' => $this->faker->filePath(),
            'children_id'=>rand(1,Child::count()),
        ];
    }
}
