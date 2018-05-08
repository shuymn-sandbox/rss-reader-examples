<?php
declare(strict_types=1);

use App\Http\Controllers\{
    Index, Auth, Feed
};
use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->group(['middleware' => ['web']], function (Router $router) {
    $router->get('/', [
        'as' => 'home',
        'uses' => Index::class
    ]);

    $router->get('/feed', [
        'as' => 'feed',
        'uses' => Feed\GetFeed::class
    ]);
});

$router->group(['middleware' => ['web', 'auth.inValid']], function (Router $router) {
    $router->get('/signup', [
        'as' => 'signup',
        'uses' => Auth\SignUp\GetSignUp::class
    ]);

    $router->post('/signup', [
        'uses' => Auth\SignUp\PostSignUp::class
    ]);

    $router->get('/login', [
        'as' => 'login',
        'uses' => Auth\LogIn\GetLogIn::class
    ]);

    $router->post('/login', [
        'uses' => Auth\LogIn\PostLogIn::class
    ]);
});

$router->group(['middleware' => ['web', 'auth.valid']], function (Router $router) {
    $router->get('/logout', [
        'as' => 'logout',
        'uses' => Auth\LogOut\GetLogOut::class
    ]);

    $router->post('/feed', [
        'as' => 'post.feed',
        'uses' => Feed\PostFeed::class
    ]);

    $router->get('/feed/create', [
        'as' => 'feed.create',
        'uses' => Feed\Create\GetCreate::class
    ]);
});

