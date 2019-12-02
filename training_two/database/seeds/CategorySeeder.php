<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * php artisan db:seed --class=CategorySeeder
     */
    public function run()
    {
        Category::firstOrCreate(['name' => 'Phone']);
        Category::firstOrCreate(['name' => 'Tablet']);
        Category::firstOrCreate(['name' => 'Car']);
        // Database: Eloquent, DB Builder;
        // if (!DB::table('categories')->where('name', 'Phone')->exists()) DB::table('categories')->insert(['name' => 'Phone']);

        // if (!DB::table('categories')->where('name', 'Tablet')->exists()) DB::table('categories')->insert(['name' => 'Tablet']);

        // if (!DB::table('categories')->where('name', 'Car')->exists()) DB::table('categories')->insert(['name' => 'Car']);
    }
}
