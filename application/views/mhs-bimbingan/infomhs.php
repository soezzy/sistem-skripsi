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
                  <h4 class="title text-center">Bimbingan Skripsi Mahasiswa</h4>
                </div>
                <div class="content">
                  <?php 
                  if ($data['query1'] != NULL){
                  foreach ($data['query1'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Nama Dosen</th>
                                <td>: <?php echo $value->judul  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Abstrak</th>
                                <td>: <?php echo $value->abstrak ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Dosen Pembimbing</th>
                                <td>: <?php echo $value->statskripsi ?></td>
                              </tr>

                            </tbody>
                        </table>

                <?php 
                echo form_open_multipart(base_url('bimbingan/upload/'.$value->idmhs)); ?>
                <div class="form-group">
                  <label>Upload file</label>
                  <input type="file" name="fileupload" />
                </div>
                <button type="submit" class="btn btn-success btn-fill pull-right abu" style="margin-bottom: 1rem;"><i class="fa fa-edit"></i>Simpan</button>
                <div class="clearfix"></div>
                <?php echo form_close(); ?>

                <div class="row">
                  <div class="col-md-12">
                    <embed src="./pdf/<?php echo $value->fileupload ?>" type="application/pdf" width="100%" height="600">
                  </div>
                </div>
                   <?php }
                   } else { ?>
                   <div class="alert alert-danger text-center">Anda belum memiliki data skripsi yang sudah diterima. Tunggu sampai ada pemberitahuan lebih lanjut.</div>
                  <?php } ?>
               
              </div>
          </div>
<!--<<<<<<<<<<<<<<<<<<<  file mahasiswa  >>>>>>>>>>>>>>>>>>-->
  <?php if ($data['query2']!=NULL): ?>
     <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="title text-center">Revisi Dosen Pembimbing</h4>
                </div>
                <div class="content">
                  <?php foreach ($data['query2'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Nama Dosen</th>
                                <td>: <?php echo $value->namapeg  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Catatan</th>
                                <td>: <?php echo $value->catatan  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status</th>
                                <td>
                                    <?php if ($value->statbimbingan==0) {
                                      echo strtoupper(': revisi');
                                    } else if ($value->statbimbingan==1) {
                                      echo strtoupper(': Ter-revisi');
                                    } else {
                                      echo strtoupper(': selesai');
                                    } ?>                  
                                </td>
                              </tr>
                            </tbody>
                        </table>
                  <?php echo form_open_multipart(base_url('bimbingan')); ?>
                   
                    <div class="form-group required">
                        <label style="padding-top: 3rem;">Catatan</label>
                            <textarea rows="5" class="form-control" aria-describedby="describe" placeholder="Isi catatan disini" name="catatandospem"></textarea>
                            <small id="describe" class="form-text text-muted label">Pastikan anda sudah memperbarui file pdf skripsi.</small><br>
                            <small id="describe" class="form-text text-muted label">Catatan berisi perubahan apa saja yg telah anda lakukan atau komentar mengenai skripsi yang sudah direvisi.</small>
                            <input type="hidden" name="idskripsi" value="<?php echo $value->idskripsi; ?>">
                            <input type="hidden" name="idpeg" value="<?php echo $value->idpeg; ?>">
                    </div>
                  <?php } ?>

                    <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Simpan</button>
                    <div class="clearfix"></div>
                  <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
  <?php endif ?>
   

<!-- revisi dosen penguji 1 -->
    <?php if ($data['query3'] != NULL): ?>
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="title text-center">Revisi Dosen Penguji 1</h4>
                </div>
                <div class="content">
                  <?php foreach ($data['query3'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Nama Dosen</th>
                                <td>: <?php echo $value->namapeg  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Catatan</th>
                                <td>: <?php echo $value->catatan  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status</th>
                                <td>
                                    <?php if ($value->statbimbingan==0) {
                                      echo strtoupper(': revisi');
                                    } else if ($value->statbimbingan==1) {
                                      echo strtoupper(': Ter-revisi');
                                    } else {
                                      echo strtoupper(': selesai');
                                    } ?>                  
                                </td>
                              </tr>
                            </tbody>
                        </table>
                  <?php } ?>
                  <?php echo form_open_multipart(base_url('bimbingan')); ?>
                   
                    <div class="form-group required">
                        <label style="padding-top: 3rem;">Catatan</label>
                            <textarea rows="5" class="form-control" aria-describedby="describe" placeholder="Isi catatan disini" name="catatanpenguji1"></textarea>
                            <small id="describe" class="form-text text-muted label">Pastikan anda sudah memperbarui file pdf skripsi.</small><br>
                            <small id="describe" class="form-text text-muted label">Catatan berisi perubahan apa saja yg telah anda lakukan atau komentar mengenai skripsi yang sudah direvisi.</small>
                    </div>
                    <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Simpan</button>
                    <div class="clearfix"></div>
                  <?php echo form_close(); ?>

                  

                </div>

            </div>
        </div>
    </div>
    <?php endif ?>

<!-- revisi dosen penguji 2 -->
    <?php if ($data['query4'] != NULL): ?>
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="title text-center">Revisi Penguji 2</h4>
                </div>
                <div class="content">
                  <?php foreach ($data['query4'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Judul</th>
                                <td>: <?php echo $value->namapeg  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Catatan</th>
                                <td>: <?php echo $value->catatan  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status</th>
                                <td>
                                    <?php if ($value->statbimbingan==0) {
                                      echo strtoupper(': revisi');
                                    } else if ($value->statbimbingan==1) {
                                      echo strtoupper(': Ter-revisi');
                                    } else {
                                      echo strtoupper(': selesai');
                                    } ?>                  
                                </td>
                              </tr>
                            </tbody>
                        </table>
                  <?php } ?>
                  <?php echo form_open_multipart(base_url('bimbingan')); ?>
                    
                    <div class="form-group required">
                        <label style="padding-top: 3rem;">Catatan</label>
                            <textarea rows="5" class="form-control" aria-describedby="describe" placeholder="Isi catatan disini" name="catatanpenguji2"></textarea>
                            <small id="describe" class="form-text text-muted label">Pastikan anda sudah memperbarui file pdf skripsi.</small><br>
                            <small id="describe" class="form-text text-muted label">Catatan berisi perubahan apa saja yg telah anda lakukan atau komentar mengenai skripsi yang sudah direvisi.</small>
                    </div>
                    <button type="submit" class="btn btn-success btn-fill pull-right abu"><i class="fa fa-edit"></i>Simpan</button>
                    <div class="clearfix"></div>
                  <?php echo form_close(); ?>

                  

                </div>

            </div>
        </div>
    </div>
    <?php endif ?>
    
</div>
</div>
</div>
</div>