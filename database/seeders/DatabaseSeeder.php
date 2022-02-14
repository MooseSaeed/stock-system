<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::factory(1)->create([
            'name' => 'beef',
            'qty' => 20,
        ]);
        Ingredient::factory(1)->create([
            'name' => 'cheese',
            'qty' => 5,
        ]);
        Ingredient::factory(1)->create([
            'name' => 'onion',
            'qty' => 1,
        ]);

        Product::factory(1)->create();
    }
}
