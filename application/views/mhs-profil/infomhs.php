<style type="text/css">
  .abu {
    width: 120px !important;
  }
</style>
<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
          <?php echo $this->session->flashdata('sukses'); ?>
            <div class="card">
              <div class="header">
                    <h4 class="title text-center">Profil Mahasiswa</h4>
                </div>
                <div class="content">
                  <?php 
                  foreach ($data as $value) { ?>
                   <table class="table table-hover table-bordered">
                            <tbody>
                              <tr>
                                <th width="17%">NIM</th>
                                <td> <?php echo $value->nim  ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Nama Mahasiswa</th>
                                <td> <?php echo $value->namamhs ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Jenis Kelamin</th>
                                <td><?php 
                                        if ($value->jeniskel=="L") {
                                          echo ' Laki-laki';
                                        }else if($value->jeniskel=="P"){
                                          echo ' Perempuan';
                                        }else{
                                          echo '';
                                        }?>
                                </td>
                              </tr>
                              <tr>
                                <th width="17%">Email</th>
                                <td> <?php echo $value->email ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Jurusan</th>
                                <td> <?php echo $value->jurusan ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Angkatan</th>
                                <td> <?php echo $value->angkatan ?></td>
                              </tr>
                              <tr>
                                <th width="17%">No.Telepon</th>
                                <td> <?php echo $value->telepon ?></td>
                              </tr>
                              <tr>
                                <th width="17%">Alamat</th>
                                <td> <?php echo $value->alamat ?></td>
                              </tr>
                            </tbody>
                        </table>
                <div class="row">
                  <div class="col-md-9"></div>
                  <div class="col-md-3">
                    <?php if ($this->session->userdata('logged_in')) { ?>
                      <a class="btn btn-warning btn-fill pull-right abu"  href="<?php echo base_url('profil/edit'); ?>" role="button"><i class="fa fa-pencil-square-o"></i>Ubah</a>
                    <?php } ?>
                  </div>
                <div class="clearfix"></div>
                </div>
                   <?php } ?>
               
              </div>
          </div>
      </div>
    </div>
</div>
</div>