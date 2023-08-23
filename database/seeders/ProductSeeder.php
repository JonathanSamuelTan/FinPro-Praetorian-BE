<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products= [
            [
                'product_name' => 'Iphone 14 Pro Max',
                'category' => 'Phone',
                'price' => 20000000,
                'qtc' => 10,
                'product_IMG' => 'Iphone 14 Pro Max.jpeg',
            ],

            [
                'product_name' => 'ROG Phone 6',
                'category' => 'Phone',
                'price' => 10000000,
                'qtc' => 10,
                'product_IMG' => 'ROG Phone 6.png',
            ],

            [
                'product_name' => 'Samsung Z Fold 5',
                'category' => 'Phone',
                'price' => 20000000,
                'qtc' => 10,
                'product_IMG' => 'Samsung Z Fold 5.jpeg',
            ],

            [
                'product_name' => 'Xiaomi 12 Pro',
                'category' => 'Phone',
                'price' => 10000000,
                'qtc' => 10,
                'product_IMG' => 'Xiaomi 12 Pro.png',
            ],

            [
                'product_name' => 'Xiaomi Pad 6',
                'category' => 'Tablet',
                'price' => 5000000,
                'qtc' => 10,
                'product_IMG' => 'Xiaomi Pad 6.jpeg',
            ],
            
            [
                'product_name' => 'Ipad Pro',
                'category' => 'Tablet',
                'price' => 15000000,
                'qtc' => 10,
                'product_IMG' => 'Ipad Pro.jpeg',
            ],

            [
                'product_name' => 'Huawei Matepad',
                'category' => 'Tablet',
                'price' => 7000000,
                'qtc' => 10,
                'product_IMG' => 'Huawei Matepad.jpeg',
            ],

            [
                'product_name' => 'Samsung Tab S8',
                'category' => 'Tablet',
                'price' => 15000000,
                'qtc' => 10,
                'product_IMG' => 'Samsung Tab S8.jpeg',
            ],

            [
                'product_name' => 'Macbook Air M1',
                'category' => 'Laptop',
                'price' => 13000000,
                'qtc' => 10,
                'product_IMG' => 'Macbook Air M1.jpeg',
            ],

            [
                'product_name' => 'Macbook Pro M1 Pro',
                'category' => 'Laptop',
                'price' => 35000000,
                'qtc' => 10,
                'product_IMG' => 'Macbook Pro M1 Pro.jpeg',
            ],

            [
                'product_name' => 'Zenbook',
                'category' => 'Laptop',
                'price' => 17000000,
                'qtc' => 10,
                'product_IMG' => 'Zenbook.png',
            ],

            [
                'product_name' => 'Vivobook',
                'category' => 'Laptop',
                'price' => 9000000,
                'qtc' => 10,
                'product_IMG' => 'Vivobook.png',
            ],
        ];

        DB::table('Products')->insert($products);
    }
}
