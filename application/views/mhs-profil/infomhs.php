<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('sukses'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Profil Mahasiswa</h4>
                </div>
                <div class="content">
                  <div class="row">
                  <?php 
                  foreach ($data as $value) { ?>
                  <div class="col-md-3 col-md-offset-1">
                    <p style="line-height: 2.5;">NIM</p>
                    <p style="line-height: 2.5;">Nama Mahasiswa</p>
                    <p style="line-height: 2.5;">Jenis Kelamin</p>
                    <p style="line-height: 2.5;">Email</p>
                    <p style="line-height: 2.5;">Jurusan</p>
                    <p style="line-height: 2.5;">Angkatan</p>
                    <p style="line-height: 2.5;">No. Telepon</p>
                    <p style="line-height: 2.5;">Alamat</p>
                  </div>
                  <div class="col-md-7">
                    <div class="typo-line">
                          <p style="line-height: 2.5;">: <?php echo $value->nim ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->namamhs ?></p>
                           <?php 
                          if ($value->jeniskel=="L") {
                            echo '<p style="line-height: 2.5;">: Laki-laki</p>';
                          }else if($value->jeniskel=="P"){
                            echo '<p style="line-height: 2.5;">: Perempuan</p>';
                          }else{
                            echo '<p style="line-height: 2.5;">:</p>';
                          }
                           ?>
                          <p style="line-height: 2.5;">: <?php echo $value->email ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->jurusan ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->angkatan ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->telepon ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->alamat ?></p>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                    <?php if ($this->session->userdata('logged_in')) { ?>
                      <a class="btn btn-warning btn-fill pull-right abu"  href="<?php echo base_url('profil/edit'); ?>" role="button"><i class="fa fa-pencil-square-o"></i>Ubah</a>
                    <?php } ?>
                  </div>
                <div class="clearfix"></div>
                </div>
                   <?php } ?>
               
              </div>
          </div>
      </div>
    </div>
</div>
</div>