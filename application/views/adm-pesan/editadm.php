<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('error'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Pesan</h4>
                </div>
                <div class="content">
                  <?php 
                  if ($data != null){
                  foreach ($data as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Pengirim</th>
                                <td>: <?php echo $value->namamhs  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Subject</th>
                                <td>: <?php echo $value->subject ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Isi Pesan</th>
                                <td>: <?php echo $value->konten ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dibuat</th>
                                <td>: <?php echo date('d F Y H:i:s' ,strtotime($value->created_at)); ?></td>
                              </tr>
                            </tbody>
                        </table>
                
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
            <div class="content">
              <?php echo form_open_multipart(base_url('adm-pesan/balas')); ?>
              <div class="form-group">
                  <label class="pesan">Subject</label>
                  <input type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                  <label for="pesan">Balas Pesan</label>
                    <textarea name="pesan" class="form-control"></textarea>
                </div>
                
              <input type="hidden" name="idmhs" value="<?php echo $value->idmhs; ?>">
              <input type="hidden" name="idpesan" value="<?php echo $value->idpesan; ?>">
              <a href="<?php echo base_url('adm-pesan');?>" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
              <button type="submit" rel="tooltip" class="btn btn-success pull-right btn-fill abu"><i class="fa fa-edit"></i>Balas</button>
              <div class="clearfix"></div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
  </div>
</div>
</div>
</div>
<script>
      CKEDITOR.replace( 'pesan' );
</script>