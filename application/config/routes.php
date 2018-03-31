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
$route['profil/edit/(:num)'] 	= 'InfomhsController/editmhs/$1';
$route['profil/update'] 		= 'infomhscontroller/update';

//--------------- menu pengajaun-mhs -------------------
$route['pengajuan'] 			= 'PengajuanController';
$route['pengajuan/edit'] 		= 'PengajuanController/editskripsi';
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
$route['adm-profil/edit/(:num)'] 		= 'AdminProfilController/editAdm/$1';
$route['adm-profil/update'] 			= 'AdminProfilController/update';

$route['adm-pengajuan'] 				= 'AdminPengajuanController';
$route['adm-pengajuan/detailskripsi'] 	= 'AdminPengajuanController/detailSkripsi';
$route['adm-pengajuan/detailpengajuan'] = 'AdminPengajuanController/detailPengajuan';
$route['adm-bimbingan'] 				= 'AdminBimbinganController';
$route['adm-bimbingan/detailbimbingan'] = 'AdminBimbinganController/detailBimbingan';
$route['adm-pesan'] 					= 'AdminPesanController';
$route['adm-pegawai'] 					= 'AdminPegawaiController';
$route['adm-dosen'] 					= 'AdminDosenController';
