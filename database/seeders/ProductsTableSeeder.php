<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    
        foreach (range(1, 10) as $index) {
            $imagePath = 'path/to/your/images'; // Set the desired path to your images
    
            Product::create([
                'productName' => $faker->word,
                'productQuantity' => $faker->randomNumber(3),
                'productRateForNormalUsers' => $faker->randomFloat(2, 1, 100),
                'productRateForB2BUsers' => $faker->randomFloat(2, 1, 100),
                'productRateForB2CUsers' => $faker->randomFloat(2, 1, 100),
                'description' => $faker->sentence,
                'image' => $imagePath . '/' . $faker->image,
            ]);
        }
    }
    
    
}
