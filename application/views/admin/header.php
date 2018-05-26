<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Manajemen Skripsi Mahasiswa</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Data Tables Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/datatables/css/dataTables.bootstrap4.min.css" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet"/>

    <!--  Text Editor     -->
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="azure" data-image="<?php echo base_url(); ?>assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li <?php if($this->uri->segment(1)=="admin"){echo 'class="active"';}?>>
                    <a href="/skripsi/admin">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
               <!--  <li <?php if($this->uri->segment(1)=="adm-profil"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-profil">
                        <i class="pe-7s-user"></i>
                        <p>Profil Pegawai</p>
                    </a>
                </li> -->
                <?php if (($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                <li <?php if($this->uri->segment(1)=="adm-pengajuan"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-pengajuan">
                        <i class="pe-7s-note2"></i>
                        <p>Pengajuan Skripsi</p>
                    </a>
                </li>   
                <?php endif ?>
                
                <?php if (($_SESSION['level'])==3 || ($_SESSION['level'])==2 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                <li <?php if($this->uri->segment(1)=="adm-bimbingan"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-bimbingan">
                        <i class="pe-7s-news-paper"></i>
                        <p>Bimbingan Skripsi</p>
                    </a>
                </li>   
                <?php endif ?>
               
                <?php if (($_SESSION['level'])==3 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                 <li <?php if($this->uri->segment(1)=="adm-validasi"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-validasi">
                        <i class="pe-7s-bookmarks"></i>
                        <p>Validasi Pengajuan</p>
                    </a>
                </li>   
                <?php endif ?>
               
                <?php if (($_SESSION['level'])==4 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                <li <?php if($this->uri->segment(1)=="adm-daftar"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-daftar">
                        <i class="pe-7s-medal"></i>
                        <p>Pendaftaran Ujian</p>
                    </a>
                </li>   
                <?php endif ?>
                
                <?php if (($_SESSION['level'])==3 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                 <li <?php if($this->uri->segment(1)=="adm-dosen"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-dosen">
                        <i class="pe-7s-users"></i>
                        <p>Manajemen Kuota</p>
                    </a>
                </li>
                <?php endif ?>
                <li <?php if($this->uri->segment(1)=="adm-pesan"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-pesan">
                        <i class="pe-7s-chat"></i>
                        <p>Pesan</p>
                    </a>
                </li>
                <?php if (($_SESSION['level'])==3 || ($_SESSION['level'])==5 && ($_SESSION['status'])=='aktif'): ?>
                <li <?php if($this->uri->segment(1)=="adm-pegawai"){echo 'class="active"';}?>>
                    <a href="/skripsi/adm-pegawai">
                        <i class="pe-7s-config"></i>
                        <p>Pengaturan Pegawai</p>
                    </a>
                </li> 
                <?php endif ?> 
                <!-- <li <?php if($this->uri->segment(1)=="status"){echo 'class="active"';}?>>
                    <a href="/skripsi/status">
                        <i class="pe-7s-graph1"></i>
                        <p>Status Skripsi</p>
                    </a>
                </li> -->
               
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php echo $title; ?></a>
                </div>
                <div class="collapse navbar-collapse">
                   

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-cog"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <p class="hidden-lg hidden-md">
                                        Pengaturan
                                        <b class="caret"></b>
                                    </p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="/skripsi/adm-profil"><i class="fa fa-user pull-right"></i>Ubah Profil</a></li>
                                <li><a href="/skripsi/adlogout"><i class="fa fa-sign-out pull-right"></i>Logout</a></li>
                              </ul>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>