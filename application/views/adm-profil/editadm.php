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
                    <h4 class="title">Profil Pegawai</h4>
                </div>
                <div class="content">
                  <?php echo form_open_multipart(base_url('adm-profil/update')); ?>
                    <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                              <label>NIP</label>
                              <input type="text" class="form-control" id="nip" value="<?php echo $data[0]->nip; ?>">
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="form-group">
                              <label>Nama Pegawai</label>
                              <input type="text" class="form-control" id="namapeg" name="namapeg" value="<?php echo $data[0]->namapeg; ?>">
                          </div>
                        </div>
                    </div>

                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                              <label for="jeniskel">Jenis Kelamin</label>
                               <select id="jeniskel" name="jeniskel" class="form-control">

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
                        <div class="col-md-5">
                          <div class="form-group">
                              <label>Telepon</label>
                              <input type="text" class="form-control" id="telepon" name="telepon" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo $data[0]->telepon; ?>">
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo $data[0]->email; ?>">
                          </div>
                        </div>
                      </div>

                    <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Jabatan</label>
                              <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo $data[0]->jabatan; ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Pangkat</label>
                            <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo $data[0]->pangkat; ?>">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label>Golongan</label>
                              <input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo $data[0]->golongan; ?>">
                          </div>
                        </div>
                    </div>
                    <a href="/skripsi/adm-profil" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
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
</script>