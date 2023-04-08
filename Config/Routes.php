<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->get('/', 'Home::index');
$routes->get('/Ulfahdosen', 'Dosen::index');
$routes->get('/Ulfahmahasiswa', 'Mahasiswa::index');
$routes->get('/Ulfahstaff', 'Staff::index');
//input
$routes->get('/Ulfahdosen/input', 'Dosen::input');
$routes->get('/Ulfahmahasiswa/input', 'Mahasiswa::input');
$routes->get('/Ulfahstaff/input', 'Staff::input');
//edit
$routes->post('/Ulfahdosen/edit', 'Dosen::edit/$1');
$routes->post('/Ulfahmahasiswa/edit', 'Mahasiswa::edit/$1');
$routes->post('/Ulfahstaff/edit', 'Staff::edit/$1');
//update
$routes->get('/Ulfahdosen/update/(:num)', 'Dosen::update/$1');
$routes->get('/Ulfahmahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('/Ulfahstaff/update/(:num)', 'Staff::update/$1');
//insert
$routes->post('/Ulfahdosen/insert', 'Dosen::insert');
$routes->post('/Ulfahmahasiswa/insert', 'Mahasiswa::insert');
$routes->post('/Ulfahstaff/insert', 'Staff::insert');
//delete
$routes->add('/Ulfahdosen/delete/(:num)', 'Dosen::delete/$1');
$routes->add('/Ulfahmahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
$routes->add('/Ulfahstaff/delete/(:num)', 'Staff::delete/$1');
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
