<?php

namespace Database\Factories;

use App\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Website>
 */
class WebsiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model=Website::class;

    public function definition(): array
    {

        return [
            'website_title'=>$this->faker->name(),
            'logo'=>$this->faker->imageUrl(),
            'contact'=>$this->faker->phoneNumber(),
            'email'=>$this->faker->email(),
            'fb_link'=>$this->faker->url(),
            'whatsapp_link'=>$this->faker->url(),
            'pinterest_Link'=>$this->faker->url(),
            'insta_Link'=>$this->faker->url(),
        ];
    }
}
