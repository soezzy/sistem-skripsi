<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] 	= 'welcomecontroller';
$route['signup'] 				= '/signupcontroller/create';
$route['signup/success/'] 		= 'signupcontroller/confirmemail/';
$route['dashboard'] 			= '/dashboardcontroller';
$route['logout'] 				= '/dashboardcontroller/logout';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;
//---------------- login ---------------------------
$route['login'] 				= 'WelcomeController/login';
$route['loginadmin'] 			= 'WelcomeController/loginAdmin';

//--------------- menu profil-mhs -------------------
$route['profil'] 				= 'InfomhsController';
$route['profil/edit'] 			= 'InfomhsController/editmhs';
$route['profil/update'] 		= 'infomhscontroller/update';

//--------------- menu pengajaun-mhs -------------------
$route['pengajuan'] 			= 'PengajuanController';
$route['pengajuan/edit'] 		= 'PengajuanController/editskripsi';
$route['pengajuan/tambah'] 		= 'PengajuanController/tambah';

//--------------- menu bimbingan skripsi ----------------
$route['bimbingan'] 			= 'BimbinganController';
//--------------- menu status skripsi -----------------
$route['status'] 				= 'StatusController';
//--------------- menu pesan ------------------------- 
$route['pesan'] 				= 'PesanController';


$route['admin'] 						= 'AdminDashboardController';

$route['adlogout'] 						= '/AdminDashboardController/logout';
//--------------- menu profil admin --------------------
$route['adm-profil'] 					= 'AdminProfilController';
$route['adm-profil/edit'] 				= 'AdminProfilController/editAdm';
$route['adm-profil/update'] 			= 'AdminProfilController/update';

//--------------- menu pegawai admin -------------------
$route['adm-pegawai'] 					= 'AdminPegawaiController';
$route['adm-pegawai/detail/(:num)']     = 'AdminPegawaiController/detailpeg/$1';
$route['adm-pegawai/banuser/(:num)'] 	= 'AdminPegawaiController/banuser/$1';
$route['adm-pegawai/unbanuser/(:num)'] 	= 'AdminPegawaiController/unbanuser/$1';
$route['adm-pegawai/tambah'] 			= 'AdminPegawaiController/tambahpeg';
$route['adm-pegawai/tambahpeg'] 		= 'AdminPegawaiController/tambah';
$route['adm-pegawai/edit/(:num)'] 		= 'AdminPegawaiController/editpeg/$1';
$route['adm-pegawai/editpeg/(:num)'] 	= 'AdminPegawaiController/edit/$1';

//--------------- menu dosen admin ----------------------
$route['adm-dosen'] 					= 'AdminDosenController';
$route['adm-dosen/detail/(:num)']     	= 'AdminDosenController/detaildosen/$1';
$route['adm-dosen/edit/(:num)']     	= 'AdminDosenController/editdosen/$1';
$route['adm-dosen/editdosen/(:num)']    = 'AdminDosenController/edit/$1';

$route['adm-pengajuan'] 				= 'AdminPengajuanController';
$route['adm-pengajuan/detailskripsi'] 	= 'AdminPengajuanController/detailSkripsi';
$route['adm-pengajuan/detailpengajuan'] = 'AdminPengajuanController/detailPengajuan';
$route['adm-bimbingan'] 				= 'AdminBimbinganController';
$route['adm-bimbingan/detailbimbingan'] = 'AdminBimbinganController/detailBimbingan';
$route['adm-pesan'] 					= 'AdminPesanController';

