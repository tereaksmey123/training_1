<?php

namespace Tests\Feature\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     * vendor/bin/phpunit --filter 'Tests\\Feature\\Routes\\ApiTest'
     */
    public function testProductRoute()
    {
        $response = $this->get('/api/products');
        $response->assertSuccessful();
    }
}
