<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['uses' => 'GuestBookMainController@main','as' => 'guestbook.main']);
$router->get('/{id}', ['uses' => 'GuestBookController@show', 'as' => 'guestbook.show']);
$router->post('/store', ['uses' => 'GuestBookController@create', 'as' => 'guestbook.create']);
