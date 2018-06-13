<style type="text/css">
  .abu {
    width: 120px !important;
  }
  .form-group.required .label:before {
    content:"*";
    color:red;
  }
</style>

<div class="content">
<div class="container-fluid">
            <?php if ($data['query1'] != NULL){ ?>
<div class="row">
    <div class="col-md-12">
         <div class="card">
            <?php echo $this->session->flashdata('success'); ?>
            <?php echo $this->session->flashdata('error'); ?>
            <?php echo $this->session->flashdata('errorupload'); ?>
                  
              <div class="header">
                  <h4 class="title text-center">Bimbingan Skripsi Mahasiswa</h4>
                </div>
                <div class="content">
                  <?php 
                  foreach ($data['query1'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Nama Mahasiswa</th>
                                <td> <?php echo $value->namamhs  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Judul</th>
                                <td> <?php echo $value->judul  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Abstrak</th>
                                <td> <?php echo $value->abstrak ?></td>
                              </tr>
                            </tbody>
                        </table>

                <div class="row">
                  <div class="col-md-12">
                    <embed src="/skripsi/pdf/<?php echo $value->fileupload ?>" type="application/pdf" width="100%" height="600">
                  </div>
                </div>
                   <?php } ?>
              </div>
          </div>
                  <?php } ?>

<!--<<<<<<<<<<<<<<<<<<<  file mahasiswa  >>>>>>>>>>>>>>>>>>-->
  <?php if ($data['query2']!=NULL): ?>
     <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="header">
                    <h4 class="title text-center">Revisi Mahasiswa Bimbingan</h4>
                    <p class="category text-center">Sebagai Penguji 1</p>
                </div>
                <div class="content">
                  <?php foreach ($data['query2'] as $value) { ?>
                    <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">Nama Mahasiswa</th>
                                <td> <?php echo $value->namamhs  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Catatan</th>
                                <td> <?php echo $value->catatan  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Status</th>
                                <td>
                                    <?php if ($value->statbimbingan==0) {
                                      echo strtoupper(' revisi');
                                    } else if ($value->statbimbingan==1) {
                                      echo strtoupper(' Ter-revisi');
                                    } else {
                                      echo strtoupper(' selesai');
                                    } ?>                  
                                </td>
                              </tr>
                            </tbody>
                        </table>
                  <?php echo form_open_multipart(base_url('adm-bimbingan/detail-uji1/'.$value->idskripsi)); ?>
                   
                    <div class="form-group required">
                        <label style="padding-top: 3rem;">Catatan</label>
                            <textarea rows="5" class="form-control" aria-describedby="describe" placeholder="Isi catatan disini" name="catatandospem"></textarea>
                            <small id="describe" class="form-text text-muted label">Catatan berisi perubahan apa saja yang perlu dilakukan oleh mahasiswa atau komentar mengenai skripsi.</small>
                            <input type="hidden" name="idskripsi" value="<?php echo $value->idskripsi; ?>">
                            <input type="hidden" name="idmhs" value="<?php echo $value->idmhs; ?>">
                    </div>

                    <div class="form-group row">
                      <div class="col-md-4">
                              <label for="status">Status</label>
                              <select id="status" name="status" class="form-control">
                                <option value="0">Revisi</option>
                                <option value="2">Selesai</option>
                              </select>
                          </div>
                      </div>
                  <?php } ?>
                    <a href="<?php echo base_url('adm-bimbingan');?>" class="btn btn-fill btn-danger abu" role="button"><i class="fa fa-chevron-circle-left"></i>Kembali</a>
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