<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, 100)->create();
        //Product::factory()->count(100)->create();
    }
}
