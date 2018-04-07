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
                    <h4 class="title">Edit Kuota Bimbingan</h4>
                </div>
                <div class="content">
                  <?php echo form_open_multipart(base_url('adm-dosen/editdosen/'.$data[0]->idpeg)); ?>
                     <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-3">
                         <div class="form-group">
                            <label>Nomor induk pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data[0]->nip; ?>">
                         </div>
                       </div>
                        <div class="col-md-6">
                         <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" id="namapeg" name="namapeg" value="<?php echo $data[0]->namapeg; ?>">
                        </div>
                       </div>
                       <div class="col-md-3">
                         <div class="form-group">
                            <label>Kuota</label>
                            <input type="text" class="form-control" id="kuota" name="kuota" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo $data[0]->kuota; ?>">
                             <span class="text-danger"><?php echo form_error('kuota'); ?></span>
                        </div>
                       </div>
                      </div>
                    </div>

                    <a href="/skripsi/adm-dosen" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
                     <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Ubah</button>
                    <div class="clearfix"></div>
                <?php echo form_close(); ?>
              </div>
          </div>
      </div>
    </div>
</div>
</div>
<script type="text/javascript">
  document.getElementById("nip").readOnly = true;
  document.getElementById("namapeg").readOnly = true;

</script>