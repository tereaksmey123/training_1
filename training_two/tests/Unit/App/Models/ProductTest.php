<?php

namespace Tests\Unit\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     * 
     * vendor/bin/phpunit --filter 'Tests\\Unit\\App\\Models\\ProductTest'
     */
    public function testAccessorPriceFormat()
    {
        // Accessor GET 
        // Mutator SET 
        $product = new Product(['price' => 150]);
        // $product->save();
        $this->assertEquals('$ 150', $product->PriceFormat);
        // factory()->make()
        // $product = Product::create();
        // factory()->create()
    }

    public function testMutatorName()
    {
        $product = new Product(['name' => 'date 123']);
        $this->assertEquals('date 123', $product->name);
    }
}
