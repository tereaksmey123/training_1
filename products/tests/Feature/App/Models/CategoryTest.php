<?php

namespace Tests\Feature\App\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * vendor/bin/phpunit --filter 'Tests\\Feature\\App\\Models\\CategoryTest'
     */
    public function testGetNameUpperCase()
    {
        $create = new Category([
            'name' => 'nnnn' 
        ]);
        $create->save();
        $id = str_pad($create->id, '6', '0', STR_PAD_LEFT); // 00006
        // dd($id .' -  '.$create->code);
        // $this->assertEquals('NNNN', $create->NameFormat);
        $this->assertEquals((string)$id, (string)$create->code); // 000006, 6

        $create->delete();
    }
}
