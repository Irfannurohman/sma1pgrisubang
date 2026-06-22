<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public Routes
$routes->get('/', 'Kelulusan::index');
$routes->post('proses-cek', 'Kelulusan::prosesCek');
$routes->get('cetak-kelulusan/(:any)', 'Kelulusan::cetak/$1');

$routes->get('alumni', 'Alumni::index');
$routes->post('alumni/tracking', 'Alumni::tracking');
$routes->post('alumni/update-status', 'Alumni::updateStatus');

$routes->get('tracer-study', 'TracerStudy::index');
$routes->post('tracer/simpan', 'TracerStudy::simpan');

// Auth Routes
$routes->get('login', 'Auth::index');
$routes->post('auth/loginProcess', 'Auth::loginProcess');
$routes->get('logout', 'Auth::logout');

// Admin Routes (with login filter)
$routes->group('admin', ['filter' => 'login:admin'], function($routes) {
    $routes->get('dashboard', 'Admin::dashboard');
    
    $routes->get('siswa', 'Admin::siswa');
    $routes->get('siswa/tambah', 'Admin::siswaTambah');
    $routes->post('siswa/simpan', 'Admin::siswaSimpan');
    $routes->get('siswa/edit/(:num)', 'Admin::siswaEdit/$1');
    $routes->post('siswa/update', 'Admin::siswaUpdate');
    $routes->get('siswa/hapus/(:num)', 'Admin::siswaHapus/$1');
    $routes->get('siswa/import', 'Admin::importSiswa');
    $routes->post('siswa/proses-import', 'Admin::prosesImport');
    $routes->get('siswa/template-excel', 'Admin::templateExcel');
    
    $routes->get('alumni', 'Admin::alumni');
    $routes->get('alumni/detail/(:num)', 'Admin::alumniDetail/$1');
    $routes->get('alumni/tambah', 'Admin::alumniTambah');
    $routes->post('alumni/simpan', 'Admin::alumniSimpan');
    $routes->get('alumni/edit/(:num)', 'Admin::alumniEdit/$1');
    $routes->post('alumni/update', 'Admin::alumniUpdate');
    $routes->get('alumni/hapus/(:num)', 'Admin::alumniHapus/$1');
    
    $routes->get('tracer', 'Admin::tracer');
    $routes->get('tracer/hapus/(:num)', 'Admin::tracerHapus/$1');
    
    $routes->get('laporan', 'Admin::laporan');
    $routes->get('profil', 'Admin::profil');

    // Pengaturan Kelulusan
    $routes->get('pengaturan-kelulusan', 'Admin::pengaturanKelulusan');
    $routes->post('pengaturan-kelulusan/simpan', 'Admin::simpanPengaturan');
    $routes->get('pengaturan-kelulusan/hapus/(:num)', 'Admin::hapusPengaturan/$1');

    // Keterserapan Lulusan
    $routes->get('keterserapan', 'Admin::keterserapan');
});

// Kepala Sekolah Routes (with login filter)
$routes->group('kepsek', ['filter' => 'login:kepsek'], function($routes) {
    $routes->get('dashboard', 'Kepalasekolah::dashboard');
    $routes->get('siswa', 'Kepalasekolah::siswa');
    $routes->get('alumni', 'Kepalasekolah::alumni');
    $routes->get('tracer', 'Kepalasekolah::tracer');
    $routes->get('laporan', 'Kepalasekolah::laporan');
    
    // Pengaturan Kelulusan
    $routes->get('pengaturan-kelulusan', 'Kepalasekolah::pengaturanKelulusan');
    $routes->post('pengaturan-kelulusan/simpan', 'Kepalasekolah::simpanPengaturan');
    $routes->get('pengaturan-kelulusan/hapus/(:num)', 'Kepalasekolah::hapusPengaturan/$1');

    // Keterserapan Lulusan
    $routes->get('keterserapan', 'Kepalasekolah::keterserapan');
});
