<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('success'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Tambahkan Penguji</h4>
                </div>
                <div class="content">
                  <?php 
                  foreach ($data['datamhs'] as $value) { ?>
                   <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">NIM</th>
                                <td>: <?php echo $value->nim  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Nama Mahasiswa</th>
                                <td>: <?php echo $value->namamhs ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Jenis Kelamin</th>
                                <td><?php 
                                        if ($value->jeniskel=="L") {
                                          echo ': Laki-laki';
                                        }else if($value->jeniskel=="P"){
                                          echo ': Perempuan';
                                        }else{
                                          echo ':';
                                        }?>
                                </td>
                              </tr>
                              <tr>
                                <th width="17%">Email</th>
                                <td>: <?php echo $value->email ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Jurusan</th>
                                <td>: <?php echo $value->jurusan ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Angkatan</th>
                                <td>: <?php echo $value->angkatan ?></td>
                              </tr>
                              <tr>
                                <th width="17%">No.Telepon</th>
                                <td>: <?php echo $value->telepon ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Alamat</th>
                                <td>: <?php echo $value->alamat ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dosen Pembimbing</th>
                                <td>: <?php echo $value->dospem ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Penguji 1</th>
                                <td>: <?php echo $value->penguji1 ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Penguji 2</th>
                                <td>: <?php echo $value->penguji2 ?></td>
                              </tr>
                            </tbody>
                        </table>
              <?php echo form_open_multipart(base_url('adm-daftar/penguji/'.$data['datamhs'][0]->idmhs)); ?>
                <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="penguji1" class="label">Dosen Penguji 1</label>
                          <select  id="penguji1" name="penguji1" class="form-control">
                            <?php foreach ($data['datapenguji'] as $value) {
                              echo '<option value="" disabled selected hidden>Pilih Penguji</option>';
                              echo '<option value="'.$value->idpeg.'">'.$value->namapeg.'</option>';
                            } ?>
                          </select>
                          <span class="text-danger"><?php echo form_error('penguji1'); ?></span> 
                          <input type="hidden" name="idskripsi" value="<?php echo $data['datamhs'][0]->idskripsi; ?>">
                    </div>
                  <?php if ($data['datamhs'][0]->stat > 5): ?>
                    <div class="form-group">
                        <label for="penguji2" class="label">Dosen Penguji 2</label>
                          <select  id="penguji2" name="penguji2" class="form-control">
                            <?php foreach ($data['datapenguji'] as $value) {
                              echo '<option value="" disabled selected hidden>Pilih Penguji</option>';
                              echo '<option value="'.$value->idpeg.'">'.$value->namapeg.'</option>';
                            } ?>
                          </select>
                        <span class="text-danger"><?php echo form_error('penguji2'); ?></span> 
                    </div>
                  <?php endif ?>
                    
                      <a href="/skripsi/adm-daftar" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
                      <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-check"></i>Simpan</button>
                    <div class="clearfix"></div>
                  </div>
                </div>
                <?php echo form_close(); ?>

                
                </div>
                   <?php } ?>
               
              </div>
          </div>
      </div>
    </div>
</div>
</div>