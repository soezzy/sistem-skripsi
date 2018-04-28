<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="header">
                    <h4 class="title text-center">Daftar Mahasiswa Skripsi</h4>
                </div>
                <div class="content">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort">No.</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center" width="46%">Judul</th>
                        <th class="text-center" width="8%">Angkatan</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center" width="10%">Action</th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->namamhs; ?></td>
                                <td><?php echo $value->judul; ?></td>
                                <td class="text-center"><?php echo $value->angkatan; ?></td>

                                <td class="td-actions text-center">
                                    <!-- <a type="button" rel="tooltip" href="<?php //echo base_url('adm-dosen/detail');?>" title="Detail" class="btn btn-info btn-fill">
                                        <i class="fa fa-eye"></i>
                                    </a> -->
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-pengajuan/detail/'.$value->idskripsi);?>" title="Validasi" class="btn btn-info btn-fill">
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