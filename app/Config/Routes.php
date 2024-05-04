<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('test', 'Home::test');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerAuth');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');
$routes->post('forgot', 'AuthController::forgot', ['filter' => 'admin']);

$routes->group('data', function ($routes) {
    $routes->get('/', 'DataController::index', ['filter' => 'authGuard']);
    $routes->get('new', 'DataController::new', ['filter' => 'authGuard']);
    $routes->post('create', 'DataController::create', ['filter' => 'authGuard']);
    $routes->get('box/(:num)/(:num)', 'DataController::box/$1/$2', ['filter' => 'authGuard']);
    $routes->get('view/(:num)', 'DataController::view/$1', ['filter' => 'authGuard']);
    $routes->get('risiti/(:num)', 'DataController::risiti/$1', ['filter' => 'authGuard']);
    $routes->get('print/(:num)', 'DataController::print/$1', ['filter' => 'authGuard']);
    $routes->post('edit/(:num)', 'DataController::edit/$1', ['filter' => 'authGuard']);
    $routes->get('code/(:num)', 'DataController::code/$1', ['filter' => 'authGuard']);
    $routes->get('coded', 'DataController::coded', ['filter' => 'authGuard']);
    $routes->get('add-box', 'DataController::add', ['filter' => 'authGuard']);
    $routes->get('delete/(:num)', 'DataController::delete/$1', ['filter' => 'authGuard']);
});

$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index', ['filter' => 'authGuard']);
    $routes->get('profile', 'UserController::profile', ['filter' => 'authGuard']);
    $routes->post('edit/(:num)', 'UserController::edit/$1', ['filter' => 'authGuard']);
    $routes->get('receiver', 'UserController::receiver', ['filter' => 'authGuard']);
    $routes->post('receiver/(:num)', 'UserController::receiverEdit/$1', ['filter' => 'authGuard']);
});

$routes->group('malipo', function ($routes) {
    $routes->get('user/(:num)', 'MalipoController::user/$1', ['filter' => 'admin']);
    $routes->post('edit/(:num)', 'MalipoController::edit/$1', ['filter' => 'admin']);
});

$routes->group('kontena', function ($routes) {
    // $routes->get('/', 'KontenaController::index', ['filter' => 'authGuard']);
    // $routes->post('find', 'KontenaController::find', ['filter' => 'authGuard']);
    // $routes->post('edit/(:num)', 'KontenaController::edit/$1', ['filter' => 'authGuard']);
});
