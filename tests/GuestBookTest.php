<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class GuestBookTest extends TestCase
{
    use DatabaseMigrations;

    public function testStore()
    {
        $user = factory('App\User')->make();
        $name = $user->name;
        $email =  $user->email;
        $url = $user->url;
        $message = $user->message;
        $this->post(route('guestbook.store', compact('name', 'email', 'url', 'message')))->assertResponseStatus(302);
        $this->seeInDatabase('users', [
                'name' => $user->name,
                'email' => $user->email,
                'url' => $user->url,
                'message' => $user->message,
            ]);
    }

    public function testShow()
    {
        $user = factory('App\User')->create();
        $id = $user->id;
        $this->get(route('guestbook.show', ['id' => $id]));
        $this->assertResponseStatus(200);
    }
}
