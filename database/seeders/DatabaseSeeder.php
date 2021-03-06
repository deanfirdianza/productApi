<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ProductDetailSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductDetailSeeder::class);
    }
}
