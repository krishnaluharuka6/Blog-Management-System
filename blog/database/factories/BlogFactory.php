<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model=Blog::class;

    public function definition(): array
    {
        $title=$this->faker->sentence();
        return [
            'title'=>$title,
            'slug'=>Str::slug($title),
            'description'=>$this->faker->paragraph(),
            'user_id'=>\App\Models\User::first(),
            'published_at'=>$this->faker->dateTime(), 
        ];
    }
}
