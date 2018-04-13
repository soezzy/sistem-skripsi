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
                    <h4 class="title">Tambah Data Pegawai</h4>
                </div>
                <div class="content">
                  <?php echo form_open_multipart(base_url('adm-pegawai/tambahpeg')); ?>
                     <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-4">
                         <div class="form-group required">
                            <label class="label">Nomor induk pegawai</label>
                            <input type="text" class="form-control" oninput="this.value=this.value.replace(/[^0-9]/g,'');" id="nip" name="nip" value="<?php echo set_value('nip'); ?>">
                             <span class="text-danger"><?php echo form_error('nip'); ?></span> 
                         </div>
                       </div>
                        <div class="col-md-8">
                         <div class="form-group required">
                            <label class="label">Nama Pegawai</label>
                            <input type="text" class="form-control" id="namapeg" name="namapeg" value="<?php echo set_value('namapeg'); ?>">
                            <span class="text-danger"><?php echo form_error('namapeg'); ?></span> 
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-6">
                        <div class="form-group required">
                            <label class="label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            <span class="text-danger"><?php echo form_error('password'); ?></span> 

                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group required">
                            <label class="label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                            <span class="text-danger"><?php echo form_error('confirm_password'); ?></span> 
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                       <div class="col-md-4">
                           <div class="form-group">
                            <label for="jeniskel">Jenis Kelamin</label>
                              <select id="jeniskel" name="jeniskel" class="form-control">
                              <option value="L" selected>Laki-laki</option><option value="P">Perempuan</option>
                              </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                              <label>Level</label>
                              <select id="level" name="level" class="form-control">
                                <option value="2" selected>Dosen</option>
                                <option value="3">Kaprodi</option>
                                <option value="4">Staff Admin</option>
                              </select>
                          </div>
                          </div>
                          <div class="col-md-4">
                             <div class="form-group">
                              <label>Grup</label>
                              <select id="grup" name="grup" class="form-control">
                                <option value="dosen" selected>Dosen</option>
                                <option value="kaprodi">Kaprodi</option>
                                <option value="staff admin">Staff Admin</option>
                              </select>
                          </div>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                         <div class="form-group required">
                              <label class="label">Telepon</label>
                              <input type="text" class="form-control" id="telepon" name="telepon" oninput="this.value=this.value.replace(/[^0-9]/g,'');" value="<?php echo set_value('telepon'); ?>">
                              <span class="text-danger"><?php echo form_error('telepon'); ?></span> 
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                         <div class="form-group required">
                              <label class="label">Email</label>
                              <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
                              <span class="text-danger"><?php echo form_error('email'); ?></span> 
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <div class="form-group">
                              <label>Jabatan</label>
                              <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?php echo set_value('jabatan'); ?>">
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <div class="form-group">
                            <label>Pangkat</label>
                            <input type="text" class="form-control" id="pangkat" name="pangkat" value="<?php echo set_value('pangkat'); ?>">
                          </div>
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                          <div class="form-group">
                              <label>Golongan</label>
                              <input type="text" class="form-control" id="golongan" name="golongan" value="<?php echo set_value('golongan'); ?>">
                          </div>
                      </div>
                    </div>

                    <a href="/skripsi/adm-pegawai" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
                     <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Tambah</button>
                    <div class="clearfix"></div>
                <?php echo form_close(); ?>
              </div>
          </div>
      </div>
    </div>
</div>
</div>