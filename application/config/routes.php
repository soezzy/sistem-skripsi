<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcomecontroller';
$route['signup'] = '/signupcontroller/create';
$route['signup/success/'] = 'signupcontroller/confirmemail/';
$route['dashboard'] = '/dashboardcontroller';
$route['logout'] = '/dashboardcontroller/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'WelcomeController/login';

//--------------- menu profil-mhs -------------------
$route['profil'] = 'InfomhsController';
$route['profil/edit'] = 'InfomhsController/editmhs';

//--------------- menu pengajaun-mhs -------------------
$route['pengajuan'] = 'PengajuanController';
$route['pengajuan/edit'] = 'PengajuanController/editskripsi';
$route['bimbingan'] = 'BimbinganController';
$route['status'] = 'StatusController';
$route['pesan'] = 'PesanController';
