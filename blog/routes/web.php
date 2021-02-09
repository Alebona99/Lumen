<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//creating route prefix for api with a middleware
$router->group(['middleware' => 'auth', 'prefix'=>'api'], function($router){
    
    //route for author 
    $router->get('author', ['uses' => 'AuthorController@showAllAuthor']);
    $router->get('author/{author_id}', ['uses' => 'AuthorController@showOneAuthor']);
    $router->post('author', ['uses' => 'AuthorController@create']);
    $router->put('author/{author_id}',['uses' => 'AuthorController@update']);
    $router->delete('author/{author_id}', ['uses' => 'AuthorController@delete']);

    //route for post
    $router->get('post', ['uses' => 'PostController@showAllPost']);
    $router->get('post/{post_id}', ['uses' => 'PostController@showOnepost']);
    $router->post('post', ['uses' => 'PostController@create']);
    $router->put('post/{post_id}', ['uses' => 'PostController@update']);
    $router->delete('post/{post_id}',  ['uses' => 'PostController@delete']);

    //route for comment
    $router->get('comment', ['uses' => 'CommentController@showAllComment']);
    $router->get('comment/{comment_id}', ['uses' => 'CommentController@showOneComment']);
    $router->post('comment', ['uses' => 'CommentController@create']);
    $router->put('comment/{comment_id}', ['uses' => 'CommentController@update']);
    $router->delete('comment/{comment_id}', ['uses' => 'CommentController@delete']);
});


//adding router group for the user
$router->group(['prefix'=>'user'], function($router){

//login and register
$router->post('login', ['uses' => 'AuthController@login']);
$router->post('register', ['uses' => 'AuthController@register']);

//route for user profile
$router->get('profile', ['uses' => 'UserController@profile']);
$router->get('user', ['uses' => 'UserController@allUser']);
$router->get('user/{id}', ['uses' => 'UserController@singleUser']);
});


//test hello function for add job to queue
$router->get('hello', ['uses' => 'HelloController@helloadd']);

//test send email function for add job to queue 
$router->get('email', ['uses' => 'EmailController@email']);