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
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');
$routes->get('/auth', 'Auth::index');
$routes->get('/auth/signout', 'Auth::signout');
$routes->get('auth/cekLogin', 'Auth::cekLogin');

$routes->get('/home', 'Home::index');

$routes->get('/admin', 'Admin::settingUsers');
$routes->get('admin/settingUsers', 'Admin::settingUsers');
$routes->get('admin/dataUsers', 'Admin::dataUsers');
$routes->get('Admin/dataUsers', 'Admin::dataUsers');
$routes->get('admin/tambahUser', 'Admin::tambahUser');
$routes->get('admin/editUser/(:any)', 'Admin::editUser/$1');
$routes->get('admin/deleteUser/(:any)', 'Admin::deleteUser/$1');
$routes->get('admin/tambahUser', 'Admin::tambahUser');

$routes->get('unit', 'Unit::index');
$routes->get('unit/deleteUnit/(:any)', 'Unit::deleteUnit/$1');


$routes->get('/data', 'Data::index');
$routes->get('/data/tambahData', 'Data::tambahData');
$routes->get('Data/dataBase', 'Data::dataBase');
$routes->get('data/downloadImage/(:any)', 'Data::downloadImage/$1');
$routes->get('data/downloadFile/(:any)', 'Data::downloadFile/$1');
$routes->get('data/deleteData/(:any)', 'Data::deleteData/$1');
$routes->get('data/editData/(:any)', 'Data::editData/$1');

$routes->get('pegawai', 'Pegawai::index');
$routes->get('pegawai/deletePegawai/(:any)', 'Pegawai::deletePegawai/$1');


$routes->post('auth/cekLogin', 'Auth::cekLogin');
$routes->post('Admin/dataUsers', 'Admin::dataUsers');
$routes->post('admin/tambahUser', 'Admin::tambahUser');
$routes->post('admin/editUser/(:any)', 'Admin::editUser/$1');

$routes->post('Data/dataBase', 'Data::dataBase');
$routes->post('data/simpanData', 'Data::simpanData');
$routes->post('data/updateData', 'Data::updateData');

$routes->post('Unit/dataUnit', 'Unit::dataUnit');
$routes->post('unit/tambahUnit', 'Unit::tambahUnit');
$routes->post('unit/editUnit/(:any)', 'Unit::editUnit/$1');

$routes->post('pegawai/dataPegawai', 'Pegawai::dataPegawai');
$routes->post('pegawai/tambahPegawai', 'Pegawai::tambahPegawai');
$routes->post('pegawai/editPegawai/(:any)', 'Pegawai::editPegawai/$1');



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