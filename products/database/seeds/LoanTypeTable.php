<?php

use Illuminate\Database\Seeder;
use App\Models\LoanType;

class LoanTypeTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * php artisan db:seed --class=LoanTypeTable
     */
    public function run()
    {
        LoanType::firstOrCreate(['name' => 'EOC']);
        LoanType::firstOrCreate(['name' => 'Interest']);
        // LoanType::firstOrCreate(['name' => 'Custom']);
    }
}
