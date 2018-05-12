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
$route['bimbingan'] 					= 'BimbinganController/revisi';
$route['bimbingan/upload/(:num)'] 		= 'BimbinganController/tambah/$1';

//--------------- menu status skripsi -----------------
$route['status'] 				= 'StatusController';
//--------------- menu pesan ------------------------- 
$route['pesan'] 				= 'PesanController';
$route['pesan/detail/(:num)'] 	= 'PesanController/DetailPesan/$1';
$route['pesan/balas'] 			= 'PesanController/BalasPesan';

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

//--------------- menu pengajuan skripsi admin ---------------

$route['adm-pengajuan'] 				= 'AdminPengajuanController';
$route['adm-pengajuan/detailskripsi'] 	= 'AdminPengajuanController/detailSkripsi';
$route['adm-pengajuan/detailpengajuan'] = 'AdminPengajuanController/detailPengajuan';
$route['adm-pengajuan/detail/(:num)']   = 'AdminPengajuanController/detail/$1';
$route['adm-pengajuan/tolak/(:num)']   	= 'AdminPengajuanController/tolakskripsi/$1';
$route['adm-pengajuan/terima/(:num)']   = 'AdminPengajuanController/terimaskripsi/$1';

//--------------- menu validasi skripsi admin ---------------

$route['adm-validasi'] 					= 'AdminvalidasiController';
$route['adm-validasi/detailskripsi'] 	= 'AdminvalidasiController/detailSkripsi';
$route['adm-validasi/detailvalidasi'] 	= 'AdminvalidasiController/detailvalidasi';
$route['adm-validasi/detail/(:num)']   	= 'AdminvalidasiController/detail/$1';
$route['adm-validasi/tolak/(:num)']   	= 'AdminvalidasiController/tolakskripsi/$1';
$route['adm-validasi/terima/(:num)']   	= 'AdminvalidasiController/terimaskripsi/$1';

//--------------- menu dosen admin ----------------------
$route['adm-dosen'] 					= 'AdminDosenController';
$route['adm-dosen/detail/(:num)']     	= 'AdminDosenController/detaildosen/$1';
$route['adm-dosen/edit/(:num)']     	= 'AdminDosenController/editdosen/$1';
$route['adm-dosen/editdosen/(:num)']    = 'AdminDosenController/edit/$1';

//--------------- menu bimbingan admin -------------------
$route['adm-bimbingan'] 				= 'AdminBimbinganController';
$route['adm-bimbingan/detail/(:num)']  	= 'AdminBimbinganController/detailBimbingan/$1';
$route['adm-bimbingan/proposal/(:num)'] = 'AdminBimbinganController/ujiprop/$1';
$route['adm-bimbingan/skripsi/(:num)'] 	= 'AdminBimbinganController/ujiskrip/$1';

//--------------- menu daftar pengajuan proposal dan skripsi -----
$route['adm-daftar'] 						= 'AdminPendaftaranController';
$route['adm-daftar/penguji/(:num)'] 		= 'AdminPendaftaranController/tambahpenguji/$1';
$route['adm-daftar/proposal/(:num)/(:num)'] = 'AdminPendaftaranController/validasi/$1/$2';
$route['adm-daftar/skripsi/(:num)/(:num)'] 	= 'AdminPendaftaranController/validasiskripsi/$1/$2';
$route['adm-daftar/update'] 				= 'AdminPendaftaranController/updatepenguji';


//---------------- menu pesan admin -----------------------
$route['adm-pesan'] 				= 'AdminPesanController';
$route['adm-pesan/detail/(:num)'] 	= 'AdminPesanController/DetailPesan/$1';
$route['adm-pesan/balas'] 			= 'AdminPesanController/BalasPesan';

