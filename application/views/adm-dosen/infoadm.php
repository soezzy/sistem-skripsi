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
                    <h4 class="title">Manajemen Kuota</h4>
                </div>
                <div class="content">
                <div class="content table-responsive">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Nama Pegawai</th>
                        <th class="text-center">No. Telepon</th>
                        <th class="text-center">Kuota</th>
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
                                <td class="text-center"><?php echo $value->kuota; ?></td>

                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-dosen/detail/'.$value->idpeg);?>" title="Detail" class="btn btn-info btn-fill">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-dosen/edit/'.$value->idpeg);?>" title="Ubah kuota dosen" class="btn btn-info btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
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