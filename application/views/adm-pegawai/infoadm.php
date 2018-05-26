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
            <?php echo $this->session->flashdata('success'); ?>

            <div class="card">
                <div class="header">
                    <h4 class="title text-center">Data Pegawai</h4>
                </div>
                <div class="content">
                    <a type="button" rel="tooltip" href="/skripsi/adm-pegawai/tambah" title="Tambah pegawai baru" class="btn btn-info btn-fill abu"><i class="fa fa-plus"></i>Pegawai</a>
                     <a type="button" rel="tooltip" href="/skripsi/adm-pegawai" title="Refresh" class="btn btn-default btn-fill abu"><i class="fa fa-refresh"></i>Refresh</a>
                <div class="content table-responsive">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">No. Telepon</th>
                        <th class="text-center">Level</th>
                        <th class="text-center">Grup</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center"></th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->namapeg; ?></td>
                                <td><?php echo $value->telepon; ?></td>
                                <td><?php 
                                    switch ($value->level) {
                                        case '5':
                                            echo "Super Admin";
                                            break;

                                        case '4':
                                            echo "Staff Admin";
                                            break;

                                        case '3':
                                            echo "Kaprodi";
                                            break;

                                        default:
                                            echo "Dosen";
                                            break;
                                    }
                                 ?></td>
                                <td><?php echo ucfirst($value->kelompok); ?></td>
                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-pegawai/detail/'.$value->nip);?>" title="Detail" class="btn btn-info btn-fill">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-pegawai/edit/'.$value->idpeg);?>" title="Ubah hak akses" class="btn btn-info btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <?php if($value->nip==$_SESSION['iduser'])  { ?>
                                        <a type="button" rel="tooltip" href="<?php echo base_url('adm-pegawai/unbanuser/'.$value->nip);?>" style="display: none;" title="Aktifkan user" class="btn btn-success btn-fill"><i class="fa fa-plus-circle"></i></a>
                                    <?php }else if ($value->status=="aktif"){?>
                                         <a type="button" rel="tooltip" href="<?php echo base_url('adm-pegawai/banuser/'.$value->nip);?>" title="Non-aktifkan user" class="btn btn-danger btn-fill">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                   <?php }else{ ?>
                                        <a type="button" rel="tooltip" href="<?php echo base_url('adm-pegawai/unbanuser/'.$value->nip);?>" title="Aktifkan user" class="btn btn-success btn-fill">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                   <?php } ?>
                                    
                                </td>
                            </tr>
                           <?php $rowCount++; } ?>
                        </tbody>
                    </table>
                </div>
                  
              </div>
          </div>
      </div>
    </div>
</div>
</div>