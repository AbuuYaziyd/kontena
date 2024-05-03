<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('data', 'Home::data');
$routes->get('test', 'Home::test');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerAuth');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginAuth');
$routes->get('logout', 'AuthController::logout');

$routes->group('data', function ($routes) {
    $routes->get('/', 'DataController::index', ['filter' => 'authGuard']);
    $routes->get('box/(:num)/(:num)', 'DataController::box/$1/$2', ['filter' => 'authGuard']);
    $routes->get('view/(:num)', 'DataController::view/$1', ['filter' => 'authGuard']);
    $routes->get('risiti/(:num)', 'DataController::risiti/$1', ['filter' => 'authGuard']);
    $routes->get('print/(:num)', 'DataController::print/$1', ['filter' => 'authGuard']);
    $routes->post('edit/(:num)', 'DataController::edit/$1', ['filter' => 'authGuard']);
    $routes->get('code/(:num)', 'DataController::code/$1', ['filter' => 'authGuard']);
    $routes->get('coded', 'DataController::coded', ['filter' => 'authGuard']);
    $routes->get('add-box', 'DataController::add', ['filter' => 'authGuard']);
    $routes->get('delete/(:num)', 'DataController::delete/$1', ['filter' => 'authGuard']);
    // $routes->get('whatsapp/(:num)/(:num)', 'DataController::whatsapp/$1/$2');
    // $routes->post('send', 'DataController::send');
});

$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index', ['filter' => 'authGuard']);
    $routes->get('profile', 'UserController::profile', ['filter' => 'authGuard']);
    $routes->post('edit/(:num)', 'UserController::edit/$1', ['filter' => 'authGuard']);
    $routes->get('receiver', 'UserController::receiver', ['filter' => 'authGuard']);
    $routes->post('receiver/(:num)', 'UserController::receiverEdit/$1', ['filter' => 'authGuard']);
    // $routes->get('whatsapp/(:num)/(:num)', 'UserController::whatsapp/$1/$2');
});

$routes->group('malipo', function ($routes) {
    // $routes->get('/', 'MalipoController::index', ['filter' => 'authGuard']);
    $routes->get('user/(:num)', 'MalipoController::user/$1', ['filter' => 'admin']);
    $routes->get('edit/(:num)', 'MalipoController::edit/$1', ['filter' => 'admin']);
    // $routes->get('risiti/(:num)', 'MalipoController::risiti/$1', ['filter' => 'admin']);
    $routes->post('edit/(:num)', 'MalipoController::edit/$1', ['filter' => 'admin']);
    // $routes->get('whatsapp/(:num)/(:num)', 'MalipoController::whatsapp/$1/$2', ['filter' => 'admin']);
    // $routes->post('send', 'MalipoController::send', ['filter' => 'admin']);
});

$routes->group('kontena', function ($routes) {
    // $routes->get('/', 'KontenaController::index', ['filter' => 'authGuard']);
    // $routes->post('find', 'KontenaController::find', ['filter' => 'authGuard']);
    // $routes->post('edited/(:num)', 'KontenaController::edited/$1', ['filter' => 'authGuard']);
    // $routes->post('check', 'KontenaController::check', ['filter' => 'authGuard']);
    // $routes->get('kont', 'KontenaController::kont', ['filter' => 'authGuard']);
    // $routes->get('register', 'KontenaController::register', ['filter' => 'authGuard']);
    // $routes->post('register', 'KontenaController::store', ['filter' => 'authGuard']);
    // $routes->post('count', 'KontenaController::count', ['filter' => 'authGuard']);
});
