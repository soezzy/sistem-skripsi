<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Detail Dosen</h4>
                </div>
                <div class="content">
                  <div class="row">
                    
                  <?php 
                  foreach ($data as $value) { ?>
                  <div class="col-md-3 col-md-offset-1">
                    <p style="line-height: 2.5;">NIP</p>
                    <p style="line-height: 2.5;">Nama Pegawai</p>
                    <p style="line-height: 2.5;">Email</p>
                    <p style="line-height: 2.5;">Jenis Kelamin</p>
                    <p style="line-height: 2.5;">Jabatan</p>
                    <p style="line-height: 2.5;">Pangkat</p>
                    <p style="line-height: 2.5;">Golongan</p>
                    <p style="line-height: 2.5;">Kelompok</p>
                    <p style="line-height: 2.5;">Telepon</p>
                  </div>
                  <div class="col-md-7">
                    <div class="typo-line">
                          <p style="line-height: 2.5;">: <?php echo $value->nip ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->namapeg ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->email ?></p>
                          <?php 
                          if ($value->jeniskel=="L") {
                            echo '<p style="line-height: 2.5;">: Laki-laki</p>';
                          }else if ($value->jeniskel=="P"){
                            echo '<p style="line-height: 2.5;">: Perempuan</p>';
                          }else{
                            echo '<p style="line-height: 2.5;">: </p>';
                          }
                           ?>
                          <p style="line-height: 2.5;">: <?php echo $value->jabatan ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->pangkat ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->golongan ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->kelompok ?></p>
                          <p style="line-height: 2.5;">: <?php echo $value->telepon ?></p>
                      </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                      <a href="/skripsi/adm-dosen" class="btn btn-fill btn-danger pull-right abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
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
</div>