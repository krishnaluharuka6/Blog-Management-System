<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(WebsiteSeeder::class);

        // User::factory()->create([
        //     'name' => 'Admin Billu',
        //     'email' => 'admin@gmail.com',
        //     'password'=>'admin12345',
        //     'image'=>'https://ui-avatars.com/api/?name=Krishna+Dev',
        // ]);

        // $this->call(BlogSeeder::class);

        // $categories=Category::factory(3)->create();

        // $blogs=Blog::all();

        // foreach ($blogs as $blog) {
        // $blog->categories()->attach(
        //     $categories->random(rand(1, 3))->pluck('id')->toArray()
        // );
        // }

        // $this->call(ImageSeeder::class);

        // $this->call(AboutSeeder::class);

        $this->call(CommentSeeder::class);

    }
}
