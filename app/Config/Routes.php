<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('home', 'Home::home');
$routes->get('data', 'Home::data');
$routes->get('test', 'Home::test');

$routes->get('login', 'AuthController::signin');
$routes->post('login', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');

$routes->group('kontena', function ($routes) {
    $routes->get('/', 'KontenaController::index');
    $routes->post('find', 'KontenaController::find');
    $routes->post('sasisha/(:num)', 'KontenaController::sasisha/$1');
    $routes->post('edited/(:num)', 'KontenaController::edited/$1');
    $routes->post('check', 'KontenaController::check');
    $routes->get('kont', 'KontenaController::kont');
    $routes->get('register', 'KontenaController::register');
    $routes->post('register', 'KontenaController::store');
    $routes->get('print/(:num)', 'KontenaController::print/$1');
    $routes->post('count', 'KontenaController::count');
});

$routes->group('malipo', function ($routes) {
    $routes->get('/', 'MalipoController::index', ['filter' => 'authGuard']);
    $routes->get('make/(:num)', 'MalipoController::make/$1');
    $routes->get('risiti/(:num)', 'MalipoController::risiti/$1');
    $routes->get('edit/(:num)', 'MalipoController::edit/$1');
    $routes->post('edit/(:num)', 'MalipoController::edit/$1');
    $routes->get('whatsapp/(:num)/(:num)', 'MalipoController::whatsapp/$1/$2');
    $routes->post('send', 'MalipoController::send');
});
