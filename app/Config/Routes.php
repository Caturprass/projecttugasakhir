<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Auth::index');
$routes->get('/', 'Pages::index');

// $routes->get('/komik/create', 'Komik::create');
// $routes->delete('/komik/(:num)', 'Komik::delete/$1');
// $routes->get('/komik/(:any)', 'komik::detail/$1');

$routes->get('/pemain/tambah', 'Pemain::tambah');
$routes->get('/pemain/edit(:segment)', 'Pemain::edit/$1');
$routes->delete('/pemain/(:num)', 'Pemain::delete/$1');
$routes->get('/pemain/(:any)', 'Pemain::detail/$1');

$routes->get('/kiper/create', 'Kiper::create');
$routes->get('/kiper/edit(:segment)', 'Kiper::edit/$1');
$routes->delete('/kiper/(:num)', 'Kiper::delete/$1');

$routes->get('/centerback/create', 'Centerback::create');
$routes->get('/centerback/edit(:segment)', 'Centerback::edit/$1');
$routes->delete('/centerback/(:num)', 'Centerback::delete/$1');

$routes->get('/rightback/create', 'Rightback::create');
$routes->get('/rightback/edit(:segment)', 'Rightback::edit/$1');
$routes->delete('/rightback/(:num)', 'Rightback::delete/$1');

$routes->get('/leftback/create', 'Leftback::create');
$routes->get('/leftback/edit(:segment)', 'Leftback::edit/$1');
$routes->delete('/leftback/(:num)', 'Leftback::delete/$1');

$routes->get('/midfilder/create', 'Midfilder::create');
$routes->get('/midfilder/edit(:segment)', 'Midfilder::edit/$1');
$routes->delete('/midfilder/(:num)', 'Midfilder::delete/$1');

$routes->get('/sayaprwf/create', 'Sayaprwf::create');
$routes->get('/sayaprwf/edit(:segment)', 'Sayaprwf::edit/$1');
$routes->delete('/sayaprwf/(:num)', 'Sayaprwf::delete/$1');

$routes->get('/sayaplwf/create', 'Sayaplwf::create');
$routes->get('/sayaplwf/edit(:segment)', 'Sayaplwf::edit/$1');
$routes->delete('/sayaplwf/(:num)', 'Sayaplwf::delete/$1');

$routes->get('/penyerangmid/edit(:segment)', 'Penyerangmid::edit/$1');
$routes->delete('/penyerangmid/(:num)', 'Penyerangmid::delete/$1');

$routes->get('/striker/edit(:segment)', 'Striker::edit/$1');
$routes->delete('/striker/(:num)', 'Striker::delete/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
