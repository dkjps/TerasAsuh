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
$route['default_controller'] = 'AuthController/Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'AuthController/login';
$route['auth'] = 'AuthController/login_process';
//Admin Routes
$route['dashboard'] = 'AdminController/lihatAdmin';
$route['admin/dashboard'] = 'AdminController/lihatAdmin';
$route['admin/dashboard-data'] = 'AdminController/dashboard';
//MHS - COURSE Admin Routes
$route['admin/master/master-panitia'] = 'PanitiaController/halamanMasterPanitia';
$route['admin/master/master-panitia/daftar-panitia'] = 'PanitiaController/getDatatableMasterPanitia';
$route['admin/master/master-pelatihan'] = 'PelatihanController/halamanMasterPelatihan';
$route['admin/master/master-pelatihan/tambah-pelatihan'] = 'PelatihanController/tambahMasterPelatihan';
$route['admin/master/master-pelatihan/edit-pelatihan'] = 'PelatihanController/editMasterPelatihan';
$route['admin/master/master-pelatihan/hapus-pelatihan'] = 'PelatihanController/hapusMasterPelatihan';
$route['admin/master/master-pelatihan/daftar-pelatihan'] = 'PelatihanController/getDatatableMasterPelatihan';
$route['admin/master/master-peserta'] = 'PesertaController/halamanMasterPeserta';
$route['admin/master/master-peserta/daftar-peserta'] = 'PesertaController/getDatatableMasterPeserta';
$route['admin/master/master-kader'] = 'KaderController/halamanMasterKader';
$route['admin/master/master-kader/daftar-kader'] = 'KaderController/getDatatableMasterKader';
$route['admin/master/master-keluarga-binaan'] = 'KeluargaBinaanController/halamanMasterKeluargaBinaan';
$route['admin/master/master-keluarga-binaan/daftar-keluarga-binaan'] = 'KeluargaBinaanController/getDatatableMasterKeluargaBinaan';
$route['admin/master/master-kelas/detail-kelas/(:num)'] = 'Kelas/detailMasterPelatihan/$1';

$route['admin/pelatihan/pelatihan-panitia'] = 'PanitiaController/halamanPelatihanPanitia';
$route['admin/pelatihan/pelatihan-pretest'] = 'SoalController/halamanPelatihanPretest';
$route['admin/pelatihan/pelatihan-postest'] = 'SoalController/halamanPelatihanPostest';

$route['admin/skrining'] = 'SkriningController/halamanSkrining';

$route['admin/aktivitas'] = 'AktivitasController/halamanAktivitas';

//Operator Routes
$route['operator/dashboard'] = 'OperatorController/lihatOperator';
//MHS - COURSE Panitia Operator
$route['operator/materi'] = 'MateriController/halamanMateri';
