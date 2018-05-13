<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
  <div class="container-fluid">
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="content">
                <?php echo form_open_multipart(base_url('pesan/tambah'),'id="FormTambah", onsubmit="return validateForm()"'); ?>
                <div class="form-group">
                  <label class="pesan">Kepada</label>
                  <input type="text" name="nik" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" placeholder="NIK DOSEN">
                </div>
                <div class="form-group">
                  <label class="pesan">Subject</label>
                  <input type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                  <label for="pesan">Balas Pesan</label>
                    <textarea name="pesan" class="form-control"></textarea>
                </div>
                <a href="<?php echo base_url('pesan');?>" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
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
  function validateForm() {
    var x = document.forms["FormTambah"]["nik"].value;
    if (x == "") {
        alert("Kolom penerima wajib diisi!");
        return false;
    }
}
      CKEDITOR.replace( 'pesan' );
</script>
