<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * php artisan db:seed --class=UserTable
     */
    public function run()
    {
        $find = User::where('email', 'dev@dev.com')->first();
        if (!$find) User::create([
            'name' => 'dev',
            'email' => 'dev@dev.com',
            'password' => \Hash::make('123123'),
        ]);
    }
}
