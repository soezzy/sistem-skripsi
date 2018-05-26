<style type="text/css">
  .abu {
    width: 120px !important;
  }
  .form-group.required .label:after {
    content:"*";
    color:red;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('error'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Pengajuan Skripsi Mahasiswa</h4>
                </div>
                <div class="content">
                  <?php 
                  if ($data != null){
                  foreach ($data as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Judul</th>
                                <td>: <?php echo $value->judul  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Abstrak</th>
                                <td>: <?php echo $value->abstrak ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dosen Pembimbing</th>
                                <td>: <?php echo $value->dospem ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status Skripsi</th>
                                <td>: <?php echo strtoupper($value->statskripsi) ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dibuat</th>
                                <td>: <?php echo date('d F Y H:i:s' ,strtotime($value->created_at)); ?></td>
                              </tr>
                            </tbody>
                        </table>
                <div class="row">
                  <div class="col-md-12">
                    <embed src="/skripsi/pdf/<?php echo $value->fileupload ?>" type="application/pdf" width="100%" height="600">
                  </div>
                </div>
                
                   <?php }
                   } ?>
              </div>
          </div>
      </div>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title text-center">Validasi</h4>
            </div>
            <div class="content">
              <?php echo form_open_multipart(base_url('adm-pengajuan/terima/'.$value->idskripsi)); ?>
                <div class="form-group required">
                  <label for="catatan" class="label">Catatan</label>
                    <textarea rows="5" name="catatan" id="catatan" class="form-control"></textarea>
                  <span class="text-danger"><?php echo form_error('catatan'); ?></span> 
                  <input type="hidden" name="idmhs" value="<?= $value->idmhs; ?>">
              </div>
              <button type="submit" rel="tooltip" class="btn btn-success pull-right btn-fill abu"><i class="fa fa-check-circle"></i>Terima</button>
              <button type="submit" rel="tooltip" formaction="<?php echo base_url('adm-pengajuan/tolak/'.$value->idskripsi);?>" class="btn btn-danger btn-fill abu"><i class="fa fa-times-circle"></i>Tolak</button>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      <div class="clearfix"></div>
  </div>
</div>
</div>
</div>