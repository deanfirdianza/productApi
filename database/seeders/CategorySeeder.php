<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [            
            [
                'name' => 'Celana',
                'abbrv' => 'CLN',
            ],
            [
                'name' => 'Baju',
                'abbrv' => 'BJU',
            ],
            [
                'name' => 'Gadget',
                'abbrv' => 'GDT',
            ],
        ];

        Category::insert($data);
    }
}
