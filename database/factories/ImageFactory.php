<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
//            'view'=>$this->faker->image,
            'path' => $this->faker->filePath(),
            'category'=>$this->faker->word,
            'children_id'=>rand(1,Child::count()),
        ];
    }
}
