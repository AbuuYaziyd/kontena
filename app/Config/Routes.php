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
$routes->post('recover', 'AuthController::recoverAuth');
$routes->get('recover', 'AuthController::recover');
$routes->post('password', 'AuthController::password', ['filter' => 'auth']);
$routes->get('change', 'AuthController::change', ['filter' => 'auth']);
$routes->post('forgot', 'AuthController::forgot', ['filter' => 'admin']);

$routes->group('data', function ($routes) {
    $routes->get('/', 'DataController::index', ['filter' => 'auth']);
    $routes->get('users', 'DataController::users', ['filter' => 'admin']);
    $routes->get('revert/(:num)', 'DataController::revert/$1', ['filter' => 'admin']);
    $routes->get('new', 'DataController::new', ['filter' => 'auth']);
    $routes->post('create', 'DataController::create', ['filter' => 'auth']);
    $routes->get('box/(:num)/(:num)', 'DataController::box/$1/$2', ['filter' => 'auth']);
    $routes->get('view/(:num)', 'DataController::view/$1', ['filter' => 'auth']);
    $routes->get('risiti/(:num)', 'DataController::risiti/$1', ['filter' => 'auth']);
    $routes->get('print/(:num)', 'DataController::print/$1', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'DataController::edit/$1', ['filter' => 'auth']);
    $routes->get('code/(:num)', 'DataController::code/$1', ['filter' => 'auth']);
    $routes->get('coded', 'DataController::coded', ['filter' => 'auth']);
    $routes->get('add-box', 'DataController::add', ['filter' => 'auth']);
    $routes->get('delete/(:num)', 'DataController::delete/$1', ['filter' => 'auth']);
});

$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index', ['filter' => 'auth']);
    $routes->get('profile', 'UserController::profile', ['filter' => 'auth']);
    $routes->post('edit/(:num)', 'UserController::edit/$1', ['filter' => 'auth']);
    $routes->get('receiver', 'UserController::receiver', ['filter' => 'auth']);
    $routes->post('receiver/(:num)', 'UserController::receiverEdit/$1', ['filter' => 'auth']);
});

$routes->group('malipo', function ($routes) {
    $routes->get('user/(:num)', 'MalipoController::user/$1', ['filter' => 'admin']);
    $routes->post('edit/(:num)', 'MalipoController::edit/$1', ['filter' => 'admin']);
});
