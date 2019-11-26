<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     * 
     * vendor/bin/phpunit --filter 'Tests\\Feature\\ExampleTest'
     */
    public function testisContactPageExists()
    {

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    // public function testContactPageHasID()
    // {

    //     $id = 120;
    //     // $response = $this->visit('/contact-page/'.$id);

    //     // $response->assertStatus(200);
    //     $response->assertSee($id);
    // }
}
