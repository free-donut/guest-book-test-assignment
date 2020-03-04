<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Http\Controllers\HomePageController;

class HomePageTest extends TestCase
{
    use DatabaseMigrations;

    public function testIndex()
    {
        $user = factory('App\User')->create();
        $this->get(route('home'));
        $this->assertResponseStatus(200);
    }
}
