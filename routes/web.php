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


//  Users Controller
$router->post('api/users', 'UsersController@store');
$router->post('api/login', 'UsersController@login');
// $router->post('/logout', 'UsersController@logout');

// Transaction controller
$router->post('api/transaction/{id}/save', 'TransController@store');
$router->get('api/transaction/{id}', 'TransController@show');
$router->delete('api/transaction/{id}/delete', 'TransController@destroy');

// Fund Controller
$router->post('api/fund/{id}/save', 'FundController@store');
$router->get('api/fund/{id}', 'FundController@show');
$router->delete('api/fund/{id}/delete', 'FundController@destroy');

// Wallet Controller
$router->post('api/wallet/{id}/save', 'WalletController@save');
$router->get('api/wallet/{id}', 'WalletController@get_wallet');
