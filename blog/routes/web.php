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

//creating route prefix for api
$router->group(['prefix'=>'api'], function($router){
    
    //route for author 
    $router->get('author', 'AuthorController@showAllAuthor');
    $router->get('author/{author_id}','AuthorController@showOneAuthor');
    $router->post('author', 'AuthorController@create');
    $router->put('author/{author_id}','AuthorController@update');
    $router->delete('author/{author_id}', 'AuthorController@delete');

    //route for post
    $router->get('post', 'PostController@showAllPost');
    $router->get('post/{post_id}', 'PostController@showOnepost');
    $router->post('post', 'PostController@create');
    $router->put('post/{post_id}', 'PostController@update');
    $router->delete('post/{post_id}', 'PostController@delete');

    //route for comment
    $router->get('comment', 'CommentController@showAllComment');
    $router->get('comment/{comment_id}', 'CommentController@showOneComment');
    $router->post('comment', 'CommentController@create');
    $router->put('comment/{comment_id}', 'CommentController@update');
    $router->delete('comment/{comment_id}', 'CommentController@delete');
});