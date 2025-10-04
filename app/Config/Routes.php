<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('auth/process', 'AuthController::process');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->get('/anggota', 'AnggotaController::index', ['filter' => 'auth']);

$routes->get('/anggota/tambah', 'AnggotaController::tambah', ['filter' => 'auth']);
$routes->post('/anggota/simpan', 'AnggotaController::simpan', ['filter' => 'auth']);
$routes->get('/anggota/edit/(:num)', 'AnggotaController::edit/$1', ['filter' => 'auth']);
$routes->post('/anggota/update/(:num)', 'AnggotaController::update/$1', ['filter' => 'auth']);
$routes->get('/anggota/hapus/(:num)', 'AnggotaController::hapus/$1', ['filter' => 'auth']);

$routes->get('/komponen-gaji', 'KomponenGajiController::index', ['filter' => 'auth']);
$routes->get('/komponen-gaji/tambah', 'KomponenGajiController::tambah', ['filter' => 'auth']);
$routes->post('/komponen-gaji/simpan', 'KomponenGajiController::simpan', ['filter' => 'auth']);
$routes->get('/komponen-gaji/edit/(:num)', 'KomponenGajiController::edit/$1', ['filter' => 'auth']);
$routes->post('/komponen-gaji/update/(:num)', 'KomponenGajiController::update/$1', ['filter' => 'auth']);
$routes->get('/komponen-gaji/hapus/(:num)', 'KomponenGajiController::hapus/$1', ['filter' => 'auth']);

$routes->get('/penggajian', 'PenggajianController::index', ['filter' => 'auth']);
$routes->get('/penggajian/tambah', 'PenggajianController::tambah', ['filter' => 'auth']);
$routes->post('/penggajian/simpan', 'PenggajianController::simpan', ['filter' => 'auth']);
$routes->get('/penggajian/edit/(:num)', 'PenggajianController::edit/$1', ['filter' => 'auth']);
$routes->post('/penggajian/update/(:num)', 'PenggajianController::update/$1', ['filter' => 'auth']);
$routes->get('/penggajian/hapus-semua/(:num)', 'PenggajianController::hapusSemua/$1', ['filter' => 'auth']);
$routes->get('/penggajian/detail/(:num)', 'PenggajianController::detail/$1', ['filter' => 'auth']);

$routes->get('/public/anggota', 'PublicController::anggota');
$routes->get('/public/penggajian', 'PublicController::penggajian');