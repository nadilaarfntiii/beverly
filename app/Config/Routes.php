<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->setAutoRoute(true);
 
$routes->get('/', 'Home::index');
/* $routes->get('/register', 'Home::registrasi'); */
$routes->get('/validasi','Home::validasi'); 
$routes->get('/logout_ac', 'Home::logout_ac');
/* $routes->get('/dashboard_k', 'Home::dashboard_k', ['filter' => 'auth_login']); // Login ke Dashboard Keuangan
$routes->get('/dashboard_g', 'Home::dashboard_g', ['filter' => 'auth_login']); // Login ke Dashboard Gudang
$routes->get('/dashboard_p', 'Home::dashboard_p', ['filter' => 'auth_login']); // Login ke Dashboard Produksi
$routes->get('/dashboard_h', 'Home::dashboard_h', ['filter' => 'auth_login']); // Login ke Dashboard HR Personalia */


$routes->get('/dashboard_k', 'Home::dashboard_k'); // Dashboard Keuangan
$routes->get('/dashboard_g', 'Home::dashboard_g'); // Dashboard Gudang
$routes->get('/dashboard_p', 'Home::dashboard_p'); // Dashboard Produksi
$routes->get('/dashboard_h', 'Home::dashboard_h');

$routes->get('/dt_user','Home::dt_user'); 
$routes->get('/modal_awal', 'Home::modal');

//pendapatan
$routes->get('keuangan/pendapatan','Pendapatan::index'); 
$routes->get('keuangan/pendapatan','Pendapatan::pendapatan'); 
$routes->get('keuangan/pendapatan/create', 'Pendapatan::create'); // Rute untuk menampilkan form tambah pendapatan
$routes->post('keuangan/pendapatan/store', 'Pendapatan::store');
$routes->get('keuangan/pendapatan/ubah/(:num)', 'Pendapatan::ubah/$1'); // ubah pendapatan
$routes->post('keuangan/pendapatan/update/(:num)', 'Pendapatan::update/$1');
$routes->delete('keuangan/pendapatan/delete/(:num)', 'Pendapatan::delete/$1'); // hapus pendapatan

//pengeluaran
$routes->get('keuangan/pengeluaran','Pengeluaran::index'); 
$routes->get('keuangan/pengeluaran','Pengeluaran::pengeluaran'); 
$routes->get('keuangan/pengeluaran/create', 'Pengeluaran::create'); // Rute untuk menampilkan form tambah pengeluaran
$routes->post('keuangan/pengeluaran/store', 'Pengeluaran::store');
$routes->get('keuangan/pengeluaran/ubah/(:num)', 'Pengeluaran::ubah/$1'); // Rute ini mengarah ke method ubah pada kontroler pengeluaran
$routes->post('keuangan/pengeluaran/update/(:num)', 'Pengeluaran::update/$1');
$routes->delete('keuangan/pengeluaran/delete/(:num)', 'Pengeluaran::delete/$1');

//kategori
$routes->get('keuangan/kategori','Kategori::index'); 
$routes->get('keuangan/kategori','Kategori::kategori'); 
$routes->get('keuangan/kategori/create', 'Kategori::create'); 
$routes->post('keuangan/kategori/store', 'Kategori::store');
$routes->get('keuangan/kategori/ubah/(:num)', 'Kategori::ubah/$1');
$routes->post('keuangan/kategori/update/(:num)', 'Kategori::update/$1');
$routes->delete('keuangan/kategori/delete/(:num)', 'Kategori::delete/$1');

//permintaan tertunda
$routes->get('/permintaan_tertunda', 'PermintaanTertunda::index');

//gudang
$routes->get('keuangan/permintaan_gudang', 'UnitGudang::index');
$routes->get('/permintaan_gudang', 'UnitGudang::index');
$routes->get('/unitgudang', 'UnitGudang::index');
$routes->get('/unitgudang/disetujui/(:num)', 'UnitGudang::disetujui/$1');
$routes->get('/unitgudang/ditolak/(:num)', 'UnitGudang::ditolak/$1');

//hr personalia
$routes->get('keuangan/permintaan_hr', 'UnitHRPersonalia::index');
$routes->get('/permintaan_hr', 'UnitHRPersonalia::index'); 
$routes->get('/unit_hr', 'UnitHRPersonalia::index');
$routes->get('/unit_hr/disetujui/(:any)', 'UnitHRPersonalia::disetujui/$1');
$routes->get('/unit_hr/ditolak/(:any)', 'UnitHRPersonalia::ditolak/$1');

//modal awal
$routes->get('/modal_awal', 'Keuangan::index');
$routes->post('/modal/store', 'Keuangan::store');

//laporan pendapatan
$routes->get('laporan/pendapatan', 'Laporan::pendapatan');
$routes->get('laporan/pendapatan/createLaporanPend', 'Laporan::createLaporanPend');
$routes->post('laporan/pendapatan/laporan_pendapatan', 'Laporan::laporan_pendapatan');
$routes->post('laporan/pendapatan/cetak_pend', 'Laporan::cetak_pendapatan');

// laporan pengeluaran
$routes->get('laporan/pengeluaran', 'Laporan::pengeluaran');
$routes->get('laporan/pengeluaran/createLaporanPeng', 'Laporan::createLaporanPeng');
$routes->post('laporan/pengeluaran/laporan_pengeluaran', 'Laporan::laporan_pengeluaran');
$routes->post('laporan/pengeluaran/cetak_peng', 'Laporan::cetak_pengeluaran');

// stok
$routes->get('/stok','Stok::index');
$routes->get('/stok/create','Stok::create');
$routes->post('/stok/store','Stok::store');
$routes->get('/stok/edit/(:any)','Stok::edit/$1');
$routes->post('/stok/edit/(:any)','Stok::update/$1');
$routes->get('/stok/delete/(:any)','Stok::destroy/$1');
$routes->get('/stok/laporan', 'Stok::laporan');

// Barang Masuk
$routes->get('/barang_masuk','Masuk::index');
$routes->get('/barang_masuk/create','Masuk::create');
$routes->post('/barang_masuk/store','Masuk::store');
$routes->get('/barang_masuk/edit/(:any)','Masuk::edit/$1');
$routes->post('/barang_masuk/edit/(:any)','Masuk::update/$1');
$routes->get('/barang_masuk/delete/(:any)','Masuk::destroy/$1');

// Barang Keluar
$routes->get('/barang_keluar','Keluar::index');
$routes->get('/barang_keluar/create','Keluar::create');
$routes->post('/barang_keluar/store','Keluar::store');
$routes->get('/barang_keluar/edit/(:any)','Keluar::edit/$1');
$routes->post('/barang_keluar/edit/(:any)','Keluar::update/$1');
$routes->get('/barang_keluar/delete/(:any)','Keluar::destroy/$1');

// pembelian
$routes->get('/pembelian','Pembelian::index');
$routes->get('/pembelian/create','Pembelian::create');
$routes->post('/pembelian/store','Pembelian::store');
$routes->get('/pembelian/success','Pembelian::success');
$routes->get('/pembelian/edit/(:any)','Pembelian::edit/$1');
$routes->post('/pembelian/edit/(:any)','Pembelian::update/$1');
$routes->get('/pembelian/delete/(:any)','Pembelian::destroy/$1');

// laporan stok
$routes->get('laporan/stok', 'Laporan::stok');
$routes->get('laporan/stok/cetak', 'Laporan::stok_cetak');

// laporan barang masuk
$routes->get('/laporan/barang_masuk', 'Laporan::barang_masuk');
$routes->get('/laporan/barang_masuk/cetak', 'Laporan::barang_masuk_cetak');

// laporan barang keluar
$routes->get('/laporan/barang_keluar', 'Laporan::barang_keluar');
$routes->get('/laporan/barang_keluar/cetak', 'Laporan::barang_keluar_cetak');

// laporan pembelian
$routes->get('/laporan/pembelian', 'Laporan::pembelian');
$routes->get('/laporan/pembelian/cetak', 'Laporan::pembelian_cetak');

// laporan produksi
$routes->post('/laporan/Laporan', 'Laporan::laporan_produksi');
$routes->post('/laporan/cetak', 'Laporan::cetak_produksi');
$routes->post('/laporan/laporanPengajuan', 'Laporan::laporan_pengajuan');
$routes->post('/laporan/cetakPengajuan', 'Laporan::cetak_pengajuan');
$routes->post('/laporan/laporanMasuk', 'Laporan::laporan_masuk');
$routes->post('/laporan/cetakMasuk', 'Laporan::cetak_masuk');
$routes->post('/laporan/laporanStok', 'Laporan::laporan_stok');
$routes->post('/laporan/cetakStok', 'Laporan::cetak_stok');

// pengajuan produksi
$routes->get('pengajuan/pengajuan', 'Pengajuan::index');
$routes->get('Pengajuan/create', 'Pengajuan::create');
$routes->post('pengajuan/store', 'Pengajuan::store');

// stokmasuk produksi
$routes->get('stokMasuk/stokMasuk', 'stokMasuk::index');
$routes->get('stokMasuk/create', 'stokMasuk::create');
$routes->post('stokMasuk/store', 'stokMasuk::store');

// stok real produksi
$routes->get('stok_real', 'Stokk::stok_real');

// produksi
$routes->get('produksi', 'produksi::index');
$routes->get('produksiKaryawan', 'produksi::produksiKaryawan'); 
$routes->get('produksi/create', 'produksi::create');
$routes->post('produksi/store', 'produksi::store');
$routes->get('produksi/edit/(:num)', 'produksi::edit/$1');
$routes->post('produksi/update/(:num)', 'produksi::update/$1');
$routes->delete('produksi/delete/(:num)', 'produksi::delete/$1');

// karyawan
$routes->get('karyawan', 'karyawan::index');
$routes->get('karyawan/create', 'karyawan::create');
$routes->post('karyawan/store', 'karyawan::store');
$routes->get('karyawan/edit/(:num)', 'karyawan::edit/$1');
$routes->post('karyawan/update/(:num)', 'karyawan::update/$1');
$routes->delete('karyawan/delete/(:num)', 'karyawan::delete/$1');
$routes->post('/karyawan/Laporan', 'karyawan::Laporan');
$routes->post('/karyawan/cetak', 'karyawan::cetak');

// Kehadiran
$routes->get('kehadiran', 'kehadiran::index');
$routes->get('kehadiran/create', 'kehadiran::create');
$routes->post('kehadiran/store', 'kehadiran::store');
$routes->get('kehadiran/edit/(:num)', 'kehadiran::edit/$1');
$routes->post('kehadiran/update/(:num)', 'kehadiran::update/$1');
$routes->delete('kehadiran/delete/(:num)', 'kehadiran::delete/$1');
$routes->post('/kehadiran/Laporan', 'kehadiran::Laporan');
$routes->post('/kehadiran/cetak', 'kehadiran::cetak');

// Penggajian
$routes->get('penggajian', 'penggajian::index');
$routes->get('penggajian/create', 'penggajian::create');
$routes->post('penggajian/store', 'penggajian::store');
$routes->get('penggajian/edit/(:num)', 'penggajian::edit/$1');
$routes->post('penggajian/update/(:num)', 'penggajian::update/$1');
$routes->delete('penggajian/delete/(:num)', 'penggajian::delete/$1');
$routes->post('/penggajian/Laporan', 'penggajian::Laporan');
$routes->post('/penggajian/cetak', 'penggajian::cetak');
