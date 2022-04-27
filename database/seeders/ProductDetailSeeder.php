<?php

namespace Database\Seeders;

use App\Models\ProductDetail;
use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
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
                'name' => 'Celana Jeans Levis',
                'color' => 'Biru Tua',
                'purchase_price' => 150000,
            ],
            [
                'name' => 'Baju Polo',
                'color' => 'Hitam',
                'purchase_price' => 200000,
            ],
            [
                'name' => 'Xiaomi Redmi Pro 10',
                'color' => 'Magenta',
                'purchase_price' => 5000000,
            ],
        ];

        ProductDetail::insert($data);
    }
}
