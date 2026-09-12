<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('locale/(:any)', 'Home::locale/$1');
$routes->get('test', 'Home::test');

$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::registerAuth');
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::loginAuth');
$routes->get('recover', 'AuthController::recover');
$routes->post('recover', 'AuthController::recoverAuth');
$routes->get('change', 'AuthController::change', ['filter' => 'auth']);
$routes->post('password', 'AuthController::password', ['filter' => 'auth']);
$routes->post('forgot', 'AuthController::forgot', ['filter' => 'admin']);
$routes->get('logout', 'AuthController::logout');
$routes->get('update', 'AuthController::update');
$routes->post('update', 'AuthController::upt');

$routes->group('user', function ($routes) {
    $routes->get('/', 'UserController::index', ['filter' => 'auth']);
    $routes->get('page/(:num)', 'UserController::page/$1', ['filter' => 'auth']);
    $routes->get('profile/(:num)', 'UserController::profile/$1', ['filter' => 'auth']);
    $routes->post('update', 'UserController::update', ['filter' => 'auth']);
    $routes->get('admin', 'UserController::admin', ['filter' => 'admin']);
    $routes->get('box/(:num)/(:num)', 'UserController::box/$1/$2', ['filter' => 'auth']);
    $routes->get('risiti/(:num)', 'UserController::risiti/$1', ['filter' => 'auth']);
});

$routes->group('malipo', function ($routes) {
    $routes->get('user/(:num)', 'MalipoController::user/$1', ['filter' => 'admin']);
    $routes->post('edit/(:num)', 'MalipoController::edit/$1', ['filter' => 'mhasibu']);
    $routes->get('mhasibu/(:num)', 'MalipoController::mhasibu/$1', ['filter' => 'admin']);
});
