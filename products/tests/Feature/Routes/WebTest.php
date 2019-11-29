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
    public function testIsProductPage()
    {
        $user = \Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get('/products');

        $response->assertStatus(200);
    }

    public function testIsCategoryPage()
    {
        $user = \Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get('/categories');

        $response->assertStatus(200);
    }

    public function testLoanTypePage()
    {
        $user = \Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get('/loan-types');

        $response->assertStatus(200);
    }

    public function testIsChangeLanguagePage()
    {
        $user = \Auth::loginUsingId(1);
        $response = $this->actingAs($user)->get('/change-language');

        $response->assertStatus(200);
    }



    public function testisSendMailToPage()
    {
        // $user = \Auth::loginUsingId(1);
        $response = $this->get('/send-mail-to');
        $response->assertStatus(200);
    }
}
