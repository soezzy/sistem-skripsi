<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>/skripsi/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php echo base_url(); ?>/favicon.ico" type="image/x-icon">
  <title>Sistem Informasi Skripsi</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>src/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet" href="<?php echo base_url(); ?>src/css/custom.css">
    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg fixed-top">
      <a class="navbar-brand" href="/skripsi" class="navbar-brand">Universitas Muhammadiyah Sidoarjo</a>
      <button class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav ml-auto align-items-start">
            <a href="#login" class="btn btn-outline-primary">Log In</a>
            <a href="/skripsi/signup" class="btn btn-primary navbar-btn">Sign Up</a>
          </div>
        </div>
    </nav>
  </header>

	 <div class="jumbotron">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
          	<img id="logo" src="src/img/logo.png" width="180px" height="170px">
            <h1>SISTEM SKRIPSI MAHASISWA</h1>
          </div>
        </div>
      </div>
     </div>
     	<section id="login">
	      <div class="container">
          <!-- login mahasiswa -->
	        <div class="row justify-content-md-center"> 
	          <div class="col-md-6 text-center">
             <?php echo $this->session->flashdata('error'); ?>
             <?php echo $this->session->flashdata('login_msg'); ?>
	            <h2>Login</h2>
	  			    <?php echo form_open('login'); ?>
              <div class="form-group">
                <br>
                <input type="text" oninput="this.value=this.value.replace(/[^0-9]/g,'');" name="login_nim" placeholder="Nomor Induk Mahasiswa" id="login_nim" class="form-control">
                <span class="text-danger"><?php echo form_error('login_nim'); ?></span> 
              </div>
              <div class="form-group">
                <br>
                <input type="password" name="login_password" placeholder="Password" id="login_password" class="form-control">
                <span class="text-danger"><?php echo form_error('login_password'); ?></span> 
              </div>
              <div class="form-group">
                <button type="submit" class="submit btn btn-primary">Submit</button>
              </div>
          <?php echo form_close(); ?>
	  	  </div>
	     </div>
       <p class="col-md-12 text-center"><b>ATAU</b></p>
       <!-- login admin -->
        <div class="row justify-content-md-center">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginadmin">
            Log in sebagai admin
          </button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="loginadmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Log in Admin</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                   <?php echo form_open('loginadmin'); ?>
                    <div class="form-group">
                      <br>
                      <input type="text" name="email_admin" placeholder="NIP" id="email_admin" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="password" name="pass_admin" placeholder="Password" id="pass_admin" class="form-control">
                  </div>
                     <div class="form-group">
                      <button type="submit" class="submit btn btn-primary" style="margin-left: 10rem;">Submit</button>
                    </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
       </div>
	    </div>
	   </section>
     
	 <section class="footer">
    <div class="copyrights">
          <div class="row">
            <div class="col-md-12 text-center">
              <p>&copy; <script>document.write(new Date().getFullYear())</script> Universitas Muhammadiyah Sidoarjo | Teknik Informatika. All rights reserved.</p>
            </div>
          </div>
      </div>
      </section>
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"> </script>
    <script src="<?php echo base_url(); ?>src/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>src/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url(); ?>src/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>src/js/front.js"></script>
</body>
</html>