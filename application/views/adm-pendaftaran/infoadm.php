<div class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php echo $this->session->flashdata('success'); ?>
                <div class="header">
                    <h4 class="title text-center">Daftar Pengajuan Ujian</h4>
                </div>
                <div class="content">
                    <table class="table table-bordered table-hover" id="manageMemberTable">
                      <thead>
                        <th class="text-center no-sort" width="6%">No.</th>
                        <th class="text-center" width="10%">NIM</th>
                        <th class="text-center" width="25%">Nama Mahasiswa</th>
                        <th class="text-center" width="10%">No. Telepon</th>
                        <th class="text-center" width="8%">Status</th>
                        <?php if ($this->session->userdata('logged_in')) { ?>
                            <th class="text-center" width="15%">Action</th>
                        <?php } ?>
                      </thead>
                        <tbody>
                            <?php 
                            $rowCount = 1;
                                foreach ($data['query1'] as $value) { ?>
                                <tr>
                                <td class="text-center"><p><?php echo $rowCount; ?></p></td>
                                <td><?php echo $value->nim; ?></td>
                                <td><?php echo $value->namamhs; ?></td>
                                <td><?php echo $value->telepon; ?></td>
                                <td><?php echo $value->statskripsi; ?></td>
                                <td class="td-actions text-center">
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-daftar/penguji/'.$value->idmhs);?>" title="Daftarkan Penguji" class="btn btn-info btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-daftar/proposal/'.$value->idmhs.'/'.$value->idskripsi);?>" title="Validasi Ujian Proposal" class="btn btn-warning btn-fill">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a type="button" rel="tooltip" href="<?php echo base_url('adm-daftar/skripsi/'.$value->idmhs.'/'.$value->idskripsi);?>" title="Validasi Ujian Skripsi" class="btn btn-danger btn-fill">
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