<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\CartItem;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

    /*$this->call([
        CategorySeeder::class,
        ProductSeeder::class,
    ]);*/

    /*Category::factory(10000)->create();
    Product::factory(100000)->create();*/
    User::factory(100)->create();
    CartItem::factory(100)->create();
    
    }
}
