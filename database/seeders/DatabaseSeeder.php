<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CategoryTypeSeeder;
use Database\Seeders\PostTypeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoryTypeSeeder::class,
            PostTypeSeeder::class,
        ]);
    }
}
