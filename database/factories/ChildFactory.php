<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Child>
 */
class ChildFactory extends Factory
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
            'birthday' => $this->faker->date(),
            'gender' => rand(0,1),
            'user_id'=>rand(1,User::count()),
            'team_id'=>rand(1,Team::count()),
            'selected' => rand(true, false),
        ];
    }
}
