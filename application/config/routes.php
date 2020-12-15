<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/index';
$route['auth'] = 'auth/index';
// $route['login'] = 'AuthController/login';
// $route['auth'] = 'AuthController/login_process';
//Admin Routes
$route['dashboard'] = 'AdminController/lihatAdmin';
$route['admin/dashboard'] = 'AdminController/lihatAdmin';
$route['admin/dashboard-data'] = 'AdminController/dashboard';
//MHS - COURSE Admin Routes
$route['admin/master/master-panitia'] = 'old/PanitiaController/halamanMasterPanitia';
$route['admin/master/master-panitia/daftar-panitia'] = 'old/PanitiaController/getDatatableMasterPanitia';
$route['admin/master/master-pelatihan'] = 'old/PelatihanController/halamanMasterPelatihan';
$route['admin/master/master-pelatihan/tambah-pelatihan'] = 'old/PelatihanController/tambahMasterPelatihan';
$route['admin/master/master-pelatihan/edit-pelatihan'] = 'old/PelatihanController/editMasterPelatihan';
$route['admin/master/master-pelatihan/hapus-pelatihan'] = 'old/PelatihanController/hapusMasterPelatihan';
$route['admin/master/master-pelatihan/daftar-pelatihan'] = 'old/PelatihanController/getDatatableMasterPelatihan';
$route['admin/master/master-peserta'] = 'old/PesertaController/halamanMasterPeserta';
$route['admin/master/master-peserta/daftar-peserta'] = 'old/PesertaController/getDatatableMasterPeserta';
$route['admin/master/master-kader'] = 'old/KaderController/halamanMasterKader';
$route['admin/master/master-kader/daftar-kader'] = 'old/KaderController/getDatatableMasterKader';
$route['admin/master/master-keluarga-binaan'] = 'old/KeluargaBinaanController/halamanMasterKeluargaBinaan';
$route['admin/master/master-keluarga-binaan/daftar-keluarga-binaan'] = 'old/KeluargaBinaanController/getDatatableMasterKeluargaBinaan';
$route['admin/master/master-kelas/detail-kelas/(:num)'] = 'old/Kelas/detailMasterPelatihan/$1';

$route['admin/pelatihan/pelatihan-panitia'] = 'old/PanitiaController/halamanPelatihanPanitia';
$route['admin/pelatihan/pelatihan-pretest'] = 'old/SoalController/halamanPelatihanPretest';
$route['admin/pelatihan/pelatihan-postest'] = 'old/SoalController/halamanPelatihanPostest';

$route['admin/skrining'] = 'old/SkriningController/halamanSkrining';

$route['admin/aktivitas'] = 'old/AktivitasController/halamanAktivitas';

//Operator Routes
$route['operator/dashboard'] = 'old/OperatorController/lihatOperator';
//MHS - COURSE Panitia Operator
$route['operator/materi'] = 'old/MateriController/halamanMateri';
