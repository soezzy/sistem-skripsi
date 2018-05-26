<style type="text/css">
  .abu {
    width: 120px !important;
  }
  textarea {
    resize: none;
}
</style>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="header">
          <h4 class="title text-center">Validasi Ujian Proposal</h4>
        </div>
        <div class="content">
          <?php echo form_open_multipart(base_url('adm-daftar/proposal/'.$data['idm'].'/'.$data['ids'])); ?>
            <div class="form-group required">
              <label for="catatan" class="label">Catatan</label>
              <textarea rows="5" name="catatan" id="catatan" class="form-control" resize="false"></textarea>
            </div>
            <button type="submit" rel="tooltip" class="btn btn-success pull-right btn-fill abu"><i class="fa fa-check-circle"></i>Terima</button>
            <a href="/skripsi/adm-daftar" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
          <?php echo form_close(); ?>
        </div>
      </div>
    </div>
      <div class="clearfix"></div>
  </div>
</div>
