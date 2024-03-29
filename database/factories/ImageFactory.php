<?php

namespace Database\Factories;

use App\Models\Documents;
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
            'category'=>$this->faker->word,
            'path' => $this->faker->filePath(),
            'documents_id'=>rand(1,Documents::count()),
        ];
    }
}
