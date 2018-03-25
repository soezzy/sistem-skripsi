<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcomecontroller';
$route['signup'] = '/signupcontroller/create';
$route['signup/success/'] = 'signupcontroller/confirmemail/';
$route['dashboard'] = '/dashboardcontroller';
$route['logout'] = '/dashboardcontroller/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//---------------- login ---------------------------
$route['login'] = 'WelcomeController/login';
$route['loginadmin'] = 'WelcomeController/loginAdmin';

//--------------- menu profil-mhs -------------------
$route['profil'] = 'InfomhsController';
$route['profil/edit'] = 'InfomhsController/editmhs';

//--------------- menu pengajaun-mhs -------------------
$route['pengajuan'] = 'PengajuanController';
$route['pengajuan/edit'] = 'PengajuanController/editskripsi';
//--------------- menu bimbingan skripsi ----------------
$route['bimbingan'] = 'BimbinganController';
//--------------- menu status skripsi -----------------
$route['status'] = 'StatusController';
//--------------- menu pesan ------------------------- 
$route['pesan'] = 'PesanController';


$route['admin'] = 'AdminDashboardController';

$route['adlogout'] = '/AdminDashboardController/logout';
$route['adm-profil'] = 'AdminProfilController';
$route['adm-profil/edit'] = 'AdminProfilController/editAdm';
$route['adm-pengajuan'] = 'AdminPengajuanController';
$route['adm-pengajuan/detailskripsi'] = 'AdminPengajuanController/detailSkripsi';
$route['adm-pengajuan/detailpengajuan'] = 'AdminPengajuanController/detailPengajuan';