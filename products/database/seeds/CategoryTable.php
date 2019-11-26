<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * php artisan db:seed --class=CategoryTable
     */
    public function run()
    {
        Category::firstOrCreate(['name' => 'Phone']);
        Category::firstOrCreate(['name' => 'Tablet']);
        Category::firstOrCreate(['name' => 'Car']);
        Category::firstOrCreate(['name' => 'Moto']);
    }
}
