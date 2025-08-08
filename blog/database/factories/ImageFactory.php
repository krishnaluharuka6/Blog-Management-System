<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\User;
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

     protected $model=Image::class;

    public function definition(): array
    {
        return [
        'blog_id'=>\App\Models\Blog::inRandomOrder()->value('id'),
        'image_type'=>$this->faker->randomElement(['cover', 'image1', 'image2', 'image3']), 
        'file_name'=>$this->faker->name(),
        'file_path'=>$this->faker->imageUrl(),
        ];
    }
}
