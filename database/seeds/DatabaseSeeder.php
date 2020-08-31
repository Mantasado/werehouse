<?php

use App\ProductDetails;
use App\Products;
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
        $this->call(ProductTypeSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(ProductDetailsSeeder::class);
    }
}
