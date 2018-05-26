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
          <?php echo $this->session->flashdata('error'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Pengajuan Skripsi Mahasiswa</h4>
                </div>
                <div class="content">
                  <?php 
                  if ($data != FALSE){
                  foreach ($data as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Judul</th>
                                <td> <?php echo $value->judul  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Abstrak</th>
                                <td> <?php echo $value->abstrak ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dosen Pembimbing</th>
                                <td> <?php echo $value->dospem ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Penguji 1</th>
                                <td> <?php echo $value->penguji1 ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Penguji 2</th>
                                <td> <?php echo $value->penguji2 ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status Skripsi</th>
                                <td> <?php echo strtoupper($value->statskripsi) ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dibuat</th>
                                <td> <?php echo $value->created_at ?></td>
                              </tr>
                            </tbody>
                        </table>
                <div class="row">
                  <div class="col-md-12">
                    <embed src="./pdf/<?php echo $value->fileupload ?>" type="application/pdf" width="100%" height="600">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                    <?php if ($this->session->userdata('logged_in')) { 
                          if ($value->stat=="3") {?>
                      <a class="btn btn-warning btn-fill pull-right abu"  href="<?php echo base_url('pengajuan/edit'); ?>" role="button"><i class="fa fa-pencil-square-o"></i>Ubah</a>
                    <?php }
                  } ?>
                  </div>
                <div class="clearfix"></div>
                </div>
                   <?php }
                   } else { ?>
                   <div class="alert alert-danger text-center">Anda belum memiliki data pengajuan skripsi. Silahkan mengajukan skripsi anda <a href="<?php echo base_url('pengajuan/edit'); ?>">disini</a></div>
                  <?php } ?>
               
              </div>
          </div>
      </div>
    </div>
</div>
</div>