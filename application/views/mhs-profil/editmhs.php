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
                    <h4 class="title">Profil Mahasiswa</h4>
                </div>
                <div class="content">
            <?php echo form_open_multipart(base_url('profil/update')); ?>
                      <div class="row">
                          <div class="col-md-5">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" disabled value="<?php echo $data[0]->nim; ?>">
                            </div>
                          </div>
                          <div class="col-md-7">
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" id="namamhs" name="namamhs" class="form-control" value="<?php echo $data[0]->namamhs; ?>">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jeniskel">Jenis Kelamin</label>
                                 <select id="jeniskel" name="jeniskel" class="form-control" id="jeniskel">

                                  <?php 
                                  switch ($data[0]->jeniskel) {
                                    case "L":
                                      echo "<option selected>Laki-laki</option><option>Perempuan</option>";
                                        break;
                                    case "P":
                                      echo "<option>Laki-laki</option><option selected>Perempuan</option>";
                                        break;
                                    default:
                                        echo "<option>Laki-laki</option><option>Perempuan</option>";
                                    }

                                   ?>
                                </select>
                            </div>
                          </div>
                           <div class="col-md-8">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $data[0]->email; ?>">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Jurusan</label>
                                <select  id="jurusan" name="jurusan" class="form-control">
                                  <?php if ($data[0]->jurusan == 'informatika') { ?>
                                    <option value="informatika">Informatika</option>
                                  <?php } else { ?>
                                    <option value="" disabled selected hidden>Pilih Jurusan...</option>
                                    <option value="informatika">Informatika</option>
                                  <?php } ?>
                                </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Angkatan</label>
                              <input type="text" id="angkatan" name="angkatan" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" value="<?php echo $data[0]->angkatan; ?>">
                              <span class="text-danger"><?php echo form_error('angkatan'); ?></span> 
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" id="telepon" name="telepon" oninput="this.value=this.value.replace(/[^0-9]/g,'');" class="form-control" value="<?php echo $data[0]->telepon; ?>">
                              <span class="text-danger"><?php echo form_error('telepon'); ?></span> 
                            </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Alamat</label>
                              <input type="text" id="alamat" name="alamat" class="form-control" value="<?php echo $data[0]->alamat; ?>">
                            </div>
                          </div>
                      </div>
                      <a href="/skripsi/profil" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
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
  document.getElementById("nim").readOnly = true;
</script>

