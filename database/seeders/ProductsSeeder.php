<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = new Product();
        $product->name = "Pc gamer";
        $product->description = "Pc gamer";
        $product->price = 20000;
        $product->category_id = Category::inRandomOrder()->first()->id;
        $product->save();

        $product2 = new Product();
        $product2->name = "teclado";
        $product2->description = "Teclado ";
        $product2->price = 10000;
        $product2->category_id = Category::inRandomOrder()->first()->id;
        $product2->save();

        $product3 = new Product();
        $product3->name = "Mouse";
        $product3->description = "Mouse gamer";
        $product3->price = 800.00;
        $product3->category_id = Category::inRandomOrder()->first()->id; 
        $product3->save();
    }
}
