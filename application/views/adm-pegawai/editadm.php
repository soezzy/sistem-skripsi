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
                    <h4 class="title">Ubah Hak Akses</h4>
                </div>
                <div class="content">
                  <?php echo form_open_multipart(base_url('adm-pegawai/editpeg/'.$data[0]->nip)); ?>
                     <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-4">
                         <div class="form-group">
                            <label>Nomor induk pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data[0]->nip; ?>">
                         </div>
                       </div>
                        <div class="col-md-8">
                         <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" class="form-control" id="namapeg" name="namapeg" value="<?php echo $data[0]->namapeg; ?>">
                        </div>
                       </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-10 col-md-offset-1">
                        <div class="col-md-6">
                        <div class="form-group">
                              <label>Level</label>
                              <select id="level" name="level" class="form-control">
                                <?php 
                                  switch ($data[0]->level) {
                                    case '5':
                                     echo " <option value='2'>Dosen</option><option value='3'>Kaprodi</option><option value='4'>Staff Admin</option><option value='5' selected>Super Admin</option>";
                                      break;
                                    case '4':
                                     echo " <option value='2'>Dosen</option><option value='3'>Kaprodi</option><option value='4' selected>Staff Admin</option><option value='5'>Super Admin</option>";
                                      break;
                                    case '3':
                                     echo " <option value='2'>Dosen</option><option value='3' selected>Kaprodi</option><option value='4'>Staff Admin</option><option value='5'>Super Admin</option>";
                                    break;
                                    default:
                                      echo "<option value='2' selected>Dosen</option><option value='3'>Kaprodi</option><option value='4'>Staff Admin</option><option value='5'>Super Admin</option>";
                                      break;
                                  }
                                 ?>
                               
                              </select>
                          </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                              <label>Grup</label>
                              <select id="grup" name="grup" class="form-control">
                                 
                                 <?php 
                                  switch ($data[0]->kelompok) {
                                    case 'dosen':
                                     echo " <option value='dosen' selected>Dosen</option><option value='kaprodi'>Kaprodi</option><option value='staff admin' >Staff Admin</option>";
                                      break;
                                    case 'kaprodi':
                                     echo " <option value='dosen'>Dosen</option><option value='kaprodi' selected>Kaprodi</option><option value='staff admin' >Staff Admin</option>";
                                    break;
                                    case 'staff admin':
                                     echo " <option value='dosen'>Dosen</option><option value='kaprodi'>Kaprodi</option><option value='staff admin' selected>Staff Admin</option>";
                                    break;
                                    default:
                                      echo "<option selected>Dosen</option><option>Kaprodi</option><option value='staff admin'>Staff Admin</option>";
                                      break;
                                  }
                                 ?>
                                
                              </select>
                          </div>
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
<script type="text/javascript">
  document.getElementById("nip").readOnly = true;
  document.getElementById("namapeg").readOnly = true;

</script>