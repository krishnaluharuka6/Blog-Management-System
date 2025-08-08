<?php

namespace Database\Seeders;

use App\Models\Website;
use Database\Factories\WebsiteFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        Website::factory(1)->create();
    }
}
