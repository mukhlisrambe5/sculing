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
$routes->get('/', 'Auth::index', ['filter' => 'filterLogged']);
$routes->get('/auth', 'Auth::index', ['filter' => 'filterLogged']);
$routes->get('/auth/signout', 'Auth::signout');
$routes->get('auth/cekLogin', 'Auth::cekLogin');

$routes->get('/home', 'Home::index', ['filter' => 'filterLogin']);
// $routes->get('/home', 'Home::index', ['filter' => 'filterAdmin']);

$routes->get('/admin', 'Admin::settingUsers', ['filter' => 'filterLogin']);
$routes->get('admin/settingUsers', 'Admin::settingUsers', ['filter' => 'filterLogin']);
$routes->get('admin/dataUsers', 'Admin::dataUsers', ['filter' => 'filterLogin']);
$routes->get('Admin/dataUsers', 'Admin::dataUsers', ['filter' => 'filterLogin']);
$routes->get('admin/tambahUser', 'Admin::tambahUser', ['filter' => 'filterLogin']);
$routes->get('admin/editUser/(:any)', 'Admin::editUser/$1', ['filter' => 'filterLogin']);
$routes->get('admin/deleteUser/(:any)', 'Admin::deleteUser/$1', ['filter' => 'filterLogin']);
$routes->get('admin/tambahUser', 'Admin::tambahUser', ['filter' => 'filterLogin']);

$routes->get('unit', 'Unit::index', ['filter' => 'filterLogin']);
$routes->get('unit/deleteUnit/(:any)', 'Unit::deleteUnit/$1', ['filter' => 'filterLogin']);


// $routes->get('/data', 'Data::index', ['filter' => 'filterLogin']);
// $routes->get('/data/tambahData', 'Data::tambahData', ['filter' => 'filterLogin']);
// $routes->get('Data/dataBase', 'Data::dataBase', ['filter' => 'filterLogin']);
// $routes->get('data/downloadImage/(:any)', 'Data::downloadImage/$1', ['filter' => 'filterLogin']);
// $routes->get('data/downloadFile/(:any)', 'Data::downloadFile/$1', ['filter' => 'filterLogin']);
// $routes->get('data/deleteData/(:any)', 'Data::deleteData/$1', ['filter' => 'filterLogin']);
// $routes->get('data/editData/(:any)', 'Data::editData/$1', ['filter' => 'filterLogin']);

$routes->get('pegawai', 'Pegawai::index', ['filter' => 'filterLogin']);
$routes->get('pegawai/deletePegawai/(:any)', 'Pegawai::deletePegawai/$1', ['filter' => 'filterLogin']);
$routes->get('skill', 'Skill::index', ['filter' => 'filterLogin']);
$routes->get('skill/deleteSkill/(:any)', 'Skill::deleteSkill/$1', ['filter' => 'filterLogin']);

$routes->get('first', 'First::index', ['filter' => 'filterLogin']);

$routes->get('rolling', 'Rolling::index', ['filter' => 'filterLogin']);

$routes->get('data', 'Data::index', ['filter' => 'filterLogin']);
$routes->get('data/penempatan', 'Data::penempatan', ['filter' => 'filterLogin']);
$routes->get('data/skill', 'Data::skill', ['filter' => 'filterLogin']);
$routes->get('data/detailPenempatan', 'Data::detailPenempatan', ['filter' => 'filterLogin']);
$routes->get('data/downloadFileKep/(:any)', 'Data::downloadFileKep/$1', ['filter' => 'filterLogin']);
$routes->get('data/downloadFileSkill/(:any)', 'Data::downloadFileSkill/$1', ['filter' => 'filterLogin']);
$routes->get('data/hapus/(:any)', 'Data::hapus/$1', ['filter' => 'filterLogin']);
$routes->get('data/hapusSkill/(:any)', 'Data::hapusSkill/$1', ['filter' => 'filterLogin']);
$routes->get('data/updateDurasi', 'Data::updateDurasi', ['filter' => 'filterLogin']);

$routes->get('data/test', 'Data::test', ['filter' => 'filterLogin']);




$routes->get('boscu', 'Boscu::index', ['filter' => 'filterLogin']);
$routes->get('boscu/add', 'Boscu::add', ['filter' => 'filterLogin']);
$routes->get('boscu/edit/(:any)', 'Boscu::edit/$1', ['filter' => 'filterLogin']);
$routes->get('boscu/downloadFileBoscu/(:any)', 'Boscu::downloadFileBoscu/$1', ['filter' => 'filterLogin']);
$routes->get('boscu/hapus/(:any)', 'Boscu::hapus/$1', ['filter' => 'filterLogin']);



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
$routes->post('pegawai/tambahSkillPegawai', 'Pegawai::tambahSkillPegawai');


$routes->post('skill/dataSkill', 'Skill::dataSkill');
$routes->post('skill/tambahSkill', 'Skill::tambahSkill');
$routes->post('skill/editSkill/(:any)', 'Skill::editSkill/$1');

$routes->post('skill/rekamSkillPegawai', 'Skill::rekamSkillPegawai');
$routes->post('skill/editSkillPegawai/(:any)', 'Skill::editSkillPegawai/$1');

$routes->post('first/dataFirst', 'First::dataFirst');

$routes->post('rolling/dataRolling', 'Rolling::dataRolling');
$routes->post('rolling/rekamRolling', 'Rolling::rekamRolling');
$routes->post('rolling/updateRolling/(:any)', 'Rolling::updateRolling/$1');


$routes->post('data/dataPenempatan', 'Data::dataPenempatan');
$routes->post('data/dataSkill', 'Data::dataSkill');
$routes->post('data/dataDetailPenempatan', 'Data::dataDetailPenempatan');

$routes->post('boscu/dataBoscu', 'Boscu::dataBoscu');
$routes->post('boscu/save', 'Boscu::save');
$routes->post('boscu/update/(:any)', 'Boscu::update/$1');

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