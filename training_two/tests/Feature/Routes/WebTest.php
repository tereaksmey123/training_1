<?php

namespace Tests\Feature\Routes;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WebTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     * vendor/bin/phpunit --filter 'Tests\\Feature\\Routes\\WebTest'
     */

    public function testIsCategoryPageExists()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
    }

    public function testIsProductPageExists()
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }
}
