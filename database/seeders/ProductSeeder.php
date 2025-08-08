<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brandIds = Brand::pluck('id')->toArray();

        if (empty($brandIds)) {
            $this->command->warn('No brands found. Please seed brands first.');
            return;
        }

        for ($i = 0; $i < 8; $i++) {
            $name = fake()->unique()->word() . ' Phone';

            Product::create([
                'name'         => $name,
                'img_name'     => 'product_' . Str::random(5) . '.jpg',
                'description'  => fake()->sentence(10),
                'img_path'     => 'products/default.jpg',
                'brand_id'     => fake()->randomElement($brandIds),
                'color'        => fake()->safeColorName(),
                'price'        => fake()->numberBetween(100000, 2000000),
                'ram'          => fake()->randomElement(['4GB', '6GB', '8GB', '12GB']),
                'storage'      => fake()->randomElement(['64GB', '128GB', '256GB', '512GB']),
                'camera'       => fake()->randomElement(['12MP', '48MP', '64MP', '108MP']),
                'battery'      => fake()->randomElement(['4000mAh', '4500mAh', '5000mAh', '6000mAh']),
                'screen_size'  => fake()->randomElement(['6.1"', '6.4"', '6.7"', '6.8"']),
                'stock'        => fake()->numberBetween(0, 100),
                'status'       => fake()->randomElement(['available','out_of_stock']),
            ]);
        }
    }
}
