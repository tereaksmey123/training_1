<?php

use Illuminate\Database\Seeder;

class ContactTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * 
     * php artisan db:seed --class=ContactTable
     */
    public function run()
    {
        // Contact::createOrFirst(['name' => 'name', 'phone' => 'email']);
        if (!DB::table('contacts')->where('name', 'Flexi')->exists()) {
            DB::table('contacts')->insert([
                'name' => 'Flexi',
                'phone' => '0888088007',
            ]);
        }
        if (!DB::table('contacts')->where('name', 'Flexi test')->exists()) {
            DB::table('contacts')->insert([
                'name' => 'Flexi test',
                'phone' => '0888088008',
            ]);
        }
        if (!DB::table('contacts')->where('name', 'Flexi production')->exists()) {
            DB::table('contacts')->insert([
                'name' => 'Flexi production',
                'phone' => '0888088009',
            ]);
        }
    }
}
