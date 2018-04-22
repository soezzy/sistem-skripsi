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
        <div class="card">
            <div class="header">
                <?php echo $this->session->flashdata('success'); ?>
                <?php echo $this->session->flashdata('error'); ?>
                <?php echo $this->session->flashdata('errorupload'); ?>
                <h4 class="title text-center">Tambah Data Pengajuan Skripsi</h4>
            </div>
            <div class="content">
                <div class="row">
                  <div class="col-md-10 col-md-offset-1">
                  <?php echo form_open_multipart(base_url('pengajuan/tambah')); ?>
                    <div class="form-group required">
                      <label for="judul" class="label">judul</label>
                      <input type="text" name="judul" id="judul" class="form-control">
                      <span class="text-danger"><?php echo form_error('judul'); ?></span> 
                    </div>
                  </div>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group required">
                      <label for="abstrak" class="label">Abstrak</label>
                          <textarea rows="5" name="abstrak" id="abstrak" class="form-control"></textarea>
                          <span class="text-danger"><?php echo form_error('abstrak'); ?></span> 
                    </div>
                  </div>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group required">
                      <label for="dospem" class="label">Dosen Pembimbing</label>
                      <select  id="dospem" name="dospem" class="form-control">
                        <?php foreach ($data as $value) {
                          echo '<option value="" disabled selected hidden>Pilih Dosen...</option>';
                          echo '<option value="'.$value->idpeg.'">'.$value->namapeg.' | Sisa kuota: '.$value->kuota.'</option>';
                        } ?>
                      </select>
                      <span class="text-danger"><?php echo form_error('dospem'); ?></span> 
                    </div>
                  </div>
                  <div class="col-md-10 col-md-offset-1">
                    <div class="form-group required">
                      <label for="fileupload" class="label">File Pengajuan</label>
                        <input type="file" name="fileupload" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <br>
                      <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Ubah</button>
                      <a class="btn btn-danger btn-fill abu" href="/skripsi/pengajuan" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
                    <br>
                  </div>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>