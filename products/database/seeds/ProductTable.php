<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * php artisan db:seed --class=ProductTable
     */
    public function run()
    {
        Product::firstOrCreate(['name' => 'Iphone X']);
        Product::firstOrCreate(['name' => 'Honda Dream 2019']);
        Product::firstOrCreate(['name' => 'Samsung S9']);
    }
}
