<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = category::all();

        $store = 10;

        foreach($categories as $category){

            for($i = 1; $i <= $store; $i++){

                $product = new Product();

                $product->name = 'product ' . $i;
                $product->stock_quantity = rand(5 , 20);
                $product->price = rand(100 , 150);
                $product->category_id = $category->id;
                $product->save();
            }
        }
    }
}
