<?php

namespace Database\Factories;

use App\Models\Child;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=>$this->faker->word,
            'view'=>$this->faker->image,
            'category'=>$this->faker->word,
            'children_id'=>rand(1,Child::count()),
        ];
    }
}
