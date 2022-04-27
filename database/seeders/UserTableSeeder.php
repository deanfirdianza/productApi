<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $password = Hash::make('password');

        User::create([
            'id' => Str::uuid(),
            'name' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => $password,
        ]);

        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'id' => Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
